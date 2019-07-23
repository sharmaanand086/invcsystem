<?php 
include('convertinwords.php');
$conn = mysqli_connect('localhost', 'world_hello', 'Mumbai@123', 'stftitle');
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $name = $_POST['name'];
  $phone = $_POST['phone']; 
  $gstnumber = $_POST['gstnumber'];
  $taxtype = $_POST['taxtype'];
 $place =$_POST['place'];
 $email = $_POST['tag'];
 $productname = $_POST['product'];
 $price = $_POST['price'];
 $typeofgst= $_POST['typeofgst'];
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
       $IGST= $price*18/100;
       $CGST= 0;
      $totamt = $price + (int)$IGST+(int)$CGST;
  }
 $time = date('i');
 $date = date("Ymd");
 $date1 = date("d-m-Y");
 
    $date = $date1;
     $year = date('Y', strtotime($date));
     $month = date('m', strtotime($date));
     $day = date('d',strtotime($date));
    $ogdate = "$month $day, $year";

 
 //echo $nummm;
    if($taxtype==T){
        $main = "SELECT invoicenumber FROM `invoicesystem` WHERE `taxtype`='T'";
         $result=mysqli_query($conn,$main);
         $rowcount=mysqli_num_rows($result);
         $num_padded = sprintf("%06d", $rowcount);
         $nummm = str_pad(intval($num_padded) + 1, strlen($num_padded), '0', STR_PAD_LEFT);
         $invoicenumber = $year."/".$month."/".$taxtype."/$nummm";
    }
   
     if($taxtype==P){
         $main = "SELECT invoicenumber FROM `invoicesystem` WHERE `taxtype`='P'";
         $result=mysqli_query($conn,$main);
         $rowcount=mysqli_num_rows($result);
         $num_padded = sprintf("%06d", $rowcount);
         $nummm = str_pad(intval($num_padded) + 1, strlen($num_padded), '0', STR_PAD_LEFT);
         $invoicenumber = $year."/".$month."/".$taxtype."/$nummm";
    }
?>

