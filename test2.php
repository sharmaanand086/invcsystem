<?php

$conn = mysqli_connect('localhost', 'world_hello', 'Mumbai@123', 'stftitle');
 $date1 = date("d-m-Y");
 
    $date = $date1;
     $year = date('Y', strtotime($date));
     $month = date('m', strtotime($date));
     $day = date('d',strtotime($date));
    $ogdate = "$month $day, $year";
  
      $lastDayOfThisMonth = cal_days_in_month(CAL_GREGORIAN, $month,  $year); 
   $FD  = $year.'-'.$month.'-'.'01' ;
  //echo $FD."</br>";
    $LD= $year.'-'.$month.'-'.$lastDayOfThisMonth ;
//echo $LD."</br>";

    
       
         $main = "SELECT invoicenumber FROM `invoicesystem1` WHERE `createdat` BETWEEN '$FD' AND '$LD' AND (`taxtype`='ET')";
         echo$main."</br>";
         $result=mysqli_query($conn,$main);
         $rowcount=mysqli_num_rows($result);
        // echo $rowcount;
         $num_padded = sprintf("%06d", $rowcount);
         $nummm = str_pad(intval($num_padded) + 1, strlen($num_padded), '0', STR_PAD_LEFT);
         $invoicenumber = $year."/".$month."/".$taxtype."$nummm";
         echo $invoicenumber;