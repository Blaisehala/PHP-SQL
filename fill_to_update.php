<form action="update.php" method="post">
<?php
include_once 'db.php';
$emp_id =$_POST['emp_id'];
# prepared statement with Unnamed Placeholders
$query = "select * from employees where emp_id = ?;";
$stmt = $conn->prepare($query);
$stmt->bindValue(1, $emp_id); # bind by value and assign variables to each
place holder
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_NUM);
$row = $stmt->fetch();
printf("<input type=\"hidden\" name=\"emp_id\"
value=\"%s\"/><br>\n",$row[0]);
printf("First Name: <input type=\"text\" name=\"fname\"
value=\"%s\"/><br>\n",$row[1]);
printf("Last Name: <input type=\"text\" name=\"lname\"
value=\"%s\"/><br>",$row[2]);
printf("Title: <input type=\"text\" name=\"title\"
value=\"%s\"/><br>\n",$row[3]);
printf("Age: <input type=\"text\" name=\"age\"
value=\"%s\"/><br>\n",$row[4]);
printf("Years of Service: <input type=\"text\" name=\"yos\"
value=\"%s\"/><br>\n",$row[5]);
printf("Salary: <input type=\"text\" name=\"salary\"
value=\"%s\"/><br>\n",$row[6]);
printf("Email: <input type=\"text\" name=\"email\"
value=\"%s\"/><br>\n",$row[7]);
5
?>
<br/>
<input type="Submit" value= "Update"/><input type="Reset"/>
</form>