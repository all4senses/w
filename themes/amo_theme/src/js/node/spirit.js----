(function($){'use strict';Drupal.behaviors.gd_spirit={attach:function(context,settings) {

  if(!$('.spirit')[0]) return;


  $('.spirit-mobile .read-more').on('click', function(event){

    $(this).parents('.spirit-mobile').addClass('open')

    return false;
  });


  if(isMobile.phone){
    
    $('.spirit-mobile').each(function(){

      var e = $(this);

      var bg = e.data('bg');

      if(bg){

        e.find('.image').css('background-image','url('+bg+')');
      }


    })

  }


}}})(jQuery);
