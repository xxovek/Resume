<?php

// include_once('/config/.php');
include '../config/config.php';
$response = [];

$fullname = $_POST['username'];
$email = $_POST['email'];
$pass = $_POST['pass'];

$sql = "INSERT INTO Users(fullname, emailid, pass) VALUES 
('$fullname','$email','$pass')";

if( mysqli_query($con,$sql) ){

    $response['message'] = true;
}
else{
    $response['message'] = false;
    
}

mysqli_close($con);
exit(json_encode($response));


?>