<?php 

session_start();
include('connection.php');
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
   $pass  = $_POST['city'];
   $date = $_POST['date'];
   $time = $_POST['time'];
   $tagno = $_POST['tag_number'];
   $sql="INSERT INTO `datatable`(`id`, `date`, `city`, `time`, `tagno`) VALUES ('','$date','$pass','$time','$tagno')";
   
   $rs = mysqli_query($conn,$sql);
                  
                    if($rs == TRUE)
                     {
                         ?>
                        <script>window.location="loggedin.php";</script>  
                         <?php
                     echo '1';
                      }else{
                            ?>
                        <script>window.location="addcitydetail.php";</script>  
                         <?php
                        echo '0';
                      }
                      
                      ?>