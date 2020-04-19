<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

use App\Item ;
use App\Media ;
use App\Offer ;
use App\User ;




class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(
            
            
        function () {
            while(true){
                
            $datas=DB::table('items')
                    ->join('offers', 'offers.item_id','=', 'items.id')
                    ->join('purchases','purchases.offer_id', '=','offers.id')
                    ->where('items.sold',false)
                    ->where('offers.state','like', 'wait%')
                    
                    ->select('items.id as item_id','items.user_id as seller_id', 'items.Title', 'items.end_date','items.sold','items.Initial_Price',
                            'offers.id as offer_id','offers.price as offer_price','offers.state','offers.type as offer_type','offers.user_id as buyer_id',
                            'purchases.id as purchase_id')
                    ->get();

            for($i=0; $i<count($datas);$i++)  
            {
                $data=$datas[$i];
                echo "<br>Nouvelle data en cours d'analyse $i : ";

                if($data->offer_type=='immediat')
                {
                    echo "Cette achat est un achat immédiat. ";
                    $test=DB::table('items')
                            ->join('offers', 'offers.item_id','=', 'items.id')
                            ->join('purchases','purchases.offer_id', '=','offers.id')
                            ->where('items.id','=',$data->item_id)
                            ->get();

                    //on regarde toutes les offres proposé pour cette article si il n'y en a qu'une alors on l'attribut
                    //si il y en a plusieurs c'est plus compliqué on fait rien ( best offer et achat immédiat etc)
                    if(count($test)==1)
                    {
                        echo "<strong>L'article va être attribué</strong> item id :$data->item_id offer id $data->offer_id ";
                        
                        //Mail::to("willy.martin@edu.ece.fr")->send(new NewMail);
                        
                        Item::find($data->item_id)->update([ 'sold' => true ]);
                        Offer::find($data->offer_id)->update(['state' => 'valid']);

                        //Send email
                        $to_name = User::find($data->buyer_id)->get()->first()->lastname;
                        $to_email = 'willy.martin@edu.ece.fr';
                        $subject = 'Votre commande vient d etre valider';
                        $message = 'Bonjour '.$to_name.', <br><br> Votre commande vient d\'etre valider ! Elle sera transmise à notre transporteur dés demain. Votre date de livraison estimé est le : ';
                        $headers = 'From: ECE SRW <connected.letterbox@gmail.com>';
                        if(mail($to_email,$subject,$message,$headers))
                            echo "L'email a été envoyé.";
                        else
                            echo "L'email n'a pas été envoyé.";
                    
                    }
                    else{
                        echo "<strong>Probleme correspondance BDD : demande intervention d'un administrateur. </strong>";
                    }
                }
                if($data->offer_type=='bestoffer')
                {
                    echo " Cette achat est une bestoffer. ";
                    echo " Aucune action ne sera réalisé sur cette data. ";
                }
                if($data->offer_type=='bid')
                {
                    echo "Cette achat est une enchère, nous allons update le prix initial de l'enchère en fonction de toutes les offres proposées pour cette enchère ";
                    $test=DB::table('items')
                            ->join('offers', 'offers.item_id','=', 'items.id')
                            ->join('purchases','purchases.offer_id', '=','offers.id')
                            ->where('items.sold',false) //inutile
                            ->where('offers.state','like', 'wait%') //
                            ->where('items.id','=',$data->item_id)
                            ->orderBy('offers.price','desc')
                            ->select('items.id as item_id','items.user_id as seller_id', 'items.Title', 'items.end_date','items.sold','items.Initial_Price',
                                'offers.id as offer_id','offers.price as offer_price','offers.state','offers.type as offer_type','offers.user_id as buyer_id',
                                'purchases.id as purchase_id')
                            ->get();

                    echo "count". count($test) ;
                    if(count($test)>1)
                    {

                        $new_price=($test[1]->offer_price)+1;

                        Item::find($test[0]->item_id)
                            ->update([ 'Initial_Price' => $new_price ]); 
                        
                        DB::table('offers')
                                ->where('offers.item_id','=',$test[0]->item_id)
                                ->where('price','<',$new_price)
                                ->update(['state' => 'refuse']);

                        echo "mise à jour des enchères réalisées le nouveau prix est $new_price";

                        //on réactualise nos données
                        $datas=DB::table('items')
                        ->join('offers', 'offers.item_id','=', 'items.id')
                        ->join('purchases','purchases.offer_id', '=','offers.id')
                        ->where('items.sold',false)
                        ->where('offers.state','like', 'wait%')
                        ->select('items.id as item_id','items.user_id as seller_id', 'items.Title', 'items.end_date','items.sold','items.Initial_Price',
                                'offers.id as offer_id','offers.price as offer_price','offers.state','offers.type as offer_type','offers.user_id as buyer_id',
                                'purchases.id as purchase_id')
                        ->get();
                        $i=-1;
                                            
                    }else
                    {
                        echo "une seule offre proposée pour cet item, le prix initial reste inchangé";
                    }
                    $today=date("Y-m-d").'T'.(date("H")+2).':'.date('i');
                    if($test[0]->end_date<$today){ //si la date de l'enchère est terminé on atribut un gagnant
                        
                        echo "l'enchère est terminer on attribut un gagnant";

                        if(count($test)==1 ||$test[0]->offer_price!=$test[1]->offer_price)
                        {
                            //le gagnant est le numero 0
                            Offer::find($test[0]->offer_id)
                                    ->update(['state'=> 'valid']);
                            Item::find($test[0]->item_id)->update([ 'sold' => true ]);
                                echo "l'objet :". $test[0]->item_id ."est vendu pour l'utilisateur". $test[0]->buyer_id. "avec l'offre".$test[0]->offer_id;
                                //envoie du mail 
                            //Send email
                            $to_name = User::find($test[0]->buyer_id)->get()->first()->lastname;
                            $to_email = 'willy.martin@edu.ece.fr';
                            $subject = 'Votre commande vient d etre valider';
                            $message = 'Bonjour '.$to_name.', <br><br> L\'enchere '.$test[0]->Title.' vient de vous etre attribuer ! Votre commande sera transmise à notre transporteur dés demain. Votre date de livraison estimé est le : ';
                            $headers = 'From: ECE SRW <connected.letterbox@gmail.com>';
                            if(mail($to_email,$subject,$message,$headers))
                                echo "L'email de confirmation de commande a été envoyé.";
                            else
                                echo "L'email de confirmation de commande n'a pas été envoyé.";
                        }
                    }
                        
                }
            }   
            sleep(10);   
        }    
        })->everyMinute()
        ->appendOutputTo(storage_path('logs/schedule.log'));
        
        // $schedule->command('inspire')->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
