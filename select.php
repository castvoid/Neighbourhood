<!DOCTYPE html>
<html>
<head>
<title>Neighbourhood</title>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
<meta charset="utf-8">
<style type="text/css">
*{
	margin: 0;
	padding: 0;
	
}
body{
	font-family: "Helvetica Neue", Helvetica, sans-serif;
	background: url(images/index_bg.jpg) no-repeat center center fixed; 
	-webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
	background-size: cover;
	list-style: none;
	color: #fff;
	-webkit-font-smoothing:antialiased;
	overflow: hidden;
}
h1{
	font-size: 70px;
	position: absolute;
	top:50%;
	left:50%;
	width:500px;
	margin-top: -300px;
	margin-left: -250px;
	-moz-text-shadow: 0px 5px 3px #888;
		-webkit-text-shadow: 0px 5px 3px #888;
			text-shadow: 0px 5px 3px #888;
}
table#regions{
	position: absolute;
	top:50%;
	left:50%;
	width:600px;
	height:400px;
	margin-left: -300px;
	margin-top:-200px;
	font-weight: bold;
	overflow: hidden;

}

table#regions  td{
	width:150px;
	height:100px;
	text-align: center;
	border-bottom: 1px solid rgba(51,51,51,.5);
	border-right: 1px solid rgba(51,51,51,.5);
	background: rgba(0,0,0,.1);
	padding:10px;
	box-sizing: border-box;
	-moz-text-shadow: 0px -1px 0px rgba(0,0,0,0.25);
		-webkit-text-shadow: 0px -1px 0px rgba(0,0,0,0.25);
			text-shadow: 0px -1px 0px rgba(0,0,0,0.25);
}
table#regions td:hover:not(#help){
	background: rgba(29, 195, 223, 0.1);
	cursor:pointer;
	
}
table#regions tr:last-child td{
	border-bottom:none;
}
table#regions tr td:last-child{
	border-right: none;
}
footer{
	width:500px;
	position: absolute;
	bottom:2px;
	left:50%;
	margin-left: -250px;
	text-align: center;
	font-weight: bold;
	font-size: 13px;
	-moz-text-shadow: 0px -1px 0px rgba(0,0,0,0.25);
		-webkit-text-shadow: 0px -1px 0px rgba(0,0,0,0.25);
			text-shadow: 0px -1px 0px rgba(0,0,0,0.25);
}
a {
	color: #fff;
}
</style>
</head>
<body>
<h1>Neighbourhood</h1>
<table cellspacing="0" id="regions">
	<tr>
		<td id="help" colspan="4">Please select the region you would like to start in.</td>
	</tr>
	<tr>
		<td class="region" data-id="0">London</td>
		<td class="region" data-id="1">North East England</td>
		<td class="region" data-id="2">North West England</td>
		<td class="region" data-id="3">Yorkshire & the Humber</td>
	</tr>
	<tr>
		<td class="region" data-id="4">East Midlands</td>
		<td class="region" data-id="5">West Midlands</td>
		<td class="region" data-id="7">South East England</td>
		<td class="region" data-id="8">South West England</td>
	</tr>
	<tr>
		<td class="region" data-id="6">East of England</td>
		<td class="region" data-id="9">Wales</td>
		<td class="region" data-id="10">Northern Ireland</td>
		<td class="region" data-id="11">Scotland</td>
	</tr>
</table>
<footer>A game by Harry, Chris, Hal & Pete for <a href="http://youngrewired.org">YRS2012</a></footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>
	$('td.region').click(function(event){
		window.location = 'game.php?region=' + $(this).data('id')
	});
</script>
</body>
</html>