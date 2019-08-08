<?php
require_once '../config/config.php';
session_start();
$UserId = $_SESSION['id'];
$response = [];


$sql = "DELETE FROM Users WHERE id = '$UserId'";


if(mysqli_query($con,$sql) OR die(mysqli_error($con))){

    $find_prev_profile = "../img/".$UserId."U.*";
    $files = glob($find_prev_profile);
    // $files = glob($find_prev_profile);
  
    foreach($files as $file){
      if(is_file($file)) {
        unlink($file);
      }
    }
 


    $response['msg'] = true;
}else{
    $response['msg'] = false;
}

mysqli_close($con);
exit(json_encode($response));

?>