<?php
require('db.php');
include("auth.php");
$id=$_REQUEST['id'];
$query = "SELECT * from users where id='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
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
        color: black;
        display:block;
        text-decoration: none;
        font-size: 20px;
        text-align: center;
        padding: 10px;
        border-radius: 10px;
        font-family: Century Gothic;
        font-weight: bold;
        margin-right: 100px;
        margin-left: 100px;

    }
    a:hover{
        background: #c70039;
        transition: 0.6s;
    }
</style>
<body>
<div class="nav">
<ul>
<li><p><a href="dashboard.php">Dashboard</a></li> 
<li><a href="insert.php">Insert New Record</a></li> 
<li><a href="logout.php">Logout</a></li></p>
</ul>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];
$firstname = stripslashes($_REQUEST['firstname']); // removes backslashes
		$firstname = mysqli_real_escape_string($con,$firstname);
$lastname = stripslashes($_REQUEST['lastname']); // removes backslashes
		$lastname = mysqli_real_escape_string($con,$lastname);
$username = stripslashes($_REQUEST['username']); // removes backslashes
		$username = mysqli_real_escape_string($con,$username);
$email = stripslashes($_REQUEST['email']); // removes backslashes
		$email = mysqli_real_escape_string($con,$email);
$trn_date = date("Y-m-d H:i:s");
$submittedby = $_SESSION["username"];
$query1 = "SELECT * FROM users WHERE email='$email'";
$result_login = mysqli_query($con,$query1);
$error= mysqli_num_rows($result_login);

if($error > 0) {
    $form = false;
    echo "Email is Already Exist! Please try again."; 
}else
{
$query="UPDATE users set firstname='".$firstname."',lastname='".$lastname."',
username='".$username."', email='".$email."',trn_date='".$trn_date."'
 WHERE id='".$id."'";
mysqli_query($con, $query) or die(mysqli_error());

$status = "Record Updated Successfully.</br></br>
<a href='view.php'>View Updated Record</a>";
echo '<p style="color:#67cc08;">'.$status.'</p>';
}}else {
?>
<div class="edit">
<h1>EDIT</h1>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
<p><input type="text" name="firstname" placeholder="Enter First Name" required value="<?php echo $row['firstname'];?>" /></p>
<p><input type="text" name="lastname" placeholder="Enter Last Name" required value="<?php echo $row['lastname'];?>" /></p>
<p><input type="text" name="username" placeholder="Enter User Name" required value="<?php echo $row['username'];?>" /></p>
<p><input type="email" name="email" placeholder="Enter Email" required value="<?php echo $row['email'];?>" /></p>
<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>
</div>
</div>
</body>
</html>