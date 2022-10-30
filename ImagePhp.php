<?php 
   include('ScreenshotMachine.php');
$customer_key = "d7e454";
$secret_phrase = "12345"; //leave secret phrase empty, if not needed

$machine = new ScreenshotMachine($customer_key, $secret_phrase);
$url = $_POST['url'];
$device = $_POST['device'];
$delay = $_POST['delay'];

if($device == 'desktop'){
    
    if(isset($_POST['full'])){
         $options['dimension'] = '1024xfull';
    }else{
    $options['dimension'] = '1024x768';
}     
}elseif($device == 'tablet'){
    
    if(isset($_POST['full'])){
         $options['dimension'] = '800xfull';
    }else{
    $options['dimension'] = '800x1280';
}     
}elseif($device == 'phone'){
    
    if(isset($_POST['full'])){
         $options['dimension'] = '480xfull';
    }else{
    $options['dimension'] = '480x800';
}
}


//passing arugments
$options['url'] = $url;
$options['device'] = $device;
$options['delay'] = $delay;

//url working or not
$test_url = $url;
$test_url = preg_replace("(^https?://)", "", $test_url );// https:// from urls
//First check url is working or not    
$headers = @get_headers("https://" . $test_url);
  
// Use condition to check the existence of URL
if($headers && strpos( $headers[0], '200')) {


$api_url = $machine->generate_screenshot_api_url($options); 
$output_name = 'Screenshot Machine2.jpg';//image name
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