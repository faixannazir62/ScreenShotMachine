<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--Css file-->
    <link rel="stylesheet" href="css/admin.css" />
    <!--Favicon -->
    <link
      rel="icon"
      type="image/x-icon"
      href="images/favicon-removebg-preview.png"
    />
    <script
      type="text/javascript"
      src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"
    ></script>
    
    <title>Screenshot machine</title>
    <style>
      .user-con{
        display: flex;
        flex-direction: column-reverse;
    justify-content: center;
    align-items: center;
      }
      .ImageContainer img{
        margin-top:40px;
        width:300px;
      }
    table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;

        }
 
        h1 {
            margin-top:30px;
            margin-bottom:10px;
            text-align: center;
            color: #2F4F4F;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT',
            ' Calibri', 'Trebuchet MS', 'sans-serif';
        }
 
        td {
            background-color: #2F4F4F;
            color:#fff;
            border: 1px solid black;
        }
 
        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px 40px;
            text-align: center;
        }
 
        td {
            font-weight: lighter;
        }
    </style>
  </head>
  <body>
    <?php
     include("adminSession.php");
        // Random Screenshot count
        $sql_rsscount = "SELECT rsscount FROM rssc WHERE rssid = 'RSSTotal'"; 
      $Rsscount = 0;
       $RsscountResult = mysqli_query($conn, $sql_rsscount);
       
       if(mysqli_num_rows($RsscountResult) > 0){

          $row = $RsscountResult->fetch_assoc();
       $Rsscount = $row['rsscount'];

       }

        //Deleted ss account data
       $DASScount = 0;
       $sql = "SELECT rsscount FROM rssc WHERE rssid = 'Dass'"; 
      
       $DASSResult = mysqli_query($conn, $sql);
       
       if(mysqli_num_rows($DASSResult) > 0){

          $row = $DASSResult->fetch_assoc();
       $DASScount = $row['rsscount'];

       }
        //Deleted account data
       $DASS = 0;
       $sql = "SELECT rsscount FROM rssc WHERE rssid = 'dltacc'"; 
      
       $dltaccResult = mysqli_query($conn, $sql);
       
       if(mysqli_num_rows($dltaccResult) > 0){

          $row = $dltaccResult->fetch_assoc();
       $DASS = $row['rsscount'];

       }


       // Total SS Count
       $userTotalSS = 0;
        $sql = "SELECT sscount FROM userdetails";
      $sscountResult = mysqli_query($conn, $sql);
       while($row= $sscountResult->fetch_assoc()){
             $userTotalSS += $row['sscount'];
                }
       
       $Totalsscount = $Rsscount + $userTotalSS + $DASScount;
      
      

       // total active users
       $sql = "SELECT fullname,id,sscount FROM userdetails";
       $userResult = mysqli_query($conn, $sql);
       $activeUsers =$userResult->num_rows;// Active user Total

     // user Queries fetch
       $sql = "SELECT * FROM queries";
       $queries = mysqli_query($conn, $sql);
       


      $conn->close();//close database
       
    ?>
    
    <div id="header" class="header">
      <div class="logo">
        <a href="index.php">
          <img src="images/Screenshot_2022-08-06_125700-removebg-preview.png" alt=""
        /></a>
      </div>
      <div class="navlinks">
        <ul>
          <li><a href="logout.php">LogOut</a></li>
        </ul>
      </div>
    </div>


    <div class="main-con">
      <div class="data">
        <div class="nc">
          <div class="nc-h">Active Users:</div>
          <div class="user-no"><?php echo $activeUsers;?></div>
        </div>
        <div class="nc">
          <div class="nc-h">Accounts Deleted by Users:</div>
          <div class="t-ss"><?php echo $DASS;?></div>
        </div>
        <div class="nc">
          <div class="nc-h">Total Screenshot Captured:</div>
          <div class="t-ss"><?php echo $Totalsscount;?></div>
        </div>
        
      </div>
    <div class="data"> 
         <div class="nc not-active">
          <div class="nc-h ">Screenshot Captured By Non Active Users:</div>
          <div class="t-ss"><?php echo $Rsscount;?></div>
        </div>
         <div class="nc not-active">
          <div class="nc-h nav-margin">Screenshot Captured By Active Users:</div>
          <div class="t-ss"><?php echo $userTotalSS;?></div>
        </div>
        <div class="nc">
          <div class="nc-h space"> User Deleted Account Screenshots:</div>
          <div class="t-ss"><?php echo $DASScount;?></div>
        </div>


    </div>
  
    </div>
    <section class="user-con">
        
        <!-- TABLE CONSTRUCTION -->
          <div class="tab">
            <h1>User Details</h1>
        <table>
          
            <tr>
                <th>No.</th>
                <th>FullName</th>
                <th>Username</th>
                <th>SSCount</th>
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php
                // LOOP TILL END OF DATA
                $i = 0;
                while($rows=$userResult->fetch_assoc())
                {
                  $i++;
            ?>
            <tr>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                <td><?php echo $i;?></td>
                <td><?php echo $rows['fullname'];?></td>
                <td><?php echo $rows['id'];?></td>
                <td><?php echo $rows['sscount'];?></td>
            </tr>
            <?php
                }
            ?>
        </table>


          </div>
          
                <div class="tab tab2">
            <h1>User Queries</h1>
        <table>
          
            <tr>
                <th>No.</th>
                <th>FullName</th>
                <th>Email</th>
                <th>Message</th>
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php
                // LOOP TILL END OF DATA
                $i = 0;
                while($row=$queries->fetch_assoc())
                {
                  $i++;
            ?>
            <tr>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                <td><?php echo $i;?></td>
                <td class="q-scroll"><?php echo $row['name'];?></td>
                <td class="q-scroll"><?php echo $row['email'];?></td>
                <td class="q-scroll"><?php echo $row['message'];?></td>
            </tr>
            <?php
                }
            ?>
        </table>


          </div>
     
    </section>
    

    <script src="js/main.js"></script>
  </body>
</html>
