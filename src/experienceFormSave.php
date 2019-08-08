<?php
require_once '../config/config.php';
session_start();
$UserId = $_SESSION['id'];
$response = [];

    $compname = $_POST['compname'];
    $dname  =  $_POST['dname'];
    // $jobdesc  = $_POST['jobdesc'];

    $ser=$_POST['jobdesc'];
    $jobdesc = addslashes($ser); 

    $cjoindate = $_POST['cjoindate'];
    $cenddate = $_POST['cenddate'];

    $hiddenId = $_POST['hiddenId'];

    if(!empty($hiddenId)){
        $sql = "UPDATE users_experience SET 
        company_name='$compname',
        designation='$dname',
        exp_description= '$jobdesc',
        join_date= '$cjoindate',end_date= '$cenddate' 
        WHERE UID = '$UserId' AND id = '$hiddenId'";

        if(mysqli_query($con,$sql)){
            $response['msg'] = true;
        }else{
            $response['msg'] = false;
        }

    }else{

$sql = "INSERT INTO users_experience (UID,company_name,designation,exp_description,join_date,end_date) 
VALUES(
    '$UserId',
    '$compname',
    '$dname',
    '$jobdesc',
    '$cjoindate',
    '$cenddate'
)";

if(mysqli_query($con,$sql)){
    $response['msg'] = true;
}else{
    $response['msg'] = false;
}

}

mysqli_close($con);
exit(json_encode($response));

?>