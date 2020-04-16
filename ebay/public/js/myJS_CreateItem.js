$(document).ready(function(){

    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();
    if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 
    today = yyyy+'-'+mm+'-'+dd;
    
    $('#start_date').prop('min', today);
    $('#end_date').prop('min', today);
    $('#end_date').change(function(){
        $('#start_date').prop('max', this.value);
    });
    $('#start_date').change(function(){
        $('#end_date').prop('min', this.value);
    });
    $('#myCheckBid').change(function(){
        if($('#myCheckBid').is(':checked')){
            $("#myCheckBestOffer").prop( "checked", false );
            $("#BestOfferContent").css("display", "none");
            $("#myCheckImmediatPurchase").prop( "checked", false );
            $("#ImmediatPurchaseContent").css("display", "none");
            $("#BidContent").css("display", "");
        }
        else{
            $("#BidContent").css("display", "none");
        }
    });
    $('#myCheckBestOffer').change(function(){
        if($('#myCheckBestOffer').is(':checked')){
            $("#myCheckBid").prop( "checked", false );
            $("#BidContent").css("display", "none");

            $("#BestOfferContent").css("display", "");
        }
        else{
            $("#BestOfferContent").css("display", "none");
        }
    });
    $('#myCheckImmediatPurchase').change(function(){
        if($('#myCheckImmediatPurchase').is(':checked')){
            $("#myCheckBid").prop( "checked", false );
            $("#BidContent").css("display", "none");

            $("#ImmediatPurchaseContent").css("display", "");
        }
        else{
            $("#ImmediatPurchaseContent").css("display", "none");
        }
    });

});
