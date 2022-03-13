<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Status</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <!-- Boootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="css/all.min.css">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- Start Navigation -->
    <?php
    include('./dbConnection.php');
    include('./includes/header.php');
    ?>
    <!-- End Navigation -->

    <!-- Start Payment Banner Section-->
    <div class="container-fluid bg-dark">
        <div class="row">
            <img src="./image/cbanner.jpg" alt="course" style="height: 500px; width: 100%; object-fit:cover; box-shadow:10px;" />
        </div>
    </div>
    <!-- End Payment Banner Section-->


    <!-- **************** Start Main Content *********************-->

    <div class="container mt-5">
        <?php 
            if(isset($_GET['course_id'])){
                $course_id = $_GET['course_id'];
                $_SESSION['course_id'] = $course_id;
                $sql = "SELECT * FROM course WHERE course_id = '$course_id'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
            }
        
        ?>
        <div class="row">
            <div class="col-md-4">
                <img src="<?php  echo str_replace('..', '.', $row['course_img']); ?>" class="card-img-top" alt="Guitar"/>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">
                        Course Name: <?php echo $row['course_name']?>
                    </h5>
                    <p class="card-text">Description: <?php echo $row['course_desc']?></p>
                    <p class="card-text">Duration: <?php echo $row['course_duration']?></p>
                    <form action="checkout.php" method="post">
                        <p class="card-text d-inline">Price: <small><del>&#8377 <?php echo $row['course_original_price']?></del></small><span class="font-weight-bolder">&#8377 <?php echo $row['course_price']?><span></p>
                        <input type="hidden" name="id" value="<?php echo $row['course_price']
                        ?>">
                        <button type="submit" class="btn btn-primary text-white font-weight-bolder float-right" name="buy">Buy Now</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
            <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Lesson No.</th>
                            <th scope="col">Lesson Name</th>
                        </tr>
                </thead>
                <tbody>
                <?php 
                    $sql = "SELECT * FROM lesson";
                    $result = $conn->query($sql);
                    if($result->num_rows>0){
                        $num = 0;
                        while( $row = $result->fetch_assoc()){
                            if($course_id == $row['course_id']){
                                $num++;
                                echo '<tr>
                                    <th scope="row">'.$num.'</th>
                                    <td> '.$row['lesson_name'].' </td>
                                </tr>';
                            }
                            
                        }
                    }
                ?>   
                </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- **************** End Main Content *********************-->

    


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
</body>
</html>