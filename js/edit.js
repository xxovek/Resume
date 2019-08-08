
//displayNavMenu();
function displayNavMenu(){
  var record_cnt = "<?php echo $user_count ; ?>";

  if(record_cnt > '0'){
    $("#Li_about").hide();
    $("#Div_about").hide();
  }else{
    $("#Div_about").hide();
    $("#Li_about").show();
  }

}

fetchAboutFormData();

function fetchAboutFormData(){

    $.ajax({
          url:'./src/fetchAboutData.php',
          type:'POST',
          dataType:'json',
          success:function(response){
            
              var radioBtnId = "#" + response.gender;
             
              $("#hiddenid").val(response.about_id);
              $("#fname").val(response.fname);
              $("#mname").val(response.mname);
              $("#lname").val(response.lname);
              $(""+radioBtnId+"").prop("checked", true);
              $("#bdate").val(response.bdate);
              $("#uemail").val(response.mailid);
              $("#phone").val(response.phone);
              $("#caddress").val(response.c_address);
              $("#paddress").val(response.p_address);
              $("#udesc").val(response.desription);
              $("#uobj").val(response.objective);
              $("#gitlink").val(response.git_link);
              $("#liknkedinlink").val(response.linkedin_link);
              $("#twitlink").val(response.twitter_link);
              $("#fblink").val(response.facebook_link);
            
          }
      });
  
  }


// function fetchAboutData(){
//     $.ajax({
//         url:'./src/fetchAboutData.php',
//         type:'POST',
//         dataType:'json',
//         success:function(response){
//         }
//     });
// }

function fetchExperiencData(){

    $.ajax({
        url:'./src/fetchExperiencData.php',
        type:'POST',
        dataType:'json',
        success:function(response){

           // alert(response[0].exp_id)
           var dbTblName = 'users_experience';            

            var count=Object.keys(response).length;
            if(count>0){
              for(var i=0;i<count;i++)
              {
                $("#Tbl_experience_body").append('<tr><td  class="text-center">'+(i + 1)+'</td><td>'+response[i]['company_name']+
                '</td><td><div class="btn-group btn-group-sm"><button type="button class="btn btn-secondary btn-sm" title="Edit" onClick="edit_record('+response[i]['exp_id']+',\''+dbTblName+'\');"><i class="fa fa-edit"></i></button><button class="btn btn-danger btn-sm" title="Delete" onClick="remove_record('+response[i]['exp_id']+',\''+dbTblName+'\')"><i class="fa fa-trash"></i></button></div></td></tr>');
              }

            }
            $("#Tbl_experience").append( $("#Tbl_experience_body"))

        }
    });
}



function fetchEducationData(){
    $.ajax({
        url:'./src/fetchEducationData.php',
        type:'POST',
        dataType:'json',
        success:function(response){
            var count=Object.keys(response).length;
            var dbTblName = 'users_education';            

            if(count>0){
              for(var i=0;i<count;i++)
              {
                $("#Tbl_education_body").append('<tr><td  class="text-center">'+(i + 1)+'</td><td>'+response[i]['degree_name']+
                '</td><td><div class="btn-group btn-group-sm"><button type="button class="btn btn-secondary btn-sm" title="Edit" onClick="edit_record('+response[i]['edu_id']+',\''+dbTblName+'\');"><i class="fa fa-edit"></i></button><button class="btn btn-danger btn-sm" title="Delete" onClick="remove_record('+response[i]['edu_id']+',\''+dbTblName+'\')"><i class="fa fa-trash"></i></button></div></td></tr>');
              }

            }
            $("#Tbl_education").append( $("#Tbl_education_body"))
        }

    });
}

function fetchAwardsData(){
    $.ajax({
        url:'./src/fetchAwardsData.php',
        type:'POST',
        dataType:'json',
        success:function(response){
            var dbTblName = 'users_awards';            
            var count=Object.keys(response).length;
            if(count>0){
              for(var i=0;i<count;i++)
              {
                $("#Tbl_awards_body").append('<tr><td  class="text-center">'+(i + 1)+'</td><td>'+response[i]['certificate_name']+
                '</td><td><div class="btn-group btn-group-sm"><button type="button class="btn btn-secondary btn-sm" title="Edit" onClick="edit_record('+response[i]['awd_id']+',\''+dbTblName+'\');"><i class="fa fa-edit"></i></button><button class="btn btn-danger btn-sm" title="Delete" onClick="remove_record('+response[i]['awd_id']+',\''+dbTblName+'\')"><i class="fa fa-trash"></i></button></div></td></tr>');
              }

            }
            $("#Tbl_awards").append( $("#Tbl_awards_body"))
        }

    });
}

