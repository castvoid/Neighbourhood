<?php
	require_once('db.inc');
	
	function init_regions($uid) {
		mysql_query("INSERT INTO regions (user, number, hospitals, schools) VALUES (" . intval($uid) . ", 0, 80, 4764)");
		mysql_query("INSERT INTO regions (user, number, hospitals, schools) VALUES (" . intval($uid) . ", 1, 28, 1967)");
		mysql_query("INSERT INTO regions (user, number, hospitals, schools) VALUES (" . intval($uid) . ", 2, 49, 5469)");
		mysql_query("INSERT INTO regions (user, number, hospitals, schools) VALUES (" . intval($uid) . ", 3, 69, 4117)");
		mysql_query("INSERT INTO regions (user, number, hospitals, schools) VALUES (" . intval($uid) . ", 4, 23, 3260)");
		mysql_query("INSERT INTO regions (user, number, hospitals, schools) VALUES (" . intval($uid) . ", 5, 39, 4122)");
		mysql_query("INSERT INTO regions (user, number, hospitals, schools) VALUES (" . intval($uid) . ", 6, 31, 4055)");
		mysql_query("INSERT INTO regions (user, number, hospitals, schools) VALUES (" . intval($uid) . ", 7, 26, 5850)");
		mysql_query("INSERT INTO regions (user, number, hospitals, schools) VALUES (" . intval($uid) . ", 8, 39, 3898)");
		mysql_query("INSERT INTO regions (user, number, hospitals, schools) VALUES (" . intval($uid) . ", 9, 106, 1833)");
		mysql_query("INSERT INTO regions (user, number, hospitals, schools) VALUES (" . intval($uid) . ", 10, 33, 1210)");
		mysql_query("INSERT INTO regions (user, number, hospitals, schools) VALUES (" . intval($uid) . ", 11, 222, 2755)");
		
		$user = user_details($uid);
		mysql_query("UPDATE regions SET conquerstatus=1 WHERE user=" . $uid . " AND number=" . $user['currentregion']);
	}
	
	if (isset($_GET['setup'])) {
		init_regions($_GET['setup']);
		echo "Regions set up for UID " . $_GET['setup'];
	}
?>