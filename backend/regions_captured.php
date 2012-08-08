<?php
	require_once('inc/db.inc');
	if ($_POST['uid'] == "CURRENT") {
		session_start();
		$uid = $_SESSION['nh_uid'];
	} else {
		$uid = $_POST['uid'];
	}
	$regionlist = '';
	for ($i=0;$i<11;$i++) {
		$region = region_details($uid, $i);
		if ($region['conquerstatus'] == 1) {
			$regionlist .= $region['RID'] . ',';
		}
	}
	$regionlist = substr($regionlist, 0, -1);
	echo $regionlist;
?>