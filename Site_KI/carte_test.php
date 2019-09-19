<!DOCTYPE html>
<html>
<head>
<title>Simple Map</title>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
<meta charset="utf-8">
<style>

  html, body, #map-canvas
  {
    height: 100%;
    margin: 0px;
    padding: 0px
  }
</style>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
<script>

var map = null;
function initialize()
{

   var mapOptions =
       {
            zoom: 12,
            center:new google.maps.LatLng(46, 2)//center over dublin
       };

   map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
   loadXMLFile();
 }

 function loadXMLFile(){
    var filename = 'test.xml';
    $.ajax({
            type: "GET",
            url: filename ,
            dataType: "xml",
            success: parseXML,
            error : onXMLLoadFailed
    });

  function onXMLLoadFailed(){
    alert("An Error has occurred.");
  }

  function parseXML(xml){
    var bounds = new google.maps.LatLngBounds();
     $(xml).find("marker").each(function(){
            //Read the name, address, latitude and longitude for each Marker
            var theme = $(this).find('theme').text();
            var profession = $(this).find('profession').text();
            var lat = $(this).find('lat').text();
            var lng = $(this).find('long').text();
            var markerCoords = new google.maps.LatLng(parseFloat(lat), 
                                                      parseFloat(lng));
            bounds.extend(markerCoords);
            var marker = new google.maps.Marker({position: markerCoords, map:map});
        });
        map.fitBounds(bounds);
    }
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
<body>
<div id="map-canvas"></div>
  
</body>
</html>