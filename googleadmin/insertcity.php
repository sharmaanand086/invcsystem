<?php 

session_start();
include('connection.php');
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
   $pass  = $_POST['city'];
   $sql="SELECT * FROM `datatablecity` WHERE city='$pass'";
   $rs = mysqli_query($conn,$sql);
                   $rowcount=mysqli_num_rows($rs);
                    if($rowcount > 0)
                     {
                     echo '1';
                      }else{
                          $sql1="INSERT INTO `datatablecity`( `city`) VALUES('$pass')";
                          $rs1 = mysqli_query($conn,$sql1);
                        echo '0';
                      }
                      
                      ?>