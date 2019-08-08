<?php
require_once '../config/config.php';
session_start();
$UserId = $_SESSION['id'];
$response = [];


$fetchsql = "SELECT id,uni, colgname, degree_name, field_name, track, gpa,
 marks_perc, joined_date, ended_date 
 FROM users_education 
 WHERE UID ='$UserId'";

$result = mysqli_query($con,$fetchsql)OR die(mysqli_error($con));

if( mysqli_num_rows($result)>0){
  // $row = mysqli_fetch_array($result);

  while($row = mysqli_fetch_array($result)){
    array_push($response,[
      'edu_id'    => $row['id'],
      'uni'   => ucwords($row['uni']),
      'colgname'   => ucwords($row['colgname']),
      'degree_name'   => ucwords($row['degree_name']),
      'field_name' => $row['field_name'],
      'track' => $row['track'],
      'gpa' => $row['gpa'],
      'marks_perc' => $row['marks_perc'],
      'joined_date' => $row['joined_date'],
      'ended_date' => $row['ended_date']
    ]);
  }
 
}

mysqli_close($con);
exit(json_encode($response));
?>