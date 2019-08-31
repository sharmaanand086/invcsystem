<?php
session_start();
require("connect.php");
include("isdk.php");
if(!isset($_SESSION['id']))
{
	header("location: index.php");	
}
else
{
 
	$eid = $_GET['id']; 
 	$res = mysqli_fetch_assoc($conn->query("SELECT * FROM invoicesystem where id ='$eid'"));
 	
       include'/home/dsfgsdgsdg/var/www/html/invoicesystem/logs.php';
       $emailsss = $_SESSION["email"];
       $message = "edit invoice id $eid with logged in  $emailsss";
       write_mysql_log($message, $conn);
