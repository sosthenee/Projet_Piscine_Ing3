$(document).ready(function(){

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
