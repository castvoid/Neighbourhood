<?php
	session_start();
	require_once('inc/db.inc');
	require_once('inc/hashing.inc');
	
	if (strlen($_POST['username'] < 1)) {
		header('Location: ../index.php?namereq=1');
		die();
	}
	
	if (strlen($_POST['password'] < 8)) {
		header('Location: ../index.php?pwshort=1');
		die();
	}
	
	if (!mysql_query("INSERT INTO users (uname, upass, money, currentregion) VALUES ('" . sanitise_lower($_POST['username']) . "', '" . hashPassword($_POST['password']) . "', 500, -1)")) {
		header('Location: ../index.php?err=1');
	} else {
		$user = uname_details(sanitise_lower($_POST['username']));
		$_SESSION['nh_uid'] = $user['UID'];
		header('Location: ../select.php');
	}
?>