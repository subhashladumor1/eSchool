<?php
include('./adminInclude/header.php');
include_once('../dbConnection.php');
$sql = "SELECT * FROM course";
$result = $conn->query($sql);
$totalcourse = $result->num_rows;

$sql = "SELECT * FROM student";
$result = $conn->query($sql);
$totalstu = $result->num_rows;

$sql = "SELECT * FROM courseorder";
$result = $conn->query($sql);
$totalsold = $result->num_rows;

$sql = "SELECT * FROM feedback";
$result = $conn->query($sql);
$totalfeedback = $result->num_rows;
?>

<!-- Page Content  -->
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

                    </ul>
                </div>
            </div>
        </nav>
    </div>


    <div class="main-content">

        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header">
                        <div class="icon icon-warning">
                            <span class="material-icons"> menu_book </span>
                        </div>
                    </div>
                    <div class="card-content">
                        <p class="category"><strong>Courses</strong></p>
                        <h3 class="card-title"><?php echo $totalcourse; ?></h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons text-info">info</i>
                            <a href="#pablo">See course detailed </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header">
                        <div class="icon icon-rose">
                            <span class="material-icons">shopping_cart</span>

                        </div>
                    </div>
                    <div class="card-content">
                        <p class="category"><strong>Enroll</strong></p>
                        <h3 class="card-title"><?php echo $totalsold; ?></h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">local_offer</i> Enroll Details
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header">
                        <div class="icon icon-success">
                            <span class="material-icons">person</span>
                        </div>
                    </div>
                    <div class="card-content">
                        <p class="category"><strong>Students</strong></p>
                        <h3 class="card-title"><?php echo $totalstu; ?></h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">date_range</i> Student Details
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header">
                        <div class="icon icon-info">
                            <span class="material-icons">feedback</span>
                        </div>
                    </div>
                    <div class="card-content">
                        <p class="category"><strong>Feeback</strong></p>
                        <h3 class="card-title"><?php echo $totalfeedback; ?></h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">update</i> Feedback Updated
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row ">
            <div class="col-lg-10 col-md-14">
                <div class="card" style="min-height: 485px">
                    <div class="card-header card-header-text">
                        <h4 class="card-title">Enroll Details</h4>
                        <p class="category">Recent Enroll Activity...</p>
                    </div>


                    <div class="card-content table-responsive">
                        <?php




                        // $sql = "SELECT * FROM courseorder ORDER BY order_date DESC LIMIT 10";
                        $sql = "SELECT co.co_id, co.order_id, co.stu_email, co.course_id, co.razorpay_payment_id, co.amount, co.order_date, c.course_id, c.course_name, c.course_duration, c.course_desc, c.course_img, c.course_original_price, c.course_price FROM courseorder AS co JOIN course AS c ON c.course_id = co.course_id";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            echo '<table class="table table-hover">  
                                    <thead class="text-primary">
                                    <tr>
                                    <th>Enroll ID</th>
                                    <th>Course Name</th>
                                    <th>Razorpay Payment Id</th>
                                    <th>Student Email</th>
                                    <th>Enroll Date</th>
                                    <th>Amount</th>
                                    <th>Action</th>                                    
                                    </tr> 
                                    </thead>
                                    <tbody>';
                            while ($row = $result->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td>' . $row["order_id"] . '</td>';
                                echo '<td>' . $row["course_name"] . '</td>';
                                echo '<td>' . $row["razorpay_payment_id"] . '</td>';
                                echo '<td>' . $row["stu_email"] . '</td>';
                                echo '<td>' . $row["order_date"] . '</td>';
                                echo '<td>' . $row["amount"] . '</td>';
                                echo '<td><form action="" method="POST" class="d-inline"><input type="hidden" name="id" value=' . $row["co_id"] . '><button type="submit" class="btn btn-secondary" name="delete" value="Delete"><i class="material-icons">delete_forever</i></button></form></td>';
                                echo '</tr>';
                            }
                            echo '</tbody>
                                    </table>';
                        } else {
                            echo "0 Result";
                        }

                        if (isset($_REQUEST['delete'])) {
                            $sql = "DELETE FROM courseorder WHERE co_id = {$_REQUEST['id']}";
                            if ($conn->query($sql) == TRUE) {
                                echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
                            } else {
                                echo "Unable to Delete Data";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>

            <!-- <div class="col-lg-5 col-md-12">
                        <div class="card" style="min-height: 485px">
                            <div class="card-header card-header-text">
                                <h4 class="card-title">Activities</h4>
                            </div>
                            <div class="card-content">
                                <div class="streamline">
                                    <div class="sl-item sl-primary">
                                        <div class="sl-content">
                                            <small class="text-muted">5 mins ago</small>
                                            <p>Williams has just joined Project X</p>
                                        </div>
                                    </div>
                                    <div class="sl-item sl-danger">
                                        <div class="sl-content">
                                            <small class="text-muted">25 mins ago</small>
                                            <p>Jane has sent a request for access to the project folder</p>
                                        </div>
                                    </div>
                                    <div class="sl-item sl-success">
                                        <div class="sl-content">
                                            <small class="text-muted">40 mins ago</small>
                                            <p>Kate added you to her team</p>
                                        </div>
                                    </div>
                                    <div class="sl-item">
                                        <div class="sl-content">
                                            <small class="text-muted">45 minutes ago</small>
                                            <p>John has finished his task</p>
                                        </div>
                                    </div>
                                    <div class="sl-item sl-warning">
                                        <div class="sl-content">
                                            <small class="text-muted">55 mins ago</small>
                                            <p>Jim shared a folder with you</p>
                                        </div>
                                    </div>
                                    <div class="sl-item">
                                        <div class="sl-content">
                                            <small class="text-muted">60 minutes ago</small>
                                            <p>John has finished his task</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div> -->
        </div>



        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <nav class="d-flex">
                            <ul class="m-0 p-0">
                                <li>
                                    <a href="../index.php">
                                        Home
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Blog
                                    </a>
                                </li>
                                <li>
                                    <a href="../courses.php">
                                        Courses
                                    </a>
                                </li>
                                <li>
                                    <a href="../about.php">
                                        About
                                    </a>
                                </li>
                            </ul>
                        </nav>

                    </div>
                    <div class="col-md-6">
                        <p class="copyright d-flex justify-content-end"> &copy 2022 Design by
                            <a href="#">&nbsp;Subhash, Ninad & Bharat</a>
                        </p>
                    </div>
                </div>
            </div>
        </footer>

    </div>



</div>
</div>








<?php

include('./adminInclude/footer.php')

?>




</body>

</html>