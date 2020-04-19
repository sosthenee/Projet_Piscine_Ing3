$(document).ready(function(){
    
    $('#Seller').change(function(){
        if($('#Seller').is(':checked')){
    
            $("#sellercontent").css("display", "");
            $('#button_register').prop('disabled',false);
        }
        else{
            $("#sellercontent").css("display", "none");
            if($('#buyer').is(':checked')){ }
            else
            $('#button_register').prop('disabled',true);
        }
    });
});

$(document).ready(function(){
    
    $('#buyer').change(function(){
        if($('#buyer').is(':checked')){

            $("#buyercontent").css("display", "");
            $('#button_register').prop('disabled',false);
        }
        else{
            $("#buyercontent").css("display", "none");
            if($('#Seller').is(':checked')){ }
            else
            $('#button_register').prop('disabled',true);
        }
    });
});


