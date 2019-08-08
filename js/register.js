
var saveformValidate = $("#formsignup").validate({

    rules: {
      username:{
      required:true
    },
    useremail:{
      required:true
    },
    userpass:{
        required:true,
        minlength: 5
      },
      userrepeatpass:{
        required:true,
        minlength: 5,
        equalTo : "#userpass"
      }
},
  errorElement: "span",
  errorClass: "help-inline-error",

});


function check_email_availablity(email){

    $.ajax({
        url: '',
        type: 'POST',
        dataType : 'json',
        data :{email:email},
        success:function(response){
            if(response.message){
                var msg1= "<div class='alert alert-warning' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong><font color='black'>An account for the specified email address already exists,Try another email address..!</strong></font></div>";
               
                $("#register_err_msg").html(msg1);
                // $("#register_err_msg").html("Email Id Already Exists");
                $("#reset_err_msg").html("");
                
            }else{
                var msg2= "<div class='alert alert-warning' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong><font color='black'>Email Id Not Registered..</strong></font></div>";

                $("#register_err_msg").html("");
                // $("#register_err_msg").html("Email Id Not Registered");
                $("#reset_err_msg").html(msg2);
                
            }
        }
    })
}


// function saveform(){

//     var returnVal = $("#formsignup").valid();
//     if(returnVal){
        
//     var formdata = {
//         username : $("#username").val(),
//         email : $("#useremail").val(),
//         pass : $("#userpass").val()
//     }

//     $.ajax({
//         url:"src/signin.php",
//         method:"POST",
//         dataType:"json",
//         data:formdata,
//         success:function(response){
//          //   alert(response.message);
//             if(response.message){
//                 $(".form-signup")[0].reset();
//                 window.location.href='signin.php';
//             }else{
//                 $("#register_err_msg").html("Email Id Already Exists");
//             }
//         }

//     });
// }

// }


function resetPass(){
    var formdata = {
                    emailid : $("#resetEmail").val()
                }
     $.ajax({
        url:"./src/resetPass.php",
        method:"POST",
        dataType:"json",
        data:formdata,
        success:function(response){
            alert($("#resetEmail").val());
        }

     })         
}


$('#btn_reg').click(function(event){
    
    // data = $('#userpass').val();
    // var len = data.length;
         
    if($('#userpass').val() != $('#userrepeatpass').val()) {
        var msg2 = "<div class='alert alert-warning' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong><font color='black'>Password and Confirm Password not Match</strong></font></div>";
        $("#register_err_msg").html(msg2);
        // Prevent form submission
        event.preventDefault();
    }else{

        var returnVal = $("#formsignup").valid();
    if(returnVal){
        
    var formdata = {
        username : $("#username").val(),
        email : $("#useremail").val(),
        pass : $("#userpass").val()
    }

    $.ajax({
        url:"./src/signin.php",
        method:"POST",
        dataType:"json",
        data:formdata,
        success:function(response){
        
            if(response.message){
                $(".form-signup")[0].reset();
                window.location.href='signin.php';
            }else{

                var msg2= "<div class='alert alert-warning' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong><font color='black'>An account for the specified email address already exists,Try another email address..!</strong></font></div>";
               
                $("#register_err_msg").html(msg2);
                // $("#register_err_msg").html("Email Id Already Exists");
            }
        }

    });
}

    }
     
});



$('#btn_login').on('click',function(event){

    var returnVal = $("#formsignin").valid();
    if(returnVal){

    var formdata = {
        username : $("#inputEmail").val(),
         pass : $("#inputPassword").val()
     }
 
     $.ajax({
         url:"./src/loginsuccess.php",
         method:"POST",
         dataType:"json",
         data:formdata,
         success:function(response){
            // alert(response.message);

             if(response.message){
             
                 window.location.href="dashboard.php";
               
             }else{
            var msg2= "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong><font color='black'>Please Enter Correct Email And Password..!</strong></font></div>";
               
                 $("#login_err_msg").html(msg2);
                //  $("#formsignin")[0].reset();
               
             }
         }
 
     });
    }
        
});



$(function() {
    var loginformValidate = $("#formsignin").validate({

        rules: {
          inputEmail:{
          required:true
        },
        inputPassword:{
          required:true
        }
    },
      errorElement: "span",
      errorClass: "help-inline-error",
    
    });
    
});


