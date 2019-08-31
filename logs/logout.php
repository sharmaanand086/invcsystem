<?php
session_start();

include'/home/huyahmajfaz2/public_html/invoicesystem/logs.php';
$email = $_SESSION["email"];
$message = "logout with  $email " ;
write_mysql_log($message,$conn);  

unset($_SESSION["id"]);
unset($_SESSION["name"]);
header("Location:index.php");
?>