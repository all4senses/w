(function($){'use strict';Drupal.behaviors.gd_mobile={attach:function(context,settings) {

  if(!isMobile.phone) return;
  

  $('.scroll-mobile').on('click', function(){

    $('.scroll-mobile-to:first').animatescroll({
      element: '.ajax-wrapper.display'
    })

    return false;
  })



  if($('.product-filters-wrapper')[0]){

    $('.product-filters').on('change', function(){

      var e = $(this);

      if(!e.val()) return;
      $('.product.slide')
      .hide()
      .filter('.color-' + e.val())
      .show()

    });


    $('.slide .detail').on('click', function(){

      $(this).parents('.slide').addClass('active')
    })
    $('.slide .product-body').on('click', function(){

      $(this).parents('.slide').removeClass('active')
    })

  }


  if($('.news-filters-wrapper')[0]){

    $('.news-filters').on('change', function(){

      var e = $(this);

      if(!e.val()) return;
      
      document.location.href = e.val()

    });
  }


}}})(jQuery);
