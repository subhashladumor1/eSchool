<?php
include('./admininclude/header.php');
include('../dbConnection.php');


// Update Section
if (isset($_REQUEST['requpdate'])) {
    //checking for empty fields
    if (($_REQUEST['course_id'] == "") || ($_REQUEST['course_name'] == "") || ($_REQUEST['course_desc']
            == "") || ($_REQUEST['course_author'] == "") || ($_REQUEST['course_duration'] == "") || ($_REQUEST['course_price'] == "") ||
        ($_REQUEST['course_original_price'] == "")
    ) {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill ALL Fields</div>';
    } else {

        $cid = $_REQUEST['course_id'];
        $cname = $_REQUEST['course_name'];
        $cdesc = $_REQUEST['course_desc'];
        $cauthor = $_REQUEST['course_author'];
        $cduration = $_REQUEST['course_duration'];
        $cprice = $_REQUEST['course_price'];
        $coriginalprice = $_REQUEST['course_original_price'];
        $cimg = '../image/courseimg/' . $_FILES['course_img']['name'];

        $sql = "UPDATE course SET course_id ='$cid', course_name='$cname', course_desc='$cdesc', course_author ='$cauthor', course_duration='$cduration', course_price = ' $cprice', course_original_price = '$coriginalprice', course_img= '$cimg' WHERE course_id ='$cid' ";

        if ($conn->query($sql) == TRUE) {
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Updated Successfully </div>';
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">unable to Update</div>';
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
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="material-icons">settings</span>
                            </a>
                        </li> -->
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
                        <h4 class="card-title">Update Course Details</h4>
                        <p class="category">Update & Edit Course Details you According..</p>
                    </div>
                    <div class="card-content">
                        <?php
                        if (isset($_REQUEST['view'])) {
                            $sql = "SELECT * FROM course WHERE course_id = {$_REQUEST['id']}";
                            $result = $conn->query($sql);
                            $row = $result->fetch_assoc();
                        }

                        ?>

                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="course_id">Course Id</label>
                                <input type="text" class="form-control" id="course_id" name="course_id" value="<?php if (isset($row['course_id'])) {
                                                                                                                    echo $row['course_id'];
                                                                                                                } ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="course_name">Course Name</label>
                                <input type="text" class="form-control" id="course_name" name="course_name" value="<?php if (isset($row['course_name'])) {
                                                                                                                        echo $row['course_name'];
                                                                                                                    } ?>">
                            </div>
                            <div class="form-group">
                                <label for="course_desc">Course Description</label>
                                <textarea class="form-control" id="course_desc" name="course_desc" row=2><?php if (isset($row['course_desc'])) {
                                                                                                                echo $row['course_desc'];
                                                                                                            } ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="course_author">Author</label>
                                <input type="text" class="form-control" id="course_author" name="course_author" value="<?php if (isset($row['course_author'])) {
                                                                                                                            echo $row['course_author'];
                                                                                                                        } ?>">
                            </div>
                            <div class="form-group">
                                <label for="course_duration">Course Duration</label>
                                <input type="text" class="form-control" id="course_duration" name="course_duration" value="<?php if (isset($row['course_duration'])) {
                                                                                                                                echo $row['course_duration'];
                                                                                                                            } ?>">
                            </div>
                            <div class="form-group">
                                <label for="course_original_price">Course Original Price</label>
                                <input type="text" class="form-control" id="course_original_price" name="course_original_price" value="<?php if (isset($row['course_original_price'])) {
                                                                                                                                            echo $row['course_original_price'];
                                                                                                                                        } ?>">
                            </div>
                            <div class="form-group">
                                <label for="course_price">Course Selling Price</label>
                                <input type="text" class="form-control" id="course_price" name="course_price" value="<?php if (isset($row['course_price'])) {
                                                                                                                            echo $row['course_price'];
                                                                                                                        } ?>">
                            </div>
                            <div class="form-group">
                                <label for="course_img">Course Image</label>
                                <img src="<?php if (isset($row['course_img'])) {
                                                echo $row['course_img'];
                                            } ?>" alt="" class="img-thumbnail">
                                <input type="file" class="form-control-file" id="course_img" name="course_img">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-danger" id="requpdate" name="requpdate">UPDATE</button>
                                <a href="courses.php" class="btn btn-secondary">Close</a>
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