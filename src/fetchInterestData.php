<?php
require_once '../config/config.php';
session_start();
$UserId = $_SESSION['id'];
$response = [];


$fetchsql = "SELECT id, hobby_name, hobby_desc 
FROM users_interests 
WHERE UID ='$UserId'";
// echo $fetchsql ;

$result = mysqli_query($con,$fetchsql)OR die(mysqli_error($con));

if( mysqli_num_rows($result)>0){
 
  while($row = mysqli_fetch_array($result)){
    array_push($response,[
      'hobby_id'    => $row['id'],
      'hobby_desc'   => $row['hobby_desc'],
      'hobby_name'   => ucwords($row['hobby_name'])
    ]);
  }
 
}

mysqli_close($con);
exit(json_encode($response));
?>