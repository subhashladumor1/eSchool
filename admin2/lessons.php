<?php

include('./admininclude/header.php');
include('../dbConnection.php');

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
        <form action=" " class="mt-3 form-inline d-print-none">
            <div class="form-group mr-3">
                <label for="checkid">Enter course ID:</label>
                <input type="text" class="form-control ml-3" id="checkid" name="checkid">
            </div>
            <button type="submit" class="btn btn-danger">Search</button> <?php
                                                                            if (isset($_SESSION['course_id'])) {
                                                                                echo  '
                    <span><a class="btn btn-danger box m-1" href="./addLesson.php"><i class="material-icons"></i>Add Lesson</a></span>
                ';
                                                                            }
                                                                            ?>
        </form>
        <?php
        $sql = "SELECT course_id FROM course";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            if (isset($_REQUEST['checkid']) && $_REQUEST['checkid'] == $row['course_id']) {
                $sql = "SELECT * FROM course WHERE course_id = {$_REQUEST['checkid']}";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                if (($row['course_id']) == $_REQUEST['checkid']) {
                    $_SESSION['course_id'] = $row['course_id'];
                    $_SESSION['course_name'] = $row['course_name'];
        ?>
                    <div class="row">
                        <div class="col-lg-9 col-md-12">
                            <div class="card" style="min-height: 485px">
                                <div class="card-header card-header-text">
                                    <h4 class="card-title">Course ID: <?php if (isset($row['course_id'])) {
                                                                            echo $row['course_id'];
                                                                        } ?></h4>
                                    <p class="category">Course Name: <?php if (isset($row['course_name'])) {
                                                                            echo $row['course_name'];
                                                                        } ?></p>
                                </div>
                                <div class="card-content table-responsive">
                        <?php
                        $sql = "SELECT * FROM lesson WHERE course_id = {$_REQUEST['checkid']}";
                        $result = $conn->query($sql);
                        echo '<table class="table"> 
                            <thead>
                            <tr>
                                <th scope="col"> Lesson ID </th>
                                <th scope="col"> Lesson Name </th>
                                <th scope="col"> Lesson Link </th>
                                <th scope="col"> Action </th>
                            </tr>
                            </thead>
                            <tbody>';
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '<th scope="row">' . $row['lesson_id'] . '</th>';
                            echo '<td>' . $row['lesson_name'] . '</td>';
                            echo '<td>' . $row['lesson_link'] . '</td>';
                            echo '<td>';
                            echo    '
                   <form action="editlesson.php" method="POST" class="d-inline">
                   <input type="hidden" name="id" value=' . $row['lesson_id'] . '>
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
                        <input type="hidden" name="id" value=' . $row['lesson_id'] . '>
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
                        echo '</tbody>
                    </table>';
                    } else {
                        echo '<div class="alert alert-dark mt-4" role="alert"> Course Not Found! </div>';
                    }
                    if (isset($_REQUEST['delete'])) {
                        $sql = "DELETE FROM lesson WHERE lesson_id = {$_REQUEST['id']}";
                        if ($conn->query($sql) == TRUE) {
                            echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
                        } else {
                            echo "Unable to Delete Data";
                        }
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




<?php
include('./admininclude/footer.php');
?>