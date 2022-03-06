<?php
include('./admininclude/header.php');
include('../dbConnection.php');


if (isset($_REQUEST['courseSubmitBtn'])) {
    //checking for empty fields
    if (($_REQUEST['course_name'] == "") || ($_REQUEST['course_desc']
            == "") || ($_REQUEST['course_author'] == "") || ($_REQUEST['course_duration'] == "") || ($_REQUEST['course_price'] == "") ||
        ($_REQUEST['course_original_price'] == "")
    ) {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill ALL Fields</div>';
    } else {

        $course_name = $_REQUEST['course_name'];
        $course_desc = $_REQUEST['course_desc'];
        $course_author = $_REQUEST['course_author'];
        $course_duration = $_REQUEST['course_duration'];
        $course_price = $_REQUEST['course_price'];
        $course_original_price = $_REQUEST['course_original_price'];
        $course_image = $_FILES['course_img']['name'];
        $course_image_temp =  $_FILES['course_img']['tmp_name'];
        $img_folder = '../image/courseimg/' . $course_image;
        move_uploaded_file($course_image_temp, $img_folder);

        $sql = "INSERT INTO course (course_name, course_desc, 
                course_author, course_img, course_duration, course_price, course_original_price) VALUES ('$course_name',
                 '$course_desc', '$course_author', '$img_folder', '$course_duration', '$course_price', '$course_original_price')";


        if ($conn->query($sql) == TRUE) {
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Course Added Successfully</div>';
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">unable to Add Course</div>';
        }
    }
}


?>

<div id="content">
    <div class="top-navbar">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="d-xl-block d-lg-block d-md-mone d-none">
                    <span class="material-icons">arrow_back_ios</span>
                </button>

                <a class="navbar-brand" href="#"> Dashboard </a>

                <button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="material-icons">more_vert</span>
                </button>

                <div class="collapse navbar-collapse d-lg-block d-xl-block d-sm-none d-md-none d-none" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="dropdown nav-item active">
                            <!-- <a href="#" class="nav-link" data-toggle="dropdown">
                                   <span class="material-icons">notifications</span>
								   <span class="notification">4</span>
                               </a> -->
                            <!-- <ul class="dropdown-menu">
                                    <li>
                                        <a href="#">You have 5 new messages</a>
                                    </li>
                                    <li>
                                        <a href="#">You're now friend with Mike</a>
                                    </li>
                                    <li>
                                        <a href="#">Wish Mary on her birthday!</a>
                                    </li>
                                    <li>
                                        <a href="#">5 warnings in Server Console</a>
                                    </li>
                                  
                                </ul> -->
                        </li>
                        <!-- <li class="nav-item">
                                <a class="nav-link" href="#">
								<span class="material-icons">apps</span>
								</a>
                            </li> -->
                        <!-- <li class="nav-item">
                                <a class="nav-link" href="#">
								<span class="material-icons">person</span>
								</a>
                            </li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="material-icons">settings</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="main-content">
        <div class="row">
            <div class="col-lg-7 col-md-10">
                <div class="card" style="min-height: 485px">
                    <div class="card-header card-header-text">
                        <h4 class="card-title">Add New Course</h4>
                        <p class="category">Add New Amazing Courses</p>
                    </div>
                    <div class="card-content">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="course_name">Course Name</label>
                                <input type="text" class="form-control" id="course_name" name="course_name">
                            </div>
                            <div class="form-group">
                                <label for="course_desc">Course Description</label>
                                <textarea class="form-control" id="course_desc" name="course_desc" row=2></textarea>
                            </div>
                            <div class="form-group">
                                <label for="course_author">Author</label>
                                <input type="text" class="form-control" id="course_author" name="course_author">
                            </div>
                            <div class="form-group">
                                <label for="course_duration">Course Duration</label>
                                <input type="text" class="form-control" id="course_duration" name="course_duration">
                            </div>
                            <div class="form-group">
                                <label for="course_original_price">Course Original Price</label>
                                <input type="text" class="form-control" id="course_original_price" name="course_original_price">
                            </div>
                            <div class="form-group">
                                <label for="course_price">Course Selling Price</label>
                                <input type="text" class="form-control" id="course_price" name="course_price">
                            </div>
                            <div class="form-group">
                                <label for="course_img">Course Image</label>
                                <input type="file" class="form-control-file" id="course_img" name="course_img">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-danger" id="courseSubmitBtn" name="courseSubmitBtn">Submit</button>
                                <a href="courses2.php" class="btn btn-secondary">Close</a>
                            </div>
                            <?php if (isset($msg)) {
                                echo $msg;
                            } ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<!--div row close from header-->
</div>
<!--div container-fluid close from header-->

<?php
include('./admininclude/footer.php');
?>