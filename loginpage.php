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
     <script
      type="text/javascript"
      src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"
    ></script>
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
    // login php code
     
    // header
      
       
     include("userlogin.php");
      include("googleSignIn.php");
       include("header.php"); 
    ?>
    
   
    <div id="login-form-wrap" Class="common-css-lg-lo">
      <h2>Login</h2>
       <h6>Login and use our Free Tools.</h6>
        
       <div class="google-login">
        <img src="images/google-logo-vector-28387554.jpg" alt="">
        <?php echo"<a href='".$client->createAuthUrl()."'>Sign In with Google</a>"; ?>
       </div>
       <p class="or">Or</p>
      <form action="" method="post" data-form="signup-form" id="login-form" class="lf-sf">
        <p>
          <input
            type="text"
            id="username"
            name="username"
            placeholder="Username"
            required
          /><i class="validation"><span></span><span></span></i>
        </p>
        <p>
          <input
            type="password"
            id="password"
            name="password"
            placeholder="Password"
            required
          /><i class="validation"><span></span><span></span></i>
        </p>
        <p>
          <input type="submit" id="login" value="Login" name="submit" />
        </p>
        <?php
        if($count != 1){
          ?>
         <h5 class="log-msg"> <?php echo $error;?></h5>
         <?php
        }
        ?>
      </form>
     
       
      <div id="create-account-wrap">
        <p>Don't have Account? <a href="signup.php">Create Account</a></p>
        <p></p>
      </div>

      <!--create-account-wrap-->
    </div>
    <!--login-form-wrap-->
    <div id="footer" class="footer">
      <div class="footerLogo-policy">
        <div class="footer-logo">
          <img src="images/Screenshot_2022-08-06_125700-removebg-preview.png" alt="" />
          <p class="small py-0 my-0">
            Powerful and reliable website screenshot API designed to take
            screenshots of any online web page in couple of seconds.
          </p>
        </div>
        <div class="footer-links">
          <!--
          <a class="nav-link" href="privacypolicy.php">Privacy policy</a>
          <a class="nav-link" href="termsandconditions.php"
            >Terms &amp; conditions</a
          >
-->
        </div>
      </div>
      <div class="seprator">
        <div class="line"></div>
      </div>
      <div class="copyright">
        <p>
          © 2022All rights reserved | Designed & Developed By Faizan | Ruman |
          Saleem | Owais.
        </p>
      </div>
    </div>
    <script src="js/main.js"></script>
  </body>
</html>
