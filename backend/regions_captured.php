<?php
	require_once('inc/db.inc');
	if ($_REQUEST['uid'] == "CURRENT") {
		session_start();
		$uid = $_SESSION['nh_uid'];
	} else {
		$uid = $_REQUEST['uid'];
	}
	$regionlist = '[';
	for ($i=0;$i<11;$i++) {
		$region = region_details($uid, $i);
		if ($region['conquerstatus'] == 1) {
			$regionlist .= $region['RID'] . ',';
		}
	}
	$regionlist .= ']';
	echo $regionlist;
?>