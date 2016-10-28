(function($){'use strict';Drupal.behaviors.gd_news={attach:function(context,settings) {

  if(!$('.news.teaser')[0]) return;


  $('.news.teaser').on('click', function(event){

    if($(event.target).is('.see')) {
      return;
    }

    $(this).find('.see').click()
  });


}}})(jQuery);
