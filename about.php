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

    <!-- navigation -->
    <nav>
    <?php
        include('./includes/header.php');
        ?>
    </nav>
    
    <!-- Home -->

    <section id="about-Home">
       <h2>About LMS</h2>
    </section>

    <section id="about-container">
        <div class="about-img">
            <img src="image/blackboard.png"  alt="">
        </div>
        <div class="about-text">
            <h2>Welcome to LMS, Enhance your skills with best Online Course</h2>
            <p>you can start and finish one of these popular courses in under a day - for free! Check out the list below.. Take the course for free</p>
        <div class="about-fe">
             <img src="images/boy.png" alt="">
             <div class="fe-text">
                 <h5>400+ Courses</h5>
                 <p>you can start and finish one of these popular courses in under our site</p>
             </div>
        </div> 
        <div class="about-fe">
            <img src="images/fe2.png" alt="">
            <div class="fe-text">
                <h5>Lifetime Access</h5>
                <p>you can start and finish one of these popular courses in under our site</p>
            </div>
        </div>   
        </div>
    </section>
    
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


    <section id="trust">
        <h1>Trusted By</h1>
        <p>Replenish man have thing gathering lights yielding shall you</p>
        <div class="trust-img">
            <img src="image/trust (1).png" alt="">
            <img src="image/trust (2).png" alt="">
            <img src="image/trust (3).png" alt="">
            <img src="image/trust (4).png" alt="">
            <img src="image/trust (5).png" alt="">
            <img src="image/trust (6).png" alt="">
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
         $('#menu-btn').click(function(){
            $('nav .navigation ul').addClass('active')
        });
        $('#menu-close').click(function(){
            $('nav .navigation ul').removeClass('active')
        });
    </script>

</body>
</html>