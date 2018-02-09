;(function($) {
    "use strict";
    
        /*----------------------------------------------------*/
        /*  Instafeed
        /*----------------------------------------------------*/
          var userFeed = new Instafeed({
              get: 'user',
              userId: 4006500989,
              target: 'instafeed2',
              accessToken: '4006500989.1677ed0.62090ee58ba54bf29173c09647f11b18',
              template: '<li><a href="{{link}}"><img src="{{image}}" /></a></li>',
              limit : 9
          });
          userFeed.run(); 
    
    
})(jQuery)