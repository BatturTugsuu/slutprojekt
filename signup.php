<?php
//den filen hanterar användar registration logikerna som matas in av användaren i register.php
session_start();
$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];
if (empty($fname) ||
    empty($lname) ||
    empty($email) ||
    empty($password) ||
    empty($password_confirm)) {
    $_SESSION['messages'][] = 'Please fill all required fields!';
    header('Location: register.php');
    exit;
}

if ($password !== $password_confirm) {
    $_SESSION['messages'][] = 'Password and Confirm password should match!';
    header('Location: register.php');
    exit; 
}

    
if(isset($_POST['submit']))
{
$conn = mysqli_connect("localhost","root","")
or die("Could not connect:" .mysqli_error($conn));
mysqli_select_db($conn, "slutprojekt") or die('db will not open');
// check email funktion funkar nu

//här kollar man om det finns redan ett konto som har samma email som användaren försöker skapa
$check_email = mysqli_query($conn, "SELECT * FROM test1 where email = '$email' ");
if(mysqli_num_rows($check_email) > 0){
    $_SESSION['messages'][] = 'User with this email Already exists';
    header('Location: register.php');
    exit; 
}
//om det inte finns samma email redan så las information som formen i register.php samlade sparas i tabellen test1 i databasen
//och skriver ut Your account has been created successfully i register.php med hjälp messages.php och session
$query = "INSERT INTO test1 (id, firstname, lastname, email, pass) VALUES ('0', '$fname', '$lname', '$email', '$password'
)";
$result = mysqli_query($conn,$query) or die("invalid query");
if($result){
    $_SESSION['messages'][] = 'Your account has been created successfully!<br><a href="index.php">Login</a>';
    header('Location: register.php');
    exit;
}
mysqli_close($conn);
}
?>