(function($){'use strict';Drupal.behaviors.products_and_list={attach:function(context,settings){

    $('body').on('click', '.product-filter-boutique a', function(event) {
        event.preventDefault();
        console.log('click filter...');
    });





}}})(jQuery);