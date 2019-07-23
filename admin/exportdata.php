<?php 
$dbHost     = "localhost";
$dbUsername = "world_hello";
$dbPassword = "Mumbai@123";
$dbName     = "stftitle";
// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName); 
 //$result = mysqli_query($conn,$check);
        
$filename = "invoice_" . date('Y-m-d') . ".csv"; 
$delimiter = ","; 
 
// Create a file pointer 
$f = fopen('php://memory', 'w'); 
 
// Set column headers 
$fields = array('id', 'invoicenumber', 'name', 'tag', 'phone', 'gstnumber', 'taxtype', 'place', 'product', 'price', 'typeofgst'); 
fputcsv($f, $fields, $delimiter); 
 
// Get records from the database 
$result = $db->query("SELECT * FROM 'invoicesystem'  ORDER BY id DESC"); 
if($result->num_rows > 0){ 
    // Output each row of the data, format line as csv and write to file pointer 
    while($row = $result->fetch_assoc()){ 
        $lineData = array($row['id'], $row['invoicenumber'], $row['name'], $row['tag'], $row['phone'], $row['gstnumber'], $row['taxtype'], $row['place'], $row['product'], $row['price'], $row['typeofgst']); 
        fputcsv($f, $lineData, $delimiter); 
    } 
} 
 
// Move back to beginning of file 
fseek($f, 0); 
 
// Set headers to download file rather than displayed 
header('Content-Type: text/csv'); 
header('Content-Disposition: attachment; filename="' . $filename . '";'); 
 
// Output all remaining data on a file pointer 
fpassthru($f); 
 
// Exit from file 
exit();