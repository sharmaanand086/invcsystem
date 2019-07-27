<?php
session_start();
require("connection.php"); 
 $id = $_GET['id'];
 //echo$id;
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
  <title>update</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
 
  </head>
  <body cz-shortcut-listen="true">
      
     <div class="container">
        <div class="jumbotron">
            <h2>Add city Details</h2>
    
 <form method="post" action="updatedetail.php">
     <input  type="hidden" name="id" value="<?php echo $id ?>">
    <div class="form-group">
        <?php 
        
             $sql2="SELECT * FROM `datatablecity`";
             $rs2 = mysqli_query($conn,$sql2);
             
             $sql3="SELECT * FROM `datatable` where id='$id' ";
             $rs3 = mysqli_query($conn,$sql3);
             $row3=mysqli_fetch_assoc($rs3)
?>
     <select name="city" id="city" class="form-control" required>
    <option value ="">---Select---</option>
  <?php   while ($row=mysqli_fetch_assoc($rs2)) { ?>
  <option value='<?php echo $row["city"] ; ?>' <?php if($row['city'] == $row3['city']) echo 'selected="selected"'; ?>><?php echo  $row['city'] ;?></option> 
 <?php  } ?>
    </select>
      
     </div>
        <div class="form-group">
      <label for="exampleInput ">Date</label>
      <input type="text" class="form-control"  name="date" id="date" value="<?php echo $row3['date']; ?>" placeholder="Enter date e.g -<?php echo date("d/m/Y") ?> " required>
     </div>
        <div class="form-group">
      <label for="exampleInput ">Time</label>
      <input type="text" class="form-control"  name="time" id="time" value="<?php echo $row3['time']; ?> " placeholder="Enter time e.g- 07.00 pm - 11.00 pm" required>
     </div>
        <div class="form-group">
      <label for="exampleInput ">Tag No</label>
      <input type="text" class="form-control"  name="tag_number" id="tag_number" value="<?php echo $row3['tagno']; ?>" placeholder="Enter tag number" required>
     </div>
     
    </fieldset>
    <button type="submit"  name ="submit" id="submit" class="btn btn-primary">Submit</button>
 <div id="ack"></div>
        </div>
  </form>     
         </div>
    
      </body>
 
</html>
 