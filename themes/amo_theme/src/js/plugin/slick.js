(function($){'use strict';Drupal.behaviors.gd_plugin_slick={attach:function(context,settings){

  $('.slideshow:not(.slick-initialized)').each(function()
  {
    var apply = true;
    var e = $(this);

    var settings = {
      slide: '.slide',
      slidesToShow: 1,
      slidesToScroll: 1,
      speed: 500,
      autoplaySpeed: 8000,
      pauseOnHover: false,
      pauseOnDotsHover: true,
      prevArrow: '<a class="prev"></a>',
      nextArrow: '<a class="next"></a>',
      dots: false,
      dotsClass: 'dots',
      customPaging: function(slider, i) {
        return '<a>' + (i + 1) + '</a>';
      },
    };

    if(e.is('.news-slideshow'))
    {
      settings.arrows = false;
      if(!isMobile.phone){
        // settings.arrows = true;
      }
      settings.autoplay = true;
      settings.dots = true;
    }
    else if(e.is('#products-wrapper') && isMobile.phone)
    {
      apply = false;
    }


    if(apply) e.slick(settings);
/*
    e.mousewheel(function(e) {
      e.preventDefault();
      if (e.deltaY < 0) {
        $(this).slick('slickNext');
      }
      else {
        $(this).slick('slickPrev');
      }
    });
*/
  });


  var product_slideshow = $('#products-wrapper');

  if(product_slideshow[0] && !isMobile.phone){

    var links = $('#product-filter a');


    $('.intro .button-discover').on('click',function(){
      $('#products-wrapper').slick('slickNext');
      return false
    });

    var timercursor = null

    product_slideshow.on('afterChange', function(slick, currentSlide){

      clearTimeout(timercursor)

      if(links.filter('.active')[0]){
        $('#product-filter').fadeIn(250);
        $('.cursor-hand').fadeOut(250);
        return;
      }


      if(currentSlide.currentSlide != 0){
        $('#product-filter').fadeIn(250);
      }else{
        $('#product-filter').fadeOut(250);
      }
      if(currentSlide.currentSlide == 1){
        $('.cursor-hand').fadeIn(250);
        timercursor = setTimeout(function(){
          $('.cursor-hand').fadeOut(250);
        },2500);
      }else{
        $('.cursor-hand').fadeOut(250);
      }
    });

    

    links.on('click', function() {
      var e = $(this);
      product_slideshow.slick('slickUnfilter');

      if(e.is('.active')){
        links.removeClass('active');
        return false;
      }

      links.removeClass('active');

      e.addClass('active');

      product_slideshow.slick('slickFilter','.color-' + e.data('color'));

      $('.cursor-hand').fadeOut(250);

      return false;
    });

    
  }

/*
  if you init an hidden slideshow, you will have pb. When you show it, you must do :

  $('.my-slideshow').slick('setPosition');

  (add a timeout if you display it with a transition)
*/


}}})(jQuery);
