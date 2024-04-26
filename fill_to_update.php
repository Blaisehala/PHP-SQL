<form action="update.php" method="post">
<?php
include_once 'db.php';
$customer_name = $_POST['customer_name']; 


# prepared statement with Unnamed Placeholders
$query = "select * from customer  where customer_name  = ?;";
$stmt = $conn->prepare($query);
$stmt->bindValue(1, $customer_name); # bind by value and assign variables to each place holder
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_NUM);
$row = $stmt->fetch();

printf("<input type=\"hidden\" name=\"customer_name\" value=\"%s\"/><br>\n", $row[0]);
printf("Customer Street: <input type=\"text\" name=\"customer_street\" value=\"%s\"/><br>\n", $row[1]);
printf("Customer City: <input type=\"text\" name=\"customer_city\" value=\"%s\"/><br>\n", $row[2]);


?>
<br/>
<input type="Submit" value= "Update"/><input type="Reset"/>
</form>