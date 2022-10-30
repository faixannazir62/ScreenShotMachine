<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Favicon -->
    <link rel="icon" type="image/x-icon" href="images/favicon-removebg-preview.png">
     <!--Css file-->
    <link rel="stylesheet" href="css/index.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/hoverAndKeyframe.css">
    <!--popup css file-->
    <link href="css/popup_view.css" rel="stylesheet">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  
    <title>ScreenShot Machine</title>
    
</head>
<body class="bdy">
    <?php
    // header
       
    // header
       include("header.php"); 
       if(!isset($login_session)){
          header("location:loginpage.php");
       }
      
       ?>


    <div class="container-1">
        <h1 class="display-4">Online website screenshot generator</h1>
        <p class="lead-2 mt-6">Use our advanced website screenshot generator to capture web page from different devices using any resolution. Capture even the entire web page. We also offer a powerful and fully customizable.</p>
    </div>

    <div class="container-2">
        <div class="card border mb-5 mt-5">
            <div class="card-body">
        <form action="#" method="post" data-form="advanced-image-form">
                                 <div class="form-group row">
                <label for="url" class="col-sm-2 col-form-label url-text">URL</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-url" id="url" name="url" placeholder="Type webpage URL here, e.g. www.screenshotmachine.com" value="" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="device" class="col-sm-2 col-form-label">Device type</label>
                <div class="col-sm-2 col-3">
                    <select class="form-control form-control-sm" id="device" name="device" onchange="changeScreenshotDimension(this);">
                        <option value="desktop">desktop</option>
                        <option value="phone">phone</option>
                        <option value="tablet">tablet</option>
                    </select>
                </div>
                <div class="col-sm-8">
                    <small>Choose which device should be used for web page screenshot rendering. Because of optimization, modern web pages look different on various device types.</small>
                </div>
            </div>
            <div class="form-group row">
                <label for="width" class="col-sm-2 col-form-label">Width</label>
                <div class="col-sm-2 col-3">
                    <input type="number" class="form-control form-control-sm" id="width" name="width" placeholder="e.g. 1024" value="1024">
                </div>
                <div class="col-sm-8">
                    <small>Website screenshot width in pixels. Minimal value is <strong>100</strong> and maximal value is <strong>1920</strong>.</small>
                </div>
            </div>
            <div class="form-group row">
                <label for="height" class="col-sm-2 col-form-label">Height</label>
                <div class="col-sm-2 col-3">
                    <input type="text" class="form-control form-control-sm" name="height" id="inputHeight" placeholder="e.g. 768" value="768">
                </div>
                <div class="col-sm-8">
                    <small>Website screenshot height in pixels. Minimal value is <strong>100</strong> and maximal value is <strong>9999</strong> or type in <strong>full</strong> if you need the full website screenshot.</small>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2"></div>
                <div class="col-sm-2 col-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="inputHeightFull" onclick="changeScreenshotHeight();">
                        <label class="form-check-label" for="inputHeightFull">
                            Full page screenshot
                        </label>
                    </div>
                </div>
                <div class="col-sm-8">
                    <small>Mark this checkbox if you want to capture full page website screenshot.</small>
                </div>
            </div>
            <div class="form-group row">
                        <label for="format" class="col-sm-2 col-form-label">Image format</label>
                        <div class="col-sm-2 col-3">
                            <select class="form-control  form-control-sm" name="format" id="format">
                                <option value="png">PNG</option>
                                <option value="jpg">JPG</option>
                                <option value="gif">GIF</option>
                            </select>
                        </div>
                        <div class="col-sm-8">
                            <small>Image format of the captured website screenshot.</small>
                        </div>
                    </div>
            <div class="form-group row">
                <label for="zoom" class="col-sm-2 col-form-label">Zoom</label>
                <div class="col-sm-2 col-3">
                    <select class="form-control  form-control-sm" name="zoom" id="zoom">
                        <option value="25">25 %</option>
                        <option value="50">50 %</option>
                        <option value="75">75 %</option>
                        <option value="100" selected="selected">100 %</option>
                        <option value="200">200 %</option>
                        <option value="300">300 %</option>
                        <option value="400">400 %</option>
                    </select>
                </div>
                <div class="col-sm-8">
                    <small>Website zoom before webpage screenshot is captured.</small>
                </div>
            </div>
            <div class="form-group row">
                <label for="timeout" class="col-sm-2 col-form-label">Delay [in seconds]</label>
                <div class="col-sm-1 col-3">
                    <select class="form-control  form-control-sm" name="timeout" id="timeout">
                        <option value="0">0</option>
                        <option value="500">0.5</option>
                        <option value="1000">1</option>
                        <option value="2000" selected="selected">2</option>
                        <option value="4000">4</option>
                        <option value="10000">10</option>
                    </select>
                </div>
            
                <div class="col-sm-8">
                    <small>Using this parameter, you can manage how long our webpage capturing generator should wait before the website screenshot is created. Default value are <strong>2</strong> seconds. This parameter is useful when you want to capture a webpage with some fancy animation and you want to wait until the animation finish.</small>
                </div>
            </div>
            <div class="form-group row">
                <label for="timeout" class="col-sm-2 col-form-label">CacheLimit</label>
                <div class="col-sm-1 col-3">
                    <select class="form-control  form-control-sm" name="cacheLimit" id="cacheLimit">
                        <option value="0" selected="selected">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                    </select>
                </div>
            
                <div class="col-sm-8">
                    <small>Allowed values are: (0 - 14), Using cacheLimit parameter, you can manage how old (in days) cached images do you accept. Default value is 14.</small>
                </div>
            </div>
            <div class="form-group row">
                <label for="click" class="col-sm-2 col-form-label">Click on element</label>
                <div class="col-sm-2 col-3">
                    <input type="text" class="form-control form-control-sm" name="click" id="click" placeholder="" value="">
                </div>
                <div class="col-sm-8">
                    <small>Try these HTML tags to hide the cookies, banner or any other  pop-ups :<b> button or div. (These tags works with almost all the websites)</b></small>
                </div>
            </div>
            <div class="form-group row">
                <label for="hide" class="col-sm-2 col-form-label">Hide elements</label>
                <div class="col-sm-2 col-3">
                    <input type="text" class="form-control form-control-sm" name="hide" id="hide" placeholder="" value="">
                </div>
                <div class="col-sm-8">
                  <small>Comma separated selectors of elements that will be hidden before the PDF is created. Useful for hidding various GDPR/cookie banners, popup dialogs or any other elements. Usage is the same as "Click on element".<br> or <br> 
                      <small>Try these HTML tags to hide the cookies, banner or any other  pop-ups :<b> button or div. (These tags works with almost all the websites)</b></small>
                </small></div>
            </div>
            <div class="form-group row">
                <label for="hide" class="col-sm-2 col-form-label">Selector</label>
                <div class="col-sm-2 col-3">
                    <input type="text" class="form-control form-control-sm" name="selector" id="selector" placeholder="" value="">
                </div>
                <div class="col-sm-8">
                    <small>Capture a screenshot of the first DOM element matched by CSS selector.</small>
                </div>
            </div>
            <div class="form-group row">
                <label for="hide" class="col-sm-2 col-form-label">Crop rectangle</label>
                <div class="col-sm-2 col-3">
                    <input type="text" class="form-control form-control-sm" name="crop" id="crop" placeholder="100,0,800,300" value="">
                </div>
                <div class="col-sm-8">
                    <small>Capture a screenshot of the selected region. For example: <code>100,0,800,300</code> captures a screenshot of rectangle with dimension width=800px, height=300px and with upper left corner started at position x=100px and y=0px of the viewport.</small>
                </div>
            </div>
                                <div class="form-group row">
                <div class="col-sm-12 form-inlinebtn">
                    <button  type="submit" name="capture" id="trigger-button" class="btn btn-primary btn-round btn-lg mr-3" ><img src="images/camera_FILL0_wght400_GRAD0_opsz48.svg" alt="" width="20px"> Capture</button>
                </div>
            </div>
        </form>
        </div>

        </div>
          
           

