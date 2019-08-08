<?php
require_once '../config/config.php';
session_start();
$UserId = $_SESSION['id'];
$response = [];

$tableName = $_POST['tblName'];
$itemId = $_POST['itemid'];

$sql = "DELETE FROM $tableName WHERE UID = '$UserId' AND id = '$itemId' ";


if(mysqli_query($con,$sql) OR die(mysqli_error($con))){
    $response['msg'] = true;
}else{
    $response['msg'] = false;
}

mysqli_close($con);
exit(json_encode($response));

?>