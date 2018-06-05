<?php
$conn = mysqli_connect('localhost', 'root', 'root');
if (!$conn){
    die("Database Connection Failed" . mysqli_error($conn));
}
$select_db = mysqli_select_db($conn, 'blog');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($conn));
}




function getUserAccessRoleByID($id)
	{
		global $conn;
		
		$query = "select user_role from tbl_user_role where  id = ".$id;
	
		$result = mysqli_query($conn,$query);
		$row = mysqli_fetch_assoc($result);
		
		return $row['user_role'];
	}
?>