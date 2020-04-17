$(document).ready(function(){

    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();
    var hh =today.getHours();
    var mi =today.getMinutes();
    var h2=hh;
    if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 
    if(hh<10){
        hh='0'+hh
    } 
    mi++;
    if(mi<10){
        mi='0'+mi
    }
    today = yyyy+'-'+mm+'-'+dd+'T'+hh+':'+mi;
    $('#start_date').prop('min', today);
    $('#end_date').prop('min', today);


    h2++;
    if(h2<10){
        h2='0'+h2
    } 
    if(h2==24){
        h2='00'
    } 
    var later1 = yyyy+'-'+mm+'-'+dd+'T'+h2+':00';
    var later2 = yyyy+'-'+mm+'-'+dd+'T'+h2+':59';
    
    $('#start_date').prop('value', later1);
    $('#end_date').prop('value', later2);

    $('#end_date').change(function(){
        $('#start_date').prop('max', this.value);
    });
    $('#start_date').change(function(){
        $('#end_date').prop('min', this.value);
    });
    
    $('#myCheckBid').change(function(){
        if($('#myCheckBid').is(':checked')){
            $('#myCheckBid').prop('required',false);
            $("#myCheckBestOffer").prop( "checked", false );
            $("#BestOfferContent").css("display", "none");

            $("#myCheckImmediatPurchase").prop( "checked", false );
            $("#ImmediatPurchaseContent").css("display", "none");
            $('#price').prop('required',false);

            $("#BidContent").css("display", "");
            $('#start_date').prop('required',true);
            $('#end_date').prop('required',true);
            $('#price_min').prop('required',true);
        }
        else{
            $("#BidContent").css("display", "none");
            $('#start_date').prop('required',false);
            $('#end_date').prop('required',false);
            $('#price_min').prop('required',false);
        }
    });
    $('#myCheckBestOffer').change(function(){
        if($('#myCheckBestOffer').is(':checked')){

            $('#myCheckBid').prop('required',false);

            $("#myCheckBid").prop( "checked", false );
            $("#BidContent").css("display", "none");
            $('#start_date').prop('required',false);
            $('#end_date').prop('required',false);
            $('#price_min').prop('required',false);

            $("#BestOfferContent").css("display", "");
        }
        else{
            $("#BestOfferContent").css("display", "none");
        }
    });
    $('#myCheckImmediatPurchase').change(function(){
        if($('#myCheckImmediatPurchase').is(':checked')){

            $('#myCheckBid').prop('required',false);
            
            $("#myCheckBid").prop( "checked", false );
            $("#BidContent").css("display", "none");
            $('#start_date').prop('required',false);
            $('#end_date').prop('required',false);
            $('#price_min').prop('required',false);

            $("#ImmediatPurchaseContent").css("display", "");
            $('#price').prop('required',true);
        }
        else{
            $("#ImmediatPurchaseContent").css("display", "none");
            $('#price').prop('required',false);
        }
    });

});
