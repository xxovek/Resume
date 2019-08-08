<?php
 /* include autoloader */
require_once './dompdf/autoload.inc.php';
/* reference the Dompdf namespace */
use Dompdf\Dompdf;

/* instantiate and use the dompdf class */

// dompdf code

$dompdf = new Dompdf();
include './config/config.php';
session_start();

$uid = $_SESSION['id'];
$fullname = $_SESSION['fullname'];
$email = $_SESSION['emailid'];

$FullPdf = '<div class="container-fluid">';


$about_info = '<section class="Container" id="about">';
$sql_about_info = "SELECT * FROM users_about WHERE UID = '$uid'";
$Res_about_info = mysqli_query($con,$sql_about_info);
$allLink = '';
$Name = '';
$today_date =  date("d/m/Y");

if (mysqli_num_rows($Res_about_info) > 0) {
    $row = mysqli_fetch_array($Res_about_info);

    if(empty($row['desription'])){
        $udesc = $row['objective'];
      }else{
        $udesc = $row['desription'];
      }
      
      if(empty($row['linkedin_link'])){
        $liknkedinlink = '<li style="display:none"><a href="www.linkedin.com">www.linkedin.com</a></li>';
      }else{
        $allLink .= '<li><a href="'.$row['linkedin_link'].'">'.$row['linkedin_link'].'</a></li>';
      }
       if(empty($row['git_link'])){
        $gitlink = '<li style="display:none"><a href="www.github.com">www.github.com</a></li>';
      }else {
        $allLink .= '<li><a href="'.$row['git_link'].'">'.$row['git_link'].'</a></li>';
      }
      if(empty($row['facebook_link'])){
        $fblink = '<li style="display:none"><a href="www.facebook.com">www.facebook.com</a></li>' ;
      }else {
        $allLink .= '<li><a href="'.$row['facebook_link'].'">'.$row['facebook_link'].'</a></li>' ;
      }
        if(empty($row['twitter_link'])){
        $twitlink = '<li style="display:none"><a href="www.twitter.com">www.twitter.com</a></li>';
      }else{
        $allLink .= '<li><a href="'.$row['twitter_link'].'">'.$row['twitter_link'].'</a></li>';
      }

    
    if ($row['profile_iname'] == 'avatar.png') {
        $about_info .= '<div class="w-100">
        <div style="text-align:right;display:none" >
        <img src="./img/5U.jpg" width = "15%"  height = "25%">
        </div>';
    } else {
        $about_info .= '<div class="w-100">
        <div style="text-align:right;">
        <img src="./img/'.$row['profile_iname'].'" width = "15%"  height = "25%" ></div>';
    }

    $about_info .='<a href="mailto:'.$row['mailid'].'">'.$row['mailid'].'</a>
    <h4> '.$row['phone'].' </h4>
     <h5 class="">'.ucfirst($row['fname']).'&nbsp;'.ucfirst($row['mname']).'&nbsp;'.ucfirst($row['lname']).'</h5>
   
     <div class="">Address:'.ucfirst($row['c_address']).'</div>
     <p class="lead mb-5">'.$udesc.'</p>
     <h5> Social Links</h5><ul>'.$allLink.'</ul></div></section><hr class="m-0">';

     $Name =  '<h4>'.ucfirst($row['fname']).'&nbsp;'.ucfirst($row['lname']).'</h4>';

  }else{
    $about_info = '';
  }

  if(!empty($about_info)){
    $FullPdf .= $about_info;
  }

$exp_info = '<section class="Container" id="experience">';
$exp_info .= '<div class="w-100"><h5 class="mb-5">Experience</h5>';

$sql_exp_info = "SELECT * FROM users_experience WHERE UID = '$uid'";
$Res_exp_info = mysqli_query($con,$sql_exp_info);

if( mysqli_num_rows($Res_exp_info)>0){

    while($row = mysqli_fetch_array($Res_exp_info)){

      $jdate=date_create($row['join_date']);
      $edate=date_create($row['end_date']);

      $join_date = date_format($jdate,"M d, Y");
      $end_date = date_format($edate,"M d, Y");

     
    $exp_info .= '<div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
    <div class="resume-content">
      <h4 class="">'.ucfirst($row['designation']).'</h4>
      <div class="">'.ucfirst($row['company_name']).'</div>
      <p>'.$row['exp_description'].'</p>
    </div>
    <div class="resume-date text-md-right">
      <span class="text-primary">'.$join_date.' to '.$end_date.'</span>
    </div>
  </div>';
    
    }
   
    $exp_info .= '</div></section><hr class="m-0">';

  }else{
    $exp_info = '';
  }

 if(!empty($exp_info)){
    $FullPdf .=  $exp_info;
  }


  $edu_info = '<section class="Container" id="education">';

