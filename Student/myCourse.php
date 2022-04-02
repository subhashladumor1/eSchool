<?php
if (!isset($_SESSION)) {
    session_start();
}
include('./stuInclude/header.php');
include_once('../dbConnection.php');

if (isset($_SESSION['is_login'])) {
    $stuLogEmail = $_SESSION['stuLogEmail'];
} else {
    echo "<script>location.href='../index.php';</script>";
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
            <div class="col-lg-12 col-md-10">
                <div class="card" style="min-height: 485px">
                <div class="card-header card-header-text">
                        <h4 class="card-title">All Courses</h4>
                        <p class="category">Increase Your Skills..</p>
                    </div>
                    <div class="card-content">
                    <?php
            if (isset($stuLogEmail)) {
                $sql = "SELECT co.order_id, c.course_id, c.course_name, c.course_duration, c.course_desc, c.course_img, c.course_original_price, c.course_price FROM courseorder AS co JOIN course AS c ON c.course_id = co.course_id WHERE co.stu_email = '$stuLogEmail'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
            ?>
                        <div class="bg-light mb-3">
                            <h5 class="card-header"><?php echo $row['course_name']; ?></h5>
                        </div>
                       
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="<?php echo $row['course_img']; ?>" class="card-img-top mt-4" alt="pic">
                            </div>
                            <div class="col-sm-6 md-3">
                                <div class="card-body">
                                    <p class="card-title">
                                        <?php echo $row['course_desc']; ?>
                                    </p>
                                    <small class="card-text">Duration: <?php echo $row['course_desc']; ?></small><br />
                                    <br />
                                    <p class="card-text d-inline">Price: <small><del>&#8377<?php echo $row['course_original_price']; ?></del></small><span class="font-weight-bolder">&#8377 <?php echo $row['course_price']; ?></span></p>
                                    <a href="watchcourse.php?course_id=<?php echo $row['course_id'] ?>" class="btn btn-primary mt-5 float-right">Watch Course</a>
                                </div>
                            </div>
                        </div>
                        <hr />
            <?php
                    }
                }
            }
            ?>
           
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="container mt-5 ml-4">
    <div class="row">
        <div class="jumbotron">
            <h4 class="text-center">All Course</h4>
           
        </div>
    </div>
</div>
</div>
<?php
include('./stuInclude/footer.php');
?>