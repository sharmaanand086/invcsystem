<?php
session_start();
if(!isset($_SESSION['id']))
{
	header("location: index.php");	
}
else
{
	require("connect.php");
	$eid = $_GET['id']; 
	$res = mysqli_fetch_assoc($conn->query("SELECT * FROM invoicesystem where id ='$eid'"));
  
  $name = $res['name'];
  $phone = $res['phone']; 
  $gstnumber = $res['gstnumber'];
  $taxtype = $res['taxtype'];
 $place =$res['place'];
 $email = $res['tag'];
 $productname = $res['product'];
 $price = $res['price'];
 $typeofgst= $res['typeofgst'];
 $igst = $res['igst18%'];
 $cgst=$res['cgst9'];
 $sgst = $res['sgst9'];
 $totamt = $res['totamt'];
 $invoicenumber =$res['invoicenumber'];
  $invoicedate =$res['invoicedate'];

 if($typeofgst==0){
      $SGST= 0;
      $CGST= 0;
      $totamt = $price + (int)$SGST+(int)$CGST;
  }
if($typeofgst==1){
      $SGST= $price*9/100;
       $CGST= $price*9/100;
       $totamt = $price + (int)$SGST+(int)$CGST;
  }
  
  if($typeofgst==2){
       $SGST= $price*18/100;
       $CGST= 0;
      $totamt = $price + (int)$SGST+(int)$CGST;
  }
 $time = date('i');
 $date = date("Ymd");
 $date1 = date("Y-m-d");
 
    $date = $date1;
     $year = date('Y', strtotime($date));
     $month = date('m', strtotime($date));
     $day = date('d',strtotime($date));
    $ogdate = "$month $day, $year";

 $main = "SELECT invoicenumber FROM `invoicesystem`";
 $result=mysqli_query($conn,$main);
  
 function fetch_customer_data()
{
    
  $name = $_POST['name'];
  $phone = $_POST['phone']; 
  $gstnumber = $_POST['gstnumber'];
  $taxtype = $_POST['taxtype'];
 $place =$_POST['place'];
 $email = $_POST['tag'];
 $productname = $_POST['productname'];
 $price = $_POST['price'];
 $typeofgst= $_POST['typeofgst'];
 $igst = $_POST['igst18%'];
 $cgst=$_POST['cgst9'];
 $sgst = $_POST['sgst9'];
 $totamt = $_POST['totamt'];
 $invoicenumber =$_POST['invoicenumber'];
 
 
    if($typeofgst==0){
      $SGST= 0;
      $CGST= 0;
      $totamt = $price + (int)$SGST+(int)$CGST;
      $ifigsttype .='';
  }
  
if($typeofgst==1){
      $SGST= $price*9/100;
       $CGST= $price*9/100;
       $totamt = $price + (int)$SGST+(int)$CGST;
      
        $ifigsttype .='
          		  <tr>
			<td colspan="2" class="blank"> </td>
			<td colspan="2" class="blank"> </td>
			
		    <td colspan="2" class="total-line"  style="border: 1px solid;"><p id="paid" style="width: 65px;height: 22px;" >	SGST(9%)</p></td>
		    <td class="total-value"  style="border: 1px solid;text-align:center;"><p id="paid">Rs.'.$SGST.'</p></td>
		</tr>
			<tr>
			<td colspan="2" class="blank"> </td>
			<td colspan="2" class="blank"> </td>
		
		    <td colspan="2" class="total-line"  style="border: 1px solid;"><p id="paid" style="width: 65px;height: 22px;">CGST(9%)</p></td>
		    <td class="total-value"  style="border: 1px solid;text-align:center;"><p id="paid">Rs.'.$CGST.'</p></td>
		</tr>';
  }
  
  if($typeofgst==2){
       $IGST= $price*18/100;
       $CGST= 0;
      $totamt = $price + (int)$IGST+(int)$CGST;
       $ifigsttype .=' <tr>
    			<td colspan="2" class="blank"> </td>
    			<td colspan="2" class="blank"> </td>
    		    <td colspan="2" class="total-line"  style="border: 1px solid;"><p id="paid" style="width: 65px;height: 22px;" >IGST(18%)</p></td>
		        <td class="total-value"  style="border: 1px solid;text-align:center;"><p id="paid">Rs.'.$IGST.'</p></td>
		    </tr>';
  }
  
     if($taxtype==T){
         $invoicenumber =$res['invoicenumber'];
    }
   
     if($taxtype==P){
         $invoicenumber = $res['invoicenumber'];
    }
    if($productname == "Speak to fortune "){
	         $app = new iSDK; 
            	if ($app->cfgCon("connectionName")) 
            {
                 $contactId = $app->addWithDupCheck(array('FirstName' => $name, 'Email' => $email,'Phone1' => $phone), 'Email');
                	$_SESSION["contactId"]	= 	$contactId;
                	
                	$groupId1 = 14651;			// Success payment Tag
            		$result5 = $app->grpAssign($contactId, $groupId1);
            }
	       
	          $stf= '<img src="images/stf.png" style="width:20%;">
	        	<p style="width:100%;text-align:center;font-size:24px;border-bottom: 1px solid #000;height: 35px;">Speak To a Fortune-Invoice	</p>';
	        
	    }if($productname == "Coach To a Fortune "){
	        $app = new iSDK; 
            	if ($app->cfgCon("connectionName")) 
            {
                 $contactId = $app->addWithDupCheck(array('FirstName' => $name, 'Email' => $email,'Phone1' => $phone), 'Email');
                	$_SESSION["contactId"]	= 	$contactId;
                	
                	$groupId1 = 8795;			// Success payment Tag
            		$result5 = $app->grpAssign($contactId, $groupId1);
            }
	       
	       $stf='<img src="images/CoachToaFortune.jpg" style="width:20%;">
	        	<p style="width:100%;text-align:center;font-size:24px;border-bottom: 1px solid #000;height: 35px;">Coach To a Fortune-Invoice	</p>';
	    
	    }
	      if($productname == "Incredible You"){
	       $app = new iSDK; 
            	if ($app->cfgCon("connectionName")) 
            {
                    $contactId = $app->addWithDupCheck(array('FirstName' => $name, 'Email' => $email,'Phone1' => $phone), 'Email');
                	$_SESSION["contactId"]	= 	$contactId;
                	
                	$groupId1 = 14951;			// Success payment Tag
            		$result5 = $app->grpAssign($contactId, $groupId1);
            	       $stf='<img src="images/Hello_2019_07_08_11_23_37.jpg" style="width:20%;">
            	        	<p style="width:100%;text-align:center;font-size:24px;border-bottom: 1px solid #000;height: 35px;">Incredible you-Invoice	</p>';
            }
	    }
	      if($productname == "Mastermind Meet"){
	       
	       $stf='<img src="images/mastermindlogo.png" style="width:20%;">
	        	<p style="width:100%;text-align:center;font-size:24px;border-bottom: 1px solid #000;height: 35px;">Mastermind Meet-Invoice	</p>';
	    
	    }
	    
	     $displaygstnum='';
	    if($taxtype==T){
          $displaygstnum .='GSTIN-'.$gstnumber.'';
          }  
  $eid = $_GET['id']; 
  $newdateandinvoiceno = mysqli_fetch_assoc($conn->query("SELECT * FROM invoicesystem where id ='$eid'"));
  $newdatea1 = $newdateandinvoiceno['invoicedate'];
   $invid = $newdateandinvoiceno['invoicenumber'];
    
$output = '<html>
  <head>
<style>#items {
    clear: both;
    width: 100%;
    margin: 10px 0 0 0;
    border: 1px solid black;
}
.itemrow{
border-right: 1px solid black;
    border-bottom: 1px solid black;}
.itemrow1{
border-right: 1px solid black;
border-top: 1px solid black;
border-left: 1px solid black;
  }
  </style>
  </head>
  <body cz-shortcut-listen="true">
	<div id="page-wrap">
	<div style="text-align:center;padding: 18px 5px;">
		'.$stf.'
	 
	</div>
	<table id="mainTable" style="width: 800px;">
		<tbody>
		<tr>
			<td style="font-family: Tahoma, Arial, Verdana, sans-serif;font-size:
			12px;color: #000000;">
			<table style="width: 100%;">
				<tbody>
				<tr>
					<td nowrap="nowrap" style="font-family: Tahoma, Arial, Verdana, sans-serif;font-size: 12px;color: #000000;">
						<p style="height: 60px;width: 100%;">SMASHX STRATEGIES PRIVATE LIMITED<br>
B-1,003 Chandivali Farm Road, Powai,<br>
Chandivali, Yadav Nagar, Mumbai,<br>
Maharashtra 400072<br>
India<br>
GST:27AAZCS3006J1ZW<br>
PAN : ABC235DEFG<br>
						</p><br>
					</td>
					<td align="right" valign="top" style="font-family: Tahoma,Arial, Verdana, sans-serif;font-size: 12px;color: #000000;">
						<!--<h1><textarea style="margin: 1px;color: #000000;">Invoice</textarea></h1>-->
						<table cellpadding="5" cellspacing="0" id="infoTable" style="border: 2px solid #000000;">
						<tbody>
							<tr>
								<td class="info" style="font-size: 12px;color: #000000;text-align: center;border: 2px solid #000000;">Date</td>
								<td class="info" style="font-size: 12px;color: #000000;text-align:center;border: 2px solid #000000;">Invoice No. #</td>
							</tr>
							<tr>
								<td class="info" style="padding:3px;font-size: 12px;color: #000000;text-align: center;border: 2px solid #000000;">
									<p id="date" style="text-align: center; margin-top: 0px; margin-bottom: 0px; height: 31px;">'.$newdatea1.'</p>
								</td>
								<td class="info" style="padding:3px;font-size: 12px;color: #000000;text-align:center;border: 2px solid #000000;">
									<p style="text-align:center;margin-top: 0px; margin-bottom: 0px; height: 31px;">'.$invid.'</p>
								</td>
							</tr>
						</tbody>
						</table>
					</td>
				</tr>
                </tbody>
            </table>
            </td>
        </tr>
        <tr>
            <td class="spacer" style="font-family: Tahoma, Arial, Verdana,sans-serif;font-size: 12px;color: #000000;height: 15px;"></td>
        </tr>
        <tr>
            <td style="font-family: Tahoma, Arial, Verdana, sans-serif;font-size:12px;color: #000000;">
                <table cellpadding="0" cellspacing="0" style="width: 100%;">
                    <tbody>
                        <tr>
                          <td width="200" style="font-family: Tahoma, Arial, Verdana,sans-serif;font-size: 12px;color: #000000;">TO:</td>
						   
                        </tr>
                    </tbody>
                </table>
                <table style="width: 100%;">
                    <tbody>
                        <tr>
							<td width="50%" style="font-family: Tahoma, Arial, Verdana,sans-serif;font-size: 12px;color: #000000;">
								<p style="height: 60px;width: 100%;">'.$name.'<br>
'.$email.'<br>
'.$phone.'<br>
 '.$displaygstnum.'<br>
 '.$place.'
 
								</p>
							</td>
							 
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>                           
		</tbody>
	</table>
	<table id="items" style="border: 1px solid black;width: 100%;">
		<tbody><tr style="text-align: center;">
		    <th style="border: 1px solid;">Item</th>
		      <th style="border: 1px solid;">Description</th>
    		    <th style="border: 1px solid;">HSN/SAC</th>
    		    <th style="border: 1px solid;">Quantity</th>
		    
		    <th colspan="3" style="border: 1px solid;">Amount</th>
		</tr>
		<tr class="item-row">

			<td class="item-name"><div class="delete-wpr"><p>'.$_POST['productname'].'</p></div></td>
				<td class="item-name"><div class="delete-wpr"><p> '.$_POST['productname'].' Program By Arfeen Khan </p></div></td>
			<td class="description"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;999293</p></td>
			<td class="description"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1</p></td>
			
			<td colspan="3" style="text-align-last: start;"><p class="price" style="text-align:right;">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rs.'.$price.'</p></td>
		</tr>
		 
	
		<tr id="hiderow">
		    <td colspan="8"  style="border-top: 1px solid;padding: 0;"></td>
		</tr>
		<tr>
			<td colspan="2" class="blank"> </td>
				<td colspan="2" class="blank"> </td>
		    <td colspan="2" class="total-line"  style="border: 1px solid;">Amount</td>
		    <td class="total-value" style="border: 1px solid;text-align:center;"><p id="paid"  >Rs.'.$price.'</p></td>
		</tr>
	'.$ifigsttype.'
 
		<tr>
			<td colspan="2" class="blank"> </td>
				<td colspan="2" class="blank"> </td>
		    <td colspan="2" class="total-line"  style="border: 1px solid;">Total Amount</td>
		    <td class="total-value"  style="border: 1px solid;text-align:center;"><p id="paid">Rs.'. $totamt.'</p></td>
		</tr>
		<tr>
		    <td colspan="2" class="blank"> </td>
		    	<td colspan="2" class="blank"> </td>
		    <td colspan="2" class="total-line"  style="border: 1px solid;">Amount Paid</td>
			<td class="total-value"  style="border: 1px solid;text-align:center;"><p id="paid">Rs.'. $totamt.'</p></td>
		</tr>
	</tbody></table>
		<div style="float:left;padding: 50px 5px 5px 5px;">
			<h4>Company\'s Bank Details</h4>
  
<table>
 
  <tr>
    <td>Bank Name </td>
    <td><B>: G P PARSIK SAHAKARI BANK LTD</B></td>
    
  </tr>
  <tr>
    <td>A/c No. </td>
    <td><B>: 050011300000074</B></td>
    
  </tr>
  <tr>
      <td>Branch and IFS code </td>
      <td><B>: PJSB0000044</B></td>
  </tr>
</table>

		</div>
		<div style="clear:both;" <="" div="">
			<div style="font-weight:500;font-size:12px;text-align:center;padding: 10px 0 2px 0;border-top: 1px solid #000;">Note : Money is non-refundable.</div>
			<div style="font-weight:800;font-size:14px;text-align:center;">This is computer generated invoice No Signature Required</div>
	</div>
</div></body></html>';
  
 
 return $output;
}
 
 
 
	$error = ""; 
	$eid = $_REQUEST['id'];
	if(isset($_POST['editinvoice']))
	{
	    
include('pdf.php');
 $file_name = 'updatedpdf/'.md5(rand()).'.pdf';
 $html_code = ' ';
 $html_code .= fetch_customer_data();
 $pdf = new Pdf();
 $pdf->load_html($html_code);
 $pdf->render();
 $file = $pdf->output();
 $dir = "invoicepdf"; 
 file_put_contents($file_name , $file);
 move_uploaded_file($file_name, "$dir".$file);
 
 $date = $_POST['invoicedate'];
  $name = $_POST['name'];
  $phone = $_POST['phone']; 
  $gstnumber = $_POST['gstnumber'];
  $email = $_POST['tag'];
  $place = $_POST['place'];
  $price = $_POST['price'];
  $sgst = $_POST['sgst9'];
   $cgst = $_POST['cgst9'];
    $igst = $_POST['igst18%'];
    $totamt =$_POST['totamt'];
  $updatedat=date('Y-m-d H:i:s');
  

		$pro1 = $conn->query("UPDATE `invoicesystem` SET  `invoicedate`='$date',`name`='$name',`tag`=' $email',`phone`='$phone',`gstnumber`='$gstnumber', `place`='$place',`price`='$price',
 `updatedat`='$updatedat',`igst18%`='$igst',`sgst9`='$sgst',`cgst9`='$cgst',`totamt`='$totamt'  WHERE id='$eid'");
		if($pro1 == 1)
		{
			$error = " Invoice updated successfully.";
		}
		else
		{
			$error = " Invoice problem occurred while updating.";
		}
	}
}
?>

 
<!DOCTYPE html>
<html class="no-js">
  <head>
