<!DOCTYPE html>
<html>
    <head>
	<title>While Loop Display</title>
    </head>
    <body>
    <?php
	$host = "pluto";
	$dbname = "db";
	$user = "";
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

        // create result table headers
        echo "<table border=1>\n";
        echo "<tr><th>Customer Name</th><th>Customer City</th></tr>\n";

        //print all rows using a loop
	    while ($row = $stmt ->fetch()){
            
        printf("<tr><td>%s</td><td>%s</td></tr>\n", 
		$row['customer_name'], 
		$row['customer_city']);

        }
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