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
    <link rel="stylesheet" href="css/index.css" />
    <link rel="stylesheet" href="css/hoverAndKeyframe.css" />
    <!--popup css file-->
    <script
      type="text/javascript"
      src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"
    ></script>
    <link href="css/popup_view.css" rel="stylesheet" />
    <title>ScreenShot Machine</title>
  </head>
  <body class="bdy">
    <?php
     //login file
     include("userSession.php");

    ?>
    <div id="header" class="header">
      <div class="logo">
        <a href="index.php">
          <img src="images/Screenshot_2022-08-06_125700-removebg-preview.png" alt=""
        /></a>
      </div>
      <div class="navbar" id="navbar">
        <div class="bar"></div>
        <div class="bar"></div>
        <div class="bar"></div>
      </div>
  
      <div class="navlinks">
        <ul class="links">
          <li><a href="index.php">Home</a></li>
          <li>
            <span  id="free-sub">Advance Tools</span>
            <div class="submenu">
              <ul>
                <li>
                  <a href="Website-screenshot-generator.php"
                    >Website screenshot generator</a
                  >
                </li>
                <li>
                  <a href="website-to-pdf-converter.php"
                    >Web to PDF converter</a
                  >
                </li>
              </ul>
            </div>
          </li>
          <li><a href="about.php">About Us</a></li>
           <li><a href="contactUs.php">Contact Us</a></li>
        </ul>

        <?php
      if(!isset($login_session)){
         $conn -> close(); // Closing database Connection
         ?>
        <div class="l-s">
        <ul>
          <li><a class="lh" href="loginpage.php"><img src="images/user-icon.png" alt=""> login</a></li>
          <li>/</li>
          <li><a class="lh" href="signup.php"><img src="images/user-icon.png" alt="">Signup</a></li>
        </ul>
      </div>
      <?php
        }else{
           
           ?>
            
            <div class="u-c">
        <ul>
            <li id="user-name"><a href="userprofile.php"><?php echo $user_fullname;?></a></li>
          <li>
            <a href="userprofile.php"
              ><img src="images/usericon-removebg-preview.png" alt=""
            /></a>
          </li>
          <li class="l-O">/</li>
          <li class="l-O"><a href="userLogout.php">logOut</a></li>
        </ul>
        </div>
          <?php
        }
      ?>
      </div>

      
      
    </div>
  
  </body>
</html>
