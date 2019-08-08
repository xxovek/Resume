<?php
require_once '../config/config.php';
session_start();
$UserId = $_SESSION['id'];
$response = [];

$tableName = $_POST['tblName'];
$itemId = $_POST['itemid'];

$fetchsql = "SELECT * FROM $tableName WHERE id = '$itemId' AND UID ='$UserId'";
// echo $fetchsql ;

$result = mysqli_query($con,$fetchsql)OR die(mysqli_error($con));

if( mysqli_num_rows($result)>0){
    $row = mysqli_fetch_array($result);

switch($tableName){

    case "users_experience" :
      
      $response['company_name'] = $row['company_name'];
      $response['designation'] = $row['designation'];
      $response['exp_description'] = $row['exp_description'];
      $response['join_date'] = $row['join_date'];
      $response['end_date'] = $row['end_date'];

    break;

    case "users_education" :
   
    $response['uni'] = $row['uni'];
    $response['colgname'] = $row['colgname'];
    $response['degree_name'] = $row['degree_name'];
    $response['field_name'] = $row['field_name'];
    $response['track'] = $row['track'];
    $response['gpa'] = $row['gpa'];
    $response['marks_perc'] = $row['marks_perc'];
    $response['joined_date'] = $row['joined_date'];
    $response['ended_date'] = $row['ended_date'];

    break;

    case "users_skills" :
     
    $response['skill_name'] = $row['skill_name'];
    $response['skill_desc'] = $row['skill_desc'];

    break;

    case "users_interests" :
   
    $response['hobby_name'] = $row['hobby_name'];
    $response['hobby_desc'] = $row['hobby_desc'];

    break;

    case "users_awards" :

    $response['certificate_name'] = $row['certificate_name'];
    $response['award_description'] = $row['aword_description'];

    break;

  }



}


mysqli_close($con);
exit(json_encode($response));
?>