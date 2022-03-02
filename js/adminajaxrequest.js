// Ajax Call for Admin Login verification

function checkAdminLogin(){
    // console.log("Login Clicked"); check karvaa maate, jyaare normally login button par click thase tyaare function call thaay che ke nai? jo call thaay che toh console maa Login Clicked lakhelu aavse
    console.log("Admin Login Clicked");
    var adminLogemail = $("#adminLogemail").val();
    var adminLogpass = $("#adminLogpass").val();
    $.ajax({
        url: "Admin/admin.php",
        method:"POST",
        dataType: "json",
        data:{
            checkLogemail: "checkLogemail",
            adminLogemail: adminLogemail,
            adminLogpass: adminLogpass,
        },
        success:function(data){
            console.log(data+" Success Data");
            if(data == 0){
                $("#statusAdminLogMsg").html('<small class="alert alert-danger">Invalid Email ID or Password !</small>');
            }else if(data == 1){
                //Boostrap Loading Spin, jo Database maathi Login Detail Match thai jaay tyaare thoda time loading spin thase pachi aagal login thase.
                $("#statusAdminLogMsg").html('<small class="alert alert-success">Success loading..</small>');
                setTimeout(() =>{
                    window.location.href = "Admin/adminDashboard.php";
    
                }, 1000);
            };
            
        },
    });
}
