<?php
session_start();
if(isset($_POST['submit']))
{
$email = $_POST['email'];
$password = $_POST['password'];
$conn = mysqli_connect("localhost","root","")
or die("Could not connect:" .mysqli_error($conn));
mysqli_select_db($conn, "slutprojekt") or die('db will not open');
// check email funktion funkar nu
$query = mysqli_query($conn, "SELECT * FROM test1 WHERE email = '$email' and pass = '$password'");
$row = mysqli_fetch_array($query,MYSQLI_ASSOC);
$_SESSION['firstname'] = $row['firstname'];
$_SESSION['lastname'] = $row['lastname'];
$_SESSION['email'] = $email;
$check_user = mysqli_query($conn, "SELECT * FROM test1 WHERE email = '$email' and pass = '$password'");
if(mysqli_num_rows($check_user) == 1){
    $_SESSION['messages'][] = 'success';
    header('Location: welcome.php');
    exit; 
}else {if(empty($_POST['email']) || empty($_POST['password'])){
    die('Both email and password are required');
}
    else{echo "Username or Password is invalid";}
    }
}
?>
<!DOCTYPE html>
<head>
    <title>Log in</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <div class="container bg-warning bg-opacity-75 d-flex align-items-center justify-content-center">
    <form method="POST" action="" class="bg-primary bg-opacity-75 text-white mb-5 mt-5 w-75 rounded rounded-3">
    <p class="h1 text-center">Log in</p>
    <div class="mb-3 mx-5">
  <label for="email" class="form-label h5">Email:</label>
  <input type="text" class="form-control" id="email" placeholder="Type your email here" name="email">
</div>
<div class="mb-3 mx-5">
  <label for="password" class="form-label h5">Password:</label>
  <input type="password" class="form-control" id="password" placeholder="Type password here" name="password">
</div>
<div class="mb-3 mx-5">
  <button class="btn btn-light" type="submit" name="submit">Log in</button>
</div>
    <p class="mb-3 mx-5 h5">Don't have an account?</p>
    <p class="mb-5 mx-5"><a href="register.php"class="btn-light btn-block btn-lg">Register in here</a></p>
    </form>
    </div>
    <?php
        /*
        $conn = mysqli_connect("localhost","root","")
        or die("Could not connect:" .mysqli_error($conn));
        mysqli_select_db($conn, "elev_info") or die('db will not open');
        $query = "CREATE TABLE students (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            firstname VARCHAR(30) NOT NULL,
            lastname VARCHAR(30) NOT NULL,
            lname VARCHAR(50) NOT NULL,
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
$result = mysqli_query($conn,$query) or die("invalid query");
print"Successful query and that is good";
mysqli_close($conn);
*/
    ?>
</body>
