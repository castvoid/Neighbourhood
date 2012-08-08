<?php
	require_once('inc/db.inc');
	if ($_POST['uid'] == "CURRENT") {
		session_start();
		$uid = $_SESSION['nh_uid'];
	} else {
		$uid = $_POST['uid'];
	}
	$detail = $_POST['field'];
	$region = region_details($uid, $_POST['rid']);
	echo $region[$_POST['field']];
?>