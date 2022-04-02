<?php
include('./admininclude/header.php');
include('../dbConnection.php');


if (isset($_REQUEST['newstuSubmitBtn'])) {
    //checking for empty fields
    if (($_REQUEST['stu_name'] == "") || ($_REQUEST['stu_email']
        == "") || ($_REQUEST['stu_pass'] == "") || ($_REQUEST['stu_acc'] == "")) {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill ALL Fields</div>';
    } else {

        $stu_name = $_REQUEST['stu_name'];
        $stu_email = $_REQUEST['stu_email'];
        $stu_pass = $_REQUEST['stu_pass'];
        $stu_acc = $_REQUEST['stu_acc'];

        $sql = "INSERT INTO student (stu_name, stu_email, 
                stu_pass, stu_acc) VALUES ('$stu_name','$stu_email', '$stu_pass', '$stu_acc')";


        if ($conn->query($sql) == TRUE) {
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Student Added Successfully</div>';
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">unable to Add student</div>';
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
                        <h4 class="card-title">Add New Student</h4>
                        <p class="category">Add New Student Details..</p>
                    </div>
                    <div class="card-content">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="stu_name">Name</label>
                                <input type="text" class="form-control" id="stu_name" name="stu_name">
                            </div>
                            <div class="form-group">
                                <label for="stu_email">Email</label>
                                <input type="text" class="form-control" id="stu_email" name="stu_email" row=2>
                            </div>
                            <div class="form-group">
                                <label for="stu_pass">Password</label>
                                <input type="password" class="form-control" id="stu_pass" name="stu_pass">
                            </div>
                            <div class="form-group">
                                <label for="stu_acc">Occupation</label>
                                <input type="text" class="form-control" id="stu_acc" name="stu_acc">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-danger" id="newstuSubmitBtn" name="newstuSubmitBtn">Submit</button>
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