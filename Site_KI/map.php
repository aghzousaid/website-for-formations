<!DOCTYPE html>
<html>
  <head>
    <style>
       /* Set the size of the div element that contains the map */
      #map {
        height:400px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }
    </style>
  </head>
  <body>
    <h3>My Google Maps Demo</h3>
    <!--The div element for the map -->
    <div id="map"></div>
 
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCj2GrDSBy6ISeGg3aWUM4mn3izlA1wgt0&callback=initMap" >
    </script>

    <script>


      // Initialize and add the map
      function initMap() {
        // The location of Uluru
        // var uluru = {lat: 46, lng: 2};
        // // The map, centered at Uluru
        // var map = new google.maps.Map(
        //     document.getElementById('map'), {zoom: 4, center: uluru});
        // // The marker, positioned at Uluru
        // var marker = new google.maps.Marker({position: uluru, map: map});


        // streetViewService = new google.maps.StreetViewService();
        // panorama = new google.maps.StreetViewPanorama(document.getElementById('pano'));
        // map = new google.maps.Map(document.getElementById('map'), {
        //   // peta indonesia
        //   center: {
        //   lat: -0.789275,
        //   lng: 113.921327
        //   },
        //   zoom: 5,
        //   zoomControlOptions: {
        //   position: google.maps.ControlPosition.RIGHT_BOTTOM
        //   }
        // });

         var myLatLng = {lat: -25.363, lng: 131.044};

          // Create a map object and specify the DOM element
          // for display.
          var map = new google.maps.Map(document.getElementById('map'), {
            center: myLatLng,
            zoom: 4
          });

          // Create a marker and set its position.
          var marker = new google.maps.Marker({
            map: map,
            position: myLatLng,
            title: 'Hello World!'
          });
          }
      }
    </script>

  
    <!--Load the API from the specified URL
    * The async attribute allows the browser to render the page while the API loads
    * The key parameter will contain your own API key (which is not needed for this tutorial)
    * The callback parameter executes the initMap() function
    -->
 
  </body>
</html>