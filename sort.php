<?php
$json = Array();
$f = file_get_contents('data.csv');
$lines = split('/////', $f);
foreach($lines as $line){
	$v = split(',', $line);
	$nline = Array("id"=>$v[0], "city"=>$v[1],"nelat"=>$v[2],"nelng"=>$v[3],"swlat"=>$v[4],"swlng"=>$v[5],"population"=>$v[6],"area"=>$v[7],"density"=>$v[8],"crime"=>$v[9],"police"=>$v[10]);
	array_push($json, $nline);
}
echo json_encode($json, true);