<?php
if (!isset($_SESSION)) {
    session_start();
}
include('../dbConnection.php');

if (isset($_SESSION['is_login'])) {
    $stuLogEmail = $_SESSION['stuLogEmail'];
} else {
    echo "<script>location.href='../index.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <!-- Boootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="../css/all.min.css">

    <link rel="stylesheet" href="../css/style.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/stustyle.css">
    <title>Watch Course</title>
</head>

<body>
    <div class="container-fluid bg-success p-2">
        <h3>
            Welcome to E-learing
        </h3>
        <a href="./myCourse.php" class="btn btn-danger">My Courses</a>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 border-right">
                <h4 class="text-center">Lesson</h4>
                <ul id="playlist" class="nav flex-column">
                    <?php
                    if (isset($_GET['course_id'])) {
                        $course_id  = $_GET['course_id'];
                        $sql = "SELECT * FROM lesson WHERE course_id = '$course_id'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<li class="nav-item border-bottom py-2" movieurl='.$row['lesson_link'].' style="cursor: pointer;">'. $row['lesson_name'] . '</li>';
                            }
                        }
                    }
                    ?>
                </ul>
            </div>  
        <div class="col-sm-8">
            <video id="videoarea" src="" class="mt-5 w-75 ml-2" controls></video>
        </div>
    </div>
    </div>
    <!-- *********** End Admin Login Form Modal *************** -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

    <!-- jQUERY AND Boostrap JavaScript -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/testislider.js"></script>

    <!-- Fontawesome JavaScript -->
    <script src="../js/all.min.js"></script>
    <script src="../js/custom.js"></script>
</body>

</html>
</body>

</html>