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
        <form action="" method="POST" class="d-print-none">
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
        </form>
        <?php
        if (isset($_REQUEST['searchsubmit'])) {
            $startdate = $_REQUEST['startdate'];
            $enddate = $_REQUEST['endtdate'];
            $sql = "SELECT * FROM courseorder WHERE order_date BETWEEN '$startdate' AND '$enddate'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo '<div class="row">';
                echo '<div class="col-lg-10 col-md-14">';
                echo '<div class="card" style="min-height: 485px">';
                echo '<div class="card-header card-header-text">';
                echo '<h4 class="card-title">Order Details</h4>';
                echo '<p class="category">Recent Order Activity...</p>';
                echo '</div>';
                echo '<div class="card-content table-responsive">';
                if (isset($_REQUEST['searchsubmit'])) {
                    $startdate = $_REQUEST['startdate'];
                    $enddate = $_REQUEST['endtdate'];
                    $sql = "SELECT * FROM courseorder WHERE order_date BETWEEN '$startdate' AND '$enddate'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {

                        echo '<table class="table table-hover">  
                                    <thead class="text-primary">
                                    <tr>
                                    <th>Order ID</th>
                                    <th>Course ID</th>
                                    <th>Razorpay Payment Id</th>
                                    <th>Student Email</th>
                                    <th>Order Date</th>
                                    <th>Amount</th>                                    
                                    </tr> 
                                    </thead>
                                    <tbody>';
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>
                                                    <th scope="row">' . $row["order_id"] . '</th>
                                                    <td>' . $row["course_id"] . '</td>
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
        ?>
                

        <?php echo '</div>
                </div>
            </div>
        </div>';
            }
        } ?>


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