<style>#items {
    clear: both;
    width: 100%;
    margin: 10px 0 0 0;
    border: 1px solid black;
}
.itemrow{
border-right: 1px solid black;
    border-bottom: 1px solid black;}
.itemrow1{
border-right: 1px solid black;
border-top: 1px solid black;
border-left: 1px solid black;
  }
  </style>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
	<script type="text/javascript">
		window.onunload = function(){
			window.opener.location.reload();
		};
    </script>
  </head>
  <body cz-shortcut-listen="true">
        <form action=""  id ="myForm" method="POST">
          
              
      <div class="container">
          	<center>
		<span class = "error"><?php echo $error; ?></span>
	</center>
	<div id="page-wrap">
	<div style="text-align:center;padding: 18px 5px;">
	  <?php
	    if($productname == "Speak to fortune "){
	        
	        ?>
	        <img src="../images/smashxLogo.jpg" style="width:20%;">
	        	<p style="width:100%;text-align:center;font-size:24px;border-bottom: 1px solid #000;height: 35px;"> <?php if($taxtype==T){ ?> Tax <?php } ?><?php if($taxtype==P){ ?> Proforma <?php } ?>Invoice	</p>
	        <?php
	    }
	    if($productname == "Coach To a Fortune "){
	        ?>
	        <img src="../images/smashxLogo.jpg" style="width:20%;">
	        	<p style="width:100%;text-align:center;font-size:24px;border-bottom: 1px solid #000;height: 35px;"> <?php if($taxtype==T){ ?> Tax <?php } ?><?php if($taxtype==P){ ?> Proforma <?php } ?>Invoice	</p>
	        <?php
	    }
	     if($productname == "Incredible You"){
	        ?>
	         <img src="../images/smashxLogo.jpg  " style="width:20%;">
	        	<p style="width:100%;text-align:center;font-size:24px;border-bottom: 1px solid #000;height: 35px;"> <?php if($taxtype==T){ ?> Tax <?php } ?><?php if($taxtype==P){ ?> Proforma <?php } ?>Invoice	</p>
	        <?php
	    }
	    if($productname == "Mastermind Meet"){
	        ?>
	         <img src="../images/smashxLogo.jpg  " style="width:20%;">
	        	<p style="width:100%;text-align:center;font-size:24px;border-bottom: 1px solid #000;height: 35px;"> <?php if($taxtype==T){ ?> Tax <?php } ?><?php if($taxtype==P){ ?> Proforma <?php } ?>Invoice	</p>
	        <?php
	    }
	      
	    ?>
	</div>
	<table id="mainTable" style="width: 800px;">
		<tbody>
		<tr>
			<td style="font-family: Tahoma, Arial, Verdana, sans-serif;font-size:
			12px;color: #000000;">
			<table style="width: 100%;">
				<tbody>
				<tr>
					<td nowrap="nowrap" style="font-family: Tahoma, Arial, Verdana, sans-serif;font-size: 12px;color: #000000;">
						<p style="height: 60px;width: 100%;    margin-top: 0;    margin-bottom: 3rem;">SMASHX STRATEGIES PRIVATE LIMITED<br>
