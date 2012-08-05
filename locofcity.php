<?php
$cities = Array('Leicester','Edinburgh','Bournemouth','Reading','Blackpool','Plymouth','Aldershot','Derby','Luton','Mansfield','Dundee','Swindon','Burnley','Nuneaton','Cambridge','Doncaster','Hastings','Margate','Basildon','Chesterfield','Chelmsford','Lancaster','Worcester','Royal+Leamington+Spa','Cannock','Halifax','Pontypool','Stevenage','Gelligaer','Aylesbury','Blantyre','Lowestoft','Royal+Tunbridge+Wells','Runcorn','Folkestone','Rhondda','Widnes','Kidderminster','Loughborough','Clacton-on-Sea','Macclesfield');
foreach($cities as $city){
	$json = file_get_contents('http://maps.google.com/maps/api/geocode/json?address=' . $city . ',+UK&sensor=false');
	$a = json_decode($json, true);
	$b = $a["results"][0]["geometry"]["bounds"];
	$northeast = $b["northeast"];
	$southwest = $b["southwest"];
	echo $city . ',' . $northeast["lat"] . ',' . $northeast["lng"] . ',' . $southwest['lat'] . ',' . $southwest['lng'] . '<br>';
}