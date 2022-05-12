<?php
session_start();
?>
<html">
   
   <head>
      <title>Welcome</title>
   </head>
   
   <body>
      <p>Welcome <?php echo $_SESSION['firstname'],' ',$_SESSION['lastname']; ?></p> 
      <h2><a href = "logout.php">Sign Out</a></h2>
   </body>
   
</html>