B-1,003 Chandivali Farm Road, Powai,<br>
Chandivali, Yadav Nagar, Mumbai,<br>
Maharashtra 400072<br>
India<br>
GST:27AAZCS3006J1ZW<br>
PAN : ABC235DEFG<br>
						</p>
					</td> <br><br>
					<td align="right" valign="top" style="font-family: Tahoma,Arial, Verdana, sans-serif;font-size: 12px;color: #000000;">
						<table cellpadding="5" cellspacing="0" id="infoTable" style="border: 2px solid #000000;">
						<tbody>
							<tr>
								<td class="info" style="font-size: 12px;color: #000000;text-align: center;border: 2px solid #000000;">Date</td>
								<td class="info" style="font-size: 12px;color: #000000;text-align:center;border: 2px solid #000000;">Invoice No. #</td>
							</tr>
							<tr>
								<td class="info" style="padding:3px;font-size: 12px;color: #000000;text-align: center;border: 2px solid #000000;">
									<p id="date" style="text-align: center; margin-top: 0px; margin-bottom: 0px; height: 31px;"><input type="text" id="update" name="invoicedate" value="<?php echo $invoicedate ?>"></p>
								</td>
								<td class="info" style="padding:3px;font-size: 12px;color: #000000;text-align:center;border: 2px solid #000000;">
									<p style="text-align:center;margin-top: 0px; margin-bottom: 0px; height: 31px;"><?php echo $invoicenumber; ?></p>
									
								</td>
							</tr>
						</tbody>
						</table>
					</td>
				</tr>
                </tbody>
            </table>
            </td>
        </tr>
        <tr>
            <td class="spacer" style="font-family: Tahoma, Arial, Verdana,sans-serif;font-size: 12px;color: #000000;height: 15px;"></td>
        </tr>
        <tr>
            <td style="font-family: Tahoma, Arial, Verdana, sans-serif;font-size:12px;color: #000000;">
                <table cellpadding="0" cellspacing="0" style="width: 100%;">
                    <tbody>
                        <tr>
                          <td width="200" style="font-family: Tahoma, Arial, Verdana,sans-serif;font-size: 12px;color: #000000;">TO:</td>
						   
                        </tr>
                    </tbody>
                </table>
              
                <table style="width: 100%;">
                    <tbody>
                        <tr>
							<td width="50%" style="font-family: Tahoma, Arial, Verdana,sans-serif;font-size: 12px;color: #000000;">
								<p style="height: 60px;width: 100%;">
