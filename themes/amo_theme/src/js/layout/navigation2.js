var first_load = true;
console.log('before start...');
(function($){'use strict';

console.log('on start...');
function my_inits(){
        console.log('on init...');
	jQuery('form[id ^= commerce-cart-add-to-cart-form-]').submit(function(e) {
		e.preventDefault();
	   $.ajax({
			url: "/en/system/ajax",
			data: $(this).serialize(),
			method: 'post',
			dataType: 'json',
			success: function (z) {
				for (var i=0;i<z.length;i++) {
					if (z[i].command == 'css') {
						$(z[i].selector).css(z[i].argument);
					} 
					if (z[i].command == 'insert') {
						$(z[i].selector).html(z[i].data);
					} 
					if (z[i].command == 'show_my_cart') {
						$('#'+z[i].id).parent().parent().parent().addClass('hide_add_to_cart_items').removeClass('add-to-cart-wrapper');
						$('.slick-active .R.product-wrapper.left').prev('.cart-summary-wrapper').addClass('active');
						setTimeout(function(){
							$('.cart-summary-wrapper.active').removeClass('active');
							$('.hide_add_to_cart_items').addClass('add-to-cart-wrapper').removeClass('hide_add_to_cart_items');
						}, 5000);  
					} 
				}
			}
		});
	});
}



Drupal.behaviors.custom_ajax_navigation={attach:function(context,settings){

  if(gd.processed(this)) return;

  var content      = $('#content');
  var isLoading    = false;
  var xhr          = null;
  var timerDisplay = null;
  var timerBehaviour = null;



  $('body').on('click', '.ajax-link a', function(event) {
    event.preventDefault();
  });

  $('body').on('click', '.ajax-link', function(event) {

    if(isLoading) return false;
    isLoading = true;

    var e = $(this);

    var orientation = e.data('orientation')

    if(e.is('li')){
      e = e.find('> a');
    }

    e.addClass('loading')

    var timerLoading = setTimeout(function(){
      isLoading = false;
      xhr.abort();
    },12000)

    var url = e.attr('href');

    var urlx = /ajax/.test(url) ? url : url+'?ajax=1';

    $('#gmap').remove();

    xhr = $.ajax({
      url: urlx,
      method: 'GET'
    }).done(function(data) {

      var html = $(data);
      var body_class_el = html.filter('#classes-ajax')
      var body_class = body_class_el.attr('class')
      body_class_el.remove();

      var html_content = html.find('.ajax-wrapper').html();
      var style = html.find('.ajax-wrapper').attr('style');
      var wrapper = $('<div class="ajax-wrapper from-' + orientation + ' ' + body_class +'">' + html_content + '</div>').appendTo(content);
	  my_inits();
      $('.R.add-to-cart').on('click',function(e){
        e.preventDefault();
      });
	  
      clearTimeout(timerDisplay);
      clearTimeout(timerBehaviour);
      timerDisplay = setTimeout(function() {

        // hide the previous page in opposite direction
        var orientation_opposite = 'from-left';
        if(wrapper.is('.from-left')){
          orientation_opposite = 'from-right';
        }
        else if(wrapper.is('.from-top')){
          orientation_opposite = 'from-bottom';
        }
        else if(wrapper.is('.from-bottom')){
          orientation_opposite = 'from-top';
        }

        var prev_page = $('.ajax-wrapper.display:first')
        .removeClass('from-right from-left from-top from-bottom')
        .addClass(orientation_opposite)
        .removeClass('display');

        (function(prev_page){
          setTimeout(function(){
            prev_page.remove()
          }, 375)
        })(prev_page)


        // show up the current page
        wrapper.addClass('display');

        timerBehaviour = setTimeout(function(){

          $.each(Drupal.behaviors, function(k)
          {
            if(/gd\_/.test(k)){
              Drupal.behaviors[k].attach(null,{});
            }
          });
        }, 40)
        if(isMobile.phone){
          scroll(0,0)
        }

      },50)


      history.pushState({},'',url)

      clearTimeout(timerLoading);
      isLoading = false;
    }).fail(function() {
      console.log('Connexion error');

      clearTimeout(timerLoading);
      isLoading = false;
      $('.ajax-wrapper .loading').removeClass('loading')
    });

    return false;
  });


  window.onpopstate = function(event)
  {
    if(!isLoading) {
      // console.log('window.location.pathname', window.location.pathname)
      // console.log('window.location.href', window.location.href)
      if(!first_load) {
        window.location.href = window.location.pathname;
      }
    }
  };
  setTimeout(function(){
    first_load = false;
  },999)
  
  // on load add body classes to ajax-wrapper
  var body_class = $('#classes-ajax').attr('class');
  $('.ajax-wrapper').addClass(body_class + ' display');

  if($('#amo-enter-page-form')[0]) {
    $('.ajax-wrapper').addClass('page-homepage');
  }




}};})(jQuery);

(function($) {
	"use strict";
	$(document).ready(function(){
		$('.R.add-to-cart').on('click',function(e){
			e.preventDefault();
		});
	});
	Drupal.ajax.prototype.commands.show_my_cart = function(ajax, response, status) {
		$('#'+response.id).parent().parent().parent().addClass('hide_add_to_cart_items').removeClass('add-to-cart-wrapper');
		$('.slick-active .R.product-wrapper.left').prev('.cart-summary-wrapper').addClass('active');
		setTimeout(function(){
			$('.cart-summary-wrapper.active').removeClass('active');
			$('.hide_add_to_cart_items').addClass('add-to-cart-wrapper').removeClass('hide_add_to_cart_items');
		}, 5000);  
	}
}(jQuery));