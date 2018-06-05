<?php
require('connect.php');
// include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Blog</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<!-- <style>
	body
	{
		background: url(images/college.jpg) no-repeat center fixed;
		background-size: cover;
	}
</style> -->
<body>
<div >
<h2>View Blog</h2>
<table class="custom"; border=1;  style="text-align:center;">
<thead>
<tr>
<th><strong>ID</strong></th>
<th><strong>First Name</strong></th>
<th><strong>Last Name</strong></th>
<th><strong>Email Id</strong></th>
<th><strong>Delete</strong></th>
</tr>
</thead>

<tbody>
<?php
$count=1;
$query="SELECT * from user ORDER BY id asc";
$result = mysqli_query($conn,$query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row['firstname']; ?></td>
<td align="center"><?php echo $row['lastname']; ?></td>
<td align="center"><?php echo $row['email']; ?></td>

<div class="custom">

<td align="center">
<a class="btn1" href="deleteuser.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('Are you sure?')">Delete</a>

</td>
</tr>
</div>
<?php $count++; } ?>
</tbody>
</table>
</div>
</body>
</html>