<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <!-- Boootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="css/all.min.css">

    <link rel="stylesheet" href="css/style.css">

    <title>New School</title>

</head>
<body>



<?php
include('./dbConnection.php');
include('./includes/header.php');
?>

<!-- Start Payment Banner Section-->
<div class="container-fluid bg-dark">
    <div class="row">
        <img src="./image/cbanner.jpg" alt="course" style="height: 500px; width: 100%; object-fit:cover; box-shadow:10px;" />
    </div>
</div>
<!-- End Payment Banner Section-->

<div class="container jumbotron mb-5">
    <div class="row">
        <div class="col-md-4">
            <h5 class="mb-3">
                If Already Registered! Login
            </h5>
            <form role="form" id="stuLoginForm">
                <div class="form-group">
                    <i class="fas fa-envelope"></i><label for="stuLogEmail" class="pl-2 font-weight-bold">Email</label><small id="statusLogMsg1"></small><input type="email" class="form-control" placeholder="Email" name="stuLogEmail" id="stuLogEmail">
                </div>

                <div class="form-group">
                    <i class="fas fa-key"></i><label for="stuLogPass" class="pl-2 font-weight-bold">Password</label>
                    <input type="password" class="form-control" placeholder="Enter Passoword" name="stuLogPass" id="stuLogPass">
                </div>
                <button type="button" class="btn btn-primary" id="stuLoginBtn" onclick="checkStuLogin()">login</button>
            </form><br />
            <smail id="statusLogMsg"></smail>
        </div>
        <div class="col-md-6 offset-md-1">
            <h5 class="mb-3">New User !! Sign Up</h5>
            <form role="form" id="stuRegForm">
                <div class="form-group">
                    <i class="fa fa-user"></i><label for="stuname" class="pl-2 font-weight-bold">Name</label><small id="statusMsg1"></small>
                    <input type="text" class="form-control" placeholder="Enter Name" name="stuname" id="stuname">
                </div>
                <div class="form-group">
                    <i class="fas fa-envelope"></i><label for="stuemail" class="pl-2 font-weight-bold">Email</label><small id="statusMsg2"></small>
                    <input type="text" class="form-control" placeholder="Enter Email" name="stuemail" id="stuemail">
                    <small class="form-text">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <i class="fas fa-key"></i><label for="stupass" class="pl-2 font-weight-bold">New Password</label> <small id="statusMsg3"></small>
                    <input type="password" class="form-control" placeholder="Enter New Passoword" name="stupass" id="stupass">
                </div>
                <button id="signup" type="button" class="btn btn-primary" onclick="addStu()">Signup</button>
            </form><br />
            <small id="successMsg"></small>
        </div>
    </div>
</div>
<br />

<?php
    include('./contact.php');
?>

<!-- ************** Start Footer ******************** -->
<?php
    include('./includes/footer.php');
?>
<!-- ************** End Footer ******************** -->