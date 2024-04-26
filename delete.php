
<?php
include_once 'db.php';

#form data
$customer_name=$_POST['customer_name'];
// $street=$_POST['street'];
// $city=$_POST['city'];

$sql = "DELETE FROM customer WHERE customer_name = :customer_name ";
$stmt = $conn->prepare($sql); 


# data stored in an associative array
// $data = array( 'name' => $name, 'street' => $street, 'city'=> $city);

$data = array( 'customer_name' => $customer_name); 


if($stmt->execute($data)){
    $rows_affected = $stmt->rowCount();

    echo "<h2>".$rows_affected." row deleted sucessfully!</h2>";

    $stmt = $conn->query("SELECT * FROM customer");

    //PDO::FETCH_NUM: returns an array indexed by column number as returned in your result set, starting at column 0

    $stmt->setFetchMode(PDO::FETCH_NUM);
    echo "<table border=\"1\">\n";
    echo "<tr><td>Name</td><td>Street</td><td>City</td></tr>\n";
    while ($row = $stmt->fetch()) {

        printf("<tr><td>%s</td><td>%s</td><td>%s</td></tr>\n", $row[0], $row[1], $row[2]);
    
    }
    echo "</table>\n";
    }
    else
    {
    echo "\nPDOStatement::errorInfo():\n";
    print_r($stmt->errorInfo());
    }
    $stmt = null;
    $conn = null;
    ?>
