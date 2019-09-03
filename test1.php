<?php

$name = $_POST["name"]; 

echo $name;


$date1 = date("d-m-Y");
 
     $date = $date1;
     $year = date('Y', strtotime($date));
     $month = date('m', strtotime($date));
     $day = date('d',strtotime($date));
     $ogdate = "$month $day, $year";
     $lastDayOfThisMonth = cal_days_in_month(CAL_GREGORIAN, $month,  $year); // 31
    echo'Total days  in current month '.$lastDayOfThisMonth.'</br>';      
      $currentDayOfMonth=date('j');
    echo'current days  of this month '.$currentDayOfMonth.'</br>';
      $remaningdays = ($lastDayOfThisMonth )- ($currentDayOfMonth);
    echo'remaningdays   of this month '.$remaningdays.'</br>';

if($lastDayOfThisMonth == $currentDayOfMonth){
  echo 'Last day of month';
  
        $nummm = str_pad(intval($num_padded) + 1, strlen($num_padded), '0', STR_PAD_LEFT);
        //echo $invoicenumber = $year."/".$month."/".$taxtype."/$nummm<br>";
}else{
  echo 'Not last day of the month<br>';
  $num_padded==0;
   $nummm = str_pad(intval($num_padded) + 1, strlen($num_padded), '0', STR_PAD_LEFT);
       echo  $invoicenumber = $year."/".$month."/".$taxtype."/$nummm<br>";
}
?>
?>