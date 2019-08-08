<?php
session_start();
if(isset($_SESSION['id'])){
include './config/config.php';
$uid = $_SESSION['id'];
$fullname = $_SESSION['fullname'];
$email = $_SESSION['emailid'];



?>
<!DOCTYPE html>
<html lang="en">
<!-- pdf formats page -->
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Resume - Start Resume Builder </title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Custom styles for this template -->
  <link href="css/resume1.css" rel="stylesheet">

  <style>
  .modal-full {
    min-width: 80%;
    margin: 10;
}

.modal-full .modal-content {
    min-height: 80vh;
}
  </style>
</head>



<body id="page-top">

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Resume Builder</a>
      </div>

      <ul class="nav navbar-nav navbar-right">
      <span>Welcome</span> <h4><?php echo $fullname ; ?></h4>
   
        <li><a href="logout.php">LOGOUT</a></li>

      </ul>
    </div>
  </nav>


<div class="container-fluid ">
<div class="card-deck">
<div class="card bg-light">
      <div class="card-body text-center">
        <p class="card-text">Format 1</p>        
       <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">
        <i class="fa fa-file-pdf-o" style="font-size:48px;color:red"></i>
       </button>

      </div>
    </div>
    <!-- <div class="card bg-light">
      <div class="card-body text-center">
        <p class="card-text">Format 2</p>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">
        <i class="fa fa-file-pdf-o" style="font-size:48px;color:#ff8000"></i>
       </button>
      </div>
    </div>
    <div class="card bg-light">
      <div class="card-body text-center">
        <p class="card-text">Format 3</p>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">
        <i class="fa fa-file-pdf-o" style="font-size:48px;color:#bfff00"></i>
       </button>
      </div>
    </div>
    <div class="card bg-light">
      <div class="card-body text-center">
        <p class="card-text">Format 4</p>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">
        <i class="fa fa-file-pdf-o" style="font-size:48px;color:#ff0080"></i>
       </button>

      </div>
    </div> -->
   
</div>
<hr>
<!-- <div class="card-deck">
    <div class="card bg-light">
      <div class="card-body text-center">
        <p class="card-text">Format 5</p>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">
        <i class="fa fa-file-pdf-o" style="font-size:48px;color:#00bfff"></i>
       </button>
      </div>
    </div>
    <div class="card bg-light">
      <div class="card-body text-center">
        <p class="card-text">Format 6</p>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">
        <i class="fa fa-file-pdf-o" style="font-size:48px;color:#0000ff"></i>
       </button>
      </div>
    </div>
    <div class="card bg-light">
      <div class="card-body text-center">
        <p class="card-text">Format 7</p>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">
        <i class="fa fa-file-pdf-o" style="font-size:48px;color:#8000ff"></i>
       </button>
      </div>
    </div>
    <div class="card bg-light">
      <div class="card-body text-center">
        <p class="card-text">Format 8</p>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">
        <i class="fa fa-file-pdf-o" style="font-size:48px;color:#bf00ff"></i>
       </button>
      </div>
    </div>  
  </div> -->

  <br>

  <a href="dashboard.php" class="btn btn-secondary btn-block">BACK</a>


<div class="modal fade bd-example-modal-lg" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-full">
        
        <div class="modal-content">
         
                <div  class="modal-body"> 
                    <div  class="container">
                    <div class="container-fluid p-0">

<section class="container" id="about"></section>

<br>
<hr class="m-0">

<section class="resume-section p-3 p-lg-5 d-flex justify-content-center" id="experience"></section>

<br><hr class="m-0"><br>

<section class="container" id="education"></section>

<br>
<hr class="m-0">
<br>

<section class="container" id="skills"></section>
<br>

<br>
<hr class="m-0">
<br>

<section class="container" id="interests"></section>

<br>
<hr class="m-0">
<br>

<section class="container" id="awards"></section>


</div>

   </div>
        </div>
                      
                <div class="modal-footer">
                            <a class="btn btn-secondary" href="resumePdf.php" target="_blank">Download</a>
                            <!-- <button class="btn btn-secondary" onclick="window.location.href='resumePdf.php'">Download</button> -->
                            <button class="btn btn-dark" data-dismiss="modal">Close</button>

                </div>

        </div>
       
    </div>

</div>


</div>


<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
 <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

 <!-- Plugin JavaScript -->
 <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

 <!-- Custom scripts for this template -->

 <script src="js/resume.min.js"></script>
 <script src="js/moment.js"></script>

 <script src="js/formatpdf.js"></script>

</body>

</html>
<?php
 }
 else {
   header("Location:index.php");
 }
?>