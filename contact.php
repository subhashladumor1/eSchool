<!-- Start Contact Us -->
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
<nav>
    <?php
        include('./includes/header.php');
        ?>
    </nav>
<div class="container mt-4" id="Contact">

    <h2 class="text-center mb-4">Contact Us</h2>

    <div class="row">
        <div class="col-md-8">
            <form action="" method="post">
                <input type="text" class="form-control" name="name" placeholder="Name"><br>
                <input type="text" class="form-control" name="subject" placeholder="Subject"><br>
                <input type="text" class="form-control" name="email" placeholder="E-mail"><br>
                <textarea class="form-control" name="message" placeholder="How Can We Help You?"
                    style="height:150px;"></textarea><br>
                <input class="btn btn-primary" type="submit" value="Send" name="submit"><br><br>
            </form>
        </div>
        <!-- End Contact Us 1st Column -->


        <div class="col-md-4 stripe text-while text-center">
            <h4>ischool</h4>
            <p>LMS,
                Nr XYZ , Bharathana,
                Surat - 395010<br />
                Phone: +000000<br />
                www.LMS.com</p>
        </div>
    </div>
</div>
<!-- End Contact Us -->

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