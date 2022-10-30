<?php
 include("userSession.php");
  
  $sql = "SELECT sscount FROM userdetails WHERE id = '$user_id'";
      $SSResult = mysqli_query($conn, $sql);
      if(mysqli_num_rows($SSResult) > 0){

          $row = $SSResult->fetch_assoc();
       $SSResult = $row['sscount'];

       }
   $sql="UPDATE rssc SET rsscount = rsscount + '$SSResult' WHERE rssid = 'Dass'";
        mysqli_query($conn, $sql); // update deleted account data

    // sql to delete a record
    $sql = "DELETE FROM userdetails WHERE id = '$user_id'";

    if ($conn->query($sql) === TRUE) {

        // Account data update
      $sql="UPDATE rssc SET rsscount = rsscount + 1 WHERE rssid = 'dltacc'";
        mysqli_query($conn, $sql); 

        echo 1;
        //session_destroy(); //destroy the session
        unset($_SESSION['login_user']);
    } else {
        echo 0;
    }

    $conn->close();
?>