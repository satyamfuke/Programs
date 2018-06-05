
<?php
//to Start Session
session_start();
//Check Authentication
if(!isset($_SESSION["post_title"])){
header("Location: login.php");
exit(); }
?>
