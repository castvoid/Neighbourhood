<?php
	require_once('inc/db.inc');
	$region = region_details($_POST['rid']);
	echo $region[$_POST['detail']];
?>