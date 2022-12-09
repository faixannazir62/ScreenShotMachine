<?php 

include('ScreenshotMachine.php');
// Create account on SCREENShotMachine.com and generate api key from there 
$customer_key = "api key";
$secret_phrase = ""; //leave secret phrase empty, if not needed

$machine = new ScreenshotMachine($customer_key, $secret_phrase);
$url = $_POST['url'];
$device = $_POST['device'];
$delay = $_POST['timeout'];
$width = $_POST['width'];
$format = $_POST['format'];
$height= $_POST['height'];
$zoom = $_POST['zoom'];
$cacheLimit = $_POST['cacheLimit'];
if(isset($_POST['click'])){
    $options['click'] = $_POST['click'];
}
if(isset($_POST['hide'])){
    $options['hide'] = $_POST['hide'];
}
if(isset($_POST['selector'])){
    $options['selector'] = $_POST['selector'];
}
if(isset($_POST['crop'])){
    $options['crop'] = $_POST['crop'];
}
//passing arugments
$options['url'] = $url;
$options['device'] = $device;
$options['delay'] = $delay;
$options['format'] = $format;
$options['dimension'] = $width."x".$height;
$options['zoom'] = $zoom;
$options['cacheLimit'] = $cacheLimit;



//url  working or not
$test_url = $url;
$test_url = preg_replace("(^https?://)", "", $test_url );// https:// from urls
//First check url is working or not    
$headers = @get_headers("https://" . $test_url);
  
// Use condition to check the existence of URL
if($headers && strpos( $headers[0], '200')) {

$api_url = $machine->generate_screenshot_api_url($options);


if($format == 'png'){
   $output_name  = 'Screenshot-machine.png';//image name 
}elseif($format == 'gif'){
    $output_name  = 'Screenshot-machine.gif';//image name 
}else{
   $output_name  = 'Screenshot-machine.jpg';//image name
}
$output_file = 'ss/'.$output_name;
file_put_contents($output_file, file_get_contents($api_url));

//echo '<a href="' .$output_file .'"  download>Download Screenshot</a>';
//echo '<img class="imageDisplay" src="' . $api_url . '">' . PHP_EOL; 
// echo   ' '. $api_url .'';
//echo   ' ' .$output_file .'';
echo   ' ' .$output_file .'';

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
