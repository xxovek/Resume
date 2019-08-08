<?php
include '../config/config.php';

$emailid = $_REQUEST['emailid'];
$response = [];


echo $emailid ;

mysqli_close($con);
exit(json_encode($response));

?>