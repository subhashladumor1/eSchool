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
</head>

<body>
    <!-- Start Navigation -->
    <?php
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
        <div class="row">
            <div class="col-md-4">
                <img src="./image/index.jpg" class="card-img-top" alt="Guitar"/>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">
                        Course Name: Learn Guitar
                    </h5>
                    <p class="card-text">Description: Lorem, ipsum dolor sit amet consectetur adipisicing elit. Assumenda sunt esse velit, impedit eum delectus sapiente, at quis porro repellendus odit eius sed ex hic ducimus quo error quos eveniet.</p>
                    <p class="card-text">Duration:10 Days</p>
                    <form action="" method="post">
                        <p class="card-text d-inline">Price: <small><del>&#8377 2000</del></small><span class="font-weight-bolder">&#8377 200<span></p>
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
                    <tr>
                        <th scope="row">1</th>
                        <td> Introduction </td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- **************** End Main Content *********************-->

    


    <!-- ************** Start Footer ******************** -->
    <?php
    include('./includes/footer.php')
    ?>
    <!-- ************** End Footer ******************** -->
</body>
</html>