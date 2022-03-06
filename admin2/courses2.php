<?php

if (!isset($_SESSION)) {
    session_start();
}
include('./admininclude/header.php');
include('../dbConnection.php');

if (isset($_SESSION['is_admin_login'])) {
    $adminEmail =  $_SESSION['adminLogemail'];
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
    <div>
        <a class="btn btn-danger box" href="./addCourse.php"><i class="material-icons"></i> Add Course</a>
    </div>
        <div class="row">
            <div class="col-lg-7 col-md-10">
                <div class="card" style="min-height: 485px">
                    <div class="card-header card-header-text">
                        <h4 class="card-title">List of Courses</h4>
                        <p class="category">All Type of Courses</p>
                    </div>
                    <div class="card-content table-responsive">
                        <?php
                        $sql = "SELECT * FROM course";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            echo '<table class="table table-hover">
                        <thead class="text-primary">
                        <tr> <th scope="col">Courses ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Author</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>';
                            while ($row = $result->fetch_assoc()) {
                                echo '<tr>';
                                echo '<th scope="row">' . $row['course_id'] . '</th>';
                                echo '<td>' . $row['course_name'] . '</td>';
                                echo '<td>' . $row['course_author'] . '</td>';
                                echo '<td>';
                                echo    '
               <form action="editcourse.php" method="POST" class="d-inline">
               <input type="hidden" name="id" value=' . $row['course_id'] . '>
               <button
                      type="submit"
                      class="btn bt-info mr-3"
                      name="view"
                      value="view"
                    >
                      <i class="material-icons">edit</i>
                    </button>

                </form>
                    <form action="" method="POST" class="d-inline">
                    <input type="hidden" name="id" value=' . $row['course_id'] . '>
                    <button
                        type="submit"
                        class="btn btn-secondary"
                        name="delete"
                        value="Delete"
                    >
                       <i class="material-icons">delete_forever</i>
                    </button>
                    </form>
                    </td>
                </tr>';
                            }
                        ?>
                            </tbody>
                            </table>
                        <?php } else {
                            echo "0 Result";
                        }

                        if (isset($_REQUEST['delete'])) {
                            $sql = "DELETE FROM course WHERE course_id = {$_REQUEST['id']}";
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
        </div>
    </div>
    <!-- div row cloase from header     -->
    <div>
        <br/>
    </div>
</div>
<!--div  container-fluid close from header  -->
</div>
</div>




<?php

include('./adminInclude/footer.php')

?>