function fetchSkillsData(){
    $.ajax({
        url:'./src/fetchSkillsData.php',
        type:'POST',
        dataType:'json',
        success:function(response){
            var dbTblName = 'users_skills';

            var count=Object.keys(response).length;
            if(count>0){
              for(var i=0;i<count;i++)
              {
                $("#Tbl_skills_body").append('<tr><td  class="text-center">'+(i + 1)+'</td><td>'+response[i]['skill_name']+
                '</td><td><div class="btn-group btn-group-sm"><button type="button class="btn btn-secondary btn-sm" title="Edit" onClick="edit_record('+response[i]['skill_id']+',\''+dbTblName+'\');"><i class="fa fa-edit"></i></button><button class="btn btn-danger btn-sm" title="Delete" onClick="remove_record('+response[i]['skill_id']+',\''+dbTblName+'\')"><i class="fa fa-trash"></i></button></div></td></tr>');
              }

            }
            $("#Tbl_skills").append( $("#Tbl_skills_body"))
        }

    });
}

function fetchInterestData(){
    $.ajax({
        url:'./src/fetchInterestData.php',
        type:'POST',
        dataType:'json',
        success:function(response){
            var dbTblName = 'users_interests';
            var count=Object.keys(response).length;
            if(count>0){
              for(var i=0;i<count;i++)
              {
                $("#Tbl_hobby_body").append('<tr><td  class="text-center">'+(i + 1)+'</td><td>'+response[i]['hobby_name']+
                '</td><td><div class="btn-group btn-group-sm"><button type="button class="btn btn-secondary btn-sm" title="Edit" onClick="edit_record('+response[i]['hobby_id']+',\''+dbTblName+'\');"><i class="fa fa-edit"></i></button><button class="btn btn-danger btn-sm" title="Delete" onClick="remove_record('+response[i]['hobby_id']+',\''+dbTblName+'\')"><i class="fa fa-trash"></i></button></div></td></tr>');
              }

            }
            $("#Tbl_hobby").append( $("#Tbl_hobby_body"))
        }

    });
}



//tblName : id of experiance table in html code
//sectionid : section Div 

function fetchTblData(sec_no,sectionid){
$(""+sectionid+"").show();
 window.location.href=""+sectionid+"";

switch(sec_no){

 case 1: 
        $("#Tbl_experience_body").empty();
        fetchExperiencData();
        break;
 case 2: 
        $("#Tbl_education_body").empty();
        fetchEducationData();
        break;
 case 3: 
        $("#Tbl_awards_body").empty();
        fetchAwardsData();
        break;
 case 4:  
        $("#Tbl_skills_body").empty();
        fetchSkillsData();
        break;
 case 5:
        $("#Tbl_hobby_body").empty();
        fetchInterestData();
        break;
    }

}


function edit_record(itemid,tblName){

    $.ajax({
        url:'./src/fetchTblData.php',
        type:'POST',
        dataType:'json',
        data:({tblName:tblName,itemid:itemid}),
        success:function(response){

            // alert(tblName);

            switch(tblName){
                case 'users_experience' :
                        $("#compname").val(response.company_name);
                        $("#dname").val(response.designation);
                        $("#cjoindate").val(response.join_date);
                        $("#cenddate").val(response.end_date);
                        $("#jobdesc").val(response.exp_description);
                        $("#expid").val(itemid);

                    break;

                case 'users_education' :
                        $("#eduid").val(itemid);
                        $("#uniname").val(response.uni);
                        $("#degname").val(response.degree_name);
                        $("#fieldname").val(response.field_name);
                        $("#trcname").val(response.track);
                        $("#gpa").val(response.gpa);
                        $("#marks").val(response.marks_perc);
                        $("#joindate").val(response.joined_date);
                        $("#enddate").val(response.ended_date);
                        $("#colgname").val(response.colgname);
                  
                    break;

                case 'users_skills' :
                        $("#skillid").val(itemid);
                        $("#skillname").val(response.skill_name);
                        $("#skilldesc").val(response.skill_desc);

                    break;

                case 'users_interests' :
                        $("#hobbyid").val(itemid);
                        $("#hobbyname").val(response.hobby_name);
                        $("#hobbydesc").val(response.hobby_desc);
                    break; 
                    
                case 'users_awards' :
                        $("#awardid").val(itemid);
                        $("#certificatename").val(response.certificate_name);
                        $("#certificatedesc").val(response.award_description);
                    break;
            }
            
        }
    });

}

