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

<div class="col-sm-9 mt-5">
    <div class="row">
        <div class="col-sm-6">
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


<?php
include('./admininclude/footer.php');
?>