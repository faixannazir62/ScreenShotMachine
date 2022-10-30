<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="icon"
      type="image/x-icon"
      href="images/favicon-removebg-preview.png"
    />
    <!--Css links-->
    <link rel="stylesheet" href="css/login-signup.css" />
    <link rel="stylesheet" href="css/index.css" />
    <link rel="stylesheet" href="css/hoverAndKeyframe.css" />
    <!--popup css file-->
    <script
      type="text/javascript"
      src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"
    ></script>
   
    
    <title>Screenshot Machine</title>
  </head>
  <body id="user-bd">

     <?php
    // header
       include("header.php");
       include("googleDriveApi.php");
       if(!isset($login_session)){
        header("location:index.php");
       }
       ?>
     <div class="p-main-c">
      
    <div class="pro-c">
      <div class="close-p-btn">X</div>
      <div class="bg-img">
        <img src="images/e7a7ae49fbada941acff63559c2513b4.jpg" alt="" />
      </div>
      <div class="user-p">
        <img src="images/usericon-removebg-preview.png" alt="" />
        <h2 class="user-fullname"><?php echo $user_fullname;?></h2>
        <p class="user-id"><?php echo $login_session;?></p>
      </div>
      <div class="user-d">
        <h5>Total Screenshot Captured</h5>
        <div class="user-sscount"><?php echo $user_sscount;?></div>
      </div>
      <div class="change-pssd dlt-acc">
        <a class="c-psd" id="c-psd" href="UserPasswordChange.php">Change Password</a>
        <span class="delAcc" id="dlt-acc" onclick="fun_dltAcc()">Delete Account</span>
        
      </div>
    </div>
    <div class="user-data">
        <div class="user-h-driv-o">
            <a class="profile-btn" href="#"><img src="images/usericon-removebg-preview.png" alt="" /> Profile</a>
            
          <h2>Captured Screenshots</h2>
         <?php echo"<a class='b-up-btn' href='".$client->createAuthUrl()."' onclick= 'dataBackup()'>Backup Now</a>"; ?>
        </div>
        <div class="d-con">
                  <div class="img-d sm">Images</div>
                  <div class="sep-d"></div>
                  <div class="pdf-d sm">PDF</div>
                </div>
      <div class="box-con">
      
         <?php //fetch user data

              $directory = "userSS/".$user_id;
              $images = glob($directory.'/**');
             
              
                ?>
                   <div id="img-u-data" class="inner-box-con" >
                      <?php
                  $imgCount = 0;
                 foreach($images as $image)
               {  
               
                
               if(!preg_match("/\.(pdf)$/", $image)){
                 $imgCount = 1;

                ?>
                <div class="box" >
                 
                    <div class="inner-box">
                        <?php   echo'  <a href="' .$image. '" target="_blank"><img src="' .$image. '" alt="" ></a>';?>
                    </div>
                    
                     <div class="linkbox">
                  <?php   echo '<a class="pre-link" href="' .$image. '" target="_blank">Preview</a>';
                  echo'<a clss="p-d-link"href="' .$image.'" download> Download</a>';?>
                  
                  <a href="DeleteScreenshots.php?ID=<?php echo $image ?>">Delete</a>
                   
                     </div>
         
                 </div>
                   <?php
                   }
                }//img end of foreach
                if ( $imgCount == 0 ) {
                echo '<h2 class="empty-txt">Empty</h2>';
              }  
                   ?> 
                 </div>
                <div id="pdf-u-data" class="inner-box-con">

                <?php
                  $pdfCount = 0;  
                 foreach($images as $pdf)
               {  
                  
                if(preg_match("/\.(pdf)$/", $pdf)){
                   $pdfCount = 1;
                 ?>
                
                <div class="box" >
                     <?php 
                      echo'  <a href="' .$pdf. '" target="_blank">
                      
                     <object
                       id="resultWrapperPdf"
                       data="' .$pdf.'"
                       type="application/pdf"
                       width="100%"
                       height="185px"
                      >
                      
                      </object>
                      </a>';?>
                     <div class="linkbox">
                  <?php   echo '<a class="pre-link" href="' .$pdf. '" target="_blank">Preview</a>';
                  echo'<a clss="p-d-link"href="' .$pdf.'" download> Download</a>';?>
                    
                 <a href="DeleteScreenshots.php?ID=<?php echo $pdf ?>">Delete</a>
                     </div>
         
                 </div>
                  <?php
                         }

                        }//end of foreach
                        if (  $pdfCount == 0 ) {
                             echo '<h2 class="empty-txt">Empty</h2>';
                             } 
                   ?>


                 </div>

              
                  
      </div>
        
      </div>
</div>

     <script>

      // account delete function
      function fun_dltAcc(){
         let text = "Are you Sure?";
         if (confirm(text) == true) {
          $.ajax({
            url: 'PsdAndACCdlt.php',
            success: function(data) {
              if(data == 1){
                if(!alert("Acount Deleted.")) document.location = 'index.php';
              }else{
                alert("Try Again Later.")
              }
             
           }
            });
          }
         }
         function dataBackup(){
          alert("Please Wait until Backup is Completed.");
      
          }
         

         

     </script>
     <script src="js/main.js"></script>
  </body>
</html>
