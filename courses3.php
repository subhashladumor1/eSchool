<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <!-- Boootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="css/all.min.css">

    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Start Navigation -->
    <?php
    include('./dbConnection.php');
    include('./includes/header.php');
    ?>
    <!-- End Navigation -->

    <!-- Start Course Banner Section-->
    <div class="container-fluid bg-dark">
        <div class="row">
            <img src="./image/cbanner.jpg" alt="course" style="height: 500px; width: 100%; object-fit:cover; box-shadow:10px;" />
        </div>
    </div>
    <!-- End Course Banner Section-->

    <!-- Start Most Popular Course -->
    <div class="container mt-5">

        <h1 class="text-center">All Course</h1>
        <!-- Start Most Popular Course 1st card deck  -->
        <div class="row mt-4">
            <?php

            $sql = "SELECT * FROM course ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $course_id = $row['course_id'];
                    echo '<div class="col-sm-4 mb-4"> 
                    <a href="coursedetails.php?course_id=' . $course_id . '" class="btn" style="text-align: left; padding:0px; margin:0px">
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
            </a>
            </div>';
                }
            }

            ?>



        </div>

    </div>

    </div>
    <!-- End Most Popular Course -->

    <!-- ************** Start Footer ******************** -->
    <?php
    include('./includes/footer.php')
    ?>
    <!-- ************** End Footer ******************** -->
</body>

</html>