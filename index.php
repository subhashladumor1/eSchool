<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS</title>



    <script src="https://kit.fontawesome.com/918102febb.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <!-- Boootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="css/all.min.css">

    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="style.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

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
                <li><a class="active" href="#">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li><a href="course.html">Courses</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
            <img id="menu-btn" src="images/threelines.png"  alt="">
        </div> -->
        <?php
        include('./includes/header.php');
        ?>
    </nav>

    <!-- Home -->


    <!-- <div class="hero-section">

        <div class="vid-parent">
            <video autoplay loop muted plays-inline class="back-video">
                <source src="videos/vbg.mp4">
            </video>

        </div>
        <div class="vid-content">
            <h2>Welcome to BCA eLMS</h2>
            <small class="my-content">Lorem ipsum dolor sit amet. Hic laboriosam veniam rem quisquam esse eum consequuntur</small><br>
            <div class="btn">
                

                <a class="yellow" href="courses.php">visit Courses</a>
            </div>
        </div>


    </div> -->

    <div id="particle-js">
        <div class="header">
            <h1>
                <span class="site-title">
                    LEARN DAILY eLMS    
                </span>
                <span class="site-description">
                    Programming * Web Developer * Graphics Design
                </span>
            </h1>
            <div class="header-links">

            <?php
                if (!isset($_SESSION['is_login'])) {
                    echo '<a href="#" class="link" data-toggle="modal" data-target="#stuRegModalCenter">Get
                        Started</a>';
                } else {
                    echo '<a href="Student/studentProfile.php" class="link"> My Profile</a>';
                }
                ?>
                <a href="courses.php" class="link">Explore</a>
            </div>
        </div>
    </div>




    <!-- features -->

    <section id="features">
        <h1>Awesome Features</h1>
        <p>Replenish man have thing gathering lights yielding shall you</p>
        <div class="fea-base">
            <div class="fea-box">
                <i class="fa-solid fa-graduation-cap"></i>
                <h3>Scholarship Facility</h3>
                <p>one make creepeth,man bearing theira gsdgsdgsdgsg</p>
            </div>
            <div class="fea-box">
                <i class="fa-solid fa-file"></i>
                <h3>Online Course</h3>
                <p>one make creepeth,man bearing theira gsdgsdgsdgsg</p>
            </div>
            <div class="fea-box">
                <i class="fa-solid fa-award"></i>
                <h3>Global Certification</h3>
                <p>one make creepeth,man bearing theira gsdgsdgsdgsg</p>
            </div>
        </div>
    </section>

    <!-- Courses -->
    <section id="course">
        <h1>Our popular Courses</h1>
        <p>Replenish man have thing gathering lights yielding shall you</p>
        <div class="card-deck mt-4">

            <div class="course-box">

                <?php
                $sql = "SELECT * FROM course LIMIT 6";
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
            </div>




    </section>

    <div class="text-center m-2">
        <a class="btn btn-primary text-white font-weight-bolder" href="#"> View All Courses</a>
    </div>

    <!-- registration -->

    <!-- <section id="registration">
        <div class="reminder">
            <p>Get 100 Online Courses for free</p>
            <h1>Register To Get It</h1>
            <div class="time">
                <div class="date">
                    18 <br> Days
                </div>
                <div class="date">
                    23 <br> Hours
                </div>
                <div class="date">
                    06 <br> Minutes
                </div>
                <div class="date">
                    58 <br> Seconds
                </div>
            </div>
        </div>

        <div class="form">
            <h3>Create Free Account Now!</h3>
            <input type="text" placeholder="Name" name="" id="">
            <input type="text" placeholder="Email Address" name="" id="">
            <input type="text" placeholder="Phone Number" name="" id="">
            <div class="btn">
                <a class="yellow" href="#">Submit Form</a>
            </div>
        </div>
    </section> -->



    <!-- profiles -->

    <section id="experts">
        <h1>Community Experts</h1>
        <p>Replenish man have thing gathering lights yielding shall you</p>
        <div class="expert-box">

            <div class="profile">
                <img src="image/bharat.png" width="200" height="200" alt="">
                <h6>Bharat Jhawar</h6>
                <p>BCA student</p>
                <div class="pro-links">
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-linkedin"></i>
                </div>
            </div>
            <div class="profile">
                <img src="image/subhash.png" width="200" height="200" alt="">
                <h6>Subhash Ladumor</h6>
                <p>BCA student</p>
                <div class="pro-links">
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-linkedin"></i>
                </div>
            </div>
            <div class="profile">
                <img src="image/ninad.png" width="200" height="200" alt="">
                <h6>Ninad Virani</h6>
                <p>BCA student</p>
                <div class="pro-links">
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-linkedin"></i>
                </div>
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





    </footer>

    <!-- ************** Start Footer ******************** -->
    <?php
    include('./includes/footer.php')
    ?>
    <!-- ************** End Footer ******************** -->


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







<!-- <section id="Home">
    <h2>Enhance Your Future With LMS</h2>
    <p>Lorem ipsum dolor sit amet. Hic laboriosam veniam rem quisquam esse eum consequuntur nobis qui dolor placeat vel culpa rerum. Ut voluptas quam non quisquam molestiae qui commodi sunt eum quasi quia aut doloribus voluptate.</p>
    <div class="btn">
        <a class="blue" href="#">Learn more</a>
        <a class="yellow" href="#">visit Courses</a>
    </div>
 </section> -->