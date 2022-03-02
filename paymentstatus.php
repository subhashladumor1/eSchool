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

    <!-- start Payment Status Section -->

    <div class="container">
        <h2 class="text-center my-4">Payment Status</h2>
        <form method="post" action="">
            <div class="form-group row">
                <label class="offset-sm-3 col-form-label">Order ID:</label>
                <div>
                    <input type="text" class="form-control mx-3">
                </div>
                <div>
                    <input type="submit" class="btn btn-primary mx-4" value="View">
                </div>
            </div>
        </form>
    </div>
    <!-- End Payment Status Section -->


    <!-- Start Contact US -->
    <?php 
        include('./contact.php');
    ?>
    <!-- End Contact US -->


    <!-- ************** Start Footer ******************** -->
    <?php
    include('./includes/footer.php')
    ?>
    <!-- ************** End Footer ******************** -->
</body>
</html>