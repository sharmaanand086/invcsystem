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

</head>
<body>
    <div class="container">
        <div class="jumbotron">
            <h2>Add city</h2>
    
 
    <div class="form-group">
      <label for="exampleInputEmail1">City Name</label>
      <input type="text" class="form-control"  name="city" id="city" placeholder="Enter city Name">
     </div>
     
    </fieldset>
    <button type="submit"  name ="submit" id="submit" class="btn btn-primary">Submit</button>
 <div id="ack"></div>
        </div>
         <div class="jumbotron">
             <h4>City Name That You have </h4>
             <?php 
             
             $sql="SELECT * FROM `datatablecity`";
             $rs = mysqli_query($conn,$sql);
  
             ?>
             <table class="table" >
                  <thead class="thead-dark">
            <tr>
                <th>Sr no.</th>
                <th>City Name</th>
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
    </div>

</body>
<script>
    $("#submit").click(function()  
 {
  //alert('sfaf');
  $("#ack").css('display', 'none', 'important');
  var city= document.getElementById('city').value;
  
// alert(city );
 if(city=='')
           {
            $("#ack").css('display','inline','important');
            $("#ack").html("Please enter your City Name ");
          }
         else
          {
       $.ajax({  
        url : "insertcity.php",
        data : {city:city},
        type : "POST",           
        beforeSend: function(){
                    $("#ack").css('display', 'inline', 'important');
                    $("#ack").html("Loading...");
                },      
        success : function(data) 
        {
        console.log(data);
     // alert(data);
         if(data=='1'){
                        $("#ack").css('display', 'inline', 'important');
                        $("#ack").html("<font color='red'>You have already Inserted</font>");
                        window.location="addcity.php";
                    }
                    if(data=='0'){
                        $("#ack").css('display', 'inline', 'important');
                        $("#ack").html("<font color='green'>Inserted successfully </font>");  
                         window.location="addcity.php";
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