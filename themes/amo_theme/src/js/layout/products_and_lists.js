(function($){'use strict';Drupal.behaviors.products_and_list={attach:function(context,settings){

    $('body').on('click', '#product-filter-boutique a', function(event) {
        
        event.preventDefault();
        
        var e = $(this);
        e.toggleClass('active');
        console.log(e, 'this');
        console.log(e.data('color'), 'color');
        console.log(e.data('chateau'), 'chateau');
        update_products_view();
        
    });
    
    function update_products_view() {
        var links = $('#product-filter-boutique a');
        console.log(links, 'links');
    }
    
    

}}})(jQuery);