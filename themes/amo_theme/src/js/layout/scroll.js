(function($){'use strict';Drupal.behaviors.gd_scroll={attach:function(context,settings){

  if(gd.processed(this)) return;


  var W = $(window);

  W.scroll($.throttle(180, function(e)
  {
    var pos = W.scrollTop();


  })).scroll();



 


  if(!isMobile.phone && !isMobile.tablet) {

    W.on('mousewheel', $.throttle(320, false, function(event) {

      var aw = $('.ajax-wrapper.display:first');
      var link = null;

      // console.log('event.deltaY', event.deltaY);
      // console.log('event.deltaX', event.deltaX);

      if(event.deltaX < 0){ // left
        link = aw.find('.ajax-link-right')
      }
      else if(event.deltaX > 0){ // right
        link = aw.find('.ajax-link-left')
      }
      else if(event.deltaY < 0){ // bottom
        link = aw.find('.ajax-link-next, .ajax-link-back-bottom')
      }
      else{ // up
        link = aw.find('.ajax-link-prev, .ajax-link-back-top')
      }

      if(link && link[0] && !$('.ajax-wrapper .ajax-link.loading')[0]) {
        link.click();
      }

    }));

  }




}}})(jQuery);
