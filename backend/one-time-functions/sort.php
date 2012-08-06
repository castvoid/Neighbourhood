<?php
$json = Array();
$f = file_get_contents('data2.csv');
$lines = split('/////', $f);
foreach($lines as $line){
	$v = split(',', $line);
	$nline = Array("id"=>$v[0], "name"=>$v[1],"population"=>$v[2],"density"=>$v[3],"gva"=>$v[4],"crime"=>$v[5]);
	array_push($json, $nline);
}
echo json_encode($json, true);