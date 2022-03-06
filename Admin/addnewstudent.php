<?php
            include('./admininclude/header.php');
            include('../dbConnection.php');


            if(isset($_REQUEST['newstuSubmitBtn'])){
                //checking for empty fields
               if(($_REQUEST['stu_name'] == "") || ($_REQUEST['stu_email']
               == "") || ($_REQUEST['stu_pass'] == "") || ($_REQUEST
               ['stu_acc'] == "")){
                $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill ALL Fields</div>';
               } else {
                
                $stu_name = $_REQUEST['stu_name'];
                $stu_email = $_REQUEST['stu_email'];
                $stu_pass = $_REQUEST['stu_pass'];
                $stu_acc = $_REQUEST['stu_acc'];
                
                $sql = "INSERT INTO student (stu_name, stu_email, 
                stu_pass, stu_acc) VALUES ('$stu_name','$stu_email', '$stu_pass', '$stu_acc')";
                 

                if($conn->query($sql) == TRUE){
                    $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Student Added Successfully</div>';
                }else {
                    $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">unable to Add student</div>';
                }
            
               }
                           
            }


?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Add New Student</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="stu_name">Name</label>
            <input type="text" class="form-control" id="stu_name"
            name="stu_name">
        </div>
        <div class="form-group">
            <label for="stu_email">Email</label>
            <input type="text" class="form-control"  id="stu_email"
            name="stu_email" row=2>
        </div>
        <div class="form-group">
            <label for="stu_pass">Password</label>
            <input type="password" class="form-control" id="stu_pass"
            name="stu_pass">
        </div>
        <div class="form-group">
            <label for="stu_acc">Occupation</label>
            <input type="text" class="form-control" id="stu_acc"
            name="stu_acc">
        </div>   
        <div class="text-center">
            <button type="submit" class="btn btn-danger"
            id="newstuSubmitBtn" name="newstuSubmitBtn">Submit</button>
            <a href="student.php" class="btn btn-secondary">Close</a>
        </div>
        <?php if(isset($msg)) {echo $msg;} ?>
      </form>
    </div>
</div> <!--div row close from header-->
</div>  <!--div container-fluid close from header-->  

<?php
            include('./admininclude/footer.php');
 ?>