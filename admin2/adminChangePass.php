<?php
include('./admininclude/header.php');
include('../dbConnection.php');

$adminEmail = $_SESSION['adminLogemail'];
if (isset($_REQUEST['adminPassUpdatebtn'])) {
    if (($_REQUEST['adminPass'] == "")) {
        $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill ALL Fields</div>';
    } else {
        $sql = "SELECT * FROM admin WHERE admin_email = '$adminEmail'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $adminPass = $_REQUEST['adminPass'];
            $sql = "UPDATE admin SET admin_pass = '$adminPass' WHERE admin_email = '$adminEmail'";
        }


        if ($conn->query($sql) == TRUE) {
            $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Updated Successfully </div>';
        } else {
            $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">unable to Update</div>';
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
                        <h4 class="card-title">Update Admin Password </h4>
                        <p class="category">Change Admin Password your According..</p>
                    </div>
                    <div class="card-content">
                        <form class="mt-5 mx-5" action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="inputEmail">Email</label>
                                <input type="text" class="form-control" id="inputEmail" value="<?php echo $adminEmail ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label for="inputnewpassword">New Password</label>
                                <input type="password" class="form-control" id="inputnewpassword" name="adminPass" placeholder="New Password">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-danger mr-4 mt-4" id="adminPassUpdatebtn" name="adminPassUpdatebtn">UPDATE</button>
                                <button type="reset" class="btn btn-secondary mt-4">Reset</a>
                            </div>
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
include('./admininclude/footer.php');
?>