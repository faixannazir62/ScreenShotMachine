<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
     <link
      rel="icon"
      type="image/x-icon"
      href="images/favicon-removebg-preview.png"
    />
    
    <link rel="stylesheet" href="css/admin.css" />
    <title>ScreenShot Machine</title>
  </head>
  <body class="bd">
    <!-- partial:index.partial.html -->
    <div id="bg">
      <img src="images/machine.png" alt="" />
    </div>

    <form action="" method="post" data-form="admin-form" id="frm" >
      <div class="form-field">
        <img class="user-l" src="images/user-icon.png" alt="" />
        <input type="email" placeholder="Email / Username" name="Username" required />
      </div>

      <div class="form-field">
        <img src="images/lock-icon.png" alt="" />
        <input type="password" placeholder="Password" name="Password" required />
      </div>

      <div class="form-field">
        <button class="btn" type="submit" name="submit">Log in</button>
      </div>
      <?php
       include("adminLoginPhpFile.php");
      if($error != 1){
          ?>
         <h5 class="log-msg"><?php echo $error;?></h5>
         <?php
      }
      ?>
      
    </form>
    
    <!-- partial -->
  </body>
</html>
