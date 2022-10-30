<?php
include("userlogin.php");
unset($_SESSION['login_user']); //destroy the session
$conn -> close();
header("location:index.php"); //to redirect back to "index.php" after logging out
exit();
?>