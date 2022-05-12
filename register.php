<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Batturs Slutprojekt</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <div class="container bg-warning bg-opacity-75 d-flex align-items-center justify-content-center">
    <?php require_once 'messages.php'; ?>
    <form method="POST" action="signup.php" class="bg-primary bg-opacity-75 text-white mb-5 mt-5 w-75 rounded rounded-3">
    <p class="h1 text-center">Register</p>
    <div class="row">
  <div class="col mb-3 mx-5">
  <label for="firstname" class="form-label h5">First name:</label>
    <input type="text" class="form-control" id="firstname" placeholder="First name" name="firstname" value="">
  </div>
  <div class="col mb-3 mx-5">
  <label for="lastname" class="form-label h5">Last name:</label>
    <input type="text" class="form-control" id="lastname" placeholder="Last name" name="lastname" value="">
  </div>
</div>
<div class="mb-3 mx-5">
  <label for="email" class="form-label h5">Email:</label>
  <input type="text" class="form-control" id="email" placeholder="Type your email here" name="email">
</div>
<div class="mb-3 mx-5">
  <label for="password" class="form-label h5">Password:</label>
  <input type="text" class="form-control" id="password" placeholder="Type password here" name="password">
</div>
<div class="mb-3 mx-5">
  <label for="password_confirm" class="form-label h5">Repeat Password:</label>
  <input type="text" class="form-control" id="password_confirm" placeholder="Retype password here" name="password_confirm">
</div>
<div class="mb-3 mx-5">
  <button class="btn btn-light" type="submit" name="submit">submit</button>
</div>
        <p class="mb-3 mx-5 h5">Already have an account?</p>
        <p class="mb-5 mx-5"><a href="index.php"class="btn-light btn-block btn-lg">log in here</a></p>
    </form>
    </div>
    <?php
    /* script för att skapa ett tabell
    $conn = mysqli_connect("localhost","root","")
        or die("Could not connect:" .mysqli_error($conn));
        mysqli_select_db($conn, "slutprojekt") or die('db will not open');
        $query = "CREATE TABLE test1 (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            firstname VARCHAR(30) NOT NULL,
            lastname VARCHAR(30) NOT NULL,
            email VARCHAR(50) NOT NULL,
            pass VARCHAR(50) NOT NULL,
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
$result = mysqli_query($conn,$query) or die("invalid query");
print"Successful query and that is good";
mysqli_close($conn);
*/
    ?>
</body>