<input type="text" id="updname" name="name" value="<?php echo $name ?>"><br>
<input type="text" id="updemail" name="tag" value="<?php echo $email ?>"><br>
<input type="text" id="updphone" name="phone" value="<?php echo $phone ?>"><br>
<?php if($taxtype==T){
    ?>
     GSTIN-<input type="text" id="updgstnumber" name="gstnumber" value="<?php echo$gstnumber?>">
    <?php } ?><br>
    <input type="text" id="place" name="place" value="<?php echo $place ?>"><br>

								</p>
							</td>
							 
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>                           
		</tbody>
	</table><br><br> 
	<table id="items" style="border: 1px solid black;width: 100%;">
		<tbody><tr style="text-align:center">
		    <th style="border: 1px solid;">Item</th>
		     <th style="border: 1px solid;">Description</th>
		    <th style="border: 1px solid;">HSN/SAC</th>
		    <th style="border: 1px solid;">Quantity</th>
		    
		    <th colspan="3" style="border: 1px solid;">Amount</th>
		</tr>
		<tr class="item-row">
			<td class="item-name"><div class="delete-wpr"><p> <?php echo $productname ?> </p></div></td>
			<td class="item-name"><div class="delete-wpr"><p>  <?php echo $productname ?>  Program By Arfeen Khan  </p></div></td>
			<td class="description"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;999293</p></td>
			<td class="description"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1</p></td>
			
			<td colspan="4"  style="text-align-last: start;"><p class="price" style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rs.<input type="text"  id="updprice" name="price" value="<?php echo $price ?>"></p></td>
		</tr>
		 
	
		<tr id="hiderow">
		    <td colspan="8"   style="border-top: 1px solid;padding: 0;"></td>
		</tr>
	 
		<?php 
	if($typeofgst==2){
		    ?>
		    <tr>
			<td colspan="2" class="blank"> </td>
			<td colspan="2" class="blank"> </td>
			
		    <td colspan="2" class="total-line"  style="border: 1px solid;"><p id="paid" style="width: 65px;height: 22px;" >IGST(18%)</p></td>
		    <td class="total-value"  style="border: 1px solid;text-align:center;"><p id="paid">Rs.<input type="text" id="updifigst" name="igst18%" value="<?php echo $SGST ?>"></p></td>
		</tr>
		    <?php	}?>
	
		<?php 
	if($typeofgst==1){
		    ?>
		    <tr>
			<td colspan="2" class="blank"> </td>
			<td colspan="2" class="blank"> </td>
		    <td colspan="2" class="total-line"  style="border: 1px solid;"><p id="paid" style="width: 65px;height: 22px;" >	SGST(9%)</p></td>
		    <td class="total-value"  style="border: 1px solid;text-align:center;"><p id="paid">Rs.<input type="text" id="updifgstsgst" name="sgst9" value="<?php echo $SGST ?>"></p></td>
		</tr>
			<tr>
			<td colspan="2" class="blank"> </td>
			<td colspan="2" class="blank"> </td>
		
		    <td colspan="2" class="total-line"  style="border: 1px solid;"><p id="paid" style="width: 65px;height: 22px;">CGST(9%)</p></td>
		    <td class="total-value"  style="border: 1px solid;text-align:center;"><p id="paid">Rs.<input type="text" id="updifgstcgst" name="cgst9" value="<?php echo $CGST ?>"></p></td>
		</tr>
		    <?php	}?>
	 
		<tr>
			<td colspan="2" class="blank"> </td>
			<td colspan="2" class="blank"> </td>
			
		    <td colspan="2" class="total-line"  style="border: 1px solid;">Total Amount</td>
		    <td class="total-value"  style="border: 1px solid;text-align:center;"><p id="paid">Rs.<input type="text" id="updtotamt" name="totamt" value="<?php echo $totamt ?>"></p></td>
		</tr>
		<tr>
		    <td colspan="2" class="blank"> </td>
		    <td colspan="2" class="blank"> </td>
		   
		    <td colspan="2" class="total-line"  style="border: 1px solid;">Amount Paid</td>
			<td class="total-value"  style="border: 1px solid;text-align:center;"><p id="paid">Rs.<input type="text" id="paidupdamt" value="<?php echo $totamt ?>"></p></td>
		</tr>
	</tbody></table>
		<div style="float:left;padding: 50px 5px 5px 5px;">
		<h6>Company's Bank Details</h6>
  
