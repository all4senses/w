(function($){'use strict';Drupal.behaviors.custom_responsive={attach:function(context,settings){

  if(gd.processed(this)) return;

  var W = $(window);
  var HTML = $('html');

  if(isMobile.phone) {
    HTML.addClass('mobile')
  }
  else if(isMobile.tablet) {
    HTML.addClass('tablet')
  }

  function getOrientation() {
    var orientation = W.width() > W.height() ? 'landscape' : 'portrait';
    HTML.removeClass('landscape portrait')
        .addClass(orientation);
    return orientation;
  }

  W.on('resizeend', {delay : 200}, function() {

    // var w = W.width();
    var h = W.height();

    if(!isMobile.phone){

      if(h < 850 && h > 772) {
        HTML.addClass('medium')
      }
      else {
        HTML.removeClass('medium')
      }


      if(h < 772) {
        HTML.addClass('smaller')
      }
      else {
        HTML.removeClass('smaller')
      }
    }


    // getOrientation();

  }).resize();


  W.on('orientationchange',function(){W.resize()});

}}})(jQuery);
