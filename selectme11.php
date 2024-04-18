<!DOCTYPE html>
<html>
    <head>
	<title>Display Name & city</title>
    </head>
    <body>
    <?php
	$host = "pluto";
	$dbname = "db";
	$user = "  ****";
	$pass = "******";
	// Always use try-catch block
	try {
	    // create the connection
	    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
	    // set the PDO error mode to exception
	    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	    // execute the query
	    $stmt = $conn->query("select customer.customer_name, customer.customer_city from customer, account, depositor where customer.customer_name = depositor.customer_name and account.account_number = depositor.account_number and account.branch_name = 'Downtown';");
	    // set the fetch mode to associate array
	    $stmt->setFetchMode(PDO::FETCH_ASSOC);
            







	    // fetch one record/row
	    $row = $stmt->fetch();
	    // print the row content.
	    printf("Customer Name: %s<br>\n", $row['customer_name']);
	    printf("Customer City: %s<br>\n", $row['customer_city']);
	    // printf("Title: %s<br>\n", $row['title']);
	    // printf("Salary: %s<br>\n", $row['salary']);

	    // disconnect from the database
	    $stmt = null;
	    $conn = null;
	}
	catch(PDOException $e) {
	    die("Could not connect to the database $dbname :" . $e->getMessage());
	}
    ?>
    </body>
</html>