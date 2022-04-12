<?php
if (!isset($_SESSION)) {
    session_start();
}

include_once('../dbConnection.php');
include('./admininclude/header.php');

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

        <div class="col-md-12">
            <div class="row">

                <div class="col-md-6">
                    <form action="" method="POST" class="d-print-none">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Course Name</label>
                            </div>
                            <select class="custom-select" name="course_select" id="select_std">
                                <option value="">Choose...</option>
                            </select>
                        </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">User Email</label>
                        </div>
                        <select class="custom-select" name="user_select" id="select_res">
                            <option value="">Choose...</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-2">
                    <input type="date" class="form-control" id="startdate" name="startdate">
                </div><span> to </span>
                <div class="form-group col-md-2">
                    <input type="date" class="form-control" id="endtdate" name="endtdate">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-secondary" name="searchsubmit" value="Search">

                </div>
            </div>
            <div>
                <input type="submit" id="filter" name="filtersubmit" class="btn btn-sm btn-primary" value="Filter">
                <!-- <button id="reset_std" class="btn btn-sm btn-outline-info">Reset Standard</button>
                <button id="reset_res" class="btn btn-sm btn-outline-info">Reset Result</button> -->
                <button id="reset" class="btn btn-sm btn-outline-danger">Reset</button>






            </div>
            <!-- <div class="row"> -->
            <!-- <div class="col-md-12 mt-3 mb-3"> -->
            <!-- Table -->
            <!-- <div class="table-responsive">
                            <table class="table table-borderless" id="record_table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Standard</th>
                                        <th>Percentage</th>
                                        <th>Result</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                            </table>
                        </div> -->
            <!-- </div> -->
            <!-- </div> -->

            </form>




            <?php
            if (isset($_REQUEST['searchsubmit'])) {
                $startdate = $_REQUEST['startdate'];
                $enddate = $_REQUEST['endtdate'];
                $sql = "SELECT co.co_id, co.order_id, co.stu_email, co.course_id, co.razorpay_payment_id, co.amount, co.order_date, c.course_id, c.course_name, c.course_duration, c.course_desc, c.course_img, c.course_original_price, c.course_price FROM courseorder AS co JOIN course AS c ON c.course_id = co.course_id WHERE co.order_date BETWEEN '$startdate' AND '$enddate'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    echo '<div class="row">';
                    echo '<div class="col-lg-10 col-md-14">';
                    echo '<div class="card" style="min-height: 485px">';
                    echo '<div class="card-header card-header-text">';
                    echo '<h4 class="card-title">Enroll Details</h4>';
                    echo '<p class="category">Recent Enroll Activity...</p>';
                    echo '</div>';
                    echo '<div class="card-content table-responsive">';
                    if (isset($_REQUEST['searchsubmit'])) {
                        $startdate = $_REQUEST['startdate'];
                        $enddate = $_REQUEST['endtdate'];
                        $sql = "SELECT co.co_id, co.order_id, co.stu_email, co.course_id, co.razorpay_payment_id, co.amount, co.order_date, c.course_id, c.course_name, c.course_duration, c.course_desc, c.course_img, c.course_original_price, c.course_price FROM courseorder AS co JOIN course AS c ON c.course_id = co.course_id WHERE co.order_date BETWEEN '$startdate' AND '$enddate'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {

                            echo '<table class="table table-hover" id="record_table">  
                                    <thead class="text-primary">
                                    <tr>
                                    <th>Enroll ID</th>
                                    <th>Course Name</th>
                                    <th>Razorpay Payment Id</th>
                                    <th>Student Email</th>
                                    <th>Enroll Date</th>
                                    <th>Amount</th>                                    
                                    </tr> 
                                    </thead>
                                    <tbody>';
                            while ($row = $result->fetch_assoc()) {
                                echo '<tr>
                                                    <th scope="row">' . $row["order_id"] . '</th>
                                                    <td>' . $row["course_name"] . '</td>
                                                    <td>' . $row["razorpay_payment_id"] . '</td>
                                                    <td>' . $row["stu_email"] . '</td>
                                                    <td>' . $row["order_date"] . '</td>
                                                    <td>' . $row["amount"] . '</td>
                                                    </tr>';
                            }
                            echo '<tr> 
                                                        <td> <form class="d-print-none"><input class="btn btn-danger" type="submit" value="Report PDF Print" onClick="window.print()"></form>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                </table>';
                        } else {
                            echo "<div class='alert alert-warning col-sm-6 ml-5 mt-2' role='alert'> No Record Found! </div>";
                        }
                    }


                    echo '</div>
                </div>
            </div>
        </div>';
                }
            }

            if (isset($_REQUEST['filtersubmit'])) {
                if (isset($_REQUEST['course_select']) && isset($_REQUEST['user_select']) && !empty($_REQUEST['course_select']) && !empty($_REQUEST['user_select'])) {


                    // $rows = $model->fetch_filter($std, $res);



                    // $sql = "SELECT co.co_id, co.order_id, co.stu_email, co.course_id, co.razorpay_payment_id, co.amount, co.order_date, c.course_id, c.course_name, c.course_duration, c.course_desc, c.course_img, c.course_original_price, c.course_price FROM courseorder AS co JOIN course AS c ON c.course_id = co.course_id WHERE co.order_date BETWEEN '$startdate' AND '$enddate'";
                    $course_select = $_REQUEST['course_select'];
                    $user_select = $_REQUEST['user_select'];
                    $sql = "SELECT * FROM courseorder";
                    $result = $conn->query($sql);
                    $row =  $result->fetch_assoc();
                    if ($result->num_rows > 0) {
                        echo '<div class="row" >';
                        echo '<div class="col-lg-10 col-md-14">';
                        echo '<div class="card" style="min-height: 485px">';
                        echo '<div class="card-header card-header-text">';
                        echo '<h4 class="card-title">Enroll Details</h4>';
                        echo '<p class="category">Recent Enroll Activity...</p>';
                        echo '</div>';
                        echo '<div class="card-content table-responsive">';
                        if (isset($_REQUEST['filtersubmit'])) {

                            $sql = "SELECT co.co_id, co.order_id, co.stu_email, co.course_id, co.razorpay_payment_id, co.amount, co.order_date, c.course_id, c.course_name, c.course_duration, c.course_desc, c.course_img, c.course_original_price, c.course_price FROM courseorder AS co JOIN course AS c ON co.course_id = '$course_select' AND co.stu_email = '$user_select' AND c.course_id = co.course_id";

                            // $sql = "SELECT * FROM courseorder WHERE course_id = '$course_select' ";
                            $result = $conn->query($sql);
                        }
                    }
                } elseif (isset($_REQUEST['course_select']) && empty($_REQUEST['user_select'])) {
                    $course_select = $_REQUEST['course_select'];


                    $sql = "SELECT * FROM courseorder";
                    $result = $conn->query($sql);
                    $row =  $result->fetch_assoc();
                    if ($result->num_rows > 0) {
                        echo '<div class="row" id="report">';
                        echo '<div class="col-lg-10 col-md-14">';
                        echo '<div class="card" style="min-height: 485px">';
                        echo '<div class="card-header card-header-text">';
                        echo '<h4 class="card-title">Enroll Details</h4>';
                        echo '<p class="category">Recent Enroll Activity...</p>';
                        echo '</div>';
                        echo '<div class="card-content table-responsive">';
                        if (isset($_REQUEST['filtersubmit'])) {

                            $sql = "SELECT co.co_id, co.order_id, co.stu_email, co.course_id, co.razorpay_payment_id, co.amount, co.order_date, c.course_id, c.course_name, c.course_duration, c.course_desc, c.course_img, c.course_original_price, c.course_price FROM courseorder AS co JOIN course AS c ON co.course_id = '$course_select' AND c.course_id = co.course_id";

                            // $sql = "SELECT * FROM courseorder WHERE course_id = '$course_select' ";
                            $result = $conn->query($sql);
                        }

                        // $rows = $model->fetch_std_filter($std);
                    } 
                }
                elseif (empty($_REQUEST['course_select']) && isset($_REQUEST['user_select'])) {
                        $user_select = $_REQUEST['user_select'];
                        $sql = "SELECT * FROM courseorder";
                        $result = $conn->query($sql);
                        $row =  $result->fetch_assoc();
                        if ($result->num_rows > 0) {
                            echo '<div class="row" id="report">';
                            echo '<div class="col-lg-10 col-md-14">';
                            echo '<div class="card" style="min-height: 485px">';
                            echo '<div class="card-header card-header-text">';
                            echo '<h4 class="card-title">Enroll Details</h4>';
                            echo '<p class="category">Recent Enroll Activity...</p>';
                            echo '</div>';
                            echo '<div class="card-content table-responsive">';
                            if (isset($_REQUEST['filtersubmit'])) {

                                $sql = "SELECT co.co_id, co.order_id, co.stu_email, co.course_id, co.razorpay_payment_id, co.amount, co.order_date, c.course_id, c.course_name, c.course_duration, c.course_desc, c.course_img, c.course_original_price, c.course_price FROM courseorder AS co JOIN course AS c ON  c.course_id = co.course_id AND co.stu_email = '$user_select'";

                                // $sql = "SELECT * FROM courseorder WHERE co.stu_email = '$user_select'";
                                $result = $conn->query($sql);
                            }

                        }
                        // $rows = $model->fetch_res_filter($res);
                    }

                    if ($result->num_rows > 0) {

                        echo '<table class="table table-hover" id="record_table">  
                            <thead class="text-primary">
                            <tr>
                            <th>Enroll ID</th>
                            <th>Course Name</th>
                            <th>Razorpay Payment Id</th>
                            <th>Student Email</th>
                            <th>Enroll Date</th>
                            <th>Amount</th>                                    
                            </tr> 
                            </thead>
                            <tbody>';
                        while ($row = $result->fetch_assoc()) {

                            echo '<tr>
                                            <th scope="row">' . $row["order_id"] . '</th>
                                            <td>' .  $row["course_name"] . '</td>
                                            <td>' . $row["razorpay_payment_id"] . '</td>
                                            <td>' . $row["stu_email"] . '</td>
                                            <td>' . $row["order_date"] . '</td>
                                            <td>' . $row["amount"] . '</td>
                                            </tr>';
                        }
                        echo '<tr> 
                                                
                                               
                                            </tr>
                                        </tbody>
                                        </table>
                                        <button class="btn btn-danger" type="submit" value="Report PDF Print" id="pdf-btn">Report PDF Print</button>';
                    } else {
                        echo "<div class='alert alert-warning col-sm-6 ml-5 mt-2' role='alert'> No Record Found! </div>";
                    }
                    echo '</div>
                </div>
            </div>
        </div>';
                }
            



            ?>




        </div>
    </div>
</div>





</div>
</div>
</div>
</div>
</div>
<?php
include('./admininclude/footer.php');

?>
</div>

<script>
    document.getElementById('pdf-btn').onclick = function() {
        var element = document.getElementById('record_table');

        var opt = {
            margin: 1,
            filename: 'myreport.pdf',
            image: {
                type: 'jpeg',
                quality: 0.98
            },
            html2canvas: {
                scale: 0
            },
            jsPDF: {
                unit: 'in',
                format: '',
                orientation: 'landscape'
            }

        };

        html2pdf(element);
    };
</script>