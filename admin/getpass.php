<?php
session_start();
$conn = mysqli_connect('localhost', 'world_hello', 'Mumbai@123', 'stftitle');
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $pass  = $_POST['pass'];
  $email = $_POST['email'];
  $sql="SELECT * FROM `invoicesysAdmin` WHERE email='$email' AND password='$pass'";
 $rs = mysqli_query($conn,$sql);
                   $rowcount=mysqli_num_rows($rs);
                  // var_dump($rowcount);
                    if($rowcount > 0)
                     {
                $check2 ="SELECT * FROM `invoicesysAdmin` WHERE email='$email'";
                 $rs2 = mysqli_query($conn,$check2);
                 $result = mysqli_fetch_assoc($rs2);
                 $id = $result['id'];
                 $_SESSION["id"] = $id;
                     echo '1';
                      }else{
                        echo '0';
                      }