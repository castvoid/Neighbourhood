<?php
	session_start();
	if (!$_POST['username']) die("ERROR");
	require_once('inc/db.inc');
	require_once('inc/hashing.inc');
	$response = mysql_query("SELECT * FROM users WHERE uname='" . $_POST['username'] . "'");
	$user = mysql_fetch_array($response);

	if (hashPassword($_POST['password']) == $user['upass']) {
		$_SESSION['nh_uid'] = $user['UID'];
		header('Location: game.php');
	} else {
		die("Username or password incorrect.");
	}
?>