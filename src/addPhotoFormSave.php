<?php
require_once '../config/config.php';
session_start();
$UserId = $_SESSION['id'];
$response = [];

if(!empty($_FILES["imgname"]["type"])){
  $Profileimgname = $_FILES["imgname"]["name"];
  $target_dir = "../img/";
  $target_file = $target_dir . basename($_FILES['imgname']["name"]);
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  $fname = $UserId."U".".".$imageFileType;
  $find_prev_profile = "../img/".$UserId."U.*";
  $files = glob($find_prev_profile);
  $files = glob($find_prev_profile);

  foreach($files as $file){
    if(is_file($file)) {
      unlink($file);
    }
  }
    move_uploaded_file($_FILES['imgname']['tmp_name'],$target_dir.$fname);
    chmod($target_dir.$fname, 0777);
    $updateImageQuery = "UPDATE users_about SET profile_iname = '$fname' WHERE UID = $UserId";
  if(mysqli_query($con,$updateImageQuery)or die(mysqli_error($con))){
   $response['msg'] = true;
  }
  else {
    $response['msg'] = false;
  }
  }
 
mysqli_close($con);
exit(json_encode($response));

 ?>
