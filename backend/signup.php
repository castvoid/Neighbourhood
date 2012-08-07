<?php
	session_start();
	require_once('inc/db.inc');
	require_once('inc/hashing.inc');
	
	if (!mysql_query("INSERT INTO users (uname, upass, money) VALUES ('" . sanitise_lower($_POST['username']) . "', '" . hashPassword($_POST['password']) . "', 500)")) {
		header('Location: ../index.php?err=1');
	} else {
		$user = uname_details(sanitise_lower($_POST['username']));
		$_SESSION['nh_uid'] = $user['UID'];
		header('Location: ../game.php');
	}
?>