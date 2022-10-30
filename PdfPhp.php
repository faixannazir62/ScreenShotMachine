<?php
include('ScreenshotMachine.php');
$customer_key = "d7e454";
$secret_phrase = "12345"; //leave secret phrase empty, if not needed

$machine = new ScreenshotMachine($customer_key, $secret_phrase);

$url = $_POST['url'];
$orientation = $_POST['orientation'];

if(isset($_POST['print'])){
    $options['media'] = "print";
}elseif(isset($_POST['zoom'])){
    $options['scale'] = "50";
}
$options['url'] = $url;
$options['orientation'] = $orientation;


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