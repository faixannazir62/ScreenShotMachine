<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link
      rel="icon"
      type="image/x-icon"
      href="images/favicon-removebg-preview.png"
    />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css"
    />
    <!--Css links-->
    <link rel="stylesheet" href="css/login-signup.css" />
    <link rel="stylesheet" href="css/index.css" />
    <link rel="stylesheet" href="css/hoverAndKeyframe.css" />
    <style>
      body {
        background-color: rgb(224, 240, 247);
        font-size: 1.6rem;
        font-family: "Open Sans", sans-serif;
        color: #2b3e51;
      }
    </style>
    <title>ScreenShot Machine</title>
  </head>
  <body>
    <?php
    // header
       include("header.php");
       $count =0;
       $errormsg = "";
       $msg = "";
        if(isset($_POST['psdsubmit'])){
           $old_psd = $_POST['Oldpassword'];
           $new_psd = $_POST['Newpassword'];

           if (empty($old_psd) || empty($new_psd )) {
             
            $errormsg = "Empty Fields Not accepted";
          
          }elseif($old_psd == $new_psd){
                  $errormsg ="Old and new password are same";
          } else{
            //to prevent from mysqli injection  
         $old_psd = stripcslashes( $old_psd);  
        $new_psd  = stripcslashes($new_psd );  
         $old_psd = mysqli_real_escape_string($conn,  $old_psd);  
        $new_psd = mysqli_real_escape_string($conn, $new_psd);  
      
        $sql = "SELECT *FROM userdetails WHERE id = '$user_id' AND psd = '$old_psd'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);
        if($count == 1){

            $sql = "UPDATE userdetails SET psd='$new_psd' WHERE  id = '$user_id'";
            if ($conn->query($sql) === TRUE) {
                       $msg = "password changed";
                        header('Refresh: 1; URL=userprofile.php');//after 1 sec redirect this page  
              } else {
                 $errormsg = "try again later";
              }
          
        } else{
          $errormsg = "Old password is incorrect";
        }
        
        }
  }
       ?>
      
    
    <div id="login-form-wrap">
      <h2>Change Password</h2>
      <form
        action=""
        method="post"
        data-form="passwordChange-form"
        id="login-form"
      >
        <p>
          <input
            type="text"
            id="Oldpassword"
            name="Oldpassword"
            placeholder="Old Password"
            required
          />
        </p>
        <p>
          <input
            type="password"
            id="Newpassword"
            name="Newpassword"
            placeholder="New Password"
            required
          />
        </p>
        <p>
          <input type="submit" id="submit" value="submit" name="psdsubmit" />
        </p>
        <?php
      if($count != 1){
          ?>
         <h5 class="log-msg"> <?php echo  $errormsg;?></h5>
         <?php
      }else{
        ?>
         <h5 class="s-msg"> <?php echo  $msg;?></h5>
         <?php
      }
      ?>
      </form>
    </div>
  </body>
</html>
