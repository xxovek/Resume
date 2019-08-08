<?php
require_once '../config/config.php';
session_start();
$UserId = $_SESSION['id'];
$response = [];


$fetchsql = "SELECT id, skill_name, skill_desc 
FROM users_skills 
WHERE UID ='$UserId'";

// echo $fetchsql ;

$result = mysqli_query($con,$fetchsql)OR die(mysqli_error($con));

if( mysqli_num_rows($result)>0){

  while($row = mysqli_fetch_array($result)){
    array_push($response,[
      'skill_id'    => $row['id'],
      'skill_desc'   => $row['skill_desc'],
      'skill_name'   => ucwords($row['skill_name'])
    ]);
  }
 
}

mysqli_close($con);
exit(json_encode($response));
?>