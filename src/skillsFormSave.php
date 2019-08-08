<?php
require_once '../config/config.php';
session_start();
$UserId = $_SESSION['id'];
$response = [];

$skillname = $_POST['skillname'];
// $skilldesc = $_POST['skilldesc'];
$ser=$_POST['skilldesc'];
$skilldesc = addslashes($ser); 

$hiddenId = $_POST['hiddenId'];

if(!empty($hiddenId)){
    
     $sql = "UPDATE users_skills SET 
     skill_name= '$skillname',
     skill_desc= '$skilldesc'
     WHERE id = '$hiddenId' AND
     UID = '$UserId'";

    if(mysqli_query($con,$sql)){
        $response['msg'] = true;
    }else{
        $response['msg'] = false;
    }

}else{

$sql = "INSERT INTO users_skills(UID, skill_name, skill_desc)
 VALUES ('$UserId',
         '$skillname',
         '$skilldesc'
         )";

if(mysqli_query($con,$sql)){
    $response['msg'] = true;
}else{
    $response['msg'] = false;
}

}

mysqli_close($con);
exit(json_encode($response));

?>