$(document).ready(function(){
    
    $('#buyer').change(function(){
        if($('#buyer').is(':checked')){
        //    $('#roleseller').prop('required',false);
     

            $("#buyercontent").css("display", "");
        }
        else{
            $("#buyercontent").css("display", "none");
        }
    });
    

});

