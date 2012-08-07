<?php
	session_start();
	$_SESSION['nh_uid'] = 1;
	header('Location: ../game.php');
?>