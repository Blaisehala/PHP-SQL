<?php
include_once 'db.php';
include 'display.php';

echo "<h2> Display the information </h2>"; 

display("SELECT * FROM customer;");
?> 

<br/>
<form action="fill_to_update.php" method="post">
<h2>Name to Select: </h2>
Customer Name: <input type="text" name="customer_name"/><br>
<input type="Submit" value= "Select"/><input type="Reset"/>
</form>     