

    function myCountdowns(){
    setTimeout(function (){

        var allCountDown_date= document.getElementsByClassName("countdown_end_date");
        var allCountDown= document.getElementsByClassName("countdown");

        if(allCountDown_date.length==allCountDown.length){

            //on met à jour la date d'aujourd'hui
            var today = new Date();
 
            
            for(var i=0; i<allCountDown.length; i++)
            {
                var str=allCountDown_date[i].innerHTML;
                var temp_date= new Date(str);
                var tt=temp_date-today;

                if(tt<0)
                {
                    var display='Temps écoulé';
                }
                else{
                    
                    var yyyy = tt/31536000000;
                    var mm = (tt% 31540000000)/2628002880 ; 
                    var dd = (tt%2628002880)/86400000 ;
                    var hh =(tt%86400000)/3600000;
                    var mi =(tt%3600000)/60000;
                    var ss =(tt%60000)/1000;
                    mm=Math.trunc(mm);
                    yyyy=Math.trunc(yyyy);
                    dd=Math.trunc(dd);
                    hh=Math.trunc(hh);
                    mi=Math.trunc(mi);
                    ss=Math.trunc(ss);
                    
                    var display='temps restant : ';
                    if(yyyy>0)
                        display+=yyyy+'années ';
                    if(mm>0)
                        display+=mm+'mois ';
                    if(dd>0)
                        display+=dd+'j ';
                    
                    if(hh<10){
                        hh='0'+hh
                    } 
                    
                    if(mi<10){
                        mi='0'+mi
                    }
                    if(ss<10){
                        ss='0'+ss
                    }
                    display+=hh+':';
                    display+=mi+':';
                    display+=ss;
                }

                allCountDown[i].innerHTML=display;
            }
        }
        
    myCountdowns(); 
    },1000);
    }
    myCountdowns();
    