<html>
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
  </head>
  <body cz-shortcut-listen="true">
      <div class="container">
	<div id="page-wrap">
	<div style="text-align:center;padding: 18px 5px;">
	 <?php
	    if($productname == "Speak to fortune "){
	        
	        ?>
	        <img src="images/smashxLogo.jpg" style="width:20%;">
	        	<p style="width:100%;text-align:center;font-size:24px;border-bottom: 1px solid #000;height: 35px;"> <?php if($taxtype==T){ ?> Tax <?php } ?><?php if($taxtype==P){ ?> Proforma <?php } ?>Invoice	</p>
	        <?php
	    }
	    if($productname == "Coach To a Fortune "){
	        ?>
	        <img src="images/smashxLogo.jpg" style="width:20%;">
	        	<p style="width:100%;text-align:center;font-size:24px;border-bottom: 1px solid #000;height: 35px;">  <?php if($taxtype==T){ ?> Tax <?php } ?><?php if($taxtype==P){ ?> Proforma <?php } ?>Invoice	</p>
	        <?php
	    }
	     if($productname == "Incredible You"){
	        ?>
	         <img src="images/smashxLogo.jpg  " style="width:20%;">
	        	<p style="width:100%;text-align:center;font-size:24px;border-bottom: 1px solid #000;height: 35px;"> <?php if($taxtype==T){ ?> Tax <?php } ?><?php if($taxtype==P){ ?> Proforma <?php } ?>Invoice	</p>
	        <?php
	    }
	    if($productname == "Mastermind Meet"){
	        ?>
	         <img src="images/smashxLogo.jpg  " style="width:20%;">
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
						<table cellpadding="5" cellspacing="0" id="infoTable" style="border: 2px solid #000000;">
						<tbody>
							<tr>
								<td class="info" style="font-size: 12px;color: #000000;text-align: center;border: 2px solid #000000;">Date</td>
								<td class="info" style="font-size: 12px;color: #000000;text-align:center;border: 2px solid #000000;">Invoice No. #</td>
								<!--<?php if($taxtype==T){ ?> Tax <?php } ?><?php if($taxtype==P){ ?> Proforma <?php } ?>-->
							</tr>
							<tr>
								<td class="info" style="padding:3px;font-size: 12px;color: #000000;text-align: center;border: 2px solid #000000;">
									<p id="date" style="text-align: center; margin-top: 0px; margin-bottom: 0px; height: 31px;"><?php echo $date1 ?></p>
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
<?php echo $name ?><br>
<?php echo $email ?><br>
<?php echo $phone ?><br>
<?php if($taxtype==T){
    ?>
     GSTIN-<?php echo$gstnumber?>
    <?php } ?><br>
    <?php echo $place ?>

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
		    <th style="border: 1px solid;"> SAC</th>
		    <th style="border: 1px solid;">Quantity</th>
		    
		    <th colspan="3" style="border: 1px solid;">Amount</th>
		</tr>
		<tr class="item-row">
			<td class="item-name"><div class="delete-wpr"><p><?php echo $productname ?></p></div></td>
			<td class="item-name"><div class="delete-wpr"><p> <?php echo $productname ?> Program By Arfeen Khan  </p></div></td>
			<td class="description"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;999293</p></td>
			<td class="description"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1</p></td>
			
			<td colspan="4" style="text-align-last: start;"><p class="price" style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rs.<?php echo $price ?></p></td>
		</tr>
		 
	
		<tr id="hiderow">
		    <td colspan="8" style="border-top: 1px solid;padding: 0;"></td>
		</tr>
	 
		<?php 
	if($typeofgst==2){
		    ?>
		    <tr>
			<td colspan="2" class="blank"> </td>
			<td colspan="2" class="blank"> </td>
			
		    <td colspan="2" class="total-line"  style="border: 1px solid;"><p id="paid" style="width: 65px;height: 22px;" >IGST(18%)</p></td>
		    <td class="total-value"  style="border: 1px solid;text-align:center;"><p id="paid">Rs.<?php echo $IGST ?></p></td>
		     
		</tr>
		    <?php	}?>
	
		<?php 
	if($typeofgst==1){
		    ?>
		    <tr>
			<td colspan="2" class="blank"> </td>
			<td colspan="2" class="blank"> </td>
			
		    <td colspan="2" class="total-line"  style="border: 1px solid;"><p id="paid" style="width: 65px;height: 22px;" >	SGST(9%)</p></td>
		    <td class="total-value"  style="border: 1px solid;text-align:center;"><p id="paid">Rs.<?php echo $SGST ?></p></td>
		</tr>
			<tr>
			<td colspan="2" class="blank"> </td>
			<td colspan="2" class="blank"> </td>
		
		    <td colspan="2" class="total-line"  style="border: 1px solid;"><p id="paid" style="width: 65px;height: 22px;">CGST(9%)</p></td>
		    <td class="total-value"  style="border: 1px solid;text-align:center;"><p id="paid">Rs.<?php echo $CGST ?></p></td>
		</tr>
		    <?php	}?>
	 
		<tr>
			<td colspan="2" class="blank"> </td>
			<td colspan="2" class="blank"> </td>
			
		    <td colspan="2" class="total-line"  style="border: 1px solid;">Total Amount</td>
		    <td class="total-value"  style="border: 1px solid;text-align:center;"><p id="paid">Rs.<?php echo $totamt ?></p></td>
		</tr>
		 
	</tbody></table>
		<div style="float:left;padding: 50px 5px 5px 5px;">
			 <h5>Company's Bank Details</h5>
  
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
		<div style="clear:both;"  div="">
		<div style="font-weight:500;font-size:12px;text-align:center;padding: 10px 0 2px 0;border-top: 1px solid #000;">Note : Amount is non-refundable.</div>
			<div style="font-weight:500;font-size:14px;text-align:center;">This is computer generated invoice No Signature Required</div>
	</div>
</div>
<form action="sendpdf.php"  enctype="multipart/form-data"  id ="myForm" method="POST">
    <input type="hidden" name="name" value="<?php echo $_POST['name']; ?>" >
    <input type="hidden" name="tag"  value="<?php echo $_POST['tag']; ?>" >
     <input type="hidden" name="place"  value="<?php echo $_POST['place']; ?>" >
    <input type="hidden" name="phone"  value="<?php echo $_POST['phone'];  ?>" >
    <input type="hidden" name="gstnumber" value="<?php echo $_POST['gstnumber']; ?>" >
    <input type="hidden" name="product" value="<?php echo $_POST['product']; ?>" >
    <input type="hidden" name="price" value="<?php echo $_POST['price']; ?>" >
     <input type="hidden" name="taxtype" value="<?php echo $_POST['taxtype']; ?>" >
      <input type="hidden" name="typeofgst" value="<?php echo $_POST['typeofgst']; ?>" >
    <input type="hidden" name="totamt" value="<?php echo $totamt; ?>" >
   <?php  if($typeofgst==1){?>
    <input type="hidden" name="CGST" value="<?php echo $CGST; ?>" >
     <input type="hidden" name="SGST" value="<?php echo $SGST; ?>" >
  <?php }   ?>
      <input type="hidden" name="IGST" value="<?php echo $IGST; ?>" >
       <input type="hidden" name="invoicenumber" value="<?php echo $invoicenumber; ?>" >
       <input type="hidden" name="invoicedate" value="<?php echo $date1 ?>" >
       <input type="hidden" name="amountword" value="<?php echo  ucfirst(convert_number_to_words($totamt));  ?>" >
    <input class="btn btn-primary"  type ="submit" name ="submit" onclick="myFunction()" value="Final Submit">
</form>

</body>
<script>
function myFunction() {
  document.getElementById("myForm").submit();
}
</script>
</html>