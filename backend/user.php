<?php
	require_once('inc/db.inc');
	if ($_POST['uid'] == "CURRENT") {
		session_start();
		$uid = $_SESSION['nh_uid'];
	} else {
		$uid = $_POST['uid'];
	}
	$user = user_details($uid);
	echo $user[$_POST['field']];
?>