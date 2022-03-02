// email allready exist che ke nai ae check karvaa maate 
// This is JQuery Method
$(document).ready(function(){ 
    // Ajax call form Allready Exists Verification
    $("#stuemail").on("keypress blur", function(){
        var reg= /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        var stuemail = $("#stuemail").val();
        $.ajax({
            url: "Student/addstudent.php",
            method: "POST",
            data:{
                checkemail: "checkemail",
                stuemail: stuemail,
            },
            success: function (data){
                console.log(data);
                if(data !=0){
                    $("#statusMsg2").html('<small style="color:red;"> Email ID Already Used !</small>');
                    $("#signup").attr("disabled", true);
                }else if(data == 0 && reg.test(stuemail)){
                    $("#statusMsg2").html('<small style="color:green;"> There You Go!</small>');
                    $("#signup").attr("disabled", false);
                }else if(!reg.test(stuemail)){
                    $("#statusMsg2").html('<small style="color:red;"> Please Enter Valid Email !</small>');
                    $("#signup").attr("disabled", true);
                }
                if(stuemail == ""){
                    $("#statusMsg2").html('<small style="color:red;"> Please Enter Email!</small>');
                }
            },
        });
    });
});

// footer maa 6-7 class = modal-footer section maa Signup form maa onClick event function in SignUp button
function addStu(){ //add function calling in Signup button onClick="addStu()"
    var reg= /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    var stuname = $("#stuname").val();
    var stuemail = $("#stuemail").val();
    var stupass = $("#stupass").val();
    // console.log(stuname);
    // console.log(stuemail);
    // console.log(stupass); //for calling 


    // Checking Form Field on Form Submission

    if(stuname.trim() == ""){
        $("#statusMsg1").html('<small style="color:red;"> Please Enter Name!</small>');
        $("#stuname").focus();
        return false;

    }else if(stuemail.trim() == ""){
        $("#statusMsg2").html('<small style="color:red;"> Please Enter Email!</small>');
        $("#stuemail").focus();
        return false;

    }else if(stuemail.trim() !="" && !reg.test(stuemail)){
        $("#statusMsg2").html('<small style="color:red;"> Please Enter Valid Email!</small>');
        $("#stuemail").focus();
        return false;  
    }else if(stupass.trim() == ""){
        $("#statusMsg3").html('<small style="color:red;"> Please Enter Password!</small>');
        $("#stupass").focus();
        return false;
    }else{
        $.ajax({  //This Ajax Method C:\xampp\htdocs\F_LMS\ischool\Student\addstudent.php
            url:"Student/addstudent.php",
            method: "POST",
            dataType: "json",
            data:{
                stusignup: "stusignup",
                stuname: stuname,
                stuemail: stuemail,
                stupass: stupass,   
            },
            success:function(data){
                console.log(data);
                if(data == "OK"){
                    $('#successMsg').html("<span class='alert alert-success'>Registration Successful !</span>");
                    clearStuRegField()
                }else if(data == "Failed"){
                    $('#successMsg').html("<span class='alert alert-danger'>Registration Failed !</span>");
                }
            }, 
            
        });
    }  
}

// Empty All Fields
function clearStuRegField(){
    $("#stuRegForm").trigger("reset");
    $("#statusMsg1").html('');
    $("#statusMsg2").html('');
    $("#statusMsg3").html('');
}

// Ajax Call for Student Login verification

function checkStuLogin(){
    // console.log("Login Clicked"); check karvaa maate, jyaare normally login button par click thase tyaare function call thaay che ke nai? jo call thaay che toh console maa Login Clicked lakhelu aavse
    console.log("Login Clicked");
    var stuLogEmail = $("#stuLogemail").val()
    var stuLogPass = $("#stuLogpass").val()
    $.ajax({
        url: "Student/addstudent.php",
        method:"POST",
        dataType: "json",
        data:{
            checkLogemail: "checkLogemail",
            stuLogEmail: stuLogEmail,
            stuLogPass: stuLogPass,
        },
        success:function(data){
            console.log(data+" Success Data");
            if(data == 0){
                $("#statusLogMsg").html('<small class="alert alert-danger">Invalid Email ID or Password !</small>');
            }else if(data == 1){
                //Boostrap Loading Spin, jo Database maathi Login Detail Match thai jaay tyaare thoda time loading spin thase pachi aagal login thase.
                $("#statusLogMsg").html('<div class="spinner-border text-succcess" role="status"></div>');
                setTimeout(() =>{
                    window.location.href = "index.php";
    
                }, 1000);
            };
            
        },
    });
}

