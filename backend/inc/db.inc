<?php
	require_once("db_login.inc");
	function user_details($uid) {
		$response = mysql_query("SELECT UID, uname, money, currentregion FROM users WHERE UID=" . $uid);
		return mysql_fetch_array($response);
	}
	function uname_details($uname) {
		$response = mysql_query("SELECT UID, uname, money, currentregion FROM users WHERE uname='" . $uname . "'");
		return mysql_fetch_array($response);
	}
	function region_details($uid, $rid) {
		$response = mysql_query("SELECT * FROM regions WHERE user=" . $uid . " AND number=" . $rid);
		return mysql_fetch_array($response);
	}
	function sanitise($string, $lower) {
		return addslashes(trim($string));
	}
	function sanitise_lower($string) {
		return addslashes(trim(strtolower($string)));
	}
	function move_player($uid, $region) {
		return mysql_query("UPDATE users SET currentregion=" . $region . " WHERE UID=" . $uid);
	}
?>