(function($){'use strict';Drupal.behaviors.products_and_list={attach:function(context,settings){

    $('body').on('click', '#product-filter-boutique a', function(event) {
        
        event.preventDefault();
        
        var e = $(this);
        e.toggleClass('active');
//        console.log(e, 'this');
//        console.log(e.data('color'), 'color');
//        console.log(e.data('chateau'), 'chateau');
        update_products_view();
        
    });
    
    function update_products_view() {
        var color, chateau;
        var links = $('#product-filter-boutique a');
        var links_active = $('#product-filter-boutique a.active');
        var links_inactive = $('#product-filter-boutique a:not(.active)');
//        console.log(links.length, links, 'links');
//        console.log(links_active.length, links_active, 'links_active');
//        console.log(links_inactive.length, links_inactive, 'links_inactive');
        
        if (links.length == links_active.length || links.length == links_inactive.length) {
            // Show all products
            console.log('Show all');
            
        }
        else {
            console.log('Hide some...');
            // First, hide inactive
            links_inactive.each(function(index) {
                if (color = $(this).data('color')) {
                    console.log(color, 'color');
                    $('.page-boutique .product.teaser:not(.hidden)[data-color="' + color + '"]').addClass('hidden');
                }
                else if (chateau = $(this).data('chateau')) {
                    console.log(chateau, 'chateau');
                    $('.page-boutique .product.teaser:not(.hidden)[data-chateau="' + chateau + '"]').addClass('hidden');
                }
                //console.log($(this).data('color'), 'link color...');
            });  
            // Second, show active
            links_active.each(function(index) {
                if (color = $(this).data('color')) {
                    console.log(color, 'color');
                     $('.page-boutique .product.teaser.hidden[data-color="' + color + '"]').removeClass('hidden');
                }
                else if (chateau = $(this).data('chateau')) {
                    console.log(chateau, 'chateau');
                    $('.page-boutique .product.teaser.hidden[data-chateau="' + chateau + '"]').removeClass('hidden');
                }
                //console.log($(this).data('color'), 'link color...');
            });  
        }
        
        
    }
    
    

}}})(jQuery);