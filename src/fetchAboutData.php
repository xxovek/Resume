<?php
require_once '../config/config.php';
session_start();
$UserId = $_SESSION['id'];
$response = [];


$fetchsql = "SELECT id,fname, mname, lname, gender, bdate,mailid,phone, 
c_address, p_address, desription, objective, git_link,
 linkedin_link, twitter_link, facebook_link, profile_iname
  FROM users_about WHERE UID ='$UserId'";
// echo $fetchsql ;

$result = mysqli_query($con,$fetchsql)OR die(mysqli_error($con));

if( mysqli_num_rows($result)>0){
  $row = mysqli_fetch_array($result);
  $response['about_id'] = $row['id'];
  $response['fname'] = $row['fname'];
  $response['mname'] = $row['mname'];
  $response['lname'] = $row['lname'];
  $response['gender'] = $row['gender'];
  $response['bdate'] = $row['bdate'];
  $response['mailid'] = $row['mailid'];
  $response['phone'] = $row['phone'];
  $response['c_address'] = $row['c_address'];
  $response['p_address'] = $row['p_address'];
  $response['desription'] = $row['desription'];
  $response['objective'] = $row['objective'];
  $response['git_link'] = $row['git_link'];
  $response['linkedin_link'] = $row['linkedin_link'];
  $response['twitter_link'] = $row['twitter_link'];
  $response['facebook_link'] = $row['facebook_link'];
  $response['profile_iname'] = $row['profile_iname'];
//   $response['logoImage'] = $row['logoImage'];
}

mysqli_close($con);
exit(json_encode($response));
?>