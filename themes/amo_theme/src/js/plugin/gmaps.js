(function($){'use strict';Drupal.behaviors.gd_gmaps={attach:function(context,settings){

  var container_id = '#gmap'

  if(!$(container_id)[0] || $(container_id).find('>div')[0]) return;

  /*
    IMPORTANT :
    You must create an api key for the project :
    https://developers.google.com/maps/documentation/javascript/

    then add the google map script with your API_KEY :

    <script src="//maps.google.com/maps/api/js?key=AIzaSyBdAmdAyX3zROj99h3aIPHCCysEBmt_Pxc"></script>
  */

  /* Gmaps usage : */

  // Add map
  var map = new GMaps({
    div: container_id,
    lat: 44.3496992,
    lng: 4.6299077,
    disableDefaultUI: true
  });

  //Add marker
  map.addMarker({
   lat: 44.3508039,
   lng: 4.6327938,
   title: 'Les Amoureuses',
   infoWindow: {
     content: '<p style="color:#000">Les Amoureuses</p>'
   }
  });

  /*
    You can add a custom marker icon with the icon property, ex :
    icon: "/themes/gd_theme/dist/img/picto/custom-marker-icon.png",
  */

}}})(jQuery);
