<html>
<title></title>
<head>
<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>

</head>
<body>
<div class="container">
  <h1>Arfeen Khan Invoice System</h1>
   	<form action = "preview.php"  enctype = "multipart/form-data" name = "form1" id ="form1" method = "POST">
        <div class="form-group">
		<label for="exampleInputEmail1">Email :</label>
		<input type="text" class="form-control" autocomplete = "off" placeholder="Enter Email Id" name="tag" id="tag" value="" >
		</div>
			<div class="form-group">
             <label for="name">Name :</label>
		<input type="text"  class="form-control" autocomplete = "off" placeholder="" name="name" id="name" value="">
		 </div>
		 	<div class="form-group">
       <label>Phone:</label>
		<input type="text" class="form-control" autocomplete = "off" placeholder="" name="phone" id="phone" value="" >
		 </div>
		<div class="form-group">
      <label for="Place">City :</label>
       <select name="place" id="city" class="form-control" required>
           <option id="0" value="none">select</option>
           <option id="2" value="Bangalore">Bangalore</option>
           <option id="1" value="Pune">Pune</option>
           <option id="1" value="Mumbai">Mumbai</option>
           <option id="2"  value="Ahmedabad">Ahmedabad</option>
           <option id="2"  value="Hyderabad">Hyderabad</option>
           <option id="2"  value="Delhi">Delhi</option>
           <option id="2"  value="Chennai">Chennai</option>
          <option  id="2" value="Gurgaon">Gurgaon</option>
          <option  id="2" value="Goa">Goa</option>
          <option  id="2" value="Noida">Noida</option>
          <option  id="2" value="Chandigarh">Chandigarh</option>
           <option id="2"  value="Indore">Indore</option>
            <option id="2"  value="Kolkata">Kolkata</option>
            <option  id="2" value="Dubai">Dubai</option>
       </select>
    </div>
     
    <input type="radio" name="taxtype" id="performa" value="P" > <label for="tax"> Performa </label>
    <input type="radio" name="taxtype"  id="tax" value="T" checked> <label for="tax"> Tax </label>
     
    <input type="hidden" name="typeofgst" value="0" id="typeofgst">
    	<div class="form-group" id="inputgst" >
		 <label>Enter <b>GST </b>Number:</label>
		 <input type="text"  id="gstnumber" class="form-control"  placeholder="Enter GST/IGST No." name="gstnumber" >
		  </div>
         <br><br>
                    <label>Products:</label><br>
                   <?php 
                    $conn = mysqli_connect('localhost', 'world_hello', 'Mumbai@123', 'stftitle');
                     
 	            $sql1 = "SELECT `id`, `pname`, `amount` FROM `products`";
            	    $results =$conn->query($sql1);
            	    
            	    foreach($results as $result1)
            	    {
                    ?>
                 <input type="radio" id="<?php echo $result1['pname']; ?>_<?php echo $result1['amount']; ?>" name="product" onClick="selectproduct(this.id)">   
                    <label class="lead" ><?php echo $result1['pname']; ?>  <span class="badge badge-success badge-pill"> <?php echo $result1['amount']; ?></span></label>  <br>

                   
                        
                  <?php  }  ?>
                 <input type="hidden" id="product" value="" name="product" >
                   <label>PRICE: &nbsp; </label><input type="text" id="price" value="" name="price"><br>
                  <label>GST: &nbsp; &nbsp;</label> <input type="text" id="gst" value="" >
		<button class="btn btn-primary" type ="submit" name ="submit">Submit</button></section>
        </div>
	</form>
 </div>
</body>
<script>

$('input[name=tag]').change(function()
 {
  //alert('sfaf');
  var tagname = document.getElementById('tag').value;
  //alert(tagname);
    $.ajax({  
        url : "actionget.php",
        data : {tagname: tagname},
        type : "POST",
        dataType: 'json',
        success : function(data) {
                  console.log(data);
                  //alert(data);                          
                  var name = $('#name').val(data.name);
                  //alert(name);
                  $('#phone').val(data.phone);  
                  $('#contactid').val(data.contactid);
                          
        },
        error : function() {
        }
    });


});

function selectproduct(nameprice){ 
  var p1 = nameprice.split("_");
  var ogpd = p1[0];
  var ofpr = p1[1];
  var gstcal = ofpr*18/100;
  
//alert(ogpd);
//alert(ofpr);
   document.getElementById('product').value= ogpd;
   document.getElementById('price').value = ofpr;
   document.getElementById('gst').value = gstcal;    
  
}

$(document).ready(function() {
$('#price').keyup(function(ev){
var totalgst = $('#price').val() * 18/100; 
var gst2= document.getElementById('gst');
gst2.value = totalgst;
});
});
 

$("#city").change(function() {
  var id = $(this).children(":selected").attr("id");
  //alert(id);
  if(id==1){
      
       document.getElementById('typeofgst').value =id;
  }
  if(id==2){
        document.getElementById('typeofgst').value =id;
  }
   
});

 $('input[name="taxtype"]').change(function(){
        if($('#performa').prop('checked')){
            $('#inputgst').hide().prop('required',false);
            document.getElementById('typeofgst').value =0;
        }else{
           // alert('Option 1 is unchecked!');
            $('#inputgst').show().prop('required',true);
        }
    });
</script>

</html>
