<?php
 session_start();
  require("connection.php"); 
  $ID = $_SESSION['id'];
  
  $sql="SELECT * FROM `datatable`";
  $rs = mysqli_query($conn,$sql);
  
 
  ?>
  
  <!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
    <meta charset="utf-8"><title>admin login</title>
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
             <h3>Add New city  </h3>
             <a href="addcity.php"   class="btn btn-primary">Add city</a>
             <a href="addcitydetail.php"   class="btn btn-success">Add city Detail</a>
    </div>
    
    </div>
    <p style="    float: right;    margin-right: 62px;    /* text-decoration-color: dimgrey; */"><a href="logout.php"> Logout</a></p>
    <table id="example" class="table table-striped table-bordered compact" width:"100%"  >
         
        <thead>
            <tr>
                <th>Sr no.</th>
                <th>City</th>
                <th>Date</th>
                <th>Time</th>
                <th>Tag no.</th>
                <th>Edit/Delete</th>
              
            </tr>
        </thead>
        <tbody>
            <?php 
 
             if(mysqli_num_rows($rs)>0){
                 $a = 1;
			     while($row = $rs->fetch_assoc()) {
			         ?>
            <tr><td> <?php echo $a++ ?></td>
                <td><?php echo $row["city"]; ?></td>
                <td><?php echo $row["date"]; ?></td>
                <td><?php echo $row["time"]; ?></td>
                <td><?php echo $row["tagno"]; ?></td>
                
               
                <td>
                    <a href="editupdate.php?id=<?php echo $row['id']; ?>" title="Edit <?php echo $row['city']; ?>">
                        <img src="https://img.icons8.com/metro/26/000000/edit.png">
                    </a>
                    &nbsp;&nbsp;&nbsp;<a href="delete.php?id=<?php echo $row['id']; ?>"   title="Edit <?php echo $row['city']; ?>">
<img src="https://img.icons8.com/color/48/000000/delete-forever.png">                    </a>
                 </td>   
                  
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
 <script>
 $("#submit").click(function()  
 {
  //alert('sfaf');
  $("#ack").css('display', 'none', 'important');
  var email= document.getElementById('email').value;
  var pass = document.getElementById('password').value;
 //alert(pass );
 if(email=='' || pass=='')
           {
            $("#ack").css('display','inline','important');
            $("#ack").html("Please enter your username and password!");
          }
         else
          {
       $.ajax({  
        url : "getpass.php",
        data : {email:email,pass:pass},
        type : "POST",           
        beforeSend: function(){
                    $("#ack").css('display', 'inline', 'important');
                    $("#ack").html("Loading...");
                },      
        success : function(data) 
        {
        console.log(data);
     //  alert(data);
         if(data=='1'){
                        $("#ack").css('display', 'inline', 'important');
                        $("#ack").html("<font color='green'>log in</font>");
                        window.location="loggedin.php";
                    }
                    if(data=='0'){
                        $("#ack").css('display', 'inline', 'important');
                        $("#ack").html("<font color='red'>Wrong username or password!</font>");                         
                    }
                
        },
        error : function()
         {
          
        }
    });

}
  return false;
});

 
</script>
</html>