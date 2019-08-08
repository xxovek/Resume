<?php
require_once '../config/config.php';
session_start();
$UserId = $_SESSION['id'];
$response = [];

      $fname = $_POST['fname'];
      $mname = $_POST['mname'];
      $lname = $_POST['lname'];
      $gender = $_POST['gender'];
      $uemail = $_POST['uemail'];
      $bdate = $_POST['bdate'];
      $caddress = $_POST['caddress'];
      
      // $uobj = $_POST['uobj'];
      $ser=$_POST['uobj'];
      $uobj = addslashes($ser); 


      $phone = $_POST['phone'];
      $paddress = $_POST['paddress'];
      
      // $udesc = $_POST['udesc'];
      $ser=$_POST['udesc'];
      $udesc = addslashes($ser); 


      $liknkedinlink = $_POST['liknkedinlink'];
      $gitlink = $_POST['gitlink'];
      $fblink = $_POST['fblink'];
      $twitlink = $_POST['twitlink'];

      $hiddenId = $_POST['hiddenId'];

      if(empty($udesc)){
        $udesc = '';
      }else if(empty($liknkedinlink)){
        $liknkedinlink = '';
      }else if(empty($gitlink)){
        $gitlink = '';
      }else if(empty($fblink)){
        $fblink = '' ;
      }else if(empty($twitlink)){
        $twitlink = '';
      }

      if(!empty($hiddenId)){
          $sql = "UPDATE users_about SET fname='$fname',mname='$mname',
          lname='$lname',gender= '$gender',bdate='$bdate',mailid='$uemail',phone= '$phone',
          c_address= '$caddress',p_address='$paddress',desription='$udesc', objective='$uobj',
          git_link= '$gitlink',linkedin_link= '$liknkedinlink',twitter_link= '$twitlink',
          facebook_link = '$fblink'  
          WHERE  UID = '$UserId' and id = '$hiddenId'";

          if(mysqli_query($con,$sql)){
              $response['msg'] = true;
          }else{
              $response['msg'] = false;
          }

      }else{

      $sql = "INSERT INTO users_about(UID,fname,mname,lname,gender,
       bdate,mailid,phone,c_address,p_address,desription,
       objective,git_link,linkedin_link,twitter_link,facebook_link ) 
      VALUES (
          '$UserId',
          '$fname',
          '$mname',
          '$lname',
          '$gender',
          '$bdate',
          '$uemail',
          '$phone',
          '$caddress',
          '$paddress',
          '$udesc',
          '$uobj',
          '$gitlink',
          '$liknkedinlink',
          '$twitlink',
          '$fblink'
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