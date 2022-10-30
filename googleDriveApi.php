<?php
require_once 'vendor/autoload.php';
// code that will hide the warnings                       
    error_reporting(E_ERROR|E_PARSE);

try{
$client = new Google_Client();
// Get your credentials from the console
$client->setClientId('386006738001-jf5rl50up88h1up9jtn7s2qn57krp017.apps.googleusercontent.com');
$client->setClientSecret('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');
$client->setRedirectUri('http://localhost/ScreenshotMachine/userprofile.php');
$client->setScopes(array('https://www.googleapis.com/auth/drive.file'));

 
if (isset($_GET['code'])) {

     //read user file data
    $files= array();
    $dir = dir('userSS/'.$user_id);
    while ($file = $dir->read()) {
    if ($file != '.' && $file != '..') {

        $files[] = $file;
          }
      }
  
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
        $client->setAccessToken($token['access_token']);

    //read folder
    

    $service = new Google_Service_Drive($client);
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $file = new Google_Service_Drive_DriveFile();

    foreach ($files as $file_name) {
        $file_path = 'userSS/'.$user_id.'/'.$file_name;
        $mime_type = finfo_file($finfo, $file_path);
        $file->setName($file_name);
        $file->setDescription('This is a '.$mime_type.' document');
        $file->setMimeType($mime_type);
        $data = file_get_contents($file_path);
        $service->files->create(
            $file,
            array(
                'data' => $data,
                'uploadType' => 'multipart'
            )
        );
       }
       $msg = "Backup Sucessful";
     phpAlert($msg);  
 


}//inner if end

}catch (Exception $e) {
    
  }



function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
    
}

?>