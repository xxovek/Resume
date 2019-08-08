
<?php
session_start();
if(isset($_SESSION['id'])){
include './config/config.php';
$uid = $_SESSION['id'];
$fullname = $_SESSION['fullname'];
$email = $_SESSION['emailid'];

$result = mysqli_query($con,"SELECT count(UID),profile_iname FROM users_about WHERE UID = '$uid'");
$row = mysqli_fetch_array($result);
$user_count = $row[0];
$image_name = $row[1];

if(empty($image_name)){
  $image_name = 'avatar.png';
}



// echo $user_count ; 

?>
<!DOCTYPE html>
<html lang="en">
<!-- view builded resume page -->
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Resume - Start Bootstrap Theme</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

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
      <!-- <span class="d-block d-lg-none">Sonali Bhagwat</span> -->
      <span class="d-none d-lg-block">
        <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="img/<?php echo $image_name; ?>" alt="">
      </span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- <div class="btn-group">
      <button type="button" class="btn btn-dark">EDIT CV</button>
      <button type="button" class="btn btn-dark">DOWNLOAD CV</button>
    </div> -->

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item" id="Li_about">
          <a class="nav-link js-scroll-trigger" href="#Div_about">Add About </a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#Div_experience">Add Experience</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#Div_education">Add Education</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#Div_skills">Add Skills</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#Div_interests"> Add Interests</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#Div_awards">Add Awards</a>
        </li>

        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#Div_addphoto">Add Photo</a>
        </li>

        <!-- <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="formatpdf.php">DOWNLOAD CV</a>
        </li> -->

        <!-- <div class="btn-group"> -->
      <!-- <button type="button" class="btn btn-dark">EDIT CV</button> -->
      <!-- <a href="formatpdf.php" class="btn btn-dark" role="button">DOWNLOAD CV</a> -->

        <!-- <button type="button" class="btn btn-dark">DOWNLOAD CV</button> -->
    <!-- </div> -->

        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="dashboard.php">BACK</a>
        </li>
      </ul>
    
    </div>


  </nav>

<div class="container-fluid p-0">

<div id="Div_about">
<section class="container" id="about">

<form method="post" id="aboutForm">

       <fieldset>
            <legend>Step 1 of 7</legend>
            <hr>
            <h4>About Details</h4>
            <hr>
            <input type="hidden" id="hiddenid">

           
          <div class="row">
          <label class="col-lg-2 control-label">Name:<font color="red">*</font> </label>
          <div class="col-lg-4">
          <div class="form-group">
                <input type="text" placeholder="First Name" id="fname" name="fname" class="form-control" autocomplete="off">
            </div>
            </div>

            <div class="col-lg-3">
            <div class="form-group">
                <input type="text" placeholder="Middle Name" id="mname" name="mname" class="form-control" autocomplete="off">
            </div>
            </div>

            <div class="col-lg-3">
            <div class="form-group">
                <input type="text" placeholder="Last Name" id="lname" name="lname" class="form-control" autocomplete="off">
            </div>
          </div>
          
          </div>

          <div class="row">

          <label class="col-lg-2 control-label" for="gender">Gender:<font color="red">*</font> </label>

          <div class="col-lg-4">
            <div class="form-check-inline">            
            <input type="radio"  name="gender" value="Male" id="Male" class="form-control" >&nbsp;Male&nbsp;
            <input type="radio"  name="gender" value="Female" id="Female" class="form-control" >&nbsp;Female&nbsp;
            <input type="radio"  name="gender" value="Others" id="Others" class="form-control" >&nbsp;Others           
            </div>
          </div>

          <label class="col-lg-2 control-label" for="phone">Phone:<font color="red">*</font> </label>

          <div class="col-lg-4">
            <div class="form-group">
                <input type="text" placeholder="Enter Contact Number"  title="Phone number Start with 7,8,or 9" id="phone" name="phone" class="form-control" autocomplete="off">
            </div>
          </div>

          </div>

          <div class="row">
          <label class="col-lg-2 control-label" for="uemail">Email: <font color="red">*</font></label>
          <div class="col-lg-4">
          <div class="form-group">
            <input type="text" placeholder="Enter Email" id="uemail" name="uemail" class="form-control" autocomplete="off">
            </div>
          </div>
          <label class="col-lg-2 control-label" for="bdate">BirthDate: <font color="red">*</font></label>
          <div class="col-lg-4">
          <div class="form-group">
            <input type="date" id="bdate" name="bdate" class="form-control" autocomplete="off">
            </div>
          </div>

          </div>
          
          <div class="row">
          <label class="col-lg-2 control-label" for="caddress">Current Address: <font color="red">*</font></label>

          <div class="col-lg-4">
          <div class="form-group">
            <textarea rows="4" placeholder="Enter Address" id="caddress" name="caddress" class="form-control" autocomplete="off">
            </textarea>
            </div>
          </div>

          <label class="col-lg-2 control-label" for="paddress">Permenent Address: <font color="red">*</font></label>
          <div class="col-lg-4">
          <div class="form-group">
            <textarea rows="4" placeholder="Enter Address" id="paddress" name="paddress" class="form-control" autocomplete="off">
            </textarea>
            </div>
          </div>
          
          </div>

          <div class="row">
            <label class="col-lg-2 control-label" for="udesc">About Description: </label>
            <div class="col-lg-10">
            <div class="form-group">
              <textarea  rows="5" placeholder="Enter Few Words" id="udesc" name="udesc" class="form-control" autocomplete="off">
              </textarea>
              </div>
            </div>

            </div>

            <div class="row">

            <label class="col-lg-2 control-label" for="uobj">Objective:<font color="red">*</font> </label>
            <div class="col-lg-10">
            <div class="form-group">
              <textarea rows="5" placeholder="Enter Objective In Two-Three Lines" id="uobj" name="uobj" class="form-control" autocomplete="off">
              </textarea>
              </div>
            </div>
          
          </div>
      <hr>
      <h5>Social Links</h5>
      <hr>

          <div class="row">
          <label class="col-lg-2 control-label" for="liknkedinlink">Linkedin Link:<font color="red">*</font> </label>
          <div class="col-lg-4">
          <div class="form-group">
            <input type="text" id="liknkedinlink" placeholder="Enter Link" name="liknkedinlink" class="form-control" autocomplete="off">
          </div>
          </div>

          <label class="col-lg-2 control-label" for="gitlink">Github Link: </label>
          <div class="col-lg-4">
          <div class="form-group">
            <input type="text" placeholder="Enter Link" id="gitlink" name="gitlink" class="form-control" autocomplete="off">
            </div>
          </div>
          
          </div>

          <div class="row">
             <label class="col-lg-2 control-label" for="twitlink">Twitter Link: </label>
             <div class="col-lg-4">
              <div class="form-group">
               <input type="text" placeholder="Enter Link" id="twitlink" name="twitlink" class="form-control" autocomplete="off">
              </div>
              </div>
              <label class="col-lg-2 control-label" for="fblink">Facebook Link: </label>
             <div class="col-lg-4">
             <div class="form-group">
              <input type="text" id="fblink" placeholder="Enter Link" name="fblink" class="form-control" autocomplete="off">
             </div>
             </div>
          </div>

            <div class="clearfix" style="height: 10px;clear: both;"></div>

            <div class="row">
             <div class="col-lg-10">
            <div class="form-group">
                <button class="btn btn-primary" id="btn_addnew_about"  onclick="aboutFormSave();" type="button">Add New</button> 
                <button class="btn btn-primary" style="display:none" id="btn_update_about" onclick="aboutFormUpdate();" type="button">Update</button> 
                <button class="btn btn-secondary" type="reset">Cancel </button> 
                
                 <!-- <div class="row">
                  <div class="col-lg-12"> -->
                   <span id="msgaboutadded"></span>
                  <!-- </div>
                </div> -->


              </div>
            </div>
            </div>
            
          </fieldset>
</form>

</section>
</div>

<div id="Div_experience">

<div class="container" id="Div_expTbl">
<legend>Step 2 of 7</legend>
            <hr>
            <h4>Experiance List</h4>
            <hr>
<div class="table-responsive">
<table class="table table-bordered table-sm" id="Tbl_experience">
    <thead>
      <tr>
        <th class="text-center">#</th>
        <th>Company Name</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody id="Tbl_experience_body">
    <tr>
    <!-- <td>1</td><td>xxovek</td><td>yes</td> -->
    </tr>
     
    </tbody>
  </table>
  </div>
  </div>

<!-- <div> -->

<section class="container" id="experience">
<form method="post" id="experienceForm">
<fieldset>
            <!-- <legend>Step 2 of 7</legend> -->
            <hr>
            <h4>Experience Details</h4>
            <hr>
            <input type="hidden" id="expid" >

            
            <div class="row">
                <label class="col-lg-2 control-label" for="compname">Company Name:<font color="red">*</font> </label>
                <div class="col-lg-4">
                  <div class="form-group">
                  <input type="text" placeholder="Enter Company Name" id="compname" name="compname" class="form-control" autocomplete="off">
                  </div>
                </div>

                  <label class="col-lg-2 control-label" for="dname">Designation Name:<font color="red">*</font> </label>
                <div class="col-lg-4">
                <div class="form-group">
                  <input type="text" id="dname" placeholder="Enter Designation Name" name="dname" class="form-control" autocomplete="off">
                </div>
                </div>
            </div>

  
            <div class="row">
                <label class="col-lg-2 control-label" for="cjoindate">Joined Date:<font color="red">*</font> </label>
                <div class="col-lg-4">
                  <div class="form-group">
                  <input type="date" placeholder="" id="cjoindate" name="cjoindate" class="form-control" autocomplete="off">
                  </div>
                  </div>

                  <label class="col-lg-2 control-label" for="cenddate">Ended Date:<font color="red">*</font> </label>
                <div class="col-lg-4">
                <div class="form-group">
                  <input type="date" id="cenddate" placeholder="" name="cenddate" class="form-control" autocomplete="off">
                </div>
                </div>
            </div>

            <div class="row">
                <label class="col-lg-2 control-label" for="jobdesc">Description:<font color="red">*</font> </label>
                <div class="col-lg-10">
                  <div class="form-group">
                  <textarea rows="5" placeholder="Enter Job Description" id="jobdesc" name="jobdesc" class="form-control" autocomplete="off">
                 </textarea>
                </div>
                </div>
            </div>

            <!-- <div class="form-group">
              <label class="col-lg-2 control-label" for="upass1">Password: </label>
              <div class="col-lg-6">
                <input type="password" placeholder="Your Password" id="upass1" name="upass1" class="form-control" autocomplete="off">
              </div>
            </div>
            <div class="clearfix" style="height: 10px;clear: both;"></div>

            <div class="form-group">
              <label class="col-lg-2 control-label" for="upass1">Confirm Password: </label>
              <div class="col-lg-6">
                <input type="password" placeholder="Confirm Password" id="upass2" name="upass2" class="form-control" autocomplete="off">
              </div>
            </div> -->

            <div class="clearfix" style="height: 10px;clear: both;"></div>

            <div class="row">
              <div class="col-lg-10">
              <div class="form-group">
                <button class="btn btn-primary" id="btn_addnew_exp" onclick="experienceFormSave();" type="button">Add New</button> 
                <button class="btn btn-primary" style="display:none" id="btn_update_exp" onclick="experienceFormUpdate();" type="button">Update</button> 
                <button class="btn btn-secondary" onclick="ClickCancel('experienceForm');" type="button">Cancel </button> 
           
                <!-- <div class="row">
            <div class="col-lg-12"> -->
                <span id="msgexpadded"></span>
            <!-- </div>
           </div> -->


            </div>

              </div>
            </div>

          </fieldset>
</form>
</section>

</div>


<div id="Div_education">
<div class="container" id="Div_eduTbl">

<legend>Step 3 of 7</legend>
            <hr>
            <h4>Educational Details List</h4>
            <hr>
<div class="table-responsive">
<table class="table table-bordered table-sm" id="Tbl_education">
    <thead>
      <tr>
        <th class="text-center">#</th>
        <th>Degree Name</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody id="Tbl_education_body">
     
    </tbody>
  </table>
  </div>
  </div>

<section class="container" id="education">
<form method="post" id="educationForm">
<fieldset>
            <!-- <legend>Step 3 of 7</legend> -->
          <hr>
            <h4>Educational Details</h4>
          <hr>
          <input type="hidden" id="eduid" >

          <!-- <div class="row">
            <div class="col-lg-12">
                <span id="msgeduadded"></span>
            </div>
           </div> -->
              <div class="row">
                <label class="col-lg-2 control-label" for="uniname">University Name:<font color="red">*</font> </label>
                <div class="col-lg-4">
                  <div class="form-group">
                  <input type="text" placeholder="Enter University Name" id="uniname" name="uniname" class="form-control" autocomplete="off">
                  </div>
                  </div>

                  <label class="col-lg-2 control-label" for="degname">Degree Name:<font color="red">*</font> </label>
                <div class="col-lg-4">
                <div class="form-group">
                  <input type="text" id="degname" placeholder="Enter Degree Name" name="degname" class="form-control" autocomplete="off">
                </div>
                </div>
            </div>

            <div class="row">
                <label class="col-lg-2 control-label" for="fieldname">Field Name:<font color="red">*</font> </label>
                <div class="col-lg-4">
                  <div class="form-group">
                  <input type="text" placeholder="Enter Field ex. Computer Science" id="fieldname" name="fieldname" class="form-control" autocomplete="off">
                  </div>
                  </div>

                  <label class="col-lg-2 control-label" for="trcname">Track Name/ Medium:<font color="red">*</font> </label>
                <div class="col-lg-4">
                <div class="form-group">
                  <input type="text" id="trcname" placeholder="Enter Track ex. Web Development Track / School Medium" name="trcname" class="form-control" autocomplete="off">
                </div>
                </div>
            </div>

            <div class="row">
                <label class="col-lg-2 control-label" for="gpa">GPA:</label>
                <div class="col-lg-4">
                  <div class="form-group">
                  <input type="text" placeholder="Enter GPA in digit" id="gpa" name="gpa" class="form-control" autocomplete="off">
                  </div>
                  </div>

                  <label class="col-lg-2 control-label" for="marks">Marks:<font color="red">*</font> </label>
                <div class="col-lg-4">
                <div class="form-group">
                  <input type="text" id="marks" placeholder="Enter Percentage" name="marks" class="form-control" autocomplete="off">
                </div>
                </div>
            </div>

            <div class="row">
                <label class="col-lg-2 control-label" for="joindate">Joined Date:<font color="red">*</font> </label>
                <div class="col-lg-4">
                  <div class="form-group">
                  <input type="date" placeholder="" id="joindate" name="joindate" class="form-control" autocomplete="off">
                  </div>
                </div>

                  <label class="col-lg-2 control-label" for="enddate">Ended Date:<font color="red">*</font> </label>
                <div class="col-lg-4">
                <div class="form-group">
                  <input type="date" id="enddate" placeholder="" name="enddate" class="form-control" autocomplete="off">
                </div>
                </div>
            </div>

            <div class="row">
               <label class="col-lg-2 control-label" for="enddate">College/School Name:<font color="red">*</font> </label>
                <div class="col-lg-10">
                <div class="form-group">
                  <input type="text" id="colgname" placeholder="Enter School/College Name" name="colgname" class="form-control" autocomplete="off">
                </div>
                </div>
            </div>
         
            <div class="clearfix" style="height: 10px;clear: both;"></div>

            <div class="row">
              <div class="col-lg-10">
              <div class="form-group">
                <button class="btn btn-primary"  id="btn_addnew_edu" onclick="educationFormSave();" type="button">Add New</button> 
                <button class="btn btn-primary" style="display:none" id="btn_update_edu" onclick="educationFormUpdate();" type="button">Update</button> 
                <button class="btn btn-secondary" onclick="ClickCancel('educationForm');" type="button">Cancel </button> 
                <span id="msgeduadded"></span>
                             
              </div>
              </div>
            </div>       

          </fieldset>    
</form>

</section>
</div>



<div id="Div_skills" >

<div class="container" id="">

<legend>Step 4 of 7</legend>
            <hr>
            <h4>Skils Details List</h4>
            <hr>
<div class="table-responsive">
<table class="table table-bordered table-sm" id="Tbl_skills">
    <thead>
      <tr>
        <th class="text-center">#</th>
        <th>Skill Name</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody id="Tbl_skills_body">
     
    </tbody>
  </table>
  </div>
  </div>

<section class="container" id="skills">

<form method="post" id="skillsForm">
<fieldset>
            <!-- <legend>Step 4 of 7</legend> -->
          <hr>
            <h4>Skills Details</h4>
          <hr>
          <input type="hidden" id="skillid" >

          <!-- <div class="row">
            <div class="col-lg-12">
                <span id="msgskilladded"></span>
            </div>
           </div> -->
             <div class="row">
                <label class="col-lg-2 control-label" for="skillname">Skill Name:<font color="red">*</font> </label>
                  <div class="col-lg-4">
                  <div class="form-group">
                    <input type="text" placeholder="Enter Skill Name" id="skillname" name="skillname" class="form-control" autocomplete="off">              
                  </div>
                  </div>

                  <label class="col-lg-2 control-label" for="skilldesc">Description:<font color="red">*</font> </label>
              <div class="col-lg-4">
              <div class="form-group">
                <textarea rows="5" placeholder="Enter Description In Two-Three Lines" id="skilldesc" name="skilldesc" class="form-control" autocomplete="off">
                </textarea>
                </div>
              </div>

              </div>

            <div class="clearfix" style="height: 10px;clear: both;"></div>

            <div class="row">
              <div class="col-lg-10">
              <div class="form-group">
                <button class="btn btn-primary" id="btn_addnew_skill" onclick="skillsFormSave();" type="button">Add New</button> 
                <button class="btn btn-primary" style="display:none" id="btn_update_skill" onclick="skillsFormUpdate();" type="button">Update</button> 
                <button class="btn btn-secondary" onclick="ClickCancel('skillsForm');" type="button">Cancel </button> 
                <span id="msgskilladded"></span>
             
              </div>
              </div>
            </div>

          </fieldset>
</form>
</section>

</div>


<div id="Div_interests" >

<div class="container">
<legend>Step 5 of 7</legend>
            <hr>
            <h4>Hobbies Details List</h4>
            <hr>
<div class="table-responsive">
<table class="table table-bordered table-sm" id="Tbl_hobby">
    <thead>
      <tr>
        <th class="text-center">#</th>
        <th>Hobby Name</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody id="Tbl_hobby_body">
   
    </tbody>
  </table>
  </div>
  </div>



<section class="container" id="interests">
<form method="post" id="interestsForm">
<fieldset>
            <!-- <legend>Step 5 of 7</legend> -->
          <hr>
            <h4>Hobbies and Interest</h4>
          <hr>

          <input type="hidden" id="hobbyid" >

          <!-- <div class="row">
            <div class="col-lg-12">
                <span id="msgHobbyAdded"></span>
            </div>
           </div> -->
            <div class="row">
                <label class="col-lg-2 control-label" for="hobbyname">Hobby Name:<font color="red">*</font> </label>
                  <div class="col-lg-4">
                  <div class="form-group">
                  <input type="text" placeholder="Enter Hobby Name" id="hobbyname" name="hobbyname" class="form-control" autocomplete="off">              
                  </div>
                  </div>

                  <label class="col-lg-2 control-label" for="hobbydesc">Description:<font color="red">*</font> </label>
              <div class="col-lg-4">
              <div class="form-group">
                <textarea rows="5" placeholder="Enter Description In Two-Three Lines" id="hobbydesc" name="hobbydesc" class="form-control" autocomplete="off">
                </textarea>
                </div>
              </div>

              </div>


            <div class="clearfix" style="height: 10px;clear: both;"></div>

            <div class="row">
              <div class="col-lg-10">
              <div class="form-group">
                <button class="btn btn-primary" id="btn_addnew_hobby" onclick="interestsFormSave();" type="button">Add New</button>
                <button class="btn btn-primary" style="display:none" id="btn_update_hobby" onclick="interestsFormUpdate();" type="button">Update</button>
                <button class="btn btn-secondary" onclick="ClickCancel('interestsForm');" type="button">Cancel </button> 
                <span id="msgHobbyAdded"></span>
             
              </div>
              </div>
            </div>
            
          </fieldset>
</form>

</section>

<div>




<div id="Div_awards" >

<div class="container" id="">
<legend>Step 6 of 7</legend>
            <hr>
            <h4>Awards Details List</h4>
            <hr>
<div class="table-responsive">
<table class="table table-bordered table-sm" id="Tbl_awards">
    <thead>
      <tr>
        <th class="text-center">#</th>
        <th>Certificate Name</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody id="Tbl_awards_body">
      
    </tbody>
  </table>
  </div>
  </div>

<section class="container" id="awards">

<form method="post" id="awardsForm">
<fieldset>
            <!-- <legend>Step 6 of 7</legend> -->
            <hr>
              <h4>Awards</h4>
            <hr>
            <input type="hidden" id="awardid" >


            <!-- <div class="row">
            <div class="col-lg-12">
                <span id="msgawardAdded"></span>
            </div>
           </div> -->
              <div class="row">
                <label class="col-lg-2 control-label" for="certificatename">Certificate Name:<font color="red">*</font> </label>
                  <div class="col-lg-4">
                  <div class="form-group">
                  <input type="text" placeholder="Enter Certificate Name" id="certificatename" name="certificatename" class="form-control" autocomplete="off">              
                  </div>
                  </div>

                <label class="col-lg-2 control-label" for="certificatedesc">Description:<font color="red">*</font> </label>
                  <div class="col-lg-4">
                  <div class="form-group">
                  <textarea rows="5" placeholder="Enter Description In Two-Three Lines" id="certificatedesc" name="certificatedesc" class="form-control" autocomplete="off">
                  </textarea>
                  </div>
              </div>
              
              </div>


            <div class="clearfix" style="height: 10px;clear: both;"></div>

            <div class="row">
            <div class="col-lg-10">
            <div class="form-group">
                <!-- <button class="btn btn-warning back6" type="button"><span class="fa fa-arrow-left"></span> Back</button>  -->
                <button class="btn btn-primary" id="btn_addnew_award" onclick="awardsFormSave();" type="button">Add New </button> 
                <button class="btn btn-primary" style="display:none" id="btn_update_award" onclick="awardsFormUpdate();" type="button">Update </button> 
                <button class="btn btn-secondary" onclick="ClickCancel('awardsForm');" type="button">Cancel </button> 
                <span id="msgawardAdded"></span>
            
            </div>
            </div>
            </div>

          </fieldset>
</form>
    
</section>
</div>


<div id="Div_addphoto">
<section class="container" id="addphoto">

<form method="post" id="addPhotoForm" enctype="multipart/form-data">
<fieldset>
            <legend>Step 7 of 7</legend>
            <hr>
              <h4>Profile Image Upload</h4>
            <hr>
            <div class="row">
            <div class="col-lg-12">
                <span id="msgUploadimage"></span>
            </div>
           </div>
              <div class="row">

                <label class="col-lg-2 control-label">Profile Photo:<font color="red">*</font> </label>
                  <div class="col-lg-6">
                  <div class="form-group">
                   <div class="custom-file">
                   <input type="file" class="custom-file-input" id="imgname" name="imgname">
                   <label class="custom-file-label" for="imgname">Choose file</label>
                      <!-- <span id="profileImgSpan" ></span> -->
                  </div>
                  </div>
                </div>

                  <div class="col-lg-4">

                  <div class="img-responsive" style="width:20%;height:auto;"  id="profile"></div> 
                  </div>

                  <!-- <div class="col-sm-4">
                  <div class="img-responsive"  id="profile"></div>
                  </div> -->
              </div>

            <div class="clearfix" style="height: 10px;clear: both;"></div>

            <div class="row">
            <div class="col-lg-10">
            <div class="form-group">
                <!-- <button class="btn btn-warning back6" type="button"><span class="fa fa-arrow-left"></span> Back</button>  -->
                <button class="btn btn-primary" onclick="addPhotoFormSave();" type="button">Submit </button> 
                <!-- <img src="spinner.gif" alt="" id="loader" style="display: none"> -->
            </div>
            </div>
            </div>

          </fieldset>
</form>
    
</section>
</div>


</div>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
 <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

 <!-- Plugin JavaScript -->
 <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

 <!-- Custom scripts for this template -->
 <script src="js/resume.min.js"></script>
 <!-- <script type="text/javascript" src="js/jquery.validate.js"></script> -->
 <script type='text/javascript' src='js/jquery.validate.js'></script>
 <script src="js/create.js"></script>

<script>
// displayNavMenu();
checkAboutAdded();

function displayNavMenu(){
  var record_cnt = "<?php echo $user_count ;?>";
  // alert(record_cnt);
  if(record_cnt > '0'){
    $("#Li_about").hide();
    $("#Div_about").hide();
  }else{
    $("#Div_about").show();
    $("#Li_about").show();
  }

}

function checkAboutAdded(){

  var record_cnt = "<?php echo $user_count ;?>";

  if(record_cnt > 0){
    $("#btn_update_about").show();
    $("#btn_addnew_about").hide();
   
  }else{
    $("#btn_addnew_about").show();
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