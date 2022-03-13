<?php

    if (!isset($_SESSION)) {
    session_start();
    }
    include_once('../dbConnection.php');
    if (isset($_SESSION['is_login'])) {
        $stuLogEmail = $_SESSION['stuLogEmail'];
    } else {
        echo "<script> location.href='../index.php'; </script>";
    }

    if (isset($stuLogEmail)) {
        $sql = "SELECT stu_img FROM student WHERE stu_email = '$stuLogEmail'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $stu_img = $row['stu_img'];
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="css/bootstrap.min.css">
    <!----css3---->
    <link rel="stylesheet" href="css/custom.css">
    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">




    <!--google material icon-->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">

    <!-- custom css -->
    <link rel="stylesheet" href="../css/stustyle.css">
</head>

<body>
    <!-- top navbar -->
    <!-- <nav class="navbar navbar-dark fixed-top flex-md-nowrap p-0
    shadow" style="background-color: #225470;">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="studentProfile.php">E-learning</a>
    </nav> -->


    <!-- side bar
    <div class="container-fluid mb-5" style="margin-top:40px;">
        <div class="row">
            <nav class="col-sm-2 bg-light sidebar py-5 d-print-none">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item mb-3">
                            <img src="<?php echo $stu_img ?>" alt="studentimage" class="img-thumbnail rounded-circle">
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="studentProfile.php">
                                <i class="fas fa-user"></i>
                                profile <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <i class="fab fa-accessible-icon"></i>
                                my courses
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <i class="fab fa-accessible-icon"></i>
                                Feedback
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <i class="fas fa-key"></i>
                                Change Password
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../logout.php">
                                <i class="fas fa-sign-out-alt"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>




</body> -->
<div class="wrapper">

        <div class="body-overlay"></div>
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
            
                <h3><img src="<?php echo $stu_img ?>" class="img-fluid" /><span>eLMS BCA</span></h3>
            </div>
            <ul class="list-unstyled components">
                <li class="active">
                    <a href="studentProfile.php" class="dashboard"><i class="material-icons">dashboard</i><span>Profile</span></a>
                </li>

                               

                <li class="">
                    <a href="mycourse.php"><i class="material-icons">menu_book</i><span>My Course</span></a>
                </li>
               
                <li class="">
                    <a href="stufeedback.php"><i class="material-icons">feedback</i><span>Feeback</span></a>
                </li>
                <li class="">
                    <a href="studentChangePass.php"><i class="material-icons">key</i><span>Password</span></a>
                </li>
                <li class="">
                    <a href="../logout.php"><i class="material-icons">logout</i><span>logout</span></a>
                </li>

            </ul>


        </nav>