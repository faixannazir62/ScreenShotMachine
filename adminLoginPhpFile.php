<?php 
      include("config.php");
      session_start(); //startin session
      $error = 1; //variable for error message
      if(isset($_POST['submit'])){
        
           $username = $_POST['Username'];
           $password = $_POST['Password'];

           if (empty($username) || empty( $password)) {
             
            $error = "Username or password is invalid";
          
          } else{
            //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($conn, $username);  
        $password = mysqli_real_escape_string($conn, $password);  
      
        $sql = "select *from admin where id = '$username' and psd = '$password'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);
        if($count == 1){
          $_SESSION['id']=$username; // storing user details in session variable 
           header('Location:userdetails.php');
        } else{
          $error = "Username or password is invalid";
        }
        $conn -> close(); // Closing database Connection
        }
      }
    ?>