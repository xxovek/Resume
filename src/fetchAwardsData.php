<?php
require_once '../config/config.php';
session_start();
$UserId = $_SESSION['id'];
$response = [];

$fetchsql = "SELECT id, certificate_name, aword_description 
FROM users_awards 
WHERE UID ='$UserId'";

$result = mysqli_query($con,$fetchsql)OR die(mysqli_error($con));

if( mysqli_num_rows($result)>0){

  while($row = mysqli_fetch_array($result)){
    array_push($response,[
      'awd_id'    => $row['id'],
      'aword_description'   => $row['aword_description'],
      'certificate_name'   => ucwords($row['certificate_name'])
    ]);
  }
 
}

mysqli_close($con);
exit(json_encode($response));

?>