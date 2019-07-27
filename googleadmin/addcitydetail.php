<?php

 session_start();
  require("connection.php"); 
  $ID = $_SESSION['id'];
  ?>
 <!DOCTYPE html>
 <html>
<head>
<title>city adding</title>
<link rel="stylesheet" type="text/css"  href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
<script scr="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

</head>
<body>
    <div class="container">
        <div class="jumbotron">
            <h2>Add city Details</h2>
    
 <form method="post" action="insercitydetal.php">
    <div class="form-group">
        <?php  $sql2="SELECT * FROM `datatablecity`";
             $rs2 = mysqli_query($conn,$sql2);
?>
     <select name="city" id="city" class="form-control" required>
    <option value ="">---Select---</option>
  <?php   while ($row=mysqli_fetch_assoc($rs2)) { ?>
  <option value='<?php echo $row["city"] ; ?>'><?php echo $row["city"] ;?></option> 
 <?php  } ?>
    </select>
       
     </div>
        <div class="form-group">
      <label for="exampleInput ">Date</label>
      <input type="text" class="form-control"  name="date" id="date" placeholder="Enter date e.g -<?php echo date("d/m/Y") ?> " required>
     </div>
        <div class="form-group">
      <label for="exampleInput ">Time</label>
      <input type="text" class="form-control"  name="time" id="time" placeholder="Enter time e.g- 07.00 pm - 11.00 pm" required>
     </div>
        <div class="form-group">
      <label for="exampleInput ">Tag No</label>
      <input type="text" class="form-control"  name="tag_number" id="tag_number" placeholder="Enter tag number" required>
     </div>
     
    </fieldset>
    <button type="submit"  name ="submit" id="submit" class="btn btn-primary">Submit</button>
 <div id="ack"></div>
        </div>
  </form>     
         </div>
    
</body>
<script>
</html>