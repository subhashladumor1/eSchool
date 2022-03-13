<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS</title>



    <script src="https://kit.fontawesome.com/918102febb.js"></script>



    <link rel="stylesheet" href="style.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Boootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="css/all.min.css">

    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="style.css">

</head>

<body>
    <?php
    include_once('./dbConnection.php');


    ?>
    <!-- navigation -->
    <nav>
        <!-- <img src="images/LMS.png" alt="" height="100" width="100" />
        <div class="navigation">
            <ul>
                <i id="menu-close" class="fa-solid fa-xmark"></i>
                <li><a href="#">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li><a class="active" href="course.html">Courses</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
            <img id="menu-btn" src="images/threelines.png" alt="">
        </div> -->
        <?php
        include('./includes/header.php');
        ?>
    </nav>

    <!-- Home -->

    <section id="about-Home">
        <h2>Enroll Our Popular Courses And Skill Up</h2>
    </section>


    <section id="course-inner">
        <?php
        if (isset($_GET['course_id'])) {
            $course_id = $_GET['course_id'];
            $_SESSION['course_id'] = $course_id;
            $sql = "SELECT * FROM course WHERE course_id = '$course_id'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
        }

        ?>
        <div class="overview">
            <img class="course-img" src="<?php echo str_replace('..', '.', $row['course_img']); ?>" alt="">
            <div class="course-head">
                <div class="c-name">
                    <h2><?php echo $row['course_name'] ?></h2>
                    <!-- <div class="star">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div> -->

                </div>
                <span><small><del>&#8377 <?php echo $row['course_original_price'] ?></del></small> &#8377 <?php echo $row['course_price'] ?></span>
            </div>
            <!-- <h3>Instructor</h3>
            <div class="tutor">
                <img src="images/c4.jpg" alt="">
                <div class="tutor-det">
                    <h5>John Doe</h5>
                    <p>Web Developer At Google</p>
                </div>
            </div> -->
            <hr>
            <h3>Course Description</h3>
            <p>Course Duration: <?php echo $row['course_duration'] ?> </p>
            <p><?php echo $row['course_desc'] ?></p>
            <!-- <hr>
            <h3>What you will learn</h3>
            <div class="learn">
                <p><i class="far fa-check-circle"></i>abcd</p>
                <p><i class="far fa-check-circle"></i>abcd</p>
                <p><i class="far fa-check-circle"></i>abcd</p>
                <p><i class="far fa-check-circle"></i>abcd</p>
                <p><i class="far fa-check-circle"></i>abcd</p>
                <p><i class="far fa-check-circle"></i>abcd</p>
            </div> -->
        </div>

        <div class="enroll">
            <h3>Course Lessons:</h3>
            <?php
            $sql = "SELECT * FROM lesson";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $num = 0;
                while ($row = $result->fetch_assoc()) {
                    if ($course_id == $row['course_id']) {
                        echo ' <p><i class="far fa-check-circle"></i> ' . $row['lesson_name'] . '</p>';
                    }
                }
            }
            ?>

            <div class="enroll-btn">

            <form action="checkout.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $row['course_price']
                                                            ?>">
                    <button type="submit" class="btn btn-primary text-white font-weight-bolder" name="buy">BUY NOW</button>
                </form>

            </div>
    </section>





    <!-- footer -->

    <footer>
        <div class="footer-col">
            <h3>Top Products</h3>
            <li>Manage Reputation</li>
            <li>Power Tools</li>
            <li>Managed Website</li>
            <li>Marketing Service</li>
        </div>
        <div class="footer-col">
            <h3>Quick Links</h3>
            <li>Jobs</li>
            <li>Brand Assets</li>
            <li>investor Relations</li>
            <li>Terms of Service</li>
        </div>
        <div class="footer-col">
            <h3>Features</h3>
            <li>Manage Reputation</li>
            <li>Power Tools</li>
            <li>Managed Website</li>
            <li>Marketing Service</li>
        </div>
        <div class="footer-col">
            <h3>Resources</h3>
            <li>Guides</li>
            <li>Research</li>
            <li>Experts</li>
            <li>Marketing Service</li>
        </div>

        <div class="footer-col">
            <h3>Newsletter</h3>
            <p>you can trust us. we only send promo offers</p>
            <div class="subscribe">
                <input type="text" placeholder="Your Email Address">
                <a href="#" class="yellow">SUBSCRIBE</a>
            </div>
        </div>


        <!-- copyright section -->

        <div class="copyright">
            <p>Copyright @2022 All rights reserved</p>
            <div class="pro-links">
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-linkedin"></i>
            </div>
        </div>
    </footer>

    <script>
        $('#menu-btn').click(function() {
            $('nav .navigation ul').addClass('active')
        });
        $('#menu-close').click(function() {
            $('nav .navigation ul').removeClass('active')
        });
    </script>

</body>

</html>