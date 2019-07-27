<?php

session_start();
include('connection.php');
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $id = $_GET['id'];
$sql = "DELETE FROM datatable WHERE id='$id'";

if (mysqli_query($conn, $sql)) {
      ?>
                        <script>window.location="loggedin.php";</script>  
    <?php
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}



?>