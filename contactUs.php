<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--Favicon -->
    <link
      rel="icon"
      type="image/x-icon"
      href="images/favicon-removebg-preview.png"
    />
    <!--Css file-->
    <link rel="stylesheet" href="css/contactCss.css" />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
    />
    <!--popup css file-->
    <script
      type="text/javascript"
      src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"
    ></script>
    <link href="css/popup_view.css" rel="stylesheet" />
    <title>ScreenShot Machine</title>
  </head>
  <body >
      <?php
    // header
       include("header.php"); 
       include("config.php");
       $msg_contact = "";
       if(isset($_POST['submit-contact'])){
       

        $name =$_POST['name'];
        $email = $_POST['email'];
        $message =$_POST['message'];

         if (empty( $name) || empty( $email) || empty($message)) {
              $msg_contact = "Empty fields not accepted";
         }else{
           $sql = "INSERT INTO queries (name,email,message) VALUES ('$name', '$email',  '$message')";
         if (mysqli_query($conn, $sql)) {
            $msg_contact = "Thanks for filling out our form!";
         }else{
           $msg_contact = "Try again later, Thanks.";
         }
         }
       }
       ?>
    <div class="contact-main">
    <div class="container">
      <div class="content">
        <div class="left-side">
          <div class="address details">
            <i class="fas fa-map-marker-alt"></i>
            <div class="topic">Address</div>
            <div class="text-one">Srinagar, 190001</div>
            <div class="text-two">Jammu & kashmir</div>
          </div>
          <div class="phone details">
            <i class="fas fa-phone-alt"></i>
            <div class="topic">Phone</div>
            <div class="text-one">+0098 9893 5947</div>
            <div class="text-two">+0096 3434 5978</div>
          </div>
          <div class="email details">
            <i class="fas fa-envelope"></i>
            <div class="topic">Email</div>
            <div class="text-one">support@screenshotmachine.com</div>
            <div class="text-two">info@screenshotmachine.com</div>
          </div>
        </div>
        <div class="right-side">
          <div class="topic-text">Send us a message</div>
          
          <form action="" method="post" data-form="contactfrm" id="contactfrm">
            <div class="input-box">
              <input type="text" placeholder="Enter your name"   name="name"required/>
            </div>
            <div class="input-box">
              <input type="email" placeholder="Enter your email" name="email" required />
            </div>
            <div class="input-box message-box">
          
            <textarea type="text" placeholder="Enter your message" name="message"></textarea>
            </div>
            <div class="button">
              <input type="submit" value="Send Now" name="submit-contact" />
            </div>
          </form>
          <div class="mesg"><?php echo  $msg_contact; ?></div>
        </div>
      </div>
    </div>
  </div>
    <script src="js/main.js"></script>
  </body>
</html>
