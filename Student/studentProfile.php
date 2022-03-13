<?php
// if(!isset($_SESSION)){
//     session_start();
// }


include('./stuInclude/header.php');


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
    $stuName = $row["stu_name"];
    $stuOcc = $row["stu_acc"];
    $stuImg = $row["stu_img"];
}

if (isset($_REQUEST['updateStuNameBtn'])) {
    if (($_REQUEST['stuName'] == "")) {
        //msg displayed if required field missing
        $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2"
        role="alert"> Fill All fields </div>';
    } else {
        $stuName = $_REQUEST["stuName"];
        $stuOcc = $_REQUEST["stuOcc"];
        $stu_image = $_FILES['stuImg']['name'];
        $stu_image_temp = $_FILES['stuImg']['tmp_name'];
        $img_folder = '../image/stu/' . $stu_image;
        move_uploaded_file($stu_image_temp, $img_folder);
        $sql = "UPDATE student SET stu_name = '$stuName', stu_acc = '$stuOcc', stu_img = '$img_folder' WHERE stu_email = '$stuEmail'";

        if ($conn->query($sql) == TRUE) {
            $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Updated Successfully </div>';
        } else {
            $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">unable to Update</div>';
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
                        <h4 class="card-title">Profile Details</h4>
                        <p class="category">Edit or Update Profile Details</p>
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
                                <label for="stuEmail">Email</label>
                                <input type="email" class="form-control" id="stuEmail" value="  <?php echo $stuEmail ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="stuName">Name</label>
                                <input type="text" class="form-control" id="stuName" name="stuName" value=" <?php if (isset($stuName)) {
                                                                                                                echo
                                                                                                                $stuName;
                                                                                                            } ?>">
                            </div>
                            <div class="form-group">
                                <!--student doesnt mean school student it also means learner  -->
                                <label for="stuOcc">Occupation</label>
                                <input type="text" class="form-control" id="stuOcc" name="stuOcc" value="<?php if (isset($stuOcc)) {
                                                                                                                echo $stuOcc;
                                                                                                            } ?>">
                            </div>
                            <div class="form-group">
                                <label for="stuImg">Upload Image</label>
                                <input type="file" class="form-control-file" id="stuImg" name="stuImg">
                            </div>
                            <button type="submit" class="btn btn-primary" name="updateStuNameBtn">Update</button>
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


<?php
include('./stuInclude/footer.php');
?>