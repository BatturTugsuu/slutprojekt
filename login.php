<?php
$data = $_POST;
if(empty($data['email']) || empty($data['password'])){
	die('Both email and password are required');
}
$email = $_POST['email'];
$password = $_POST['password'];

$conn = mysqli_connect("localhost","root","")
    or die("Could not connect:" .mysqli_error($conn));
mysqli_select_db($conn, "slutprojekt") or die('db will not open');
$statement = $conn->prepare("SELECT * FROM test1 WHERE email = :email ");
$statement->execute([':email' => $email]);
$result = $statement->fetch_all(fetch_assoc());
?>