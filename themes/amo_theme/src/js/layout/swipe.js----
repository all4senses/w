/*(function($){'use strict';Drupal.behaviors.gd_swipe={attach:function(context,settings){

  if(isMobile.phone || isMobile.tablet) {

    var aw = $('.ajax-wrapper:last');

    var H = new Hammer($('.ajax-wrapper:last')[0], {});

    H.on('swiperight', function(){
      aw.find('.ajax-link-left').click()
    });
    H.on('swipeleft', function(){
      aw.find('.ajax-link-right').click()
    });
    
    if($('.ajax-wrapper:last .product-choice')[0]){
      H.on('pandown', function(){
        aw.find('.ajax-link-prev, .ajax-link-back-top').click()
      });
      H.on('panup', function(){
        aw.find('.ajax-link-next, .ajax-link-back-bottom').click()
      });
    }
    
  }


}}})(jQuery);
*/