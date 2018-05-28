<?php
/*
Author: Javed Ur Rehman
Website: http://www.allphptricks.com/
*/

include("auth.php"); //include auth.php file on all secure pages ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<h1>WELCOME HOME</h1>
<link rel="stylesheet" href="css/style.css" />
</head>
<style>
	body
	{
		background: url(images/college.jpg) no-repeat center fixed;
		background-size: cover;
	}
</style>
<body>
<div class="form">
<p align="center"><h2>Welcome <?php echo $_SESSION['username']; ?>!</h2></p>
<p align="center">This is secure area.</p>
<div class="custom_buttons">
<button  onclick="window.location.href='dashboard.php'">Dashboard</button>
<button  onclick="window.location.href='logout.php'">Logout</button>

</div>

</div>
</body>
</html>
