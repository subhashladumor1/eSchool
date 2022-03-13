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
        <!-- <img src="images/LMS.png" alt="" height="100" width="100"/>
        <div class="navigation">
            <ul>
                <i id="menu-close" class="fa-solid fa-xmark"></i>
                <li><a href="#">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li><a class="active" href="course.html">Courses</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
            <img id="menu-btn" src="images/threelines.png"  alt="">
        </div> -->

        <?php
        include('./includes/header.php');
        ?>
    </nav>

    <!-- Home -->

    <section id="about-Home">
        <h2>Courses</h2>
    </section>


    <section id="course">
        <h1>Our popular Courses</h1>
        <p>Replenish man have thing gathering lights yielding shall you</p>
        <div class="card-deck mt-4">
            <div class="course-box">
                <?php 
                     $sql = "SELECT * FROM course";
                     $result = $conn->query($sql);
                     if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $course_id = $row['course_id'];
                            echo '<div class="courses">
                    <a href="coursedetails.php?course_id=' . $course_id . '" class="btn"  style="text-align: left;">
                        <img src="' . str_replace('..', '.', $row['course_img']) . '" alt="">
                        <div class="details">
                            
                            <h6>' . $row['course_name'] . '</h6>
                            <div class="star">
                            <p></p>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <span>(239)</span> 
                       
                            </div>        
                        </div>
                        <div class="cost">
                        <small>&#8377 ' . $row['course_price'] . ' </small>
                                            
                        </div>
                        <div class="card-footer">
                                    <p class="card-text d-inline">Price:<small><del>&#8377 ' . $row['course_original_price'] . ' </del></small>
                                        <span class="font-weight-bolder">&#8377 ' . $row['course_price'] . '<span>
                                    </p>
                                    <a class="btn btn-primary text-white font-weight-bolder float-right" href="coursedetails.php?course_id=' . $course_id . '"> Enroll</a>
                                </div>
                        </a>
                    </div>';
                        }
                    }
                ?>
                <!-- <div onclick="window.location.href='course-inner.html';" class="courses">
                    <img src="images/JS.jpg" alt="">
                    <div class="details">
                        <span>Updated 21/8/21</span>
                        <h6>Javascript Beginners course</h6>
                        <div class="star">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <span>(239)</span>
                        </div>
                    </div>
                    <div class="cost">
                        $49.99
                    </div>
                </div> -->
            </div>
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