<?php 

include_once 'db.php'; 

# form data 
$customer_name = $_POST['customer_name'];
$customer_street = $_POST['customer_street'];
$customer_city = $_POST['customer_city'];

$query = "update customer set customer_street = :street, customer_city = :city WHERE customer_name = :name"; 
$data = array('street' => $customer_street, 'city' => $customer_city, 'name' => $customer_name);

$stmt = $conn->prepare($query); 

if($stmt -> execute($data)) 
{ 
	$rows_affected = $stmt->rowCount(); 
	echo "<h2>".$rows_affected." row updated sucessfully!</h2>";
	include 'display.php'; 
	display("SELECT * FROM customer;"); 


}
else 
{ 
	echo "update failed: (" . $conn->errno . ") " . $conn->error; 
}
$conn->close(); 
?>
