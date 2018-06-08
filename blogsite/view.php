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
<th><strong>Post Title</strong></th>
<th><strong>Author Name</strong></th>
<th><strong>Cotent</strong></th>
<th><strong>Date</strong></th>
<th><strong>Edit</strong></th>
<th><strong>Delete</strong></th>
</tr>
</thead>

<tbody>
<?php
$count=1;
$query="SELECT * from blog_post ORDER BY post_id asc";
$result = mysqli_query($conn,$query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row['post_title']; ?></td>
<td align="center"><?php echo $row['author_name']; ?></td>
<td align="center"><?php echo $row['content']; ?></td>
<td align="center"><?php echo $row['post_date']; ?></td>
<div class="custom">
<td align="center">
<!-- class fior button -->
<a class="btn" href="edit.php?id=<?php echo $row["post_id"]; ?>">Edit</a>
</td>
<td align="center">
<a class="btn1" href="delete.php?post_id=<?php echo $row["post_id"]; ?>" onclick="return confirm('Are you sure?')">Delete</a>
</td>
</tr>
</div>
<?php $count++; } ?>
</tbody>
</table>
</div>
</body>
</html>