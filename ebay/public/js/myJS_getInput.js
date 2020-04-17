
$(document).ready(function(){
    var tmpIdSelectCard = null;
    console.log('init')
    $('.selectpicker').on('change', function () {
        console.log('changes')
        if (tmpIdSelectCard) {
            console.log('removing', tmpIdSelectCard)
            $('#coco'+tmpIdSelectCard).attr("hidden",true);
        }
        console.log('setting', this.value)
        $('#coco'+this.value).removeAttr("hidden");
        console.log('update')
        tmpIdSelectCard = this.value
        console.log('done', tmpIdSelectCard)
    });
});