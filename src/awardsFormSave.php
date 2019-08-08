<?php
require_once '../config/config.php';
session_start();
$UserId = $_SESSION['id'];
$response = [];

// $certificatedesc = $_POST['certificatedesc'];
$ser=$_POST['certificatedesc'];
$certificatedesc = addslashes($ser); 

$certificatename = $_POST['certificatename'];

$hiddenId = $_POST['hiddenId'];


if(!empty($hiddenId)){
    $sql = "UPDATE users_awards SET 
    certificate_name= '$certificatename',
    aword_description= '$certificatedesc'
     WHERE id = '$hiddenId' AND 
     UID = '$UserId'";

    if(mysqli_query($con,$sql)){
        $response['msg'] = true;
    }else{
        $response['msg'] = false;
    }

}else{

$sql = "INSERT INTO users_awards(UID,certificate_name,aword_description) 
VALUES ('$UserId',
        '$certificatename',
        '$certificatedesc'
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