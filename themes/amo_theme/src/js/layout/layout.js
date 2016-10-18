(function($){'use strict';Drupal.behaviors.gd_layout={attach:function(context,settings){


  setTimeout(function(){

    $('.page-homepage .form').fadeIn(400)

    if($('.ajax-wrapper.display.page-homepage')[0]){
      $('#menu-open').hide()
    }
    else{
      $('#menu-open').show()
    }
  }, 90)




  if(gd.processed(this)) return;

  var side_menu = $('#side-menu');

  $('#menu-open').on('click', function(){
    side_menu.addClass('open');
    return false;
  });

  side_menu.find('.close').on('mousedown', function(){
    side_menu.removeClass('open')
  }).click(function(){
    return false;
  });

  side_menu.find('a').on('mouseup', function(){
    side_menu.removeClass('open')
  });

  $(document).on('click', function(event){

    var t = $(event.target);

    if(!t.is('#side-menu')
    && !t.is('#menu-open')
    && !t.parents('#side-menu')[0]){

      side_menu.removeClass('open')
    }
  });

}};})(jQuery);