</div>
<div id="popup-container">
      <div id="inner-c-popup">
        <div class="close">
          <div id="exampleModalLabel"></div>

          <div id="PopUpClose" class="popup_close">X</div>
        </div>
        <div id="errorContainer">
          <div id="resultMessage"></div>
        </div>
        
        <div id="popupLoader">
          <img src="images/teamwork.gif" alt="" />
        </div>

        <div id="popup_wrapper" class="popup_full popup_hide">
          <div class="dwn">
            <p id="dwnHide">
             <a href="" id="downloadLink" download>Download Screenshot</a>
            </p>
          </div>

          <section class="popup_container">
            <div class="popup_content">
            <?php echo' <img class="imageDisplay" id="screenshotImage" src="" /> '. PHP_EOL; ?>
            </div>
          </section>
        </div>
 
      </div>
    </div>


    <div id="footer" class="footer">

        <div class="footerLogo-policy">
            <div class="footer-logo">
                <img src="images/Screenshot_2022-08-06_125700-removebg-preview.png" alt="">
                <p class="small py-0 my-0">Powerful and reliable website screenshot API designed to take screenshots of any online web page in couple of seconds.</p>
            </div>
            <div class="footer-links">
              <!-- <a class="nav-link" href="privacypolicy.php">Privacy policy</a>
                <a class="nav-link" href="termsandconditions.php">Terms &amp; conditions</a>
                    -->
            </div>
        </div>
        <div class="seprator">
            <div class="line"></div>
        </div>
        <div class="copyright">
            <p>© 2022All rights reserved | Designed & Developed By Faizan | Ruman | Saleem | Owais.</a></p>
        </div>
        

    </div>
    
<script src="js/main.js"></script>
</body>
</html>