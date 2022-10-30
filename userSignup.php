<?php 
      include("config.php");
      $error = ""; //variable for error message
      $msg = "";
      $count = 0;
    
      if(isset($_POST['submit-signup'])){
           $fullname = $_POST['fullName'];
           $username = $_POST['email'];
           $password = $_POST['password'];

           if (empty($username) || empty( $password) || empty($fullname) ) {
             
            $error = "Empty Input fields not accepted";
          
          } else{
            $sql = "INSERT INTO userdetails (fullname, id,psd,sscount) VALUES ('$fullname', '$username',  '$password',0)";//at first sscount will be 0
               
            if (mysqli_query($conn, $sql)) {
                       $msg = "signup successfully";

                       $count = 1; 
                         $_SESSION['login_user']=$username; // storing user details in session variable 
              
                         header('Location:index.php');   
                       //create user ss Folder
                       if (!is_dir('UserSS/'.$username)) {
                            mkdir('UserSS/'.$username, 0777, true);
                         }
            } else {
              $error = "user id not available";
            }  
        $conn -> close(); // Closing database Connection
        }
      }
    ?>