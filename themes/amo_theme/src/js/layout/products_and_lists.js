(function($){'use strict';Drupal.behaviors.products_and_list={attach:function(context,settings){

    console.log('xxx...');
    $('body').on('click', '#product-filter-boutique a', function(event) {
        console.log('click filter...');
        event.preventDefault();
        
    });





}}})(jQuery);