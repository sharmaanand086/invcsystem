<?php
 session_start();
  require("connect.php"); 
 
if(isset($_POST['files'])){
$files = $_POST['files'];
// $abc = create_zip($files, 'updatedpdf');
	// Check if the ZIP extension is available or not
		if(extension_loaded('zip')){	
			$zip = new ZipArchive();			//create an object of Zip Library
			$zip_name = "download_".time().".zip";			// Zip name
			
			//create a zip file (ZIPARCHIVE::CREATE)
			$zip->open($zip_name, ZIPARCHIVE::CREATE);
		//	echo $zip_name;
			
			foreach($files as $file){
			       
				 $zip->addFile($file);	
			}
			$zip->close();
			
		//lets download the zip if it is created
		if(file_exists($zip_name)){
			header('Content-type: application/zip');
			header('Content-Disposition: attachment; filename="'.$zip_name.'"');
			readfile($zip_name);
			//delete the file after download
			unlink($zip_name);
		}		
	}else{
		echo "ZIP extension is not installed in your server!!";
	}
echo $abc;
    
}else{
//	echo "<h3 style='color:red'>Please select atleast one file to download</h3>";
}

?>
  <!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Create a Zip File Using PHP and Download Multiple Files</title>
<!-- jQuery library -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script>
$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
<script language="javascript">
$(function(){

    // select all / deselect all
    $("#selectall").change(function () {
         $(".mycheckbox").prop('checked', $(this).prop('checked'));
    });

    // find if all the checkboxes are checked, if then select the top one too.
    $(".mycheckbox").change(function(){
        if($(".mycheckbox").length == $(".mycheckbox:checked").length)
        $("#selectall").attr("checked", "checked");
			else
        $("#selectall").removeAttr("checked");
    });
});
</script>
</head>
<body>
   
    
    
    <div class="container">
         <div class="row">
          
           <h3> <a href="loggedin.php" >Dashboard</a></h3> 
         
    </div>
        <form name="searchfile" action="" method="post">
        <label>From Date</label>  <input type="date" name="fromdate" value=""   style="width:30%"    class="form-control input-sm" />  
         <label>To Date </label>  <input type="date" name="todate" value=""    style="width:30%"    class="form-control input-sm" /></br>    
        
        <input type="submit" name="search"  class="btn btn-primary" value="search" />
</form>
  
    </div>

<?php

if(isset($_POST['search']))
{
    
    $todate = $_POST['todate'];
    $fromdate = $_POST['fromdate'];
  
    $sql="SELECT * FROM `invoicesystem` WHERE `createdat` BETWEEN CAST('$fromdate' AS DATE) AND CAST('$todate' AS DATE)";
    $rs = mysqli_query($conn,$sql);
      //echo $sql;
  ?><div class="container">
      <?php   echo " &nbsp;From-&nbsp;"."$fromdate"; echo" &nbsp; &nbsp;|&nbsp; &nbsp; &nbsp;To-&nbsp;"."$todate"; ?>
    <form action="" method="post">
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead> 
            <tr> <th	><input type="checkbox" id="selectall"/>selectall</th>
                <th>Sr no.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Invoice No.</th>
                 <th>Invoice Date.</th>
                <th>Product</th>
                <th>Price</th>
                <th>GST Number</th>
                <th>Place</th>
                <th>Tax type</th>
            </tr>
        </thead>
        <tbody>
           
            <?php 
 
             if(mysqli_num_rows($rs)>0){
                 $a = 1;
			     while($row = $rs->fetch_assoc()) {
			         ?>
            <tr> 
                 <td ><input type="checkbox" class="mycheckbox" name="files[]" value="<?php $updated = $row["newpdf"]; if($updated==''){ ?><?php if($row["taxtype"]=='T'){ echo $t = "../india/".$row["pdf"]; }?><?php if($row["taxtype"]=='P'){ echo $p= "../india/".$row["pdf"]; }?><?php if($row["taxtype"]=='PT'){ echo $pt= "../india/".$row["pdf"]; }?><?php if($row["taxtype"] == 'ET'){ echo $et = "../international/".$row["pdf"]; }?><?php }else{ ?><?php if($row["taxtype"]=='T'){ echo $t = $row["newpdf"]; }?><?php if($row["taxtype"]=='P'){ echo $p= $row["newpdf"]; }?><?php if($row["taxtype"]=='PT'){ echo $pt= $row["newpdf"]; }?><?php if($row["taxtype"] == 'ET'){ echo $et = $row["newpdf"]; }?><?php } ?>"/></td>
                 <td> <?php echo $a++ ?></td>
                <td><?php echo $row["name"]; ?></td>
                <td><?php echo $row["tag"]; ?></td>
                <td><?php echo $row["phone"]; ?></td>
                <td><?php echo $row["invoicenumber"]; ?></td>
                <td><?php echo $row["invoicedate"]; ?></td>
                <td><?php echo $row["product"]; ?></td>
                <td><?php echo $row["price"]; ?></td>
                <td><?php echo $row["gstnumber"]; ?></td>
                <td><?php echo $row["place"]; ?></td>
                <td><?php echo $row["taxtype"]; ?></td>
            </tr>
        <?php 
                    }
			        }
                    else
                    {
                       ?>
                       <td >
                           <p>Not Found</p>
                           </td>
                       <?php 
                     
                     }  
			
			    ?>
			   
        </tbody>
        <tr>
        	<td colspan="2" align="right"><input type="submit" value="Download"   class="btn btn-success" /></td>
        </tr>
</table>
  <?php
  
}
?>
</form>
</div>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

</body>
</html>
