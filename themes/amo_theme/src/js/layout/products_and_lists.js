(function($){'use strict';Drupal.behaviors.products_and_list={attach:function(context,settings){

    $('body').on('click', '#product-filter-boutique a', function(event) {
        event.preventDefault();

        var e = $(this);
        e.toggleClass('active');
        update_products_view();
    });
    
    function update_products_view() {
        // Filter logic: OR
        var color, chateau;
        var links = $('#product-filter-boutique a');
        var links_active = $('#product-filter-boutique a.active');
        var links_inactive = $('#product-filter-boutique a:not(.active)');
        
        if (links.length == links_active.length || links.length == links_inactive.length) {
            // Show all products
            $('.page-boutique .product.teaser.hidden').removeClass('hidden');
        }
        else {
            // Hide/show some products
            // First, hide inactive
            links_inactive.each(function(index) {
                if (color = $(this).data('color')) {
                    $('.page-boutique .product.teaser:not(.hidden)[data-color="' + color + '"]').addClass('hidden');
                }
                else if (chateau = $(this).data('chateau')) {
                    $('.page-boutique .product.teaser:not(.hidden)[data-chateau="' + chateau + '"]').addClass('hidden');
                }
            });  
            // Second, show active
            links_active.each(function(index) {
                if (color = $(this).data('color')) {
                     $('.page-boutique .product.teaser.hidden[data-color="' + color + '"]').removeClass('hidden');
                }
                else if (chateau = $(this).data('chateau')) {
                    $('.page-boutique .product.teaser.hidden[data-chateau="' + chateau + '"]').removeClass('hidden');
                }
            });  
        }
        
        
    }
    
    

}}})(jQuery);