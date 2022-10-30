<?php
require_once 'vendor/autoload.php';
// code that will hide the warnings                       
    error_reporting(E_ERROR|E_PARSE);

// init configuration
$clientID = '386006738001-jf5rl50up88h1up9jtn7s2qn57krp017.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost/ScreenshotMachine/loginpage.php';
$googleDrive = 'https://www.googleapis.com/auth/drive';

try{
   // create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->setScopes(array($googleDrive));
$client->addScope("email");
$client->addScope("profile");


// authenticate code from Google OAuth Flow
if (isset($_GET['code'])) {
  $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
  
    $client->setAccessToken($token['access_token']);
  // get profile info
  $google_oauth = new Google_Service_Oauth2($client);
  $google_account_info = $google_oauth->userinfo->get();
  $username =  $google_account_info->email;
  $fullname =  $google_account_info->name;
  $userToken =  $token['access_token'];
 //user details available or not
$sql = "INSERT INTO userdetails (fullname, id,psd,sscount) VALUES ('$fullname', '$username','$userToken',0)";//at first sscount will be 0
            if (mysqli_query($conn, $sql)) {
                  $msg = "signup successfully";
                  $count = 1;
                  //create user ss Folder
                  if (!is_dir('UserSS/'.$username)) {
                       mkdir('UserSS/'.$username, 0777, true);
                    }
                   //read user folder
                   

              $_SESSION['login_user']=$username; // storing user details in session variable 
  
              header('Location:index.php');
       
            } else {

              $sql = "SELECT *FROM userdetails WHERE id = '$username'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);
        if($count == 1){
             $_SESSION['login_user']=$username; // storing user details in session variable 
              
             header('Location:index.php');
        }else{
           $error = "Username or password is invalid";
        }
        }//outer else end.
}
}catch (Exception $e) {
    
  }
?>