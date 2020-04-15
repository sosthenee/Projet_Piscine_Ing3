
var numImgDisplay=0;


$(document).ready(function(){
    function maBoucle(){ 
 
        setTimeout(function(){         
            
            $(".carrousel img").eq(numImgDisplay).css('display','none');
            numImgDisplay++;
            if(numImgDisplay==$(".carrousel img").length)
                numImgDisplay=0;
            $(".carrousel img").eq(numImgDisplay).css('display', 'flex');
             maBoucle(); // relance la fonction   
            },5000); 
    } 
    // on n’oublie pas de lancer la fonction une première fois 
    maBoucle(); 

    $('#leftArrow').click(function(){
        $(".carrousel img").eq(numImgDisplay).css('display','none');
        numImgDisplay--;
        if(numImgDisplay==0)
            numImgDisplay=$(".carrousel img").length-1;
        $(".carrousel img").eq(numImgDisplay).css('display', 'flex');
    });

    $('#rightArrow').click(function(){
        $(".carrousel img").eq(numImgDisplay).css('display','none');
        numImgDisplay++;
        if(numImgDisplay==$(".carrousel img").length-1)
            numImgDisplay=0;
        $(".carrousel img").eq(numImgDisplay).css('display', 'flex');
    });
});
