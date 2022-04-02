<?php
if (!isset($_SESSION)) {
    session_start();
}
include('./stuInclude/header.php');
include_once('../dbConnection.php');

if (isset($_SESSION['is_login'])) {
    $stuEmail = $_SESSION['stuLogEmail'];
} else {
    echo "<script> location.href='../index.php'; </script>";
}

$sql = "SELECT * FROM student WHERE stu_email='$stuEmail'";
$result = $conn->query($sql);
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $stuId = $row["stu_id"];
}

if (isset($_REQUEST['submitFeedbackBtn'])) {
    if (($_REQUEST['f_content'] == "")) {
        //msg displayed if required field missing
        $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2"
         role="alert"> Fill All Fileds </div>';
    } else {
        $fcontent = $_REQUEST["f_content"];
        $sql = "INSERT INTO feedback (f_content, stu_id) VALUES
         ('$fcontent', '$stuId')";
        if ($conn->query($sql) == TRUE) {
            // below msg display on form submit access
            $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2"
             role="alert"> Submitted Successfully </div>';
        } else {
            //below msg display on form submit failed
            $passmsg = '<div class= "alert alert-danger col-sm-6 ml-5 mt-2"
             role="alert"> unable to Submit </div>';
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
                        <h4 class="card-title">Course Feedback </h4>
                        <p class="category">Give Rating and your reviews</p>
                    </div>
                    <div class="card-content">
                        <form class="mx-5" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="stuId">Student ID</label>
                                <input type="text" class="form-control" id="stuId" name="stuId" value=" <?php if (isset($stuId)) {
                                                                                                            echo $stuId;
                                                                                                        } ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="f_content">Write Feedback:</label>
                                <textarea class="form-control" id="f_content" name="f_content" row=2></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary" name="submitFeedbackBtn">Submit</button>
                            <?php if (isset($passmsg)) {
                                echo $passmsg;
                            } ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--close row div from header File -->

<?php
include('./stuInclude/footer.php');
?>