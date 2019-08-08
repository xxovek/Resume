<?php
require_once '../config/config.php';
session_start();
$UserId = $_SESSION['id'];
$response = [];

$hobbyname = $_POST['hobbyname'];

$ser=$_POST['hobbydesc'];
$hobbydesc = addslashes($ser); 

// $hobbydesc = $_POST['hobbydesc'];

$hiddenId = $_POST['hiddenId'];

if(!empty($hiddenId)){

    $sql = "UPDATE users_interests SET 
    hobby_name= '$hobbyname',
    hobby_desc= '$hobbydesc' 
    WHERE id = '$hiddenId' AND 
    UID = '$UserId'";

    if(mysqli_query($con,$sql)){
        $response['msg'] = true;
    }else{
        $response['msg'] = false;
    }

}else{

$sql = "INSERT INTO users_interests(UID, hobby_name,hobby_desc) 
VALUES (
    '$UserId',
    '$hobbyname',
    '$hobbydesc'
)";

// echo $sql ;

if(mysqli_query($con,$sql)){
    $response['msg'] = true;
}else{
    $response['msg'] = false;
}
}

mysqli_close($con);
exit(json_encode($response));

?>