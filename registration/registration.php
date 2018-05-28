<?php
/*
Author: Javed Ur Rehman
Website: http://www.allphptricks.com/
*/
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="css/style.css" />
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
</head>
<style>
	body
	{
		background: url(images/college.jpg) no-repeat center fixed;
		background-size: cover;
	}
</style>
<body>
<?php
	require('db.php');
	
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['username'])){
    	$firstname = stripslashes($_REQUEST['firstname']); // removes backslashes
		$firstname = mysqli_real_escape_string($con,$firstname);
		$lastname = stripslashes($_REQUEST['lastname']); // removes backslashes
		$lastname = mysqli_real_escape_string($con,$lastname);
		$username = stripslashes($_REQUEST['username']); // removes backslashes
		$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
		$email = stripslashes($_REQUEST['email']);
		$email = mysqli_real_escape_string($con,$email);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
		$trn_date = date("Y-m-d H:i:s");
$query1 = "SELECT * FROM users WHERE email='$email'";
$result_login = mysqli_query($con,$query1);
$error= mysqli_num_rows($result_login);

if($error > 0) {
    $form = false;
    echo "Email is Already Exist! Please try again.";  
}else
     {   $query = "INSERT into `users` (firstname,lastname,username, password, email, trn_date) VALUES ('$firstname','$lastname','$username', '".md5($password)."', '$email', '$trn_date')";
        $result = mysqli_query($con,$query); 
        if($result){
            echo "<div class='form'><h3>You are registered successfully.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
      }
        }

    }else{

?>
<div class="register-box">
<div class="form">
<h1>Registration</h1>
<form name="registration" action="" method="post">

<p><input type="text" name="firstname" id="form_fname" placeholder="First Name" required />
<span class="error_form" id="fname_error_message"></span></p>

<p><input type="text" name="lastname" id="form_lname" placeholder="Last name" required />
<span class="error_form" id="lname_error_message"></span></p>
				
<p><input type="text" name="username" id="form_uname" placeholder="Username" required />
<span class="error_form" id="uname_error_message"></span></p>

<p><input type="email" name="email" id="form_email" placeholder="Email" required />
<span class="error_form" id="email_error_message"></span></p>

<p><input type="password" name="password" id="form_password" placeholder="Password" required />
<span class="error_form" id="password_error_message"></span></p>
<p><input type="submit" name="submit" value="Register" /></p>
</form>
</div>
<script type="text/javascript">
      $(function() {

         $("#fname_error_message").hide();
         $("#lname_error_message").hide();
         $("#email_error_message").hide();
         $("#password_error_message").hide();
         $("#retype_password_error_message").hide();

         var error_fname = false;
         var error_lname = false;
         var error_email = false;
         var error_password = false;
         var error_retype_password = false;

         $("#form_fname").focusout(function(){
            check_fname();
         });
         $("#form_lname").focusout(function() {
            check_lname();
         });
         $("#form_uname").focusout(function() {
            check_uname();
         });
         $("#form_email").focusout(function() {
            check_email();
         });
         $("#form_password").focusout(function() {
            check_password();
         });

         function check_fname() {
            var pattern = /^[a-zA-Z]*$/;
            var fname = $("#form_fname").val();
            if (pattern.test(fname) && fname !== '') {
               $("#fname_error_message").hide();
               $("#form_fname").css("border-bottom","2px solid #34F458");
            } else {
               $("#fname_error_message").html("Should contain only Characters");
               $("#fname_error_message").show();
               $("#form_fname").css("border-bottom","2px solid #F90A0A");
               error_fname = true;
            }
         }

         function check_lname() {
            var pattern = /^[a-zA-Z]*$/;
            var lname = $("#form_lname").val()
            if (pattern.test(lname) && lname !== '') {
               $("#lname_error_message").hide();
               $("#form_lname").css("border-bottom","2px solid #34F458");
            } else {
               $("#lname_error_message").html("Should contain only Characters");
               $("#lname_error_message").show();
               $("#form_lname").css("border-bottom","2px solid #F90A0A");
               error_fname = true;
            }
         }
function check_uname() {
            var pattern = /^[a-zA-Z]*$/;
            var uname = $("#form_uname").val()
            if (pattern.test(uname) && uname !== '') {
               $("#uname_error_message").hide();
               $("#form_uname").css("border-bottom","2px solid #34F458");
            } else {
               $("#uname_error_message").html("Should contain only Characters");
               $("#uname_error_message").show();
               $("#form_uname").css("border-bottom","2px solid #F90A0A");
               error_fname = true;
            }
         }
         function check_password() {
            var password_length = $("#form_password").val().length;
            if (password_length < 5) {
               $("#password_error_message").html("Atleast 5 Characters");
               $("#password_error_message").show();
               $("#form_password").css("border-bottom","2px solid #F90A0A");
               error_password = true;
            } else {
               $("#password_error_message").hide();
               $("#form_password").css("border-bottom","2px solid #34F458");
            }
         }

         function check_email() {
            var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            var email = $("#form_email").val();
            if (pattern.test(email) && email !== '') {
               $("#email_error_message").hide();
               $("#form_email").css("border-bottom","2px solid #34F458");
            } else {
               $("#email_error_message").html("Invalid Email");
               $("#email_error_message").show();
               $("#form_email").css("border-bottom","2px solid #F90A0A");
               error_email = true;
            }
         }

         $("#registration").submit(function() {
            error_fname = false;
            error_lname = false;
            error_email = false;
            error_password = false;
            error_retype_password = false;

            check_fname();
            check_lname();
            check_email();
            check_password();
            check_retype_password();

            if (error_fname === false && error_lname === false && error_email === false && error_password === false && error_retype_password === false) {
               alert("Registration Successfull");
               return true;
            } else {
               alert("Please Fill the form Correctly");
               return false;
            }


         });
      });
   </script>
<div class='form'>Already registered? Click here to <a href='login.php'>Login</a></div>
<?php } ?>
</body>
</html>
