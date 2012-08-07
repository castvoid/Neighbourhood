<?php
	require_once("db_login.inc");
	function user_details($uid) {
		$response = mysql_query("SELECT * FROM users WHERE UID=" . $uid);
		return mysql_fetch_array($response);
	}
	function uname_details($uname) {
		$response = mysql_query("SELECT * FROM users WHERE uname='" . $uname . "'");
		return mysql_fetch_array($response);
	}
	function region_details($rid) {
		$response = mysql_query("SELECT * FROM regions WHERE RID=" . $rid);
		return mysql_fetch_array($response);
	}
	function sanitise($string, $lower) {
		return addslashes(trim($string));
	}
	function sanitise_lower($string) {
		return addslashes(trim(strtolower($string)));
	}
	function move_player($uid, $region) {
		return mysql_query("UPDATE users SET region=" . $region . " WHERE UID=" . $uid);
	}
?>