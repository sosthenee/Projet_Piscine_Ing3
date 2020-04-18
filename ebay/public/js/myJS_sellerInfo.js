$(document).ready(function(){
    
    $('#Seller').change(function(){
        if($('#Seller').is(':checked')){
        //    $('#roleseller').prop('required',false);
     

            $("#sellercontent").css("display", "");
        }
        else{
            $("#sellercontent").css("display", "none");
        }
    });
    

});
