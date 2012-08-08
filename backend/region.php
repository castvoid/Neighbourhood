<?php
	require_once('inc/db.inc');
	if ($_POST['uid'] == "CURRENT") {
		session_start();
		$uid = $_SESSION['nh_uid'];
	} else {
		$uid = $_POST['uid'];
	}
	$region = region_details($uid, $_POST['rid']);
	echo $region[$_POST['detail']];
?>