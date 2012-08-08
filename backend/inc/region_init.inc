<?php
	require_once('inc/db.inc');
	
	function init_regions($uid) {
		mysql_query("INSERT INTO regions (user, number, hospitals, schools) VALUES (" . $uid . ", 0, 80, 4764)");
		mysql_query("INSERT INTO regions (user, number, hospitals, schools) VALUES (" . $uid . ", 1, 28, 1967)");
		mysql_query("INSERT INTO regions (user, number, hospitals, schools) VALUES (" . $uid . ", 2, 49, 5469)");
		mysql_query("INSERT INTO regions (user, number, hospitals, schools) VALUES (" . $uid . ", 3, 69, 4117)");
		mysql_query("INSERT INTO regions (user, number, hospitals, schools) VALUES (" . $uid . ", 4, 23, 3260)");
		mysql_query("INSERT INTO regions (user, number, hospitals, schools) VALUES (" . $uid . ", 5, 39, 4122)");
		mysql_query("INSERT INTO regions (user, number, hospitals, schools) VALUES (" . $uid . ", 6, 31, 4055)");
		mysql_query("INSERT INTO regions (user, number, hospitals, schools) VALUES (" . $uid . ", 7, 26, 5850)");
		mysql_query("INSERT INTO regions (user, number, hospitals, schools) VALUES (" . $uid . ", 8, 39, 3898)");
		mysql_query("INSERT INTO regions (user, number, hospitals, schools) VALUES (" . $uid . ", 9, 106, 1833)");
		mysql_query("INSERT INTO regions (user, number, hospitals, schools) VALUES (" . $uid . ", 10, 33, 1210)");
		mysql_query("INSERT INTO regions (user, number, hospitals, schools) VALUES (" . $uid . ", 11, 222, 2755)");
	}
?>