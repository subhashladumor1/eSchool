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

    <!-- Start Navigation -->
    <?php
    include_once('./dbConnection.php');
    include('./includes/header.php');

    ?>
    <!-- End Navigation -->


    <!-- Starting Hero Section Video Background -->
    <div class="container-fluid remove-mrg">
        <div class="vid-parent">
            <video playinline autoplay muted loop>
                <source src="videos/1.mp4">
            </video>
            <div class="vid-overlayer"></div>
        </div>
        <div class="vid-content">

            <h1 class="my-content">Welcome to BCA eLMS</h1>
            <small class="my-content">Learn and Implement</small><br>
            <?php
            if (!isset($_SESSION['is_login'])) {
                echo '<a href="#" class="btn btn-primary btn btn-danger mt-3" data-toggle="modal" data-target="#stuRegModalCenter">Get
                    Started</a>';
            } else {
                echo '<a href="Student/studentProfile.php" class="btn btn-primary btn mt-3"> My Profile</a>';
            }
            ?>

        </div>
    </div>
    <!-- Ended Hero Section Video Background -->

    <!-- Start Text Banner -->
    <div class="container-fluid bg-danger txt-banner">
        <div class="row bottom-banner">
            <div class="col-sm">
                <h5><i class="fas fa-book-open mr-3"></i>100+ Online Courses</h5>
            </div>
            <div class="col-sm">
                <h5><i class="fas fa-users mr-3"></i>Exper Instructors</h5>
            </div>
            <div class="col-sm">
                <h5><i class="fas fa-keyboard mr-3"></i>Lifetime Access</h5>
            </div>
            <div class="col-sm">
                <h5><i class="fas fa-rupee-sign mr-3"></i>Money Back Guarantee</h5>
            </div>

        </div>
    </div>
    <!-- End Text Banner -->

    <!-- Start Most Popular Course -->
    <div class="container mt-5">
        <h1 class="text-center">Popular Course</h1>

        <!-- Start Most Popular Course 1st card deck  -->
        <div class="card-deck mt-4">
            <!-- ************** Course 1 in 1st Deck **************************** -->
            <?php
            $sql = "SELECT * FROM course LIMIT 3";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $course_id = $row['course_id'];
                    echo '<a href="coursedetails.php?course_id=' . $course_id . '" class="btn" style="text-align: left; padding:0px; margin:0px">
                        <div class="card">
                            <img src="' . str_replace('..', '.', $row['course_img']) . '" class="card-img-top" alt="Guitar" />
                            <div class="card-body>">
                                <h5 class="card-title">' . $row['course_name'] . '</h5>
                                <p>' . $row['course_desc'] . '</p>
                            </div>
        
                            <div class="card-footer">
                                <p class="card-text d-inline">Price:<small><del>&#8377 ' . $row['course_original_price'] . ' </del></small>
                                    <span class="font-weight-bolder">&#8377 ' . $row['course_price'] . '<span>
                                </p>
                                <a class="btn btn-primary text-white font-weight-bolder float-right" href="coursedetails.php?course_id=' . $course_id . '"> Enroll</a>
                            </div>
                        </div>
                    </a>';
                }
            }
            ?>

        </div>

        <!-- End Most Popular Course 1st card deck  -->

        <!-- Start Most Popular Course 2nd card deck  -->
        <div class="card-deck mt-4">]
            <!-- *********************** Course 1 in 2nd Deck **************************** -->
            <?php
            $sql = "SELECT * FROM course LIMIT 3, 3";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $course_id = $row['course_id'];
                    echo '<a href="coursedetails.php?course_id=' . $course_id . '" class="btn" style="text-align: left; padding:0px; margin:0px">
                        <div class="card">
                            <img src="' . str_replace('..', '.', $row['course_img']) . '" class="card-img-top" alt="Guitar" />
                            <div class="card-body>">
                                <h5 class="card-title">' . $row['course_name'] . '</h5>
                                <p>' . $row['course_desc'] . '</p>
                            </div>
        
                            <div class="card-footer">
                                <p class="card-text d-inline">Price:<small><del>&#8377 ' . $row['course_original_price'] . ' </del></small>
                                    <span class="font-weight-bolder">&#8377 ' . $row['course_price'] . '<span>
                                </p>
                                <a class="btn btn-primary text-white font-weight-bolder float-right" href="coursedetails.php?course_id=' . $course_id . '"> Enroll</a>
                            </div>
                        </div>
                    </a>';
                }
            }
            ?>

        </div>

        <!-- End Most Popular Course 1st card deck  -->




        <div class="text-center m-2">
            <a class="btn btn-danger btn-sm" href="#"> View All Courses</a>
        </div>
    </div>
    <!-- End Most Popular Course -->

    <!-- Start Contact Us -->
    <?php
    include('./contact.php');
    ?>
    <!-- End Contact Us -->

    <!-- Starting Testimonial Slider Feedback -->
    <!-- Ended Testimonial Slider Feedback -->

    <!-- ************** Start Social Follow ******************** -->
    <div class="container-fluid bg-danger">
        <div class="row text-white text-center p-1">
            <div class="col-sm">
                <a class="text-white social-hover" href="#">
                    <i class="fab fa-facebook-f"></i> Facebook
                </a>
            </div>
            <div class="col-sm">
                <a class="text-white social-hover" href="#">
                    <i class="fab fa-twitter"></i> Twitter
                </a>
            </div>
            <div class="col-sm">
                <a class="text-white social-hover" href="#">
                    <i class="fab fa-whatsapp"></i> WhatsApp
                </a>
            </div>
            <div class="col-sm">
                <a class="text-white social-hover" href="#">
                    <i class="fab fa-instagram"></i> Instagram
                </a>
            </div>
        </div>
    </div>
    <!-- ************** End Social Follow ******************** -->


    <!-- ************** Start About us******************** -->
    <div class="container-fluid p-4" style="background-color: #E9ECEF;">
        <div class="container" style="background-color: #E9ECEF;">
            <div class="row text-center">
                <div class="col-sm">
                    <h5>About Us</h5>
                    <p>
                        iSchool Provides universal Access to the World's Best education, partnering with top
                        universities and organization of offer courses online.
                    </p>
                </div>
                <div class="col-sm">
                    <h5>Category</h5>
                    <a class="text-dark" href="#"> Web Development</a><br />
                    <a class="text-dark" href="#"> Android Development</a><br />
                    <a class="text-dark" href="#"> iOS Development</a><br />
                    <a class="text-dark" href="#"> Data Science</a><br />
                    <a class="text-dark" href="#"> AI</a><br />
                </div>
                <div class="col-sm">
                    <h5>Contact Us</h5>
                    <p>iSchoool Pvt Ltd <br> Near Police Camp II <br> Bokaro Surat <br> Ph 0000000</p>
                </div>
            </div>
        </div>
    </div>
    <!-- ************** End About us******************** -->



    <!-- ************** Start Footer ******************** -->
    <?php
    include('./includes/footer.php')
    ?>
    <!-- ************** End Footer ******************** -->