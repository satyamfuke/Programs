<?php
require('db.php');
include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Records</title>
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
<div >
<h2>View Records</h2>
<table class="custom"; border=1;  style="text-align:center;">
<thead>
<tr>
<th><strong>ID</strong></th>
<th><strong>First Name</strong></th>
<th><strong>Last Name</strong></th>
<th><strong>Useranme</strong></th>
<th><strong>Email</strong></th>
<th><strong>Edit</strong></th>
<th><strong>Delete</strong></th>
</tr>
</thead>
<p><a href="index.php">Home</a> 
| <a href="insert.php">Insert New Record</a> 
| <a href="logout.php">Logout</a></p>
<tbody>
<?php
$count=1;
$sel_query="Select * from users ORDER BY id desc;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["firstname"]; ?></td>
<td align="center"><?php echo $row["lastname"]; ?></td>
<td align="center"><?php echo $row["username"]; ?></td>
<td align="center"><?php echo $row["email"]; ?></td>
<div class="custom">
<td align="center">
<!-- class fior button -->
<a class="btn" href="edit.php?id=<?php echo $row["id"]; ?>">Edit</a>
</td>
<td align="center">

<a class="btn1" href="delete.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('Are you sure?')">Delete</a>

</td>
</tr>
</div>
<?php $count++; } ?>
</tbody>
</table>
</div>
</body>
</html>