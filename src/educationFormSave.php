<?php
require_once '../config/config.php';
session_start();
$UserId = $_SESSION['id'];
$response = [];

$uniname = $_POST['uniname'];
$degreename = $_POST['degreename'];
$fieldname = $_POST['fieldname'];
$trackname =$_POST['trackname'];
$hiddenId = $_POST['hiddenId'];
$gpa = $_POST['gpa'];
$marks = $_POST['marks'];
$colgjoindate = $_POST['colgjoindate'];
$colgenddate = $_POST['colgenddate'];
$colgname = $_POST['colgname'];

if(empty($gpa)){
    $gpa = '';
}

if(!empty($hiddenId)){
    $sql = "UPDATE users_education SET uni='$uniname',
    colgname ='$colgname',
    degree_name='$degreename',
    field_name='$fieldname',
    track='$trackname',
    gpa='$gpa',
    marks_perc='$marks',
    joined_date='$colgjoindate',
    ended_date='$colgenddate' 
    WHERE id ='$hiddenId' AND UID = '$UserId'";

    if(mysqli_query($con,$sql)){
        $response['msg'] = true;
    }else{
        $response['msg'] = false;
    }

}else{

$sql = "INSERT INTO users_education 
(UID, uni,colgname, degree_name, field_name, track, gpa, marks_perc, joined_date, ended_date)
 VALUES ('$UserId',
          '$uniname',
          '$colgname',
          '$degreename',
          '$fieldname',
          '$trackname',
          '$gpa',
          '$marks',
          '$colgjoindate',
          '$colgenddate'
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