<?php
if ($_SERVER['HTTP_HOST'] != "localhost" && $_SERVER['HTTP_HOST'] != "localhost:21482" && !isset($_REQUEST["testing"])) { //Do NOT use in production, can be spoofed fairly easily
	session_start();
	if (!isset($_SESSION['nh_uid'])) {
		header('Location: index.php');
	} else {
		require_once('backend/inc/db.inc');
		$user = user_details($_SESSION['nh_uid']);
		if (isset($_GET['region'])) {
			move_player($user['UID'], intval($_GET['region']));
		} else {
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
		<a class="button" href="#">Profile</a>
		<a class="button" href="/backend/signout.php">Log Out</a>
	</div>
	<div id="sidebar">
		<div id="profile">
			<ul>
				<li>
					<?php echo $user['uname']; ?>
					<?php if ($user['uemail'] == "NO_EMAIL"): ?>
						<img src="http://www.gravatar.com/avatar/<?php echo md5($user['uname']); ?>?s=70&d=retro" />
					<?php else: ?>
						<img src="http://www.gravatar.com/avatar/<?php echo md5($user['uemail']); ?>?s=70&d=wavatar" />
					<?php endif; ?>
					<span id="playername">Player</span>
				</li>
				<li><i class="icon-money icon-large tip" title="Your money"></i> &pound;<span id="currentmoney">0</span></li>
				<li><i class="icon-map-marker icon-large tip" title="Your current location"></i> <span id="currentregion">Loading...</span></li>
			</ul>
		</div>
		<div class="stats" id="stats">
			<h1>No selection</h1>
		</div>
	</div>
	<div class="modal hide fade" id="modal">
		<div class="modal-header">
			<h3>Region</h3>
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