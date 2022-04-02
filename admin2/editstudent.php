<?php
include('./admininclude/header.php');
include('../dbConnection.php');


// Update Section
if (isset($_REQUEST['requpdate'])) {
    //checking for empty fields
    if (($_REQUEST['stu_id'] == "") || ($_REQUEST['stu_name'] == "") || ($_REQUEST['stu_email']
        == "") || ($_REQUEST['stu_pass'] == "") || ($_REQUEST['stu_acc'] == "")) {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill ALL Fields</div>';
    } else {

        $sid = $_REQUEST['stu_id'];
        $sname = $_REQUEST['stu_name'];
        $semail = $_REQUEST['stu_email'];
        $spass = $_REQUEST['stu_pass'];
        $sacc = $_REQUEST['stu_acc'];


        $sql = "UPDATE student SET stu_id ='$sid', stu_name='$sname', stu_email='$semail', stu_pass ='$spass', stu_acc='$sacc' WHERE stu_id ='$sid' ";

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
                        <h4 class="card-title">Update Student Details</h4>
                        <p class="category">Update & Edit Student Details you According..</p>
                    </div>
                    <div class="card-content">
                        <?php
                        if (isset($_REQUEST['view'])) {
                            $sql = "SELECT * FROM student WHERE stu_id = {$_REQUEST['id']}";
                            $result = $conn->query($sql);
                            $row = $result->fetch_assoc();
                        }

                        ?>

                        <form action="" method="POST" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="stu_id">Student ID</label>
                                <input type="text" class="form-control" id="stu_id" name="stu_id" value="<?php if (isset($row['stu_id'])) {
                                                                                                                echo $row['stu_id'];
                                                                                                            } ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label for="stu_name">Student Name</label>
                                <input type="text" class="form-control" id="stu_name" name="stu_name" value="<?php if (isset($row['stu_name'])) {
                                                                                                                    echo $row['stu_name'];
                                                                                                                } ?>">
                            </div>
                            <div class="form-group">
                                <label for="stu_email">Student Email</label>
                                <input type="text" class="form-control" id="stu_email" name="stu_email" row=2 value="<?php if (isset($row['stu_email'])) {
                                                                                                                            echo $row['stu_email'];
                                                                                                                        } ?>">
                            </div>
                            <div class="form-group">
                                <label for="stu_pass">Student Password</label>
                                <input type="password" class="form-control" id="stu_pass" name="stu_pass" value="<?php if (isset($row['stu_pass'])) {
                                                                                                                        echo $row['stu_pass'];
                                                                                                                    } ?>">
                            </div>
                            <div class="form-group">
                                <label for="stu_acc">Student Occupation</label>
                                <input type="text" class="form-control" id="stu_acc" name="stu_acc" value="<?php if (isset($row['stu_acc'])) {
                                                                                                                echo $row['stu_acc'];
                                                                                                            } ?>">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-danger" id="requpdate" name="requpdate">UPDATE</button>
                                <a href="students.php" class="btn btn-secondary">Close</a>
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


<?php
include('./admininclude/footer.php');
?>