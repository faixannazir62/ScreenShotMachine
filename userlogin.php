<?php 

      include("config.php");
      session_start(); //startin session
      $error = ""; //variable for error message
      $count = 0;
      if(isset($_POST['submit'])){
        
           $username = $_POST['username'];
           $password = $_POST['password'];

           if (empty($username) || empty( $password)) {
             
            $error = "Empty Input fields not accepted";
          
          } else{
            //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($conn, $username);  
        $password = mysqli_real_escape_string($conn, $password);  
      
        $sql = "select *from userdetails where id = '$username' and psd = '$password'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);
        if($count == 1){
             $_SESSION['login_user']=$username; // storing user details in session variable 
            
              header('Location:index.php');
           
        }else{
           $error = "Username or password is invalid";
        }
        }
      }
      
    ?>
    