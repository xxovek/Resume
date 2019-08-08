

fetchAllTablesData();


function fetchAllTablesData(){

    $.ajax({
        url:'./src/fetchAboutData.php',
        type:'POST',
        dataType:'json',
        success:function(response){

          



        var aboutHtmlData ='<div class="w-100">';
            aboutHtmlData +='<div style="text-align:right;">';
            aboutHtmlData +='<img src="./img/'+response.profile_iname+'" width ="15%" height="25%"></div>';
            aboutHtmlData +='<a href="mailto:'+response.mailid+'">'+response.mailid+'</a></div><br><h3>'+response.phone+'</h3>';

            aboutHtmlData +='<h3 class="">'+response.fname+'&nbsp;'+response.mname+'&nbsp;'+response.lname+'</h3>';
            aboutHtmlData +='<div class="">Address &nbsp:&nbsp'+response.c_address+'</div><br>';

            if(response.desription != ''){
                aboutHtmlData +='<p class="lead mb-5">'+response.desription+'</p>';
            }else{
                aboutHtmlData +='<p class="lead mb-5">'+response.objective+'</p>';
            }

                aboutHtmlData +='<h5> Social Links</h5><ul>';

            if(response.git_link != ''){
                aboutHtmlData +='<li ><a href="'+response.git_link+'">'+response.git_link+'</a></li>';
            }
            if(response.linkedin_link != ''){
                aboutHtmlData +='<li ><a href="'+response.linkedin_link+'">'+response.linkedin_link+'</a></li>';

            }
            if(response.facebook_link != ''){
                aboutHtmlData +='<li ><a href="'+response.facebook_link+'">'+response.facebook_link+'</a></li>';
    
            }
            if(response.twitter_link != ''){
                aboutHtmlData +='<li ><a href="'+response.twitter_link+'">'+response.twitter_link+'</a></li>';
            }

                aboutHtmlData +='</ul></div>';

            $("#about").append(aboutHtmlData);
            $("#about").html(aboutHtmlData);
          
        }
       
    });

    $.ajax({
        url:'./src/fetchExperiencData.php',
        type:'POST',
        dataType:'json',
        success:function(response){

        
            var count=Object.keys(response).length;
            if(count>0){
             var ExpHtmlData ='<div class="w-100"><h5 class="mb-5">Experience</h5>';

              for(var i=0;i<count;i++)
              {            

      

                let jdate =  moment(response[i].join_date).add(365, 'day').format('LL');
                let edate =  moment(response[i].end_date).add(365, 'day').format('LL');
               
                // alert(date1);
               
                ExpHtmlData +='<div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">';
                ExpHtmlData +='<div class="resume-content">';
                ExpHtmlData +='<h3 class="mb-0">'+response[i].designation+'</h3>';
                ExpHtmlData +='<div class="subheading mb-3">'+response[i].company_name+'</div>';
                ExpHtmlData +='<p>'+response[i].exp_description+'</p>';
                ExpHtmlData +='</div><div class="resume-date text-md-right">';
                ExpHtmlData +='<span class="text-primary">'+jdate+' to '+edate+'</span>';
                ExpHtmlData +='</div></div>';
               
              }
              ExpHtmlData +='</div>';

            }

            $("#experience").append(ExpHtmlData);
            $("#experience").html(ExpHtmlData);

        }

    });

    $.ajax({
        url:'./src/fetchEducationData.php',
        type:'POST',
        dataType:'json',
        success:function(response){

            var count=Object.keys(response).length;
            if(count>0){
                var EduHtmlData ='<div class="w-100"><h5 class="mb-5">Education</h5>';

              for(var i=0;i<count;i++){       

                let jdate =  moment(response[i].joined_date).add(365, 'day').format('LL');
                let edate =  moment(response[i].ended_date).add(365, 'day').format('LL');

                EduHtmlData +='<div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">';
                EduHtmlData +='<div class="resume-content">';
                EduHtmlData +='<h3 class="mb-0">'+response[i].uni+'</h3>';
                EduHtmlData +='<div class="subheading mb-3">'+response[i].degree_name+'</div>';
                EduHtmlData +='<div>'+response[i].field_name+' - '+response[i].track+'</div>';
                EduHtmlData +='<p>GPA &nbsp;: &nbsp;'+response[i].gpa+'</p></div>';
                EduHtmlData +='<div class="resume-date text-md-right">';
                EduHtmlData +='<span class="text-primary">'+jdate+' to '+edate+'</span>';
                EduHtmlData +='</div></div>';

            }
            EduHtmlData +='</div>';

        }
             $("#education").append(EduHtmlData);
             $("#education").html(EduHtmlData);

        }

    });

    $.ajax({
        url:'./src/fetchSkillsData.php',
        type:'POST',
        dataType:'json',
        success:function(response){
            var count=Object.keys(response).length;
            if(count>0){
                var skillsHtmlData ='<div class="w-100"><h5 class="mb-5">Skills</h5>';
                skillsHtmlData +='<div class="subheading mb-3">Skills And Workflow</div>';
                skillsHtmlData +='<ul class="fa-ul mb-0">';

              for(var i=0;i<count;i++){       
                
                skillsHtmlData +='<li><i class="fa-li fa fa-check"></i>'+response[i].skill_name+' &nbsp; : &nbsp;'+response[i].skill_desc+'</li>';
            
              }
              skillsHtmlData +='</ul></div>';

            }
           
            $("#skills").append(skillsHtmlData);
            $("#skills").html(skillsHtmlData);
        }
    });

    $.ajax({
        url:'./src/fetchInterestData.php',
        type:'POST',
        dataType:'json',
        success:function(response){


            var count=Object.keys(response).length;
            if(count>0){
            var hobbyHtmlData = '<div class="w-100"><h5 class="mb-5">Interests</h5>';

              for(var i=0;i<count;i++)
              {       
                hobbyHtmlData +='<p><h6>'+response[i].hobby_name+'</h6><br>'+response[i].hobby_desc+'</p>';
              }
              hobbyHtmlData +='</div>';

            }

            
            $("#interests").append(hobbyHtmlData);
            $("#interests").html(hobbyHtmlData);
           
        }
    });

    $.ajax({
        url:'./src/fetchAwardsData.php',
        type:'POST',
        dataType:'json',
        success:function(response){
           
            var count=Object.keys(response).length;
            if(count>0){
                var awdHtmlData ='<div class="w-100"><h5 class="mb-5">Awards &amp; Certifications</h5>';
                    awdHtmlData +='<ul class="fa-ul mb-0">';
              for(var i=0;i<count;i++)
              {       
                 awdHtmlData +='<li><i class="fa-li fa fa-trophy text-warning"></i>'+response[i].certificate_name+'&nbsp; - &nbsp;'+response[i].aword_description+'</li>';
              }
              awdHtmlData +='</ul></div>';

            }
            
            $("#awards").append(awdHtmlData);
            $("#awards").html(awdHtmlData);

        }

    });


}
