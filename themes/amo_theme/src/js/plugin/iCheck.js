(function($){'use strict';Drupal.behaviors.gd_plugin_icheck={attach:function(context,settings){

  var elements = $('.form-type-checkbox:not(.form-item-customer-profile-billing-commerce-customer-profile-copy), .form-type-radio');
  

  if(!elements[0]) return;

  elements.not('.js-processed').addClass('js-processed').iCheck({
    // labelHover: false,
    cursor: true
  });

  elements.each(function(){

    var e = $(this);

    if(e.find('input').is(':checked')) {
      e.addClass('checked')
    }
  })


  // trigger ctools-auto-submit
  elements.on('ifChecked', function(event) {
    $(this).find('.ctools-auto-submit').change();
  });
  elements.on('ifUnchecked', function(event) {
    $(this).find('.ctools-auto-submit').change();
  });


  elements.on('ifChecked', function(){
    $(this).addClass('checked')
  });
  elements.on('ifUnchecked', function(){
    $(this).removeClass('checked')
  });

}}})(jQuery);