function remove_record(itemid,tblName){

    $.ajax({
        url:'./src/RemoveTblData.php',
        type:'POST',
        dataType:'json',
        data:{tblName:tblName,itemid:itemid},
        success:function(response){
            if(response.msg === true){
                switch(tblName){
                    case 'users_experience' :
                            $("#Tbl_experience_body").empty();
                            fetchExperiencData();
                        break;
    
                    case 'users_education' :
                            $("#Tbl_education_body").empty();
                            fetchEducationData();
                        break;
    
                    case 'users_skills' :
                            $("#Tbl_skills_body").empty();
                            fetchSkillsData();
                        break;
    
                    case 'users_interests' :
                            $("#Tbl_hobby_body").empty();
                            fetchInterestData();
                        break; 
                        
                    case 'users_awards' :
                            $("#Tbl_awards_body").empty();
                            fetchAwardsData();
                        break;
                }
            }
        }
    });

}


fetchUplodedImages();

function fetchUplodedImages(){
    $.ajax({
     url:'./src/fetchUplodedImages.php',
     type:'POST',
     dataType:'json',
     success:function(response){
      // alert(response.profile_iname);
      if(response.profile_iname === undefined){
        // $("#imgname").html("ProfileImage.jpeg");
  
        document.getElementById('profile').innerHTML = '<img src= "./img/avatar.png" class="img-responsive"  style="width:200%;height:auto;">';
  
      }else{
        $("#imgname").html("ProfileImage.jpeg");
  
        document.getElementById('profile').innerHTML = '<img src= "./img/'+response.profile_iname+'" class="img-responsive"  style="width:200%;height:auto;">';
     }
      }
     
    });
  }


  var addPhotoFormValidate = $("#addPhotoForm").validate({
    ignore: [],

rules: {
    imgname: {
       required: true
    }
},
errorElement: "span",
  errorClass: "help-inline-error",
});

// var phoneErrMsg = {
//   required:"This field is required",
//   digits:"Please enter only digits",
//   minlength:"Please enter at least 10 digits",
//   maxlength:"Please do not enter more than 10 digit",
//   pattern:"Phone number Start with 7,8,or 9"

// };

var aboutFormValidate = $("#aboutForm").validate({
 
    rules: {
    fname: {
      required: true,
      minlength: 2,
      maxlength: 16
    },
    mname: {
      required: true,
      minlength: 2,
      maxlength: 16
    },
    lname: {
      required: true,
      minlength: 2,
      maxlength: 16
    },
    uemail: {
      required: true,
      minlength: 6,
      email: true,
      maxlength: 100,
    },
    caddress: {
      required: true,
      minlength: 6,
      maxlength: 100,
    },
    bdate:{
      required:true
    },
    gender:{
      required:true
    },
    uobj:{
      required:true
    },
    paddress:{
      required:true
    },
    phone:{
      required: true,
      digits:true,
      minlength:10,
      maxlength: 10
      // pattern:"[789][0-9]{9}"
    }
  },
//   ,
//  messages:{
//     phone:phoneErrMsg
//   },
  errorElement: "span",
  errorClass: "help-inline-error",
});

var educationFormValidate = $("#educationForm").validate({

    rules: {
    udesc:{
      required:true
    },
    uobj:{
      required:true
    },
    uniname:{
      required:true,
      minlength: 6
    },
    degname:{
      required:true
    },
    fieldname:{
      required:true
    },
    trcname:{
      required:true
    },
    gpa:{
      number: true

    },
    marks:{
      required:true,
      number:true

    },
    joindate:{
      required:true
    },
    enddate:{
      required:true
    },
    colgname:{
      required:true
    }
    
},
  errorElement: "span",
  errorClass: "help-inline-error",
});



