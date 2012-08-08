<?php
if ($_SERVER['HTTP_HOST'] != "localhost" && $_SERVER['HTTP_HOST'] != "localhost:21482" && !isset($_REQUEST["testing"])) { //Do NOT use in produtction, can be spoofed fairly easily
	session_start();
	if (!isset($_SESSION['nh_uid'])) {
		header('Location: index.php');
	} else {
		require_once('backend/inc/db.inc');
		if (isset($_GET['region'])) {
			move_player($_SESSION['nh_uid'], intval($_GET['region']));
		} else {
			$user = user_details($_SESSION['nh_uid']);
			if ($user['currentregion'] == -1) {
				header('Location: select.php');
			}
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
<meta charset="utf-8">
<title>Neighbourhood</title>
<link type="text/css" href="bootstrap.min.css" rel="stylesheet"/>
<link type="text/css" href="game.css" rel="stylesheet"/>
<link type="text/css" href="font.css" rel="stylesheet"/>
<script src="//maps.googleapis.com/maps/api/js?sensor=false"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="bootstrap.min.js"></script>
<script src="game.js"></script>
</head>
<body onload="initialize();run()">
<div id="map_canvas">
</div>
<!-- The Google Map -->
<div class="ui">
	<!-- All the UI elements -->
	<div id="bottom_menu">
		<a class="button btn" href="#">Profile</a>
		<a class="button btn" href="/backend/signout.php">Log Out</a>
	</div>
	<div id="sidebar">
		<div id="profile">
			<ul>
				<li><i class="icon-user icon-large tip" title="Your player name"></i> <span id="playername">Player</span></li>
				<li><i class="icon-money icon-large tip" title="Your money"></i> &pound;<span id="currentmoney">0</span></li>
				<li><i class="icon-map-marker icon-large tip" title="Number of locations you own"></i> <span id="currentregions">0</span></li>
			</ul>
		</div>
		<div class="stats" id="stats">
			<h1>No selection</h1>
		</div>
	</div>
	<div class="modal hide fade" id="modal">
		<div class="modal-header">
			<h3>City</h3>
		</div>
		<div class="modal-body">
			<p>
				Loading...
			</p>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
		</div>
	</div>
</div>
</body>
</html>