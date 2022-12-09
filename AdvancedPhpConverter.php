<?php
include('ScreenshotMachine.php');
// Create account on SCREENShotMachine.com and generate api key from there
$customer_key = "Api key";
$secret_phrase = ""; //leave secret phrase empty, if not needed

$machine = new ScreenshotMachine($customer_key, $secret_phrase);

$url = $_POST['url'];
$orientation = $_POST['orientation'];
$options['url'] = $url;
$options['orientation'] = $orientation;

if(isset($_POST['paper'])){
        $options['paper'] = "paper";
}
if(isset($_POST['print-only'])){
    $options['media'] = "print-only";
}
if(isset($_POST['scale'])){
    $options['scale'] = "scale";
}
if(isset($_POST['skipbg'])){
    $options['bg'] = "skipbg";
}
if(isset($_POST['timeout'])){
    $options['delay'] = "timeout";
}
if(isset($_POST['click'])){
    $options['click'] = $_POST['click'];
}
if(isset($_POST['hide'])){
    $options['hide'] = $_POST['hide'];
}

//url  working or not
$test_url = $url;
$test_url = preg_replace("(^https?://)", "", $test_url );// https:// from urls
//First check url is working or not    
$headers = @get_headers("https://" . $test_url);
  
// Use condition to check the existence of URL
if($headers && strpos( $headers[0], '200')) {

$pdf_api_url = $machine->generate_pdf_api_url($options);
$output_name = 'ScreenshotMachine-codepaq.pdf';//pdf name
$output_file = 'ss/'.$output_name;   

file_put_contents($output_file, file_get_contents($pdf_api_url));//save image from API then we can download
 //image download option
 // <object class="pdfView" data="ScreenshotMachine-codepaq.pdf" type="application/pdf" >
 // <p><a href="ScreenshotMachine-codepaq.pdf"></a></p>
//</object>

 echo '' .$output_file .'';

 include("userSession.php");
if(isset($_SESSION['login_user'])){ //same data in user profile

$uniquesavename=time().uniqid(rand()); 
// Store the path of destination file
$destination = 'userSS/'.$user_id.'/'.$uniquesavename.'-'.$output_name; 
if(copy($output_file, $destination) ) {}
//save data in user profile
}
 
   }else {
    echo 0;
}          
  ?>
