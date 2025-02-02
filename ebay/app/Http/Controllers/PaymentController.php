<?php

namespace App\Http\Controllers;
use App\Payment_info ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{

    public function AllfromUser(Request $request){
        if(Auth::guest())
        {return redirect('/login')->with('error','Vous n\'etes pas connecté. Identifiez vous ou faites une création de compte !');}
        else{
            $user = Auth::user();
            if($user->role!=='buyer'&&$user->role!=='buyerseller')
            {
                return redirect('/')->with('error','Vous n\'etes pas buyer. Identifiez vous ou faites une création de compte !');
            }else{
                $request->user()->authorizeRoles(['buyer','buyerseller']);
            
                $payement_infos = Payment_info::where('user_id',$user->id)->get();
                return view('payment_info.payment_info',compact('payement_infos'));
            }
        }
    }

    public function updateView(Request $request, $payment_id){
        if(Auth::guest())
        {return redirect('/login')->with('error','Vous n\'etes pas connecté. Identifiez vous ou faites une création de compte !');}
        else{
            $user = Auth::user();
            if($user->role!=='buyer'&&$user->role!=='buyerseller')
            {
                return redirect('/')->with('error','Vous n\'etes pas buyer. Identifiez vous ou faites une création de compte !');
            }else{
                $request->user()->authorizeRoles(['buyer','buyerseller']);
                $payment_info = Payment_info::where('id',$payment_id)->first();
                return view('payment_info.change_payment',compact('payment_info'));
            }
        }
    }
    
    public function Create(Request $request) {
        $request->user()->authorizeRoles(['buyer','buyerseller']);
        $user = Auth::user();
        $payement_info = new Payment_info();
        $payement_info->cardType = request('cardType');
        $payement_info->cardNumber = request('cardNumber');
        $payement_info->cardName =request('cardName');
        $payement_info->expirationDate =request('expirationDate');
        $payement_info->securityCode =request('securityCode');
        $payement_info->user()->associate($user);
        $payement_info->save();
        
        $payement_infos = Payment_info::where('user_id',$user->id)->get();
        return redirect()->action('PaymentController@AllfromUser');
    }

    public function delete(Request $request, $payment_id ){
        $request->user()->authorizeRoles(['buyer','buyerseller']);
        $user_id = Auth::id();
        $payement_info = Payment_info::where([
            ['id',$payment_id],
            ['user_id', $user_id]
        ])->delete();
        
        $payement_infos = Payment_info::where('user_id',$user_id)->get();
        return view('payment_info.payment_info',compact('payement_infos'));
    }

    public function update(Request $request, $payment_id ){
        $request->user()->authorizeRoles(['buyer','buyerseller']);
        $user_id = Auth::id();
        $payement_infos = Payment_info::where('id',$payment_id)->first();
        $payement_infos->cardType = request('cardType');
        $payement_infos->cardNumber = request('cardNumber');
        $payement_infos->cardName =request('cardName');
        $payement_infos->expirationDate =request('expirationDate');
        $payement_infos->securityCode =request('securityCode');
        $payement_infos->save();

        $payement_infos = Payment_info::where('user_id',$user_id)->get();
        return view('payment_info.payment_info',compact('payement_infos'));
    }
}