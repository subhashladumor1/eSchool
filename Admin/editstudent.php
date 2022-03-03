<?php
include('./admininclude/header.php');
include('../dbConnection.php');


// Update Section
if (isset($_REQUEST['requpdate'])) {
    //checking for empty fields
    if (($_REQUEST['stu_id'] == "") || ($_REQUEST['stu_name'] == "") || ($_REQUEST['stu_email']
            == "") || ($_REQUEST['stu_pass'] == "") || ($_REQUEST['stu_acc'] == "") ) {
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


<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Update student Details</h3>

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
            <a href="student.php" class="btn btn-secondary">Close</a>
        </div>
        <?php if (isset($msg)) {
            echo $msg;
        } ?>
    </form>
</div>

</div>
<!--div row close from header-->
</div>
<!--div container-fluid close from header-->

<?php
include('./admininclude/footer.php');
?>