<?php 

session_start();
include('connection.php');
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
   $id = $_POST['id'];
   $pass  = $_POST['city'];
   $date = $_POST['date'];
   $time = $_POST['time'];
   $tagno = $_POST['tag_number'];
   $sql="UPDATE `datatable` SET  `date`='$date',`city`='$pass',`time`='$time',`tagno`='$tagno' WHERE id='$id'";
   
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