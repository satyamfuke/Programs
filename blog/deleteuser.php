<?php
ini_set('display errors', 'on');
require('connect.php');
$id=$_REQUEST['id'];
echo $query = "DELETE FROM user WHERE id='$id'"; 
$result = mysqli_query($conn,$query) or die ( mysqli_error());
header("Location: view1.php"); 
?>