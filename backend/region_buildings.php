<?php
	require_once('inc/db.inc');
	if ($_REQUEST['uid'] == "CURRENT") {
		session_start();
		$uid = $_SESSION['nh_uid'];
	} else {
		$uid = $_REQUEST['uid'];
	}
	$regiondetails = array();
	for ($i=0;$i<11;$i++) {
		$region = region_details($uid, $i);
		$regiondetails[$i]['schools'] = $region['schools'];
		$regiondetails[$i]['hospitals'] = $region['hospitals'];
	}
	echo json_encode($regiondetails);
?>