<?php
 session_start();
  require("connect.php"); 
  $ID = $_SESSION['id'];
  
  $sql="SELECT * FROM `invoicesystem`";
  $rs = mysqli_query($conn,$sql);
  
 
  ?>
  
  <!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.bootstrap4.min.css" >
<!-- jQuery library -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/dt-1.10.9/datatables.min.css"/>
	<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.9/css/dataTables.bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/1.0.7/css/responsive.bootstrap.min.css"/>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.9/js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/responsive/1.0.7/js/dataTables.responsive.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/r/dt/dt-1.10.9/datatables.min.js"></script>
<script type='text/javascript'>
$(document).ready(function() 
{
	$('#example').DataTable({
	    searching: false
	});
 
});

function popup(mylink, windowname)
{
    var width = 400;
    var height = 400;
    var left = parseInt((screen.availWidth/2) - (width/2));
    var top = parseInt((screen.availHeight/2) - (height/2));
	var windowFeatures = "width=" + width + ",height=" + height + ",status,scrollbar,resizable,left=" + left + ",top=" + top + "screenX=" + left + ",screenY=" + top;
	if (! window.focus)return true;
	var href;
	if (typeof(mylink) == 'string')
	   href=mylink;
	else
	   href=mylink.href;
	window.open(href, windowname, windowFeatures);
	return false;
	}
</script>
    </head>
<body>
<div class="jumbotron">
    <div class="row">
     
    <div class="col-md-12 head">
        <!--<div class="float-right">-->
        <!--     <h3> Export link  </h3>-->
        <!--     <a href="exportdata.php" class="btn btn-primary"><i class="exp"></i> Export csv</a>-->
        <!--</div>-->
    </div>
    
    </div>
    <p style="    float: right;    margin-right: 62px;    /* text-decoration-color: dimgrey; */"><a href="logout.php"> Logout</a></p>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr><th>Sr no.</th>
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
                <th>Edit/view/download</th>
              
            </tr>
        </thead>
        <tbody>
            <?php 
 
             if(mysqli_num_rows($rs)>0){
                 $a = 1;
			     while($row = $rs->fetch_assoc()) {
			         ?>
            <tr><td> <?php echo $a++ ?></td>
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
                <td>
                    <a onClick="return popup('einvoice.php?id=<?php echo $row['id'];?>','view');" title="Edit <?php echo $row['invoicenumber']; ?>">
                        <img src="https://img.icons8.com/metro/26/000000/edit.png">
                    </a>
                    &nbsp;&nbsp;&nbsp;<a onClick="return popup('viewinvoice.php?id=<?php echo $row['id'];?>','view');" title="Edit <?php echo $row['invoicenumber']; ?>">
                        <img src="https://img.icons8.com/metro/26/000000/visible.png">
                    </a>
                    &nbsp;&nbsp;&nbsp;<img src="https://img.icons8.com/metro/26/000000/download.png" onclick="window.location='http://magicconversion.com/invoicesystem/admin/<?php echo $row['newpdf'];?>'; return false;"></td>
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
      
    </table>
</div>
</body>
<!--<script>-->
<!--    $(document).ready(function() {-->
<!--    var table = $('#example').DataTable( {-->
<!--        lengthChange: false,-->
<!--        searching: false-->
<!--        buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]-->
<!--    } );-->
 
<!--    table.buttons().container()-->
<!--        .appendTo( '#example_wrapper .col-md-6:eq(0)' );-->
<!--} );-->
<!--</script>-->
</html>