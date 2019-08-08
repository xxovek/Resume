<?php
require_once '../config/config.php';
session_start();
$UserId = $_SESSION['id'];
$response = [];

$fetchsql = "SELECT profile_iname FROM users_about WHERE UID ='$UserId'";
// echo $fetchsql ;


$result = mysqli_query($con,$fetchsql)OR die(mysqli_error($con));

if( mysqli_num_rows($result)>0){
  $row = mysqli_fetch_array($result);
  $response['profile_iname'] = $row['profile_iname'];
//   $response['logoImage'] = $row['logoImage'];
}


mysqli_close($con);
exit(json_encode($response));
?>