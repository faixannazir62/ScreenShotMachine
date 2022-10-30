<?php
include("userSession.php");

$TotalCount = 1;
if(isset($login_session)){
        $sql="UPDATE userdetails SET sscount = sscount + '$TotalCount' WHERE id = '$user_id'";
        mysqli_query($conn, $sql); 
       }else{
        $sql="UPDATE rssc SET rsscount = rsscount + '$TotalCount' WHERE rssid = 'RSSTotal'";
        mysqli_query($conn, $sql); 
       }

?>