<h1 style="text-align: center;text-transform: capitalize;">Thank you You will received email</h1> 
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
<script> 

$(document).ready(function () {
    // Handler for .ready() called.
    window.setTimeout(function () {
        location.href = "http://magicconversion.com/invoicesystem";
    }, 1000);
});

</script> 

<?php 
 
include("isdk.php");
session_start();  
require_once('class.phpmailer.php'); 
   
$message = '';
function fetch_customer_data()
{  
 
  $name = $_POST['name'];
  $phone = $_POST['phone']; 
  $gstnumber = $_POST['gstnumber'];
  $taxtype = $_POST['taxtype'];
 $place =$_POST['place'];
 $email = $_POST['tag'];
 $productname = $_POST['product'];
 $price = $_POST['price'];
 $typeofgst= $_POST['typeofgst'];
 $invoicenumberplus = $_POST['invoicenumber'];
 $CGST = $_POST['CGST'];
 $SGST = $_POST['SGST'];
$IGST = $_POST['IGST'];
$invoicedate =$_POST['invoicedate'];
$amountword = $_POST['amountword'];
 $ifigsttype='';
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
 $time = date('i');
 $date = date("Ymd");
 $date1 = date("d-m-Y");

    $date = $date1;
     $year = date('Y', strtotime($date));
     $month = date('m', strtotime($date));
     $day = date('d',strtotime($date));
    $ogdate = "$month $day, $year";
    
    if($taxtype==T){
         $invoicenumber =$invoicenumberplus;
    }
   
     if($taxtype==P){
         $invoicenumber = $invoicenumberplus;
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
	       $TT1='';
	    if($taxtype==T){
          $TT1 .=' Tax Invoice';
          } 
           
	    if($taxtype==P){
          $TT1 .='Proforma Invoice';
          } 
	          $stf= ' <img src="images/smashxLogo.jpg" style="width:20%;">
	        	<p style="width:100%;text-align:center;font-size:24px;border-bottom: 1px solid #000;height: 35px;"> '.$TT1.'	</p>';
	        
	    }if($productname == "Coach To a Fortune "){
	        $app = new iSDK; 
            	if ($app->cfgCon("connectionName")) 
            {
                 $contactId = $app->addWithDupCheck(array('FirstName' => $name, 'Email' => $email,'Phone1' => $phone), 'Email');
                	$_SESSION["contactId"]	= 	$contactId;
                	
                	$groupId1 = 8795;			// Success payment Tag
            		$result5 = $app->grpAssign($contactId, $groupId1);
            }
	           $TT2='';
	    if($taxtype==T){
          $TT2 .=' Tax Invoice';
          } 
          
	    if($taxtype==P){
          $TT2 .=' Proforma Invoice';
          }
	       $stf=' <img src="images/smashxLogo.jpg" style="width:20%;">
	        	<p style="width:100%;text-align:center;font-size:24px;border-bottom: 1px solid #000;height: 35px;"> '.$TT2.'	</p>';
	    
	    }
	      if($productname == "Incredible You"){
	       $app = new iSDK; 
            	if ($app->cfgCon("connectionName")) 
            {
                    $contactId = $app->addWithDupCheck(array('FirstName' => $name, 'Email' => $email,'Phone1' => $phone), 'Email');
                	$_SESSION["contactId"]	= 	$contactId;
                	
                	$groupId1 = 14951;			// Success payment Tag
            		$result5 = $app->grpAssign($contactId, $groupId1);
        $TT3='';
	    if($taxtype==T){
          $TT3 .=' Tax Invoice';
          } 
         
	    if($taxtype==P){
          $TT3 .='Proforma Invoice';
          }
            	       $stf=' <img src="images/smashxLogo.jpg" style="width:20%;">
            	        	<p style="width:100%;text-align:center;font-size:24px;border-bottom: 1px solid #000;height: 35px;">  '.$TT3.'	</p>';
            }
	    }
	      if($productname == "Mastermind Meet"){
	        $TT4='';
	    if($taxtype==T){
          $TT4 .=' Tax Invoice';
          } 
         
	    if($taxtype==P){
          $TT4 .=' Proforma Invoice';
          }
	       $stf=' <img src="images/smashxLogo.jpg" style="width:20%;">
	        	<p style="width:100%;text-align:center;font-size:24px;border-bottom: 1px solid #000;height: 35px;">  '.$TT4.'	</p>';
	    
	    }
	    
	    $displaygstnum='';
	    if($taxtype==T){
          $displaygstnum .='GSTIN-'.$gstnumber.'';
          }  
           $atinvc1='';
           if($taxtype==T){  $atinvc1 = 'Tax';        }
           if($taxtype==P){  $atinvc1 = 'Proforma';   }  
           
           
    
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
PAN : AAZC53006J<br>
						</p><br>
					</td>
					<td align="right" valign="top" style="font-family: Tahoma,Arial, Verdana, sans-serif;font-size: 12px;color: #000000;">
						<!--<h1><textarea style="margin: 1px;color: #000000;">Invoice</textarea></h1>-->
						<table cellpadding="5" cellspacing="0" id="infoTable" style="border: 2px solid #000000;">
						<tbody>
							<tr>
								<td class="info" style="font-size: 12px;color: #000000;text-align: center;border: 2px solid #000000;">Date</td>
								<td class="info" style="font-size: 12px;color: #000000;text-align:center;border: 2px solid #000000;"> Invoice No. #</td>
							</tr>
							<tr>
								<td class="info" style="padding:3px;font-size: 12px;color: #000000;text-align: center;border: 2px solid #000000;">
									<p id="date" style="text-align: center; margin-top: 0px; margin-bottom: 0px; height: 31px;">'.$date1.'</p>
								</td>
								<td class="info" style="padding:3px;font-size: 12px;color: #000000;text-align:center;border: 2px solid #000000;">
									<p style="text-align:center;margin-top: 0px; margin-bottom: 0px; height: 31px;">'.$invoicenumber.'</p>
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
 '.$place.'<br>
 
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
    		    <th style="border: 1px solid;">SAC</th>
    		    <th style="border: 1px solid;">Quantity</th>
		    
		    <th colspan="3" style="border: 1px solid;">Amount</th>
		</tr>
		<tr class="item-row">
			<td class="item-name"><div class="delete-wpr"><p>'.$productname.'</p></div></td>
				<td class="item-name"><div class="delete-wpr"><p> '.$productname.' Program By Arfeen Khan </p></div></td>
			<td class="description"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;999293</p></td>
			<td class="description"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1</p></td>
			
			<td colspan="3" style="text-align-last: start;"><p class="price" style="text-align:right;">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rs.'.$price.'</p></td>
		</tr>
		 
	
		<tr id="hiderow">
		    <td colspan="8" style="border-top: 1px solid;padding: 0;"></td>
		</tr>
 
	'.$ifigsttype.'
 
		<tr>
			<td colspan="2" class="blank"> </td>
				<td colspan="2" class="blank"> </td>
		    <td colspan="2" class="total-line"  style="border: 1px solid;">Total Amount</td>
		    <td class="total-value"  style="border: 1px solid;text-align:center;"><p id="paid">Rs.'. $totamt.'</p></td>
		</tr>
		 
	</tbody></table>
		<div style="float:left;padding: 50px 5px 5px 5px;">
		 	 <h4>Company\'s Bank Details</h4>
  
<table>
 
  <tr>
    <td>Bank Name </td>
    <td><B>: YES BANK </B></td>
    
  </tr>
  <tr>
      <td> BENEFICIARY NAME</td>
      <td><B>: SMASHX STRATEGIES PRIVATE LIMITED</B></td>
  </tr>
  <tr>
    <td>A/c No. </td>
    <td><B>: 042661900000530</B></td>
    
  </tr>
  <tr>
      <td> IFS code </td>
      <td><B>: YESB0000426</B></td>
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

  if(isset($_POST['submit']))
{
     $invoicenumber = $_POST['invoicenumber'];
     $name= $_POST['name'];
 include('pdf.php');
 $file_name = 'pdfs/'.md5(rand()).'.pdf';
 $html_code = ' ';
 $html_code .= fetch_customer_data($connect);
 $pdf = new Pdf();
 $pdf->load_html($html_code);
 $pdf->render();
 $file = $pdf->output();
 $dir = "invoicepdf"; 
 file_put_contents($file_name , $file);
 move_uploaded_file($file_name, "$dir".$file);
	
 $name = $_POST['name'];
  $phone = $_POST['phone']; 
  $gstnumber = $_POST['gstnumber'];
  $taxtype = $_POST['taxtype'];
 $place =$_POST['place'];
 $email = $_POST['tag'];
 $productname = $_POST['product'];
 $price = $_POST['price'];
 $typeofgst= $_POST['typeofgst'];
  $CGST1 = $_POST['CGST'];
  $SGST1 = $_POST['SGST'];
  $IGST1 = $_POST['IGST'];
$totamt= $_POST['totamt'];
$invoicedate =$_POST['invoicedate'];
$createdat=date('Y-m-d H:i:s');
$conn = mysqli_connect('localhost', 'world_hello', 'Mumbai@123', 'stftitle');
 $main = "INSERT INTO `invoicesystem`(`id`, `invoicenumber`, `invoicedate`,`name`, `tag`, `phone`, `gstnumber`, `taxtype`, `place`, `product`, `price`,
 `typeofgst`, `createdat`, `igst18%`, `sgst9`, `cgst9`, `totamt`, `pdf`) VALUES ('','$invoicenumber','$invoicedate','$name','$email','$phone','$gstnumber','$taxtype',
 '$place','$productname','$price','$typeofgst','$createdat','$IGST1','$SGST1','$CGST1','$totamt','$file_name')";
 $results =$conn->query($main);
//var_dump($results)	;
	$mail = new PHPMailer(true); // the true param means it will throw exceptions on     errors, which we need to catch
	$mail->IsSMTP(); // telling the class to use SMTP
	$mail->Host = 'mail.arfeenkhan.com';  // Specify main and backup server
	$mail->Port = '26';
	$mail->SMTPAuth = 'true';                               // Enable SMTP authentication
	$mail->Username = 'arfeenkhan@arfeenkhan.com';                            // SMTP username
	$mail->Password = 'rNX7zSKSCnev';                           // SMTP password
	$mail->SMTPSecure = 'SSL/TLS';

	try 
	{
		$mail->SetFrom('Arfeenkhan@arfeenkhan.com', 'Arfeen Khan');
		//$mail->AddAddress('avisingh.singh2011@gmail.com', '');
		//$mail->AddAddress($arr['Contact.Email'], $arr['Contact.FirstName']);
		$mail->AddAddress('info@arfeenkhan.com', '');
		$mail->AddAddress($email,$name);
		//$mail->AddAddress('bhavesh@arfeenkhan.com', '');
		//$mail->AddAddress('onlinepayment@arfeenkhan.com', '');
                 $mail->AddAttachment($file_name);    
		 $mail->Subject = '  '.$productname.' - Invoice 2019';
		 $mail->Body = 'Hi,<br>Please find the invoice attached with this email for the payment made by you towards  '.$productname.' Program.'; 
                 $mail->IsHTML(true);
		 $mail->Send();
				// window.location.href = 'http://magicconversion.com/test/invoice_sample.php';
			} 
			catch (phpmailerException $e) 
			{
				echo $e->errorMessage(); //Pretty error messages from PHPMailer
			} 
			catch (Exception $e) 
			{
				echo $e->getMessage(); //Boring error messages from anything else!
			}   


     
}
echo"<script type=\"text/javascript\">alert(\"Please wait....\");</script>"; 
  
 