var experienceFormValidate = $("#experienceForm").validate({

    rules: {

    compname:{
      required:true
    },
    dname:{
      required:true
    },
    jobdesc:{
      required:true
    },
    cjoindate:{
      required:true
    },
    cenddate:{
      required:true
    }
},
  errorElement: "span",
  errorClass: "help-inline-error",
});

var skillsFormValidate = $("#skillsForm").validate({

    rules: {

    skillname:{
      required:true
    },
    skilldesc:{
      required:true
    }
},
  errorElement: "span",
  errorClass: "help-inline-error",

});

var interestsFormValidate = $("#interestsForm").validate({

    rules: {

    hobbyname:{
      required:true
    },
    hobbydesc:{
      required:true
    }
},
  errorElement: "span",
  errorClass: "help-inline-error",
});

var awardsForm = $("#awardsForm").validate({

    rules: {

    certificatename:{
      required:true
    },
    certificatedesc:{
      required:true
    }
},
  errorElement: "span",
  errorClass: "help-inline-error",
});



function aboutFormUpdate(){

  var returnVal = $("#aboutForm").valid();
    if(returnVal){
   
    var formdata = {
      fname:$("#fname").val(),
      mname:$("#mname").val(),
      lname:$("#lname").val(),
      gender:$("input[name='gender']:checked").val(),
      uemail:$("#uemail").val(),
      bdate:$("#bdate").val(),
      caddress:$("#caddress").val(),
      paddress:$("#paddress").val(),
      udesc:$("#udesc").val(),
      uobj:$("#uobj").val(),
      liknkedinlink:$("#liknkedinlink").val(),
      gitlink:$("#gitlink").val(),
      fblink:$("#fblink").val(),
      twitlink:$("#twitlink").val(),
      phone : $("#phone").val(),
      hiddenId : $("#hiddenid").val()
    }

    $.ajax({
      url : './src/aboutFormSave.php',
      type : 'POST',
      data : formdata,
      dataType :'json',
      success:function(response){
      //response=JSON.parse(response);
      if(response.msg === true){
        var msg2= "<div class='alert alert-info' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong><font color='black'>About Details Updated Successfully</strong></font></div>";
       
        $('#msgaboutadded').html(msg2);
        window.setTimeout(function() {
          $(".alert").fadeTo(500, 0).slideUp(500, function(){
              $(this).remove();
          });
      }, 3000);

      $("#aboutForm")[0].reset();
      window.location.reload();
    }

    }
  });

  }

}
function experienceFormUpdate(){
  var returnVal = $("#experienceForm").valid();
    if(returnVal){
      
    var formdata = {
        compname : $("#compname").val(),
        dname  :  $("#dname").val(),
        jobdesc  : $("#jobdesc").val(),
        cjoindate : $("#cjoindate").val(),
        cenddate : $("#cenddate").val(),
        hiddenId : $("#expid").val(),
    }

    $.ajax({
      url : './src/experienceFormSave.php',
      type : 'POST',
      data : formdata,
      dataType :'json',
      success:function(response){
      //response=JSON.parse(response);
      if(response.msg === true){
        var msg2= "<div class='alert alert-info' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong><font color='black'>Experience Details Updated Successfully</strong></font></div>";
        $('#msgexpadded').html(msg2);
        window.setTimeout(function() {
          $(".alert").fadeTo(500, 0).slideUp(500, function(){
              $(this).remove();
          });
      }, 3000);

      $("#experienceForm")[0].reset();
      $("#Tbl_experience_body").empty();
        fetchExperiencData();
    }

    }
  });

 }
}


function educationFormUpdate(){
  var returnVal = $("#educationForm").valid();
  if(returnVal){
  var formdata = {

    uniname:$("#uniname").val(),
    degreename:$("#degname").val(),
    fieldname:$("#fieldname").val(),
    trackname:$("#trcname").val(),
    gpa:$("#gpa").val(),
    marks:$("#marks").val(),
    colgjoindate:$("#joindate").val(),
    colgenddate:$("#enddate").val(),
    colgname : $("#colgname").val(),
    hiddenId : $("#eduid").val()

  }

  $.ajax({
    url : './src/educationFormSave.php',
    type : 'POST',
    data : formdata,
    dataType :'json',
    success:function(response){
    if(response.msg === true){
      var msg2= "<div class='alert alert-info' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong><font color='black'>Education Details Updated Successfully</strong></font></div>";
      $('#msgeduadded').html(msg2);
      window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
        });
    }, 3000);

    $("#educationForm")[0].reset();
    $("#Tbl_education_body").empty();
    fetchEducationData();
  }

  }
});

 }
}

