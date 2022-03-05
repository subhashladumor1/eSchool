<?php
if (!isset($_SESSION)) {
    session_start();
}

include_once('../dbConnection.php');
include('./admininclude/header.php');
?>

<div class="col-sm-9 mt-5">
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
            echo '<p class="bg-dark text-white p-2 mt-4">Details</p> 
                        <table class="table">
                        <thead>
                            <tr>    
                                <th scope="col"> Order ID </th>
                                <th scope="col"> Course ID </th>
                                <th scope="col"> Razorpay Payment id </th>
                                <th scope="col"> Student Email </th>
                                <th scope="col"> Order Date </th>
                                <th scope="col"> Amount </th>
                            </tr>
                        </theader>
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
                                <td> <form class="d-print-none"><input class="btn btn-danger" type="submit" value="Print" onClick="window.print()"></form>
                                </td>
                            </tr>
                        </tbody>
                        </table>';
        } else {
            echo "<div class='alert alert-warning col-sm-6 ml-5 mt-2' role='alert'> No Record Found! </div>";
        }
    }
    ?>
</div>
</div>
</div>
</div>
</div>
<?php 
    include('./admininclude/footer.php');

?>
</div>