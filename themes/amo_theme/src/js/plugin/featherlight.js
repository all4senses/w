(function($){'use strict';Drupal.behaviors.gd_plugin_featherlight={attach:function(context,settings){

  if(!$('.library-list')[0] || $('.wrapper-content.js-processed')[0]) return;

  $('.wrapper-content').addClass('js-processed');

  // Doc : https://github.com/noelboss/featherlight#usage

  $.featherlight.defaults.openSpeed  = 220;
  $.featherlight.defaults.closeSpeed = 180;

  $.featherlight.defaults.afterContent = function()
  {
    var e = $(this.$content[0]).parents('.featherlight-content').addClass('loaded');
  };

  $('.gallery').featherlightGallery();

}}})(jQuery);
