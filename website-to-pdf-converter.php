<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Favicon -->
    <link rel="icon" type="image/x-icon" href="/images/favicon-removebg-preview.png">
     <!--Css file-->
    <link rel="stylesheet" href="css/index.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/hoverAndKeyframe.css">
    <!--popup css file-->
    <link href="css/popup_view.css" rel="stylesheet">
    <script
      type="text/javascript"
      src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"
    ></script>

    <title>ScreenShot Machine</title>
    
</head>
<body class="bdy" >
<?php
    // header
       include("header.php"); 
       if(!isset($login_session)){
         header("location:loginpage.php");
       }
       ?>
     
    <div class="container-1">
        <h1 class="display-4">Web to PDF converter</h1>
        <p class="lead-2 mt-6">How to convert entire website to pdf? <b>Screenshot Machine</b> is the only tool you need! Convert any online web page to PDF with one click. Convert entire website to PDF optimized for printing. We also offer the powerful and fully customizable.</p>
    </div>
    <div class=" container-2">
        <div class="card border mb-5 mt-5">
            <div class="card-body">
        <form action="#" method="post" data-form="generator-pdf-form">
                                <div class="form-group row">
                <label for="url" class="col-sm-2 col2 col-form-label">URL</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-url" id="url" name="url" placeholder="Type webpage URL here, e.g. www.screenshotmachine.com" value="" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="paper" class="col-sm-2 col2 col-form-label">Paper size</label>
                <div class="col-sm-2">
                    <select class="form-control form-control-sm" id="paper" name="paper">
                        <option value="letter">Letter</option>
                        <option value="legal">Legal</option>
                        <option value="ledger">Ledger</option>
                        <option value="tabloid">Tabloid</option>
                        <option value="A0">A0</option>
                        <option value="A1">A1</option>
                        <option value="A2">A2</option>
                        <option value="A3">A3</option>
                        <option value="A4">A4</option>
                        <option value="A5">A5</option>
                        <option value="A6">A6</option>
                    </select>
                </div>
                <div class="col-sm-8">
                    <small>Page size format.</small>
                </div>
            </div>
            <div class="form-group row">
                <label for="orientation" class="col-sm-2 col-form-label">Page prientation</label>
                <div class="col-sm-2">
                    <select class="form-control form-control-sm" id="orientation" name="orientation">
                        <option value="portrait" checked>Portrait</option>
                        <option value="landscape">Landscape</option>
                    </select>
                </div>
                <div class="col-sm-8">
                    <small>Orientation of pages in PDF.</small>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2"></div>
                <div class="col-sm-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="print-only" name="print-only">
                        <label class="form-check-label" for="print-only">
                            Optimize for print
                        </label>
                    </div>
                </div>
                <div class="col-sm-8">
                    <small>Mark this checkbox if you want to create printer-friendly PDF, without web specific elements and graphic.</small>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2"></div>
                <div class="col-sm-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="skipbg" name="skipbg">
                        <label class="form-check-label" for="skipbg">
                            No background
                        </label>
                    </div>
                </div>
                <div class="col-sm-8">
                    <small>Mark this checkbox if you do not want to add website background to PDF file.</small>
                </div>
            </div>
            <div class="form-group row">
                <label for="scale" class="col-sm-2 col2 col-form-label">Zoom scale</label>
                <div class="col-sm-2">
                    <select class="form-control  form-control-sm" name="scale" id="scale">
                        <option value="20">20 %</option>
                        <option value="25">25 %</option>
                        <option value="40">40 %</option>
                        <option value="50">50 %</option>
                        <option value="60">60 %</option>
                        <option value="75">75 %</option>
                        <option value="80">80 %</option>
                        <option value="100" selected="selected">100 %</option>
                        <option value="125">125 %</option>
                        <option value="150">150 %</option>
                        <option value="175">175 %</option>
                        <option value="200">200 %</option>
                    </select>
                </div>
                <div class="col-sm-8">
                    <small>Website zoom before the PDF is captured.</small>
                </div>
            </div>
            <div class="form-group row">
                <label for="timeout" class="col-sm-2 col-form-label">Delay [in seconds]</label>
                <div class="col-sm-1">
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
                    <small>Using this parameter, you can manage how long our converter engine should wait before the PDF is created. Default value are <strong>2</strong> seconds. This parameter is useful when you want to convert longer pages.</small>
                </div>
            </div>
            <div class="form-group row">
                <label for="click" class="col-sm-2 col-form-label">Click on element</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control form-control-sm" name="click" id="click" placeholder="" value="">
                </div>
                <div class="col-sm-8">
                   <small>Try these HTML tags to hide the cookies, banner or any other  pop-ups :<b> button or div. (These tags works with almost all the websites)</b></small>
                </div>
            </div>
            <div class="form-group row">
                <label for="hide" class="col-sm-2 col-form-label">Hide elements</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control form-control-sm" name="hide" id="hide" placeholder="" value="">
                </div>
                <div class="col-sm-8">
                    <small>Comma separated selectors of elements that will be hidden before the PDF is created. Useful for hidding various GDPR/cookie banners, popup dialogs or any other elements. Usage is the same as "Click on element".<br> or <br> 
                      <small>Try these HTML tags to hide the cookies, banner or any other  pop-ups :<b> button or div. (These tags works with almost all the websites)</b></small>
                </small></div><small>
            </small></div><small>
                                <div class="form-group row">
                <div class="col-sm-12 form-inlinebtn">
                    <input type="hidden" name="cacheLimit" value="0">
                    <button  type="submit" name="capture" id="trigger-button" class="btn btn-primary btn-round btn-lg mr-3" ><img src="images/camera_FILL0_wght400_GRAD0_opsz48.svg" alt="" width="20px"> Capture</button>
                 </div>
            </div>
        
        </small>
    </form>
   </div>
   </div>
</div>
 <!--           **********Popup html ***********             -->
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
              <object class="pdfView" id="resultWrapperPdf" data="ss/ScreenshotMachine-codepaq.pdf" type="application/pdf" >
                    <p><a href="ss/ScreenshotMachine-codepaq.pdf"></a></p>
              </object>
            
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