<table>
 
  <tr>
    <td>Bank Name </td>
    <td><B>: G P PARSIK SAHAKARI BANK LTD</B></td>
    
  </tr>
  <tr>
    <td>A/c No. </td>
    <td><B>: 050011300000074</B></td>
    
  </tr>
  <tr>
      <td>Branch and IFS code </td>
      <td><B>: PJSB0000044</B></td>
  </tr>
</table>
		</div>
		<div style="clear:both;" <="" div="">
	<div style="font-weight:500;font-size:12px;text-align:center;padding: 10px 0 2px 0;border-top: 1px solid #000;">Note : Amount is non-refundable.</div>
			<div style="font-weight:500;font-size:14px;text-align:center;">This is computer generated invoice No Signature Required</div>
	</div>
</div>
         
         <input type="hidden" name="taxtype" value="<?php echo $res['taxtype'];?>">
         <input type="hidden" name="typeofgst" value="<?php echo$res['typeofgst']; ?>">
        <input type="hidden" name="invoicenumber" value="<?php echo $res['invoicenumber']; ?>" >
          <input type="hidden" name="productname" value="<?php echo $res['product']; ?>">
    <input class="btn btn-primary"  type ="submit" name ="editinvoice"  value="Update">
</form>
</div>
</body>
<script>
$(document).ready(function() {
    console.log('dasfas');
 $('input[name=price]').keyup(function(e)
 {
      var mp = $('#updprice').val();
     
      var pigst = mp*18/100;
      var pcgst =  mp*9/100;
      var psgst = mp*9/100;
      console.log(mp);
    var mp1=   document.getElementById('price2').value=mp;
    var igst1=  document.getElementById('updifigst').value=pigst;
    var sgst1= document.getElementById('updifgstsgst').value=psgst;
    var cgst1=  document.getElementById('updifgstcgst').value=pcgst;
      
      var newprice = mp1+igst1+sgst1+cgst1;
      console.log(newprice);
      document.getElementById('updtotamt').value=newprice;
      document.getElementById('paidupdamt').value=newprice;
     
 });
});
</script>
</html>
 