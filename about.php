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
    // header
       include("header.php"); ?>

       <div class="about-text">
        <h2>Our web Application API is based on HTTP Get Request.</h2>
        <p>Our web Application can generate Website screenshots  with the help of Website Url. You can download website screenshot as Image or pdf, not only this we have multple options as well such as; </p>
        <ul>
          <li><b>Storage:</b> Our Web Application provides three types of stroage  such as:<b>Local Storage, Server Storage and Cloud Storage(Google drive).  </b></li>
          <li><b>CacheLimit:</b> Using cacheLimit parameter, you can manage how old (in days) cached images do you accept. Default value is 14.</li>
          <li><b>Crop:</b> Using crop parameter you can capture screenshot of the selected region. </li>
          <li><b>Hide:</b> Using hide parameter you can hide/remove any HTML element before webpage is captured as screenshot. Useful for hiding various GDPR/cookie banners, popup dialogs or any other web page elements.</li>
          <li><b>Delay:</b> Using delay parameter, you can manage how long capturing engine should wait before the screenshot is created. Default value is 200. This parameter is useful when you want to capture a webpage with some fancy animation and you want to wait until the animation finish.</li>
          <li>Here are few other Features like <b>Image Format, Pdf paper type, pdf orientation and so on.</b></li>
        </ul>
       </div>

    <div id="footer" class="footer">
      <div class="footerLogo-policy">
        <div class="footer-logo">
          <img
            src="images/Screenshot_2022-08-06_125700-removebg-preview.png"
            alt=""
          />
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
