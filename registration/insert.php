<?php
require('db.php');
include("auth.php");

$status = "";
if(isset($_POST['new']) && $_POST['new']==1){
    
   $firstname = stripslashes($_REQUEST['firstname']); // removes backslashes
        $firstname = mysqli_real_escape_string($con,$firstname);
$lastname = stripslashes($_REQUEST['lastname']); // removes backslashes
        $lastname = mysqli_real_escape_string($con,$lastname);
$username = stripslashes($_REQUEST['username']); // removes backslashes
        $username = mysqli_real_escape_string($con,$username);
$email = stripslashes($_REQUEST['email']); // removes backslashes
        $email = mysqli_real_escape_string($con,$email);
    $password = $_REQUEST["password"];
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
    $query = "INSERT into `users` (firstname,lastname,username, password, email, trn_date) VALUES ('$firstname','$lastname','$username', '".md5($password)."', '$email', '$trn_date')";
    mysqli_query($con,$query)
    or die(mysql_error());
    $status = "New Record Inserted Successfully.
    </br></br><a href='view.php'>View Inserted Record</a>";
}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert New Record</title>
<link rel="stylesheet" href="css/style.css" />
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
</head>
<div>
<style>
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
body
    {
        background: url(images/college.jpg) no-repeat center fixed;
        background-size: cover;
    }
</style>
<body>
<div class="nav">
<ul>
<p><li><a href="dashboard.php">Dashboard</a></li> 
<li><a href="view.php">View Records</a></li> 
<li><a href="logout.php">Logout</a></p></li>
</p></ul>
<div class="insert">
<h1>Insert New Record</h1>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />

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
<p><input type="submit" name="submit" value="Submit" /></p>
</form>
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
<p style="color:#67cc08;"><?php echo $status; ?></p>
</div>
</div>
</div>
</body>
</html>