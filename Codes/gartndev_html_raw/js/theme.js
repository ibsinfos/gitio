;(function($) {
    "use strict";
     var nav_offset_top = $('header').height(); 
    /*-------------------------------------------------------------------------------
	  Navbar 
	-------------------------------------------------------------------------------*/

	//* Navbar Fixed  
    function navbarFixed(){
        if ( $('header').length ){ 
            $(window).scroll(function() {
                var scroll = $(window).scrollTop();   
                if (scroll >= nav_offset_top ) {
                    $("header").addClass("navbar_fixed");
                } else {
                    $("header").removeClass("navbar_fixed");
                }
            });
        };
    };
    navbarFixed();

    $(window).on("load",function(){
        $(".web_menu_inner .nav.navbar-nav, .fixed_menu_area").mCustomScrollbar({
            theme:"minimal"
        });
    });
    
    /*----------------------------------------------------*/
    /* Submenu js
    /*----------------------------------------------------*/
    
    var dropToggle =$('.click_submenu').has('ul').children('a');
    
    dropToggle.on('click',function(){
        dropToggle.not(this).closest('li').find('ul').slideUp(700);
        $(this).closest('li').children('ul').slideToggle(700);
        return false;
    });
        
    $( '.click_submenu a[href="#"]' ).click( function(e) {
          e.preventDefault();
    });
    
    
    /*----------------------------------------------------*/
    /* Offcanvas Menu js
    /*----------------------------------------------------*/
    $('.burger_icon, .close_icon').on('click',function(){
        if( $(".left-side-menu, .burger_icon").hasClass('open') ){
            $(".left-side-menu, .burger_icon").removeClass('open')
        }
        else{
            $(".left-side-menu, .burger_icon").addClass('open')
        }
        return false
    });
    
    /* ================================
     main slider
     ================================*/
    if ($("#main_slider").revolution == undefined) {
        revslider_showDoubleJqueryError("#main_slider");
    } else {
        $("#main_slider").show().revolution({
            sliderType: "standard",
            sliderLayout: "fullscreen",
            dottedOverlay: "none",
            delay: 90000,
            navigation: {
                keyboardNavigation: "on",
                keyboard_direction: "horizontal",
                mouseScrollNavigation: "off",
                mouseScrollReverse: "default",
                onHoverStop: "off",
                touch: {
                    touchenabled: "on",
                    swipe_threshold: 75,
                    swipe_min_touches: 1,
                    swipe_direction: "horizontal",
                    drag_block_vertical: false
                }
                ,
                arrows: {
                    style: "zeus",
                    enable: true,
                    hide_onmobile: true,
                    hide_under: 600,
                    hide_onleave: true,
                    hide_delay: 200,
                    hide_delay_mobile: 1200,
                    tmp: '<div class="tp-title-wrap">  	<div class="tp-arr-imgholder"></div> </div>',
                    left: {
                        h_align: "left",
                        v_align: "center",
                        h_offset: 30,
                        v_offset: 0
                    },
                    right: {
                        h_align: "right",
                        v_align: "center",
                        h_offset: 30,
                        v_offset: 0
                    }
                }
            },
            viewPort: {
                enable: true,
                outof: "pause",
                visible_area: "80%",
                presize: false
            },
            responsiveLevels: [1240, 1199, 992, 768, 480],
            visibilityLevels: [1170, 970, 740, 700, 480],
            gridwidth: [1170, 970, 740, 700, 480],
            gridheight: [600, 600, 500, 500, 400],
            lazyType: "none",
            parallax: {
                type: "mouse",
                origo: "slidercenter",
                speed: 2000,
                levels: [2, 3, 4, 5, 6, 7, 12, 16, 10, 50, 46, 47, 48, 49, 50, 55]
            },
            shadow: 0,
            spinner: "off",
            stopLoop: "off",
            stopAfterLoops: -1,
            stopAtSlide: -1,
            shuffle: "off",
            autoHeight: "off",
            hideThumbsOnMobile: "off",
            hideSliderAtLimit: 0,
            hideCaptionAtLimit: 0,
            hideAllCaptionAtLilmit: 0,
            debugMode: false,
            fallbacks: {
                simplifyAll: "off",
                nextSlideOnWindowFocus: "off",
                disableFocusListener: false
            }
        });
    }
    
    if ($("#construction_slider").revolution == undefined) {
        revslider_showDoubleJqueryError("#construction_slider");
    } else {
        $("#construction_slider").show().revolution({
            sliderType: "standard",
            sliderLayout: "auto",
            dottedOverlay: "true",
            delay: 5000,
            navigation: {
                keyboardNavigation: "on",
                keyboard_direction: "horizontal",
                mouseScrollNavigation: "off",
                mouseScrollReverse: "default",
                onHoverStop: "off",
                touch: {
                    touchenabled: "on",
                    swipe_threshold: 75,
                    swipe_min_touches: 1,
                    swipe_direction: "horizontal",
                    drag_block_vertical: false
                }
                ,
                arrows: {
                    style:"hebe",
                    enable:true,
                    hide_onmobile:true,
                    hide_under:767,
                    hide_onleave:true,
                    hide_delay:200,
                    hide_delay_mobile:1200,
                    tmp:'<div class="tp-title-wrap"></div>',
                    left: {
                        h_align: "left",
                        v_align: "center",
                        h_offset: 0,
                        v_offset: 0
                    },
                    right: {
                        h_align: "right",
                        v_align: "center",
                        h_offset: 0,
                        v_offset: 0
                    }
                },
            },
            viewPort: {
                enable: true,
                outof: "pause",
                visible_area: "80%",
                presize: false
            },
            responsiveLevels: [1240, 1199, 992, 768, 480],
            visibilityLevels: [1170, 970, 740, 700, 480],
            gridwidth: [1170, 970, 740, 700, 480],
            gridheight: [800, 650, 600, 600, 600],
            lazyType: "none",
            shadow: 0,
            spinner: "off",
            stopLoop: "off",
            stopAfterLoops: -1,
            stopAtSlide: -1,
            shuffle: "off",
            autoHeight: "off",
            hideThumbsOnMobile: "off",
            hideSliderAtLimit: 0,
            hideCaptionAtLimit: 0,
            hideAllCaptionAtLilmit: 0,
            debugMode: false,
            fallbacks: {
                simplifyAll: "off",
                nextSlideOnWindowFocus: "off",
                disableFocusListener: false
            }
        });
    }
    
    /*----------------------------------------------------*/
    /*  Main Slider js
    /*----------------------------------------------------*/
    function gym_slider(){
        if ( $('#gym_slider').length ){
            $("#gym_slider").revolution({
                sliderType: "standard",
                sliderLayout: "auto",
                lazyLoad:"on", 
                delay:90000,
                disableProgressBar:"on",
                navigation: {
                    onHoverStop: 'off',
                    touch:{
                        touchenabled:"on"
                    },
                    arrows: {
                        style:"zeus",
                        enable:true,
                        hide_onmobile:true,
                        hide_under:600,
                        hide_onleave:false,
                        hide_delay:200,
                        hide_delay_mobile:1200,
                        left: {
                            h_align:"left",
                            v_align:"bottom",
                            h_offset:25,
                            v_offset:-32
                        },
                        right: {
                            h_align:"right",
                            v_align:"bottom",
                            h_offset:25,
                            v_offset:-32
                        }
                    },
                },
                viewPort: {
                    enable: true,
                    outof: "pause",
                    visible_area: "80%",
                    presize: false
                },
                responsiveLevels:[4096,1460,1199,992,768,480],
                gridwidth:[1920,1920,1920,1920,1400,1000],
                gridheight:[978,978,978,1100,1000],
                lazyType: "none",
                shadow: 0,
                spinner: "off",
                stopLoop: "off",
                stopAfterLoops: -1,
                stopAtSlide: -1,
                shuffle: "off",
                autoHeight: "off",
                hideThumbsOnMobile: "off",
                hideSliderAtLimit: 0,
                hideCaptionAtLimit: 0,
                hideAllCaptionAtLilmit: 0,
                debugMode: false,
                fallbacks: {
                    simplifyAll: "off",
                    nextSlideOnWindowFocus: "off",
                    disableFocusListener: false
                }
            })
        }
    }
    gym_slider();
    
    /*----------------------------------------------------*/
    /*  Main Slider js
    /*----------------------------------------------------*/
    function business_slider(){
        if ( $('#business_slider').length ){
            $("#business_slider").revolution({
                sliderType:"standard",
                sliderLayout:"fullscreen",
                lazyLoad:"on", 
                delay:5000,
                disableProgressBar:"on",
                navigation: {
                    keyboardNavigation: "on",
                    keyboard_direction: "horizontal",
                    mouseScrollNavigation: "off",
                    mouseScrollReverse: "default",
                    onHoverStop: "off",
                    touch: {
                        touchenabled: "on",
                        swipe_threshold: 75,
                        swipe_min_touches: 1,
                        swipe_direction: "horizontal",
                        drag_block_vertical: false
                    }
                    ,
                    arrows: {
                        style: "zeus",
                        enable: true,
                        hide_onmobile: true,
                        hide_under:767,
                        hide_onleave:true,
                        hide_delay:200,
                        hide_delay_mobile:1200,
                        tmp:'<div class="tp-title-wrap"></div>',
                        left: {
                            h_align: "left",
                            v_align: "center",
                            h_offset: 0,
                            v_offset: 0
                        },
                        right: {
                            h_align: "right",
                            v_align: "center",
                            h_offset: 0,
                            v_offset: 0
                        }
                    },
                },
                responsiveLevels:[4096,1360,1199,992,768,480,360],
                gridwidth:[1400,1300,1170,720,480,290,340],
                gridheight:[950,800,800,600,600,700],
                lazyType:"none",
                shadow:0,
                spinner:"off",
                stopLoop:"on",
                stopAfterLoops:0,
                shuffle:"off",
                autoHeight:"on",
                fullScreenAlignForce:"off",
                fullScreenOffsetContainer: "",
                hideThumbsOnMobile:"off",
                hideSliderAtLimit:0,
                hideCaptionAtLimit:0,
                hideAllCaptionAtLilmit:0,
                debugMode:false,
                fallbacks: {
                    simplifyAll:"off",
                    nextSlideOnWindowFocus:"off",
                    disableFocusListener:false,
                }
            })
        }
    }
    business_slider();
    
    function charity_slider(){
        if ( $('#charity_slider').length ){
            $("#charity_slider").revolution({
                sliderType:"standard",
                sliderLayout:"auto",
                lazyLoad:"on", 
                delay:9000,
                disableProgressBar:"on",
                navigation: {
                    onHoverStop: 'off',
                    touch:{
                        touchenabled:"on"
                    },
                    arrows: {
                        style:"zeus",
                        enable:true,
                        hide_onmobile:true,
                        hide_under:767,
                        hide_onleave:true,
                        hide_delay:200,
                        hide_delay_mobile:1200,
                        tmp:'<div class="tp-title-wrap">  	<div class="tp-arr-imgholder"></div> </div>',
                        left: {
                            h_align: "left",
                            v_align: "center",
                            h_offset: 30,
                            v_offset: 0
                        },
                        right: {
                            h_align: "right",
                            v_align: "center",
                            h_offset: 30,
                            v_offset: 0
                        }
                    },
                },
                responsiveLevels:[4096,1199,992,767,480],
                gridwidth:[1170,970,750,700,300],
                gridheight:[655,655,600,600,400],
                lazyType:"smart",
                fallbacks: {
                    simplifyAll:"off",
                    nextSlideOnWindowFocus:"off",
                    disableFocusListener:false,
                }
            })
        }
    }
    charity_slider();
    
    /*----------------------------------------------------*/
    /*  Main Slider js
    /*----------------------------------------------------*/
    function digital_slider(){
        if ( $('#digital_slider').length ){
            $("#digital_slider").revolution({
                sliderType:"standard",
                sliderLayout:"fullscreen",
                lazyLoad:"on", 
                delay:9000,
                disableProgressBar:"on",
                dottedOverlay:"true",
                navigation: {
                    onHoverStop: 'off',
                    touch:{
                        touchenabled:"on"
                    },
                },
                responsiveLevels:[4096,1360,1199,992,768,480],
                gridwidth:[1400,1460,1170,992,760,400],
                gridheight:[950,800,800,600,600,600],
                lazyType:"none",
                shadow:0,
                spinner:"off",
                stopLoop:"on",
                stopAfterLoops:0,
                shuffle:"off",
                autoHeight:"on",
                fullScreenAlignForce:"off",
                fullScreenOffsetContainer: "",
                hideThumbsOnMobile:"off",
                hideSliderAtLimit:0,
                hideCaptionAtLimit:0,
                hideAllCaptionAtLilmit:0,
                debugMode:false,
                fallbacks: {
                    simplifyAll:"off",
                    nextSlideOnWindowFocus:"off",
                    disableFocusListener:false,
                }
            })
        }
    }
    digital_slider();
    
    function freelancer_slider(){
        if ( $('#freelancer_slider').length ){
            $("#freelancer_slider").revolution({
                sliderType:"standard",
                sliderLayout:"fullscreen",
                lazyLoad:"on", 
                delay:9000,
                disableProgressBar:"on",
                navigation: {
                    keyboardNavigation:"off",
                    keyboard_direction: "horizontal",
                    mouseScrollNavigation:"off",
                    mouseScrollReverse:"default",
                    onHoverStop:"off",
                    touch:{
                        touchenabled:"on",
                        touchOnDesktop:"off",
                        swipe_threshold: 75,
                        swipe_min_touches: 1,
                        swipe_direction: "horizontal",
                        drag_block_vertical: false
                    },
                    arrows: {
                        style:"hebe",
                        enable:true,
                        hide_onmobile:true,
                        hide_under:767,
                        hide_onleave:true,
                        tmp:'<div class="tp-title-wrap">  <span class="tp-arr-titleholder">{{title}}</span><span class="tp-arr-imgholder"></span> </div>',
                        left: {
                            h_align:"left",
                            v_align:"center",
                            h_offset:20,
                            v_offset:0
                        },
                        right: {
                            h_align:"right",
                            v_align:"center",
                            h_offset:20,
                            v_offset:0
                        }
                    }
                },
                responsiveLevels:[4096,1366,1199,992,768,480],
                gridwidth:[1920,1200,970,750,470,380],
                gridheight:[1080,610,610,625,510,750],
                lazyType:"none",
                shadow:0,
                spinner:"off",
                stopLoop:"on",
                stopAfterLoops:0,
                shuffle:"off",
                autoHeight:"on",
                fullScreenAlignForce:"off",
                fullScreenOffsetContainer: "",
                fullScreenOffset: "",
                hideThumbsOnMobile:"off",
                hideSliderAtLimit:0,
                hideCaptionAtLimit:0,
                hideAllCaptionAtLilmit:0,
                debugMode:false,
                fallbacks: {
                    simplifyAll:"off",
                    nextSlideOnWindowFocus:"off",
                    disableFocusListener:false,
                }
            })
        }
    }
    freelancer_slider();
    
    /*----------------------------------------------------*/
    /*  Main Slider js
    /*----------------------------------------------------*/
    function client_say_slider(){
        if ( $('#client_says_slider').length ){
            $("#client_says_slider").revolution({
                sliderType:"standard",
                sliderLayout:"auto",
                lazyLoad:"on", 
                delay:9000000,
                disableProgressBar:"on",
                navigation: {
                    onHoverStop: 'off',
                    touch:{
                        touchenabled:"on"
                    },
                    arrows: {
                        style:"zeus",
                        enable:true,
                        hide_onmobile:true,
                        hide_onleave:false,
                        hide_delay:200,
                        tmp:'<div class="tp-title-wrap">  	<div class="tp-arr-imgholder"></div> </div>',
                        left: {
                            h_align:"left",
                            v_align:"center",
                            h_offset:30,
                            v_offset:0
                        },
                        right: {
                            h_align:"right",
                            v_align:"center",
                            h_offset:30,
                            v_offset:0
                        }
                    }
                },
                responsiveLevels:[4096,1199,992,768,480],
                gridwidth:[1400,1300,1170,800,700],
                gridheight:[380,380,480,350,350],
                lazyType:"none",
                shadow:0,
                spinner:"off",
                stopLoop:"on",
                stopAfterLoops:0,
                shuffle:"off",
                autoHeight:"on",
                fullScreenAlignForce:"off",
                fullScreenOffsetContainer: "",
                fullScreenOffset: "",
                hideThumbsOnMobile:"off",
                hideSliderAtLimit:0,
                hideCaptionAtLimit:0,
                hideAllCaptionAtLilmit:0,
                debugMode:false,
                fallbacks: {
                    simplifyAll:"off",
                    nextSlideOnWindowFocus:"off",
                    disableFocusListener:false,
                }
            })
        }
    }
    client_say_slider();
    
    /*----------------------------------------------------*/
    /*  Main Slider js
    /*----------------------------------------------------*/
    function planing_slider(){
        if ( $('#planing-slider').length ){
            $("#planing-slider").revolution({
                sliderType:"fullscreen",
                sliderLayout:"auto",
                delay:6000,
                disableProgressBar:"on",
                lazyLoad:"on", 
                navigation: {
                    keyboardNavigation:"off",
                    keyboard_direction: "vertical",
                    mouseScrollNavigation:"off",
                    mouseScrollReverse:"default",
                    onHoverStop:"off",
                    touch:{
                        touchenabled:"on",
                        swipe_threshold: 75,
                        swipe_min_touches: 1,
                        swipe_direction: "horizontal",
                        drag_block_vertical: false
                    }
                    ,
                    arrows: {
                        style:"Gyges",
                        enable:false,
                        hide_onmobile:false,
                        hide_under:600,
                        hide_onleave:false,
                        hide_delay:200,
                        hide_delay_mobile:1200,
                        left: {
                            h_align:"right",
                            v_align:"center",
                            h_offset:135,
                            v_offset:45
                        },
                        right: {
                            h_align:"right",
                            v_align:"center",
                            h_offset:115,
                            v_offset:45
                        }
                    },
                    tabs: {
                        style:"uranus",
                        wrapper_padding:0,
                        width:32, 
                        height:32,
                        wrapper_color:"transparent",
                        enable:true,
                        tmp:'<div class="tp-tab-wrapper"><div class="tp-tab-number">{{param1}}</div></div>',
                        visibleAmount: 5,
                        hide_onleave:false,
                        direction:"vertical",
                        position:"inner",
                        space:10,
                        h_align:"left",
                        v_align:"center",
                        h_offset:0,
                        v_offset:0
                    }
                },
                responsiveLevels:[4096,1400,1199,992,767,480],
                gridwidth:[422,422,422,422,422,422],
                gridheight:[455,455,455,455,455,455],
            })
        }
    }
    planing_slider();
    
    /*----------------------------------------------------*/
    /*  Main Slider js
    /*----------------------------------------------------*/
    function company_slider(){
        if ( $('#company_slider').length ){
            $("#company_slider").revolution({
                sliderType:"standard",
                sliderLayout:"auto",
                lazyLoad:"on", 
                delay:90000,
                disableProgressBar:"on",
                navigation: {
                    keyboardNavigation:"off",
                    keyboard_direction: "vertical",
                    mouseScrollNavigation:"off",
                    mouseScrollReverse:"default",
                    onHoverStop:"off",
                    touch:{
                        touchenabled:"on",
                        swipe_threshold: 75,
                        swipe_min_touches: 1,
                        swipe_direction: "horizontal",
                        drag_block_vertical: false
                    },
                    bullets: {
                        enable: true,
                        hide_onmobile: false,
                        hide_under: 760,
                        style: "hermes",
                        hide_onleave: false,
                        hide_delay: 200,
                        hide_delay_mobile: 1200,
                        direction: "horizontal",
                        h_align: "left",
                        v_align: "top",
                        h_offset: 37,
                        v_offset: 25,
                        space: 0,
                        tmp: '<span class="tp-bullet-img-wrap"></span>'
                    }
                },
                responsiveLevels:[4096,1460,1199,992,767,480],
                gridwidth:[1920,1400,1200,750,750,700],
                gridheight:[840,750,820,550,550,580],
                lazyType:"smart",
                fallbacks: {
                    simplifyAll:"off",
                    nextSlideOnWindowFocus:"off",
                    disableFocusListener:false,
                }
            })
        }
    }
    company_slider();
    
    /*----------------------------------------------------*/
    /* team Slider js
    /*----------------------------------------------------*/
    function teams_slider(){
        if ( $('#rev_slider_1078_1').length ){
            $("#rev_slider_1078_1").revolution({
                sliderType:"standard",
                sliderLayout:"auto",
                dottedOverlay:"none",
                delay:9000,
                navigation: {
                    keyboardNavigation:"off",
                    keyboard_direction: "horizontal",
                    mouseScrollNavigation:"off",
                    mouseScrollReverse:"default",
                    onHoverStop:"off",
                    touch:{
                        touchenabled:"on",
                        swipe_threshold: 75,
                        swipe_min_touches: 1,
                        swipe_direction: "horizontal",
                        drag_block_vertical: false
                    },
                    bullets: {
                        enable:true,
                        hide_onmobile:false,
                        style:"metis",
                        hide_onleave:false,
                        hide_delay:200,
                        hide_delay_mobile:1200,
                        direction:"vertical",
                        h_align:"right",
                        v_align:"center",
                        h_offset:-85,
                        v_offset:0,
                        space:3,
                    }
                },
                gridwidth:[370],
                gridheight:[478],
                lazyType:"none",
                shadow:0,
                spinner:"off",
                stopLoop:"on",
                stopAfterLoops:0,
                shuffle:"off",
                autoHeight:"on",
                fullScreenAlignForce:"off",
                fullScreenOffsetContainer: "",
                fullScreenOffset: "",
                disableProgressBar:"on",
                hideThumbsOnMobile:"off",
                hideSliderAtLimit:0,
                hideCaptionAtLimit:0,
                hideAllCaptionAtLilmit:0,
                debugMode:false,
                fallbacks: {
                    simplifyAll:"off",
                    nextSlideOnWindowFocus:"off",
                    disableFocusListener:false,
                }
            })
        }
    }
    teams_slider();
    
    /*----------------------------------------------------*/
    /*  cr planing_slider js
    /*----------------------------------------------------*/
    function crplaning_slider(){
        if ( $('#cr-planing-slider').length ){
            $("#cr-planing-slider").revolution({
                sliderType:"standard",
                sliderLayout:"auto",
                delay:60000,
                disableProgressBar:"on",
                lazyLoad:"on", 
                navigation: {
                    keyboardNavigation:"off",
                    keyboard_direction: "vertical",
                    mouseScrollNavigation:"off",
                    mouseScrollReverse:"default",
                    onHoverStop:"off",
                    touch:{
                        touchenabled:"on",
                        swipe_threshold: 75,
                        swipe_min_touches: 1,
                        swipe_direction: "horizontal",
                        drag_block_vertical: false
                    }
                    ,
                    arrows: {
                        style:"Gyges",
                        enable:false,
                        hide_onmobile:false,
                        hide_under:600,
                        hide_onleave:false,
                        hide_delay:200,
                        hide_delay_mobile:1200,
                        left: {
                            h_align:"right",
                            v_align:"center",
                            h_offset:135,
                            v_offset:45
                        },
                        right: {
                            h_align:"right",
                            v_align:"center",
                            h_offset:115,
                            v_offset:45
                        }
                    },
                    tabs: {
                        style:"uranus",
                        wrapper_padding:0,
                        width:32, 
                        height:32,
                        wrapper_color:"transparent",
                        enable:true,
                        tmp:'<div class="tp-tab-wrapper"><div class="tp-tab-number">{{param1}}</div></div>',
                        visibleAmount: 5,
                        hide_onmobile: true,
                        hide_under:0,
                        hide_onleave:false,
                        direction:"vertical",
                        position:"inner",
                        space:10,
                        h_align:"right",
                        v_align:"center",
                        h_offset:0,
                        v_offset:0
                    }
                },
                responsiveLevels:[4096,1199,992,767,480],
                gridwidth:[400,420,420,420,350],
                gridheight:[510,510,510,470,410],
            })
        }
    }
    crplaning_slider();
    
    /*----------------------------------------------------*/
    /* team Slider js
    /*----------------------------------------------------*/
    function portfolioSlider(){
        if ( $('#portfolioSlider').length ){
            $("#portfolioSlider").revolution({
                sliderType:"standard",
                sliderLayout:"fullscreen",
                dottedOverlay:"none",
                delay:900000,
                navigation: {
                    keyboardNavigation:"off",
                    keyboard_direction: "horizontal",
                    mouseScrollNavigation:"off",
                    mouseScrollReverse:"default",
                    onHoverStop:"off",
                    touch:{
                        touchenabled:"on",
                        swipe_threshold: 75,
                        swipe_min_touches: 1,
                        swipe_direction: "horizontal",
                        drag_block_vertical: false
                    },
                    bullets: {
                        enable:true,
                        hide_onmobile:true,
                        hide_under:600,
                        style:"metis",
                        hide_onleave:false,
                        hide_delay:200,
                        hide_delay_mobile:1200,
                        direction:"vertical",
                        h_align:"right",
                        v_align:"center",
                        h_offset:50,
                        v_offset:0,
                        space:5,
                    }
                },
                responsiveLevels:[4096,1199,992,767,480],
                gridwidth:[1170,1000,750,700,400],
                gridheight:[950,800,800,600,500],
                lazyType:"none",
                shadow:0,
                spinner:"off",
                stopLoop:"on",
                stopAfterLoops:0,
                shuffle:"off",
                autoHeight:"on",
                fullScreenAlignForce:"off",
                fullScreenOffsetContainer: "",
                fullScreenOffset: "",
                disableProgressBar:"on",
                hideThumbsOnMobile:"off",
                hideSliderAtLimit:0,
                hideCaptionAtLimit:0,
                hideAllCaptionAtLilmit:0,
                debugMode:false,
                fallbacks: {
                    simplifyAll:"off",
                    nextSlideOnWindowFocus:"off",
                    disableFocusListener:false,
                }
            })
        }
    }
    portfolioSlider();
    
    /*----------------------------------------------------*/
    /* team Slider js
    /*----------------------------------------------------*/
    function shop_slider(){
        if ( $('#shop_slider').length ){
            $("#shop_slider").revolution({
                sliderType:"fullscreen",
                sliderLayout:"auto",
                dottedOverlay:"none",
                delay:9000000,
                navigation: {
                    keyboardNavigation:"off",
                    keyboard_direction: "horizontal",
                    mouseScrollNavigation:"off",
                    mouseScrollReverse:"default",
                    onHoverStop:"off",
                    touch:{
                        touchenabled:"on",
                        swipe_threshold: 75,
                        swipe_min_touches: 1,
                        swipe_direction: "horizontal",
                        drag_block_vertical: false
                    },
                    bullets: {
                        enable:true,
                        hide_onmobile:true,
                        hide_under:600,
                        style:"metis",
                        hide_onleave:false,
                        hide_delay:200,
                        hide_delay_mobile:1200,
                        direction:"vertical",
                        h_align:"left",
                        v_align:"center",
                        h_offset:-39,
                        v_offset:0,
                        space:5,
                    }
                },
                responsiveLevels:[4096,1920,1199,992,768,480,360],
                gridwidth:[1400,1300,1170,720,480,290,340],
                gridheight:[623,623,623,623,600,700],
                lazyType:"smart",
                fallbacks: {
                    simplifyAll:"off",
                    nextSlideOnWindowFocus:"off",
                    disableFocusListener:false,
                }
            })
        }
    }
    shop_slider();
    
    $(document).ready(function() {
        $('.popup-youtube').magnificPopup({
            disableOn: 700,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,

            fixedContentPos: false
        });
        //Search Popup
        $('.popup-with-zoom-anim').magnificPopup({
            type: 'inline', 
            fixedContentPos: false,
            fixedBgPos: true, 
            overflowY: 'auto', 
            closeBtnInside: true,
            preloader: false, 
            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-zoom-in'
        }); 
    });
    
    //*  Simple LightBox js 
    $('.light').simpleLightbox(); 
    
    /*----------------------------------------------------*/
    /*  skillSlider
    /*----------------------------------------------------*/
    function serviceSlider(){
        var sSlider = $(".r_service_slider");
        if( sSlider.length ){
            sSlider.owlCarousel({
                loop:true,
                margin:30,
                items:1,
                autoplay:true,
                center: true,
                smartSpeed:1000,
                nav: true,
                navText: ['<i class="fa fa-arrow-circle-o-left"></i>','<i class="fa fa-arrow-circle-o-right"></i>'],
                responsiveClass:true
            });
        }
    }
    serviceSlider();
    
    
    /*----------------------------------------------------*/
    /*  skillSlider
    /*----------------------------------------------------*/
    function skillSlider(){
        var skill = $(".skill_slider,#team_slider,.c_project_slider, .clients_ab_slider, .ab_testi_slider");
        if( skill.length ){
            skill.owlCarousel({
                loop:true,
                margin:30,
                items:1,
                autoplay:true,
                center: true,
                smartSpeed:1000,
                nav: false,
                responsiveClass:true
            });
        }
    }
    skillSlider();
    
    /*----------------------------------------------------*/
    /*  priceSlider
    /*----------------------------------------------------*/
    function priceSlider(){
        var pSlider = $(".package_slider");
        if( pSlider.length ){
            pSlider.owlCarousel({
                loop:true,
                margin:10,
                items:3,
                autoplay:false,
                center: true,
                smartSpeed:1000,
                nav: true,
                navContainer:".package_slider",
                navText: ['<i class="fa fa-arrow-left"></i>','<i class="fa fa-arrow-right"></i>'],
                responsiveClass:true,
                responsive: {
                    0: {
                        items: 1,
                    },
                    380: {
                        items: 2,
                        center:true
                    },
                    550:{
                        items:3,
                    }
                }
            });
        }
    }
    priceSlider();
    
    /*----------------------------------------------------*/
    /*  screenShotSlider
    /*----------------------------------------------------*/
    function screenShot(){
        var sShot = $(".screenshot_slider");
        if( sShot.length ){
            sShot.owlCarousel({
                loop:true,
                margin:0,
                items:4,
                autoplay:false,
                smartSpeed:1000,
                nav: false,
                responsiveClass:true,
                responsive: {
                    0: {
                        items: 1,
                    },
                    380:{
                        items:2,
                    },
                    520:{
                        items:3,
                    },
                    768: {
                        items: 4,
                    }
                }
            });
        }
    }
    screenShot();
    
    //*----------------------------------------------------*/
    /*  p_logo_slider
    /*----------------------------------------------------*/
    
    function clientsSlider(){
        var comSlider = $("#c_logo");
        if( comSlider.length ){
            comSlider.owlCarousel({
                loop:true,
                margin:0,
                items:6,
                autoplay:false,
                smartSpeed:1000,
                nav: false,
                responsiveClass:true,
                responsive: {
                    0: {
                        items: 1,
                    },
                    400: {
                        items: 3,
                    },
                    768: {
                        items: 5,
                    },
                    992: {
                        items: 6,
                    }
                }
            });
        }
    }
    clientsSlider();
    
    
    /*----------------------------------------------------*/
    /*  Box Slider js
    /*----------------------------------------------------*/
    function box_slider(){
        if ( $('.box_c_slider').length ){
            $('.box_c_slider').owlCarousel({
                loop:true,
                margin: 30,
                items: 6,
                nav:false,
                autoplay: false,
                dots: true,
                smartSpeed: 1500,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                    },
                    400: {
                        items: 2,
                    },
                    600: {
                        items: 3,
                    },
                    767: {
                        items: 4,
                    },
                    1200: {
                        items: 6,
                    }
                }
            })
        }
    }
    box_slider();
    
    /*----------------------------------------------------*/
    /*  portfolio_isotope
    /*----------------------------------------------------*/
    function our_project(){
        if ( $('.project_inner, .recent_project_inner,.promo_inner,.lp-portfolio-gallery,.gallery_inner').length ){
            // Activate isotope in container
            $(".project_inner, .recent_project_inner,.promo_inner,.lp-portfolio-gallery,.gallery_inner").imagesLoaded( function() {
                $(".project_inner, .recent_project_inner,.promo_inner,.lp-portfolio-gallery,.gallery_inner").isotope({
                    layoutMode: 'fitRows',
                }); 
            }); 
            // Add isotope click function
            $(".project_fillter li, .rec_project_fillter li,.portfolio_fillter li").on('click',function(){
                $(".project_fillter li, .rec_project_fillter li,.portfolio_fillter li").removeClass("active");
                $(this).addClass("active");

                var selector = $(this).attr("data-filter");
                $(".project_inner, .recent_project_inner,.promo_inner,.lp-portfolio-gallery,.gallery_inner").isotope({
                    filter: selector,
                    animationOptions: {
                        duration: 450,
                        easing: "linear",
                        queue: false,
                    }
                });
                return false;
            });
        }
    }
    our_project();
    
    function blogmasonry(){
        if ( $('.blog-grid-inner,#project_gallery_area_two,.blog_ms_inner,.portfolio_ag_inner').length ){
            $('.blog-grid-inner,#project_gallery_area_two,.blog_ms_inner,.portfolio_ag_inner').imagesLoaded( function() {
              // images have loaded
                      // Activate isotope in container
                $(".blog-grid-inner,#project_gallery_area_two,.blog_ms_inner,.portfolio_ag_inner").isotope({
                    itemSelector: ".blog-grid-item,.pr_item_img,.blg-ms-item,.portfolio_item",
                    layoutMode: 'masonry',
                    masonry: {
                        columnWidth: '.grid-sizer'
                    }
                });
            })
        }
    }
    blogmasonry();
    
    function blogmasonry2(){
        if ( $('.discover_project_inner,.gym_portfolio_area').length ){
            $('.discover_project_inner,.gym_portfolio_area').imagesLoaded( function() {
              // images have loaded
                      // Activate isotope in container
                $(".discover_project_inner,.gym_portfolio_area").isotope({
                    itemSelector: ".discover_item,.gym_port_item",
                    layoutMode: 'fitRows',
                    masonry: {
                        columnWidth: 1
                    }
                });
            })
        }
    }
    blogmasonry2();
    
    /*----------------------------------------------------*/
    /*  valunteers-slider
    /*----------------------------------------------------*/
    function testslidertwo(){
        var vslider = $(".valunteers-slider");
        if( vslider.length ){
            vslider.owlCarousel({
                loop:true,
                margin:30,
                items:2,
                autoplay:true,
                smartSpeed:1000,
                nav: true,
                navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
                responsiveClass:true
            });
        }
    }
    testslidertwo();
    
    function postmasonry(){
        if ( $('.blog-post').length ){
            $('.blog-post').imagesLoaded( function() {
              // images have loaded
                      // Activate isotope in container
                $(".blog-post").isotope({
                    itemSelector: ".blog-post-item",
                    layoutMode: 'masonry',
                    masonry: {
                        columnWidth: ".grid-sizer"
                    }
                });
                // Add isotope click function
                $(".project_fillter li").on('click',function(){
                    $(".project_fillter li").removeClass("active");
                    $(this).addClass("active");

                    var selector = $(this).attr("data-filter");
                    $(".blog-post").isotope({
                        filter: selector,
                        animationOptions: {
                            duration: 450,
                            easing: "linear",
                            queue: false,
                        }
                    });
                    return false;
                });
            })
        }
    }
    postmasonry();
    
    /*===== progress-bar =====*/
    function circle_progress(){
        if( $('.circle').length ){
            $(".circle").each(function() {
                $(this).waypoint(function() {
                    $('.circle').circleProgress({
                        startAngle:-14.1,
                        size: 140,
                        animation: { duration: 3000,},
                        easing: "circleProgressEase",
                        emptyFill: '#ededed',
                        thickness:8,
                    })
                }, {
                    triggerOnce: true,
                    offset: 'bottom-in-view'
                })
            })
        }
    }
    circle_progress();
    
    $(".gym_service_inner").imagesLoaded( function() {
        $(".gym_service_inner").isotope({
            itemSelector: ".gym_service_item",
            layoutMode: 'masonry',
            animationOptions: {
                duration: 750,
                easing: 'linear'
            }
        }); 
    });
    
    
    $(".progress").each(function() {
        $(this).waypoint(function() {
            var progressBar = $(".progress-bar");
            progressBar.each(function(indx){
                $(this).css("width", $(this).attr("aria-valuenow") + "%")
            })
        }, {
            triggerOnce: true,
            offset: 'bottom-in-view'

        });
    });
    
     function progressBarConfig () {
	  var progressBar = $('.progress-two');
	  if(progressBar.length) {
	    progressBar.each(function () {
	      var Self = $(this);
	      Self.appear(function () {
	        var progressValue = Self.data('value');

	        Self.find('.progress-bar').animate({
	          width:progressValue+'%'           
	        }, 100);

	        Self.find('.number').countTo({
	          from: 0,
	            to: progressValue,
	            speed: 1000
	        });
	      });
	    })
	  }
	}
    progressBarConfig ();
    
    $('.counter').counterUp({
        delay: 10,
        time: 1000
    });
    
    
    //*----------------------------------------------------*/
    /*  p_logo_slider
    /*----------------------------------------------------*/
    
    function partnerSlider(){
        var pSlider = $(".p_logo_slider,.cl_logo_slider");
        if( pSlider.length ){
            pSlider.owlCarousel({
                loop:true,
                margin:30,
                items:5,
                autoplay:false,
                center: false,
                smartSpeed:1000,
                nav: false,
                responsiveClass:true,
                responsive: {
                    0: {
                        items: 1,
                    },
                    480:{
                        items: 3,
                    },
                    767: {
                        items: 4,
                    },
                    992: {
                        items: 5,
                    }
                }
            });
        }
    }
    partnerSlider();
    
    /*----------------------------------------------------*/
    /*  Screenshot Slider
    /*----------------------------------------------------*/
    function user_slider(){
        if ( $('.user_slider_inner, #creative-slider').length ){
            $('.user_slider_inner, #creative-slider').owlCarousel({
                loop:true,
                margin: 30,
                items: 3,
                nav:false,
                autoplay: false,
                dots: true,
                smartSpeed: 1500,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                    },
                    550: {
                        items: 2,
                    },
                    992:{
                        items: 3,
                    }
                }
            })
        }
    }
    user_slider();
    
    /*----------------------------------------------------*/
    /*  Screenshot Slider
    /*----------------------------------------------------*/
    function product_slider(){
        if ( $('.our_product_slider').length ){
            $('.our_product_slider').owlCarousel({
                loop:true,
                margin: 30,
                items: 4,
                nav:false,
                autoplay: false,
                dots: true,
                smartSpeed: 1500,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                    },
                    480: {
                        items: 2,
                    },
                    768: {
                        items: 3,
                    },
                    992: {
                        items: 4,
                    }
                }
            })
        }
    }
    product_slider();
    
    /*----------------------------------------------------*/
    /*  Gym Slider
    /*----------------------------------------------------*/
    function gym_c_slider(){
        if ( $('.gym_c_slider').length ){
            $('.gym_c_slider').owlCarousel({
                loop:true,
                margin: 0,
                items: 5,
                nav:false,
                autoplay: false,
                dots: true,
                smartSpeed: 1500,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                    },
                    380: {
                        items: 2,
                    },
                    500: {
                        items: 3,
                    },
                    768: {
                        items: 4,
                    },
                    992: {
                        items: 5,
                    }
                }
            })
        }
    }
    gym_c_slider();
    
    /*----------------------------------------------------*/
    /*  testimonialSlider
    /*----------------------------------------------------*/
    function testSlider(){
        var tSlider = $(".c_testimonial_slider,.ch-testimonial-slider");
        if( tSlider.length ){
            tSlider.owlCarousel({
                loop:true,
                margin:0,
                items:1,
                autoplay:true,
                center: true,
                smartSpeed:1000,
                nav: true,
                navContainer:".c_testimonial_slider,.ch-testimonial",
                navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
                responsiveClass:true
            });
        }
    }
    testSlider();
    
    /*----------------------------------------------------*/
    /*  Flexslider 
    /*----------------------------------------------------*/
    function flexSlider(){
        if ( $('.featured_projects_area').length ){
            // Responsive
            function getGridSize() {
                return (window.innerWidth < 400) ? 1 :
                    (window.innerWidth < 700) ? 2 :
                    (window.innerWidth < 1000) ? 3 :
                        (window.innerWidth < 1366) ? 3 : 4;
            };
            $('#carousel').flexslider({
                animation: "slide",
                controlNav: false,
                directionNav:true,
                animationLoop: false,
                slideshow: false,
                itemWidth: 250,
                maxItems: 4,
                asNavFor: '#slider',
                touch: true,  
                customDirectionNav: $(".custom-navigation a"),
                itemMargin: 18,
                minItems: getGridSize(),
                maxItems: getGridSize(),

            });
            $('#slider').flexslider({
                animation: "slide",
                controlNav: false,
                animationLoop: false,
                slideshow: true,
                touch: true,  
            });
        };
    };
    flexSlider();
    
    /*----------------------------------------------------*/
    /*  project-details_gallery js
    /*----------------------------------------------------*/
    function prdetailsmasonry(){
        if ( $('.project-details_gallery').length ){
            $('.project-details_gallery').imagesLoaded( function() {
              // images have loaded
                      // Activate isotope in container
                $(".project-details_gallery").isotope({
                    itemSelector: ".galler_img",
                    layoutMode: 'masonry',
                    masonry: {
                        columnWidth: 1
                    }
                });
            })
        }
    }
    prdetailsmasonry();
    
    
    /*----------------------------------------------------*/
    /*  magnificPopup js
    /*----------------------------------------------------*/
    $(document).ready(function() {
        $('.zoom-gallery').magnificPopup({
            delegate: 'a',
            type: 'image',
            closeOnContentClick: false,
            closeBtnInside: false,
            mainClass: 'mfp-with-zoom mfp-img-mobile',
            gallery: {
                enabled: false
            },
            zoom: {
                enabled: true,
                duration: 400, // don't foget to change the duration also in CSS
                opener: function(element) {
                    return element.find('img');
                }
            }

        });
    });

    /*----------------------------------------------------*/
    /*  flexslider js
    /*----------------------------------------------------*/
    $(window).load(function() {
    // The slider being synced must be initialized first
        $('#carousel_p').flexslider({
            animation: "slide",
            controlNav: false,
            animationLoop: true,
            slideshow: true,
            itemWidth: 137,
            itemMargin: 30,
            asNavFor: '#slider_p',
            customDirectionNav: $(".custom-navigation a")
        });

        $('#slider_p').flexslider({
            animation: "slide",
            controlNav: false,
            animationLoop: false,
            slideshow: false,
            sync: "#carousel_p",
            directionNav: false,
        });
    });
    
    $('#datetimepicker1').datetimepicker();
    
    /*----------------------------------------------------*/
    /*  Pricing Filter
    /*----------------------------------------------------*/
    $(function() {
        $( "#slider-range" ).slider({
          range: true,
          min: 5,
          max: 150,
          values: [ 5, 100 ],
          slide: function( event, ui ) {
            $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
          }
        });
        $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
          " - $" + $( "#slider-range" ).slider( "values", 1 ) );
    });
    
    /*social icon hover js
    =========================================*/
    $( ".blog_post_share .share_item.share_sign" ).on('mouseenter',function() {
        jQuery(this).parent().find('.social_share_item_wrapper').addClass('animating');
    });
    $( ".blog_post_share" ).on('mouseleave', function() {
        jQuery(this).find('.social_share_item_wrapper').removeClass('animating');
    });
    
    
     // preloader js
    $(window).on('load', function() { // makes sure the whole site is loaded
		$('#preload_inner').fadeOut(); // will first fade out the loading animation
		$('#pre-loader').delay(150).fadeOut('slow'); // will fade out the white DIV that covers the website.
		$('body').delay(150).css({'overflow':'visible'})
    })
})(jQuery)
