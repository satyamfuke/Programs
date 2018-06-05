<?php
ini_set('display errors', 'on');
require('connect.php');
$post_id=$_REQUEST['post_id'];
echo $query = "DELETE FROM blog_post WHERE post_id='$post_id'"; 
$result = mysqli_query($conn,$query) or die ( mysqli_error());
header("Location: view.php"); 
?>