function skillsFormUpdate(){

  var returnVal = $("#skillsForm").valid();
  if(returnVal){

  var formdata = {
      skillname : $("#skillname").val(),
      skilldesc : $("#skilldesc").val(),
      hiddenId : $("#skillid").val()
  }

  $.ajax({
    url : './src/skillsFormSave.php',
    type : 'POST',
    data : formdata,
    dataType :'json',
    success:function(response){
    if(response.msg === true){
      var msg2= "<div class='alert alert-info' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong><font color='black'>Skill Details Updated Successfully</strong></font></div>";
      $('#msgskilladded').html(msg2);
      window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
        });
    }, 3000);

    $("#skillsForm")[0].reset();
    $("#Tbl_skills_body").empty();
    fetchSkillsData();
  //   window.location.reload();
  }

  }
});

}

}

function interestsFormUpdate(){
  var returnVal = $("#interestsForm").valid();
  if(returnVal){

  var formdata = {
      hobbyname : $("#hobbyname").val(),
      hobbydesc : $("#hobbydesc").val(),
      hiddenId  : $("#hobbyid").val()
  }

  $.ajax({
    url : './src/interestsFormSave.php',
    type : 'POST',
    data : formdata,
    dataType :'json',
    success:function(response){
    if(response.msg === true){
      var msg2= "<div class='alert alert-info' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong><font color='black'>Hobby Updated Successfully</strong></font></div>";
      $('#msgHobbyAdded').html(msg2);
      window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
        });
    }, 3000);

    $("#interestsForm")[0].reset();
    $("#Tbl_hobby_body").empty();
      fetchInterestData();
  }

  }
});
}

}

function awardsFormUpdate(){

  var returnVal = $("#awardsForm").valid();
    if(returnVal){
  
    var formdata = {
        certificatedesc : $("#certificatedesc").val(),
        certificatename : $("#certificatename").val(),
        hiddenId : $("#awardid").val()
    }

    $.ajax({
      url : './src/awardsFormSave.php',
      type : 'POST',
      data : formdata,
      dataType :'json',
      success:function(response){
      if(response.msg === true){
        var msg2= "<div class='alert alert-info' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong><font color='black'>Awards Updated Successfully</strong></font></div>";
        $('#msgawardAdded').html(msg2);
        window.setTimeout(function() {
          $(".alert").fadeTo(500, 0).slideUp(500, function(){
              $(this).remove();
          });
      }, 3000);

      $("#awardsForm")[0].reset();
      $("#Tbl_awards_body").empty();
      fetchAwardsData();
    }

    }
  });

}


}



$("input[name=imgname]").change(function () {
  if (this.files && this.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
          var img = $('<img>').attr('src', e.target.result);
          $('#profile').html(img);
      };

      reader.readAsDataURL(this.files[0]);
  }
  $("#profile").html('');
});


function addPhotoFormSave(){
  var returnVal = $("#addPhotoForm").valid();
  if(returnVal){
// alert("ok");
  var formData = new FormData($("#addPhotoForm").form);
// alert("ok");

  var input_value = document.getElementById("imgname").value;
  var file_data = $("#imgname").prop("files")[0];
  formData.append('imgname', file_data);

  $.ajax({
      url:"./src/addPhotoFormSave.php",
      method:"POST",
      data:formData,
      dataType:'json',
      cache:false,
      contentType: false,
      processData: false,
      success:function(response){
        //response=JSON.parse(response);
        if(response.msg === true){
          var msg2= "<div class='alert alert-info' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong><font color='black'>Image Uploaded Successfully</strong></font></div>";
          $('#msgUploadimage').html(msg2);
          window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
            });
        }, 3000);

        $("#addPhotoForm")[0].reset();
         window.location.reload();
      }
  
      }
    });

  }
}
