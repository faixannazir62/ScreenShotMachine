<?php
include("config.php");
include("adminLoginPhpFile.php");
// Storing Session
$user_check=$_SESSION['id'];
// SQL Query To Fetch Complete Information Of User
$sql = "select *from admin where id = '$user_check'";  
$ses_sql= mysqli_query($conn, $sql); 
$row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC); 
$login_session =$row['id'];
if(!isset($login_session)){
 $conn -> close(); // Closing database Connection
header('Location: adminlogin.php'); // Redirecting To admin loginpage
}
?>