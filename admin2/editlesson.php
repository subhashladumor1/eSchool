<?php
include('./admininclude/header.php');
include('../dbConnection.php');


// Update Section
if (isset($_REQUEST['requpdate'])) {
    //checking for empty fields
    if (($_REQUEST['lesson_id'] == "") || ($_REQUEST['lesson_name'] == "") || ($_REQUEST['lesson_desc']
        == "") || ($_REQUEST['course_id'] == "") || ($_REQUEST['course_name'] == "")) {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill ALL Fields</div>';
    } else {

        $lid = $_REQUEST['lesson_id'];
        $lname = $_REQUEST['lesson_name'];
        $ldesc = $_REQUEST['lesson_desc'];
        $cid = $_REQUEST['course_id'];
        $cname = $_REQUEST['course_name'];
        $llink = '../lessonvid/' . $_FILES['lesson_link']['name'];

        $sql = "UPDATE lesson SET lesson_id ='$lid', lesson_name='$lname', lesson_desc ='$ldesc', course_id ='$cid', course_name='$cname', lesson_link = '$llink' WHERE lesson_id ='$lid' ";

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
                        <h4 class="card-title">Update Lesson Details</h4>
                        <p class="category">Update & Edit Lesson Details your According..</p>
                    </div>
                    <div class="card-content">
                        <?php
                        if (isset($_REQUEST['view'])) {
                            $sql = "SELECT * FROM lesson WHERE lesson_id = {$_REQUEST['id']}";
                            $result = $conn->query($sql);
                            $row = $result->fetch_assoc();
                        }

                        ?>

                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="lesson_id">Lesson Id</label>
                                <input type="text" class="form-control" id="lesson_id" name="lesson_id" value="<?php if (isset($row['lesson_id'])) {
                                                                                                                    echo $row['lesson_id'];
                                                                                                                } ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="lesson_name">Lesson Name</label>
                                <input type="text" class="form-control" id="lesson_name" name="lesson_name" value="<?php if (isset($row['lesson_name'])) {
                                                                                                                        echo $row['lesson_name'];
                                                                                                                    } ?>">
                            </div>
                            <div class="form-group">
                                <label for="lesson_desc">Lesson Description</label>
                                <textarea class="form-control" id="lesson_desc" name="lesson_desc" row=2><?php if (isset($row['lesson_desc'])) {
                                                                                                                echo $row['lesson_desc'];
                                                                                                            } ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="course_id">Course ID</label>
                                <input type="text" class="form-control" id="course_id" name="course_id" value="<?php if (isset($row['course_id'])) {
                                                                                                                    echo $row['course_id'];
                                                                                                                } ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="course_name">Course name</label>
                                <input type="text" class="form-control" id="course_name" name="course_name" value="<?php if (isset($row['course_name'])) {
                                                                                                                        echo $row['course_name'];
                                                                                                                    } ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="lesson_link">Lesson Link</label>
                                <div class="embed-responsive-item embed-responsive-16by9">
                                    <iframe src="<?php if (isset($row['lesson_link'])) {
                                                        echo $row['lesson_link'];
                                                    } ?>" allowfullscreen>
                                    </iframe>
                                </div>
                                <input type="file" class="form-control-file" id="lesson_link" name="lesson_link">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-danger" id="requpdate" name="requpdate">UPDATE</button>
                                <a href="lessons.php" class="btn btn-secondary">Close</a>
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

<!--div row close from header-->
</div>
<!--div container-fluid close from header-->

<?php
include('./admininclude/footer.php');
?>