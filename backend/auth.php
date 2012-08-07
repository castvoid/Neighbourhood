<?php
	session_start();
	require_once('inc/db.inc');
	require_once('inc/hashing.inc');
	$response = mysql_query("SELECT * FROM users WHERE uname='" . $_POST['username'] . "'");
	$user = mysql_fetch_array($response);
	
	if (mysql_num_rows($response) < 1) {
		header('Location: ../signin.php?err=1');
	}
	
	if (hashPassword($_POST['password']) == $user['upass']) {
		$_SESSION['nh_uid'] = $user['UID'];
		header('Location: ../game.php');
	} else {
		header('Location: ../signin.php?err=1');
	}
?>