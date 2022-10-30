<?php
$file =$_REQUEST['ID'];
unlink($file);
 header("location:userprofile.php");
?>