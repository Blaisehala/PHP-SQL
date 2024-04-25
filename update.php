<?php
include_once 'db.php';
# form data
$emp_id = $_POST['emp_id'];
$first=$_POST['fname'];
$last=$_POST['lname'];
$title=$_POST['title'];
$age=$_POST['age'];
$yos=$_POST['yos'];
$salary=$_POST['salary'];
$email=$_POST['email'];
$query = "update employees set f_name = :first, l_name = :last, title = :title,
age = :age, yos = :yos, salary = :salary, email = :email where emp_id =
:emp_id;";
$data = array( 'first' => $first, 'last' => $last, 'title' => $title, 'age' =>
$age, 'yos' => $yos, 'salary' => $salary, 'email' => $email, 'emp_id' =>
$emp_id);
$stmt = $conn->prepare($query);
if($stmt -> execute($data))
{
$rows_affected = $stmt->rowCount();
echo "<h2>".$rows_affected." row updated sucessfully!</h2>";
include 'display.php';
display("SELECT * FROM employees;");
}
else
{
echo "update failed: (" . $conn->errno . ") " . $conn->error;
}
$conn->close();
?>