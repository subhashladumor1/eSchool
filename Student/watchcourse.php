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
    <title>Responsive Video Playlist Tutorial</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="vidplay/css/style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!----css3---->
    <link rel="stylesheet" href="css/custom.css">
    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">




    <!--google material icon-->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">

    <!-- custom css -->
    <link rel="stylesheet" href="../css/stustyle.css">

</head>

<body>

    <div class="container">

        <?php
        if (isset($_GET['course_id'])) {
            $course_id  = $_GET['course_id'];
            $sql = "SELECT * FROM lesson WHERE course_id = '$course_id'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $no = 1;
                while ($row = $result->fetch_assoc()) {
                    if ($no == 1) {
                        echo '<div class="main-video-container">
                            <video src="' . $row['lesson_link'] . '" loop controls class="main-video"></video>
                            <h3 class="main-vid-title">' . $row['lesson_name'] . '</h3>
                         </div>
                         <div class="video-list-container">
                            <div class="list active"><video src="' . $row['lesson_link'] . '" class="list-video"></video>  <h3 class="list-title">' . $row['lesson_name'] . '</h3></div>';
                        $no++;
                    } else {
                        echo '<div class="list"><video src="' . $row['lesson_link'] . '" class="list-video"></video>  <h3 class="list-title">' . $row['lesson_name'] . '</h3></div>';
                    }
                }
            }
        }
        ?>
    </div>

    </div>













    <!-- custom js file link  -->
    <script src="vidplay/js/script.js"></script>

</body>

</html>