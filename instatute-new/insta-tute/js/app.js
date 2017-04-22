$(document).ready(function () {

    $(".scroll-top-inner").click(function () {
        
        verticalOffset = typeof (verticalOffset) != 'undefined' ? verticalOffset : 0;
        element = $('body');
        offset = element.offset();
        offsetTop = 0;
//        offsetTop = offset.top;
//        console.log('offsetTop', offsetTop);
        $('html, body').animate({scrollTop: offsetTop}, 500, 'linear');
    });
    
    // Flex Slider
    $('.flexslider').flexslider({
        animation: "slide",
        prevText: "",           
        nextText: "",
        controlNav: false,
        start:function(slider){
        //HIDE THE ARROWS BY DEFAULT...
        $('.flexslider .flex-direction-nav').css({display:'none'});

        //THEN INSERT YOUR CUSTOM JQUERY CLICK ACTIONS TO REVEAL THEM AGAIN
        slider.find('a').on('click',function(){
        $('#slider .flex-direction-nav').css({visibility:'visible'});
        });
    }//end start function
      });
});
