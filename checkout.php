<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="GENERATOR" content="Evrsoft First Page">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <!-- Boootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="css/all.min.css">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="style.css">

    <title>Checkout</title>

</head>

<body>

    <section id="about-Home">
        <h2>Checkout</h2>
    </section>

    <?php
    include('./dbConnection.php');
    include('./includes/header.php');
    // session_start();
    if (!isset($_SESSION['stuLogEmail'])) { ?>
        <div class="popup-container">
                
        <div class="popup">
            <img src="image/cross.png">
            <h2>Account Required</h2>
            <p>Sorry you can not buy this course. beacuse you have not Register or Login.</p>
            <button type="button" onclick="gotocouse()">GO TO HOME</button>
        </div>
    </div>
    <script>
        function gotocouse(){
            location.href = 'index.php';
        }
    </script>
    <?php
    } else {
        header("Pragma: no-cache");
        header("Cache-Control: no-cache");
        header("Expires: 0");
        $stuEmail = $_SESSION['stuLogEmail'];
        $course_id =  $_SESSION['course_id'];
        $sql = "SELECT * FROM courseorder WHERE course_id = '$course_id' AND stu_email = '$stuEmail'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) { ?>
            <div class="popup-container">
                
                <div class="popup">
                    <img src="image/cross.png">
                    <h2>All ready buy this Course</h2>
                    <p>Sorry you can not buy this course. beacuse you have all ready buy this course. Checkout another course.</p>
                    <button type="button" onclick="gotocouse()">GO TO COURSES</button>
                </div>
            </div>
            <script>
                function gotocouse(){
                    location.href = 'courses.php';
                }
            </script>
        <?php
        } else {


        ?>


            <div class="container">
                <div class="row">
                    <div class="col-sm-6 offset-sm-3 jumbotron">
                        <h3 class="md-5">Welcome to E-Learning Payment Page</h3>
                        <form action="./razorpay/pay.php" method="post">
                            <!-- <div class="form-group row">
                            <label for="ORDER_ID" class="col-sm-4 col-form-label"> Order ID </label>
                            <div class="col-sm-8">
                                <input id="ORDER_ID" class="form-control" tabindex="1" maxLength="20" size="20" name="ORDER_ID" autocomplete="off" value="<?php echo  "ORDS" . rand(10000, 99999999) ?>" readonly>
                            </div>
                        </div> -->
                            <div class="form-group row">
                                <label for="CUST_ID" class="col-sm-4 col-form-label">Student Email </label>
                                <div class="col-sm-8">
                                    <input id="CUST_ID" class="form-control" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php if (isset($stuEmail)) {
                                                                                                                                                                echo $stuEmail;
                                                                                                                                                            } ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="TXN_AMOUNT" class="col-sm-4 col-form-label">Amount </label>
                                <div class="col-sm-8">
                                    <input id="TXN_AMOUNT" title="TXN_AMOUNT" class="form-control" tabindex="10" type="text" name="TXN_AMOUNT" value="<?php if (isset($_POST['id'])) {
                                                                                                                                                            echo $_POST['id'];
                                                                                                                                                        } ?>" readonly>
                                </div>
                            </div>
                            <!-- <div class="form-group row">
                            <label for="INDUSTRY_TYPE_ID" class="col-sm-4 col-form-label"> INDUSTRY TYPE ID </label>
                            <div class="col-sm-8">
                                <input type="hidden" class="form-control" id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="CHANNEL_ID" class="col-sm-4 col-form-label"> CHANNEL ID </label>
                            <div class="col-sm-8">
                                <input type="hidden" class="form-control" id="CHANNEL_ID" tabindex="2" maxlength="12" size="12" name="CHANNEL_ID" autocomplete="off" value="WEB" readonly>
                            </div>
                        </div> -->
                            <div class="text-center">
                                <input value="CheckOut" class="btn btn-primary" type="submit" onclick="">
                                <a href="./courses.php" class="btn btn-secondary"> Cancel </a>
                            </div>
                        </form>
                        <small class="form-text text-muted">Note: Complete Payment by Clicking Checkout Button</small>
                    </div>
                </div>
            </div>
    <?php
        }
    }
    ?>

    <!-- ************** Start Footer ******************** -->
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
    <?php
    include('./includes/footer.php')
    ?>
    <!-- ************** End Footer ******************** -->