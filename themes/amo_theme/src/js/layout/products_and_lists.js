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
        var links_active = links.is('.active'); //$('#product-filter-boutique a.active');
        var links_inactive = links.not('.active'); //$('#product-filter-boutique a:not(.active)');
        console.log(links, 'links');
        console.log(links_active, 'links_active');
        console.log(links_inactive, 'links_inactive');
        
        if (links.length == links_active.length || links.length == links_inactive.length) {
            // Show all products
            console.log('Show all');
        }
        else {
            console.log('Hide some...');
        }
        
        
    }
    
    

}}})(jQuery);