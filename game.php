<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
<meta charset="utf-8">
<title>Neighbourhood</title>
<style>
html, body {
	height: 100%;
	margin: 0;
	padding: 0;
	}

#map_canvas {
	height: 100%;
	}

@media print {
	html, body {
		height: auto;
		}

	#map_canvas {
    	height: 650px;
    	}	
    }
    </style>
    <script src="//maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script>
var map;
      function initialize() {
        var myLatLng = new google.maps.LatLng(51.5, -0.116);
        var mapOptions = {
          zoom: 5,
          center: myLatLng,
          mapTypeId: google.maps.MapTypeId.TERRAIN
        };

        var bermudaTriangle;

        var map = new google.maps.Map(document.getElementById('map_canvas'),
            mapOptions);
        new google.maps.Polyline({
        path: [new google.maps.LatLng(53.41, - 1.11), new google.maps.LatLng(53.3, - 1.26), new google.maps.LatLng(53.34, - 1.43), new google.maps.LatLng(53.32, - 1.62), new google.maps.LatLng(53.45, - 1.75), new google.maps.LatLng(53.55, - 1.9), new google.maps.LatLng(53.65, - 2.05), new google.maps.LatLng(53.84, - 2.05), new google.maps.LatLng(53.96, - 2.19), new google.maps.LatLng(54.02, - 2.36), new google.maps.LatLng(54.1, - 2.53), new google.maps.LatLng(54.23, - 2.4), new google.maps.LatLng(54.38, - 2.29), new google.maps.LatLng(54.46, - 2.13), new google.maps.LatLng(54.45, - 1.95), new google.maps.LatLng(54.52, - 1.78), new google.maps.LatLng(54.51, - 1.59), new google.maps.LatLng(54.48, - 1.42), new google.maps.LatLng(54.51, - 1.24), new google.maps.LatLng(54.5, - 1.05), new google.maps.LatLng(54.48, - 0.87), new google.maps.LatLng(54.52, - 0.69), new google.maps.LatLng(54.45, - 0.52), new google.maps.LatLng(54.31, - 0.41), new google.maps.LatLng(54.18, - 0.27), new google.maps.LatLng(54.13, - 0.09), new google.maps.LatLng(53.98, - 0.2), new google.maps.LatLng(53.84, - 0.09), new google.maps.LatLng(53.72, 0.05), new google.maps.LatLng(53.55, - 0.01), new google.maps.LatLng(53.47, - 0.17), new google.maps.LatLng(53.61, - 0.29), new google.maps.LatLng(53.56, - 0.46), new google.maps.LatLng(53.46, - 0.61), new google.maps.LatLng(53.46, - 0.79), new google.maps.LatLng(53.47, - 0.98), new google.maps.LatLng(53.41, - 1.11)],
        strokeColor: "#ff0000",
        strokeWeight: 5,
        strokeOpacity: 0.8,
        map:map
    })


      }
      var key = "AIzaSyBOpj9rpZXyvdtmgcFEINtiwjdIVFj1--8";
    </script>
  </head>
  <body onload="initialize()">
    <div id="map_canvas"></div>
  </body>
</html>
