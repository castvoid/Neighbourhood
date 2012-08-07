<!doctype html>
<html>
<head>
<title>Neighbourhood</title>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
<meta charset="utf-8">
<style>
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
	text-shadow: 0px 1px 0px rgba(0,0,0,0.25);
}
table#regions td:hover{
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
	text-shadow: 0px 1px 0px rgba(0,0,0,0.25);
}
</style>
</head>
<body>
<h1>Neighbourhood</h1>
<table cellspacing="0" id="regions">
<tr><td>London</td><td>North East England</td><td>North West England</td><td>Yorkshire & the Humber</td></tr>
<tr><td>East Midlands</td><td>West Midlands</td><td>South East England</td><td>South West England</td></tr>
<tr><td>East of England</td><td>Wales</td><td>Northern Ireland</td><td>Scotland</td></tr>
</table>
<footer>A game by Harry, Chris, Hal & Pete</footer>
</body>
</html>