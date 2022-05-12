<?php
session_start();
unset($_SESSION['email']);
unset($_SESSION['id']);
unset($_SESSION['firstname']);
unset($_SESSION['lastname']);
header("location:index.php");
?>
