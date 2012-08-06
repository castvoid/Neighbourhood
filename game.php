<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
<meta charset="utf-8">
<title>Neighbourhood</title>
<link type="text/css" href="game.css" rel="stylesheet"/>
<script src="//maps.googleapis.com/maps/api/js?sensor=false"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="game.js"></script>
</head>
<body onload="initialize();run()">
<div id="map_canvas"></div> <!-- The Google Map -->
<div class="ui"> <!-- All the UI elements -->
	<div id="bottom_menu">
		<a class="button" href="#">Global Command A</a>
		<a class="button" href="#">Review</a>
		<a class="button" href="#">Build</a>
	</div>
	<div id="sidebar">
		<div class="stats" id="stats"></div>
	</div>
	<div id="popUp">
		
	</div>
</div>
</body>
</html>
