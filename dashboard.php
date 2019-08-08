<?php
session_start();
if(isset($_SESSION['id'])){
include './config/config.php';
$uid = $_SESSION['id'];
$fullname = $_SESSION['fullname'];
$email = $_SESSION['emailid'];

// $sql = "";
// $result mysqli_query($con,$sql);
$result = mysqli_query($con,"SELECT count(UID),profile_iname FROM users_about WHERE UID = '$uid'");
$row = mysqli_fetch_array($result);
$user_count = $row[0];
$image_name = $row[1];

if(empty($image_name)){
  $image_name = 'avatar.png';
}


?>


<!DOCTYPE html>
<html lang="en">
<!-- main dashboard page -->
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Resume - Start Bootstrap Theme</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">



  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/resume.min.css" rel="stylesheet">

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

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
    <a class="navbar-brand js-scroll-trigger" href="#page-top">
      <!-- <span class="d-block d-lg-none">Clarence Taylor</span> -->
      <span class="d-none d-lg-block">
        <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="img/<?php echo $image_name; ?>" alt="">
      </span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item" id="Li_create">
          <a class="nav-link js-scroll-trigger" href="create.php">Create CV</a>
        </li>
        <!-- <li class="nav-item" id="Li_edit" style="display:none">
          <a class="nav-link js-scroll-trigger" href="javascript:editAllforms();">Edit CV</a>
        </li> -->
        <!-- <li class="nav-item" id="Li_view" style="display:none">
          <a class="nav-link js-scroll-trigger" href="view.php">View CV</a>
        </li> -->
        <li class="nav-item" id="Li_download" style="display:none">
          <a class="nav-link js-scroll-trigger" href="formatpdf.php">Download CV</a>
        </li>
        <li class="nav-item" id="Li_delete" style="display:none">
          <a class="nav-link js-scroll-trigger" href="javascript:deleteCV();">Delete CV</a>
        </li>
      </ul>
    </div>
  </nav>

<div class="container-fluid p-0">

<div class="container">
<div class="row">
<div class="col-lg-1"></div>
<div class="col-lg-10">

<h5>Additional Information About Application </h5>
<p>
'Simple And Easy Online Resume Builder' - CV Maker & PDF Creator - free app creates to professional resume in onlline mode with more than 130+ color resume templates. You can create your professional resume just in very few minutes and also you quickly create it for any kind of profession.
</p>
<p>

100% free resume builder to make, save, print and share a professional resume in minutes. Make applying faster and easier by connecting to millions of jobs today.
</p>


</div>

<!-- <p>
<h5>Additional Information About Application </h5>

<div class="row">Updated <br>24 June 2019 </div>
</p> -->
<div class="col-lg-1"></div>


</div>

</div>
</div>


  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->


 <!-- Bootstrap core JavaScript -->
 <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/resume.min.js"></script>


<script>

// 
displayNavMenu();
function displayNavMenu(){

  var record_cnt = "<?php echo $user_count ; ?>";
  // alert(record_cnt);

  if(record_cnt > '0'){
    $("#Li_create").show();
    $("#Li_delete").show();
    $("#Li_edit").show();
    $("#Li_view").show();
    $("#Li_download").show();
  }else{
    $("#Li_create").show();
  //  $("#Li_delete").hide();
  }

}


function editAllforms(){
  window.location.href='edit.php';
  // $.ajax({
  //       url:'./src/fetchAboutData.php',
  //       type:'POST',
  //       data:'',
  //       dataType:'json',
  //       success:function(response){
  //           alert(response.fname);
  //           $("#fname").val(response.fname);

  //           // alert(tblbody);
  //       }
  //   });
}


function deleteCV(){

  if (confirm("Are you sure DELETE All Resume Record?")) {

    // alert("OK");
        // your deletion code

        $.ajax({
          url:'./src/DeleteCV.php',
          type:'POST',
          dataType:'json',
          success:function(response){
            if(response.msg){
              window.location.reload();
            }

          }
        })
    }

}

</script>

</body>

</html>
<?php
 }
 else {
   header("Location:index.php");
 }
?>
