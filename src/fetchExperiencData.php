<?php
require_once '../config/config.php';
session_start();
$UserId = $_SESSION['id'];
$response = [];


$fetchsql = "SELECT id,company_name, designation, exp_description, join_date, end_date 
FROM users_experience 
WHERE UID ='$UserId'";
// echo $fetchsql ;

$result = mysqli_query($con,$fetchsql)OR die(mysqli_error($con));

if( mysqli_num_rows($result)>0){

  while($row = mysqli_fetch_array($result)){
    array_push($response,[
      'exp_id'    => $row['id'],
      'company_name'   => $row['company_name'],
      'designation'   => ucwords($row['designation']),
      'exp_description'   => ucwords($row['exp_description']),
      'join_date' => $row['join_date'],
      'end_date' => $row['end_date']
     
    ]);
  }
 
}

mysqli_close($con);
exit(json_encode($response));
?>