$edu_info .= '<div class="w-100">
<h5 class="mb-5">Education</h5>';
$sql_edu_info = "SELECT * FROM users_education WHERE UID = '$uid'";
$Res_edu_info = mysqli_query($con,$sql_edu_info);

if( mysqli_num_rows($Res_edu_info)>0){

    while($row = mysqli_fetch_array($Res_edu_info)){

      $jdate=date_create($row['joined_date']);
      $edate=date_create($row['ended_date']);

      $joined_date = date_format($jdate,"M d, Y");
      $ended_date = date_format($edate,"M d, Y");
     
    $edu_info .= '<div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
        <div class="resume-content">
            <h4 class="">'.ucfirst($row['uni']).'</h4>
                <div class="">'.ucfirst($row['degree_name']).'</div>
                 <div>'.ucfirst($row['field_name']).' - '.ucfirst($row['track']).'</div>
                   <p>GPA:'.$row['gpa'].'</p>
        </div>
            <div class="resume-date text-md-right">
            <span class="text-primary">'.$joined_date.' to '.$ended_date.'</span>
            </div>
 
    </div>';
    
    }
  $edu_info .= '</div></section><hr class="m-0">';
   
  }else{
    $edu_info = '';
  }
  if(!empty($edu_info)){
    $FullPdf .=  $edu_info;
  }



$skills_info = '<section class="Container" id="skills">'; 

$skills_info .= '<div class="w-100"><h5 class="mb-5">Skills</h5> 
<div class="">Skills and Workflow</div><ul class="fa-ul mb-0">';

$sql_skills_info = "SELECT * FROM users_skills WHERE UID = '$uid'";
$Res_skills_info = mysqli_query($con,$sql_skills_info);

if( mysqli_num_rows($Res_skills_info)>0){

    while($row = mysqli_fetch_array($Res_skills_info)){
     
    $skills_info .= '<li>
                        <i class="fa-li fa fa-check"></i>
                        '.ucfirst($row['skill_name']).'-'.ucfirst($row['skill_desc']).'</li>';
    
    }
   
  $skills_info .= '</ul></div></section><hr class="m-0">';
   
  }else{
    $skills_info = '';
  }
  if(!empty($skills_info)){
    $FullPdf .=  $skills_info;
  }



$hobby_info = '<section class="Container" id="interests">';

$hobby_info .= '<div class="w-100">
<h5 class="mb-5">Interests & Hobbies</h5>';
$sql_hobby_info = "SELECT * FROM users_interests WHERE UID = '$uid'";
$Res_hobby_info = mysqli_query($con,$sql_hobby_info);

if( mysqli_num_rows($Res_hobby_info)>0){

    while($row = mysqli_fetch_array($Res_hobby_info)){
        $hobby_info .= '<p>'.ucfirst($row['hobby_name']).'-'.ucfirst($row['hobby_desc']).'</p>';
    }
  $hobby_info .= '</div></section><hr class="m-0">';
      
  }else{
  $hobby_info = '';

  }

  if(!empty($hobby_info)){
    $FullPdf .=  $hobby_info;
  }


$awards_info = ' <section class="Container" id="awards">';

$awards_info .= '<div class="w-100">
<h5 class="mb-5">Awards &amp; Certifications</h5><ul class="fa-ul mb-0">';

$sql_awards_info = "SELECT * FROM users_awards WHERE UID = '$uid'";
$Res_awards_info = mysqli_query($con,$sql_awards_info);

if( mysqli_num_rows($Res_awards_info)>0){

    while($row = mysqli_fetch_array($Res_awards_info)){

        $awards_info .= '<li>
        <i class="fa-li fa fa-trophy text-warning"></i>
        '.ucfirst($row['certificate_name']).'-'.ucfirst($row['aword_description']).'</li>';
    }
  $awards_info .= '</ul></div></section><hr class="m-0"><section class="Container" id="awards">
  <div class="w-100">
      <h5 class="mb-5">Declaration</h5>
      <p>I hereby declare that the above-mentioned information is correct up to my knowledge and I bear the
      responsibility for the correctness of the above-mentioned particulars.</p>

  <div class="row" style="text-align:right;">
  <span> DATE: '.$today_date.'</span><br>
  <span>'.$Name.'</span>
  </div></div></section>';
      
  }else{
    $awards_info = '';
  }

  if(!empty($awards_info)){
    $FullPdf .=  $awards_info;
  }

$html = '<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Resume PDF</title>

    <link href="css/resume.min.css" rel="stylesheet">

    </head>
    <body>
    <div class="container-fluid p-0">'.$FullPdf.'</div>

  </body>
</html>';

  error_reporting(E_ALL);
  $dompdf->setPaper('A4', 'portrait');
  $dompdf->load_html($html);

  $dompdf->render();
  $dompdf->stream("dompdf_out.pdf", array("Attachment" => false));
?>