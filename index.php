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
       include("header.php"); 
       ?>
     <div class="lg-alt"></div>
    <div id="formAndImage" class="formAndImage">
      <div class="formContainer">
        <div class="formText">
          <p>Capture your Website Screenshot Free!</p>
        </div>

        <div class="option">
          <div id="imageOption" class="imageOption opt">Web screenshot</div>

          <div id="pdfOption" class="pdfOption opt">pdf</div>
        </div>
        <div id="webScreenShot" class="webScreenShot">
          <form action="" method="post" data-form="homepage-form" id="frm">
            <input
              type="text"
              class="inputfield"
              id="home-url-screenshot"
              name="url"
              placeholder="Type webpage URL here, e.g. www.screenshotmachine.com"
              value=""
              required
            />
            <div class="form-inline mt-3 mb-3">
              <div class="custom-control custom-radio mr-3">
                <input
                  type="radio"
                  class="custom-control-input"
                  name="device"
                  value="desktop"
                  checked
                />

                <label class="custom-control-label">Desktop</label>
              </div>
              <div class="custom-control custom-radio mr-3">
                <input
                  type="radio"
                  class="custom-control-input"
                  name="device"
                  value="tablet"
                />

                <label class="custom-control-label">Tablet</label>
              </div>
              <div class="custom-control custom-radio mr-6">
                <input
                  type="radio"
                  class="custom-control-input"
                  name="device"
                  value="phone"
                />

                <label class="custom-control-label">Phone</label>
              </div>
            </div>
            <div class="form-inline mt-4">
              <div class="listbox">
                <label for="delay">Delay:</label>
                <select id="delaylist" name="delay">
                  <option value="0">0</option>
                  <option value="200">200ms</option>
                  <option value="800">800ms</option>
                  <option value="6000">6s</option>
                  <option value="8000">8s</option>
                  <option value="10000">10s</option>
                </select>
              </div>
              <div class="custom-control custom-checkbox">
                <input
                  type="checkbox"
                  class="custom-control-input"
                  name="full"
                  value="full"
                />
                <label class="custom-control-label" for="full"
                  >Full-page screenshot</label
                >
                <input type="hidden" name="cacheLimit" value="0" />
              </div>
            </div>
            <div class="form-inlinebtn">
              <button
                type="submit"
                name="capture"
                id="trigger-button"
                class="btn btn-primary btn-round btn-lg mr-3"
              >
                <img
                  src="images/camera_FILL0_wght400_GRAD0_opsz48.svg"
                  alt=""
                  width="20px"
                />
                Capture
              </button>
            </div>
          </form>
        </div>

        <div id="screenshotPdf" class="screenshotPdf">
          <form action="" method="post" data-form="homepage-pdf-form" id="frm">
            <input
              type="text"
              class="inputfield"
              id="home-url-pdf"
              name="url"
              placeholder="Type webpage URL here, e.g. www.screenshotmachine.com"
              value=""
              required
            />
            <div class="form-inline mt-3 mb-3">
              <div class="custom-control custom-radio mr-3">
                <input
                  type="radio"
                  class="custom-control-input"
                  name="orientation"
                  checked="checked"
                  value="portrait"
                />
                <label class="custom-control-label">Portrait</label>
              </div>
              <div class="custom-control custom-radio mr-8">
                <input
                  type="radio"
                  class="custom-control-input"
                  name="orientation"
                  value="landscape"
                />
                <label class="custom-control-label">Landscape</label>
              </div>
              <div class="custom-control custom-checkbox mr-3">
                <input
                  type="checkbox"
                  class="custom-control-input"
                  name="print"
                  value="print"
                />
                <label class="custom-control-label" for="print"
                  >Optimize for print</label
                >
              </div>
              <div class="custom-control custom-checkbox">
                <input
                  type="checkbox"
                  class="custom-control-input"
                  name="zoom"
                  value="50"
                />
                <label class="custom-control-label" for="zoom">Zoom 50%</label>
              </div>
            </div>
            <div class="form-inlinebtn">
              <button type="submit" class="btn" name="capturepdf">
                <img
                  src="images/camera_FILL0_wght400_GRAD0_opsz48.svg"
                  alt=""
                  width="20px"
                />Convert to PDF
              </button>
            </div>
          </form>
        </div>
      </div>

      <div class="ImageContainer">
        <img src="images/KHp5-unscreen.gif" alt="" />
      </div>
    </div>

    <!--           **********Popup html ***********             -->
    <div id="popup-container">
      <div id="inner-c-popup">
        <div class="close">
          <div id="exampleModalLabel"></div>

          <div id="PopUpClose" class="popup_close">X</div>
        </div>
         <?php if(!isset($login_session)){
          ?>
           <div class="simple-msg">Try our<a href="Website-screenshot-generator.php"> Advanced Tools</a> Features such as:<br> (Hide pop-ups, Selected area screenshot and much more)<br> </div>
          <?php
          }?>
        
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
              <?php echo' <img class="imageDisplay" id="screenshotImage" src="" />
              '. PHP_EOL; ?>
            </div>

            <object
              class="pdfView"
              id="resultWrapperPdf"
              data="ss/ScreenshotMachine-codepaq.pdf"
              type="application/pdf"
            >
              <p><a href="ss/ScreenshotMachine-codepaq.pdf"></a></p>
            </object>
          </section>
        </div>
        
      </div>
    </div>

    <!--Second container starts from here-->
    <div class="sndcontiner" id="sec-cnt">
      <div class="sec-heading">
        <h2>Let our machine capture your screenshots!</h2>
      </div>
      <div class="sec-element">
        <div class="media">
          <div class="lead-6"><img src="images/device.png" alt="" /></div>
          <div class="media-body">
            <h5>Responsive</h5>
            <p>
              Desktop, tablet or phone? Choose which device should be used for
              capturing.
            </p>
          </div>
        </div>
        <div class="media">
          <div class="lead-6"><img src="images/web-page.png" alt="" /></div>
          <div class="media-body">
            <h5>Full page</h5>
            <p>
              Some web page can be pretty long. No problem for our "machine".
            </p>
          </div>
        </div>
        <div class="media">
          <div class="lead-6">
            <img src="images/cloud-service.png" alt="" />
          </div>
          <div class="media-body">
            <h5>Powerful and scalable</h5>
            <p>
              Our API never sleeps, and is always online, ready to serve 24x7.
              PERIOD.
            </p>
          </div>
        </div>
      </div>
    </div>

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
