<?php

include '../config/config.php';

session_start();
$uname = $_REQUEST['username'];
$password = $_REQUEST['pass'];
$response = [];

$sql = "SELECT * FROM Users WHERE emailid = '$uname' and pass = '$password'";
$result = mysqli_query($con,$sql);

if(mysqli_num_rows($result)==1)
 {
   $row = mysqli_fetch_array($result);

    $fullname       = $row['fullname'];
    $email          = $row['emailid'];
    $created        = $row['created_at'];
    $id             = $row['id'];

    $_SESSION['fullname']    = $fullname;
    $_SESSION['emailid']     = $email;
    $_SESSION['created_at']  = $created;
    $_SESSION['id']          = $id;

    $response['message'] = true;
 }
else{
  $response['message'] = false;
}

  mysqli_close($con);

  exit(json_encode($response));

?>