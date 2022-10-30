<?php
include("adminLoginPhpFile.php");
unset($_SESSION['id']); //destroy the session
header("location:adminlogin.php"); //to redirect back to "index.php" after logging out
exit();
?>