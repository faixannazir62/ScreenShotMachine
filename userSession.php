<?php
include("userlogin.php");
$user_fullname ="";
$user_sscount ="";
$user_id = "";
$alert = 0;
if(isset($_SESSION['login_user'])){
// Storing Session 
 $user_check=$_SESSION['login_user'];
  // SQL Query To Fetch Complete Information Of User
$sql = "SELECT fullname,id,sscount FROM userdetails where id = '$user_check'";  
$ses_sql = mysqli_query($conn, $sql); 
$row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC); 
$login_session =$row['id'];
$user_id = $login_session;
$user_fullname =$row['fullname'];
$user_sscount =$row['sscount'];


}
?>