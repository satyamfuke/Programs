
<?php
//to Start Session
session_start();
//Check Authentication
if(!isset($_SESSION["username"])){
header("Location: login.php");
exit(); }
?>
