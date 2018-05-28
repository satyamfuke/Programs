<?php
require('db.php');
include("auth.php"); //include auth.php file on all secure pages ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Dashboard - Secured Page</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<style>
	body
	{
		background: url(images/college.jpg) no-repeat center fixed;
		background-size: cover;
	}
	
	a{
		width: 200px;
		color: white;
		display:block;
		text-decoration: none;
		font-size: 20px;
		text-align: center;
		padding: 10px;
		border-radius: 10px;
		font-family: Century Gothic;
		font-weight: bold;
		margin-right: 40px;
		margin-left: 40px;

	}
	a:hover{
		background: #c70039;
		transition: 0.6s;
	}
	</style>
<body>
	<h1>Welcome to Dashboard</h1>
	</div>
	<div class="nav">
	<ul>
		<li><a href='index.php'>HOME</a></li>
		<li><a href='insert.php'>ADD RECORDS</a></li>
		<li><a href='view.php'>VIEW RECORDS</a></li>
		<li><a href='logout.php'>LOGOUT</a></li>
	</ul>
	</div>
</body>
</html>
