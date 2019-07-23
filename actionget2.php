<h1 style="text-align: center;text-transform: capitalize;">Thank you You will received email</h1> 
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
<script> 

$(document).ready(function () {
    // Handler for .ready() called.
    window.setTimeout(function () {
        location.href = "http://magicconversion.com/test/";
    }, 1000);
});

</script> 

<?php 
session_start();  
require_once('class.phpmailer.php');
 
  if(isset($_POST['submit']))
{
 $name = $_POST['name'];
 $phone = $_POST['phone'];
 $contactid =$_POST['contactid'];
 $email = $_POST['tag'];
 $productname = $_POST['product'];
 $price = $_POST['price'];
 //$gst = $_POST['gst];
 $currentDate = date("d-m-Y");
  //var_dump($currentDate);
 // var_dump($currentDate);
//var_dump($name);
//var_dump($phone);
//var_dump($email);
 $gstmp = $price*18/100;
 $gst = $gstmp;
 //var_dump($gst);
 $mainprice = $price + (int)$gst;
 $price1= $price;
//var_dump($price1);		
	//$price = $_SESSION['total'];
	
	 $conn = mysqli_connect('localhost', 'world_hello', 'Mumbai@123', 'stftitle');
                     
 	            $main = "SELECT `id`, `pname`, `amount` FROM `products`";
            	    $results =$conn->query($main);
            	    
            	    foreach($results as $result1)
            	    {
                     $p= $result1['amount'];
                    // var_dump('$p');
                     }

       
	   // $price1= 7500;
	   // $gst=1350;
	    $totap=$mainprice ;
	
	
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
// 		$mail->AddAddress('divya@arfeenkhan.com', '');
		$mail->AddAddress($email, '');
		$mail->AddAddress('info@arfeenkhan.com', '');
		//$mail->AddAddress('onlinepayment@arfeenkhan.com', '');
            
		$mail->Subject = ''.$productname.' By Arfeen Khan';
		$mail->Body= '<html>
  <head>
  </head>
  <body>
  <table id="mainTable" style="width: 650px;">
    <tbody>
      <tr>
        <td style="font-family: Tahoma, Arial, Verdana, sans-serif;font-size:
        12px;color: #000000;">
          <table style="width: 100%;">
            <tbody>
              <tr>
                <td nowrap="nowrap" style="font-family: Tahoma, Arial,
                Verdana, sans-serif;font-size: 12px;color: #000000;">
                  <img alt="Logo" border="0" src="https://ad129.infusionsoft.com/Logo" />
                <br />
                <br />
                 Arfeen Khan<br />
                 B-502,VIP Plaza off link road,<br />
		Near Crystal Plaza, Opp Infinity Mall, Andheri (West)<br />
                Mumbai, Maharashtra 400053<br />
                India<br />
                <br />
                
              </td><td align="right" valign="top" style="font-family: Tahoma,
                Arial, Verdana, sans-serif;font-size: 12px;color: #000000;">
                <h1 style="margin: 1px;color: #000000;">
                  Invoice
                </h1>
                <table cellpadding="5" cellspacing="0" id="infoTable" style="border: solid
                #000000 1px;">
                  <tbody>
                    <tr>
                      <td class="info" style="font-family: Tahoma,
                      Arial, Verdana, sans-serif;font-size: 12px;color: #000000;text-align:
                      center;border: solid #000000 1px;">
                        Date
                      </td><td class="info" style="font-family: Tahoma,
                      Arial, Verdana, sans-serif;font-size: 12px;color: #000000;text-align:
                      center;border: solid #000000 1px;">
                      Invoice #
                      </td>
                    </tr>
                    <tr>
                      <td class="info" style="font-family: Tahoma,
                      Arial, Verdana, sans-serif;font-size: 12px;color: #000000;text-align:
                      center;border: solid #000000 1px;">
                        '.$currentDate.'
                      </td><td class="info" style="font-family: Tahoma,
                      Arial, Verdana, sans-serif;font-size: 12px;color: #000000;text-align:
                      center;border: solid #000000 1px;">
                      '.$contactid.'
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
                  <td class="spacer" style="font-family: Tahoma, Arial, Verdana,
                  sans-serif;font-size: 12px;color: #000000;height: 15px;">
                  </td>
                </tr>
                <tr>
                  <td style="font-family: Tahoma, Arial, Verdana, sans-serif;font-size:
                  12px;color: #000000;">
                    <table cellpadding="0" cellspacing="0" style="width: 100%;">
                      <tbody>
                        <tr>
                          <td width="200" style="font-family: Tahoma, Arial, Verdana,
                          sans-serif;font-size: 12px;color: #000000;">
                            TO:
                          </td><!--td width="200" style="font-family: Tahoma, Arial, Verdana,
                          sans-serif;font-size: 12px;color: #000000;">
                          SHIP TO:
                          </td-->
                        </tr>
                      </tbody>
                    </table>
                    <table style="width: 100%;">
                      <tbody>
                        <tr>
                          <td width="50%" style="font-family: Tahoma, Arial, Verdana,
                          sans-serif;font-size: 12px;color: #000000;">
                          '.$name.'  <br />
                          '.$phone.' <br />                           
                          '.$email.' <br />
                
                
                          </td><!--td width="50%" style="font-family: Tahoma, Arial, Verdana,
                          sans-serif;font-size: 12px;color: #000000;">
                          anandsh<br />
                                 <br />
                          $phone<br />                
                                <br />                
                          </td-->
                        </tr>
                      </tbody>
                    </table>
                  </td>
                  </tr>
                    <tr>
                      <td class="spacer" style="font-family: Tahoma, Arial, Verdana,
                      sans-serif;font-size: 12px;color: #000000;height: 15px;">
                      </td>
                    </tr>                                  
                      <!-- new table -->
                              <tr>
                                <table width="100%" id="purchasesTable" style="margin-top:2%">
                                  <tr id="purchaseRowsHeader">
                                    <td><table width="100%" cellpadding="0" cellspacing="0">
                                      <tr style="background-color: #000;color: #fff;font-size: 16px;font-weight: bold; text-align:center">
                                        <td style="text-align:left;padding:5px;">Qty</td>
                                        <td>Description</td>
                                        <td>Unit Price</td>
                                        <td>Total</td>
                                      </tr>
									<tr style="font-size: 14px;">
										<td style="padding:5px;">1</td>
										<td style="text-align:left ; padding: 5px;">'.$productname.' By Arfeen Khan</td>
										<td style="text-align:center; padding: 5px;">Rs.'.$price1.'</td>
										<td style="text-align:center; padding: 5px;">Rs.'.$price1.'</td>
									</tr>
									<tr style="font-size: 14px;">
										<td style="padding:5px;">2</td>
										<td style="text-align:left ; padding: 5px;">GST</td>
										<td style="text-align:center; padding: 5px;">&nbsp;</td>
										<td style="text-align:center; padding: 5px;">Rs.'.$gst.'</td>
									</tr>
                                      <tr style="font-size: 14px;">
                                        <td style="padding:5px;"><b>Total Purchases</b></td>
                                        <td style="text-align:center; padding: 5px;">&nbsp;</td>
                                        <td style="text-align:center ; padding: 5px;">&nbsp;</td>
                                        <td style="text-align:center ; padding: 5px;">Rs.'.$totap.'</td>
                                      </tr>
                                    </table></td>
                                  </tr>
                                </table>
                                <table width="100%" style="margin-top:2%">
                                  <tr>
                                    <td><table width="100%" cellpadding="0" cellspacing="0">
                                      <tr style="background-color: #000;color: #fff;font-size: 16px;font-weight: bold; ">
                                        <td style="padding:5px;">Payments Made</td>
                                        <td style="padding:5px;">&nbsp;</td>
                                        <td style="padding:5px;">&nbsp;</td>
                                      </tr>
                                      <tr style="font-size: 14px;">
                                        <td style="padding: 5px;">'.$currentDate.'</td>
                                        <td style="padding: 5px;">Credit Card/Debit Card - PAID</td>
                                        <td style="text-align:right; padding:5px;">Rs.'.$totap.'</td>
                                      </tr>
                                      <tr style="font-size: 14px;">
                                        <td style="padding: 5px;"><b>Total Payment &amp; Adjustments</b></td>
                                        <td style="text-align:center;padding: 5px;">&nbsp;</td>
                                        <td style="text-align:right; padding: 5px;">Rs.'.$totap.'</td>
                                      </tr>
                                    </table></td>
                                  </tr>
                                </table>
                                <!--table width="100%" style="margin-top:2%">
                                  <tr>
                                    <td><table width="100%" cellpadding="0" cellspacing="0">
                                      <tr style="background-color: #000;color: #fff;font-size: 16px;font-weight: bold; ">
                                        <td style="padding:5px;">Payments Due</td>
                                        <td style="text-align:center">&nbsp;</td>
                                        <td style="text-align:center">&nbsp;</td>
                                      </tr>
                                      <tr style="font-size: 14px;">
                                        <td style="padding:5px;">$currentDate</td>
                                        <td style="padding:5px;">Current</td>
                                        <td style="text-align:right; padding: 5px;">Rs.00.00</td>
                                      </tr>
                                      <tr style="font-size: 14px;">
                                        <td style="padding:5px;"><b>OutstandingBalance</b></td>
                                        <td style="text-align:center; padding: 5px;">&nbsp;</td>
                                        <td style="text-align:right; padding: 5px;">Rs.0.00</td>
                                      </tr>
                                      <tr style="font-size: 14px;">
                                        <td style="padding:5px;"><b>Balance Due Now</b></td>
                                        <td style="text-align:center; padding: 5px;">&nbsp;</td>
                                        <td style="text-align:right; padding: 5px;">Rs.0.00</td>
                                      </tr>
                                    </table></td>
                                  </tr>
                                </table-->
                              </tr>
                      <!-- new table -->
                              </tbody>
                              </table>
                                <p class="spacer" style="font-family: Tahoma, Arial, Verdana, sans-serif;color:
                                #000000;height: 15px;">
                                </p>
                                <p style="font-family: Tahoma, Arial, Verdana, sans-serif;color: #000000;">
                                  Thanks,<br />
                                  Arfeen Khan
                                </p>
								<p style="font-weight:500;font-size:14px;text-align:center;padding: 10px 0 20px 0;border-top: 1px solid #000;">Note : Money is non-refundable.</p>
                              </body>
                              </html>';
                              
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
  
 