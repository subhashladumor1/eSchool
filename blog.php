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
                <li><a class="active" href="blog.html">Blog</a></li>
                <li><a href="course.html">Courses</a></li>
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
        <h2>Blog</h2>
    </section>

    <section id="blog-container">
        <div class="blogs">

            <?php
            $page = 1;
            $post_per_page = 5;
            $result = ($page - 1) * $post_per_page;
            if (isset($_GET['cat_id'])) {
                $cat_id = $_GET['cat_id'];
                $sql = "SELECT * FROM posts WHERE category_id = $cat_id ORDER BY id DESC LIMIT $result,$post_per_page";
            } else {


                $sql = "SELECT * FROM posts ORDER BY id DESC LIMIT $result,$post_per_page";
            }
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
            ?>
                        <div class="post">

                            <img src="<?= str_replace('..', '.', getPostThumb($conn, $row['id'])) ?>" alt="">
                            <h3><?= $row['title'] ?></h3>
                            <p class="blog-post-line"><?= $row['content'] ?></p>

                            <a href="post.php?id=<?= $row['id'] ?>">Read More</a>
                        </div>
            <?php
                    
                }
            }
            function getPostThumb($con, $id)
            {
                $query = "SELECT *  FROM posts WHERE id=$id";
                $run = $con->query($query);
                $data = $run->fetch_assoc();
                return $data['post_img'];
            }

            ?>

        </div>
        <div class="cate">
            <h2>Categories</h2>
            <hr>
            <?php

            $sql = "SELECT * FROM category";
            // $query = "SELECT *  FROM posts";
            $result = $conn->query($sql);
            // $result_post = $conn->query($query);

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {



            ?>

                    <a href="blog.php?cat_id=<?= $row['id'] ?>"><?= $row['name'] ?> </a>
                    <hr>

            <?php }
            }


            ?>

        </div>
        <?php

        $sql = "SELECT * FROM posts"; // find all data & normal search
        $result = $conn->query($sql);
        $total_posts = mysqli_num_rows($result); //return total records
        $total_pages = ceil($total_posts / $post_per_page);


        ?>



    </section>


    <!--Pagination  -->

    <!-- <ul class="pagination justify-content-center">
        <?php //for next and Previous button
        if ($page > 1) {
            $switch = "";
        } else {
            $switch = "disabled";
        }
        if ($page < $total_pages) {
            $nswitch = "";
        } else {
            $nswitch = "disabled"; //nswitch = next switch button
        }
        ?>
        <li class="page-item <?= $switch ?>">
            <a class="page-link" href="?<?php if (isset($_GET['cat_id'])) {
                                            echo "search=$keyword&";
                                        } ?>page=<?= $page - 1 ?>" tabindex="-1" aria-disabled="true">Previous</a>
        </li>
        <?php
        for ($opage = 1; $opage <= $total_pages; $opage++) {
        ?>
            <li class="page-item"><a class="page-link" href="?<?php if (isset($_GET['search'])) {
                                                                    echo "search=$keyword&";
                                                                } ?>page=<?= $opage ?>"><?= $opage ?></a></li>

        <?php
        }
        ?>
        <li class="page-item <?= $nswitch ?>">
            <a class="page-link" href="?<?php if (isset($_GET['search'])) {
                                            echo "search=$keyword&";
                                        } ?>page=<?= $page + 1 ?>">Next</a>
        </li>
    </ul> -->







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