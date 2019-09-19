<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 10%;
        width: 10%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCj2GrDSBy6ISeGg3aWUM4mn3izlA1wgt0" ></script>

    <!-- <script src="https://maps.googleapis.com/maps/api/js?callback=initMap"></script> -->
    <script type="text/javascript" src="//code.jquery.com/jquery-2.2.0.min.js"></script>
    
    <script>
      var map;
      var lokasi = []; 

      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 46, lng: 2},
          zoom: 5,
          zoomControlOptions: {
            position: google.maps.ControlPosition.RIGHT_TOP
          }
        });
      }

      google.maps.event.addDomListener(window, 'load', initMap);

      function findLokasi() {
        
        $.ajax({
            type: "GET",
            url: "test.json",
            dataType: "json",
            success: function(data){
                var d = new google.maps.InfoWindow();
                var e;

                $.each(data, function(i, b){ 
                    e = new google.maps.Marker({
                        position: new google.maps.LatLng(b.lat, b.long),
                        map: map
                    });
                    
                    lokasi.push(e);

                    google.maps.event.addListener(e, 'click', (function(a, i){
                        return function(){
                            d.setContent('<div><h3>'+ b.profession+'</h3></div>');
                            d.open(map, a)
                        }
                    })(e, i))
                });
 
            }
        });
      }

     $(function(){
        findLokasi();
     });
        // var d = new google.maps.InfoWindow();
        // var e;

        // $.each(perusahaan, function(i, b) {
        //     // membuat maker dari lat, lng
        //     e = new google.maps.Marker({
        //         position: new google.maps.LatLng(b.lat, b.lng),
        //         icon: icons[b.type].icon,
        //         map: map
        //     });

        //     lokasi.push(e);

        //     // membuat info window alamat
        //     google.maps.event.addListener(e, 'click', (function(a, i) {
        //         return function() {
        //             //	alert(a.position.lat());
        //             //	console.log(a.location);
        //             d.setContent('<div><h3>' + b.alamat + '</h3><p>' + b.keterangan + '</p>'
        //                 // tombol triger.y untuk menjalankan fungsi jarak
        //                 +
        //                 '<button class="detail" data-alamat="' + b.alamat + '" data-lat="' + b.lat + '" data-lng="' + b.lng + '">Detail</button></div>');
        //             d.open(map, a)
        //         }
        //     })(e, i))
        // });
    
    </script>
    
  </body>
</html>