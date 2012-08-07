<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
<meta charset="utf-8">
<title>Neighbourhood</title>
<link type="text/css" href="game.css" rel="stylesheet"/>
<link type="text/css" href="font.css" rel="stylesheet"/>
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
	
	</div>
	<div id="sidebar">
		<div class="profile">
			<h3><i class="icon-user"></i><span id="playername">Player</span></h3>
			<ul>
                <li><i class="icon-money icon-large"></i> &pound;<span id="currentmoney">0</span></li>
                <li><i class="icon-bolt icon-large"></i><span id="oppression" class="bar"><span></span></span></li>
            </ul>
		</div>
		<div class="stats" id="stats">
			<h1>No Selection</h1>
		</div>
	</div>
	<div id="buildBox" onClick="buildBox(0);"></div>
	<div id="buildMenu"></div>
</div>
</body>
</html>
