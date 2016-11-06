(function ($) {
  'use strict';
  Drupal.behaviors.products_and_list = {
    attach: function (context, settings) {

      $('body').on('click', '#product-filter-boutique-2 a.toggle-filter', function (event) {
        event.preventDefault();

        var e = $(this);
        e.toggleClass('opened');
        e.parent().find('.filter-select').toggleClass('hidden').toggle();
      });

      $('body').on('click', "[id^='product-filter-boutique']" + ' a.toggle-products', function (event) {
        event.preventDefault();

        var e = $(this);
        e.toggleClass('active');
        update_products_view(e);
      });

      function update_products_view(e) {
        var filter_block = '#' + e.closest("[id^='product-filter-boutique']").attr('id');
        // Filter logic: OR
        var color, chateau;
        var links = $(filter_block + ' a');
        var links_active = $(filter_block + ' a.active');
        var links_inactive = $(filter_block + ' a:not(.active)');

        if (links.length == links_active.length || links.length == links_inactive.length) {
          // Show all products
          $('.page-boutique .product.teaser.hidden').removeClass('hidden');
        }
        else {
          // Hide/show some products
          // First, hide inactive
          links_inactive.each(function (index) {
            if (color = $(this).data('color')) {
              $('.page-boutique .product.teaser:not(.hidden)[data-color="' + color + '"]').addClass('hidden');
            }
            else if (chateau = $(this).data('chateau')) {
              $('.page-boutique .product.teaser:not(.hidden)[data-chateau="' + chateau + '"]').addClass('hidden');
            }
          });
          // Second, show active
          links_active.each(function (index) {
            if (color = $(this).data('color')) {
              $('.page-boutique .product.teaser.hidden[data-color="' + color + '"]').removeClass('hidden');
            }
            else if (chateau = $(this).data('chateau')) {
              $('.page-boutique .product.teaser.hidden[data-chateau="' + chateau + '"]').removeClass('hidden');
            }
          });
        }
      }
    }
  }
})(jQuery);