<?php
require_once '../config/config.php';

$response = [];

if(!empty($_POST["email"])) {
  $result = mysqli_query($con,"SELECT count(emailid) FROM Users WHERE emailid='" . $_POST["email"] . "'");
  $row = mysqli_fetch_array($result);
  $user_count = $row[0];
  if($user_count>0) {
      // echo "<span class='status-not-available'>E-Mail Id Already Exists</span>";
      $response['message'] = true;
      
  }else{
      // echo "<span class='status-available'> </span>";
      $response['message'] = false;

  }
}
mysqli_close($con);
exit(json_encode($response));
?>
