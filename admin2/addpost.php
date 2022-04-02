<?php
include('./admininclude/header.php');
include('../dbConnection.php');


if (isset($_REQUEST['addpost'])) {
    if (($_REQUEST['post_title'] == "") || ($_REQUEST['post_category'] == "") )  {
        //msg displayed if required field missing
        $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2"
        role="alert"> Fill All fields </div>';
    } else {
        $post_title = $_REQUEST["post_title"];
        $post_content = $_REQUEST["post_content"];
        $post_category = $_REQUEST["post_category"];
        $post_image = $_FILES['post_image']['name'];
        $post_image_temp = $_FILES['post_image']['tmp_name'];
        $img_folder = '../image/blog/' . $post_image;
        move_uploaded_file($post_image_temp, $img_folder);
        

$sql = "INSERT INTO posts (title , content, category_id, post_img)  VALUES ('$post_title', '$post_content', '$post_category', '$img_folder')";

        if ($conn->query($sql) == TRUE) {
            $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Post Added Successfully </div>';
        } else {
            $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">unable to Update</div>';
        }
    }
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
            <div class="col-lg-7 col-md-10">
                <div class="card" style="min-height: 485px">
                    <div class="card-header card-header-text">
                        <h4 class="card-title">Add New Post</h4>
                        <p class="category">Add New Amazing Blog post</p>
                    </div>
                    <div class="card-content">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="post_title">Post Title</label>
                                <input type="text" class="form-control" id="post_title" name="post_title"  placeholder="Post Title">
                            </div>
                            <div class="form-group">
                                <label for="post_content">Post Content</label>
                                <textarea class="form-control" id="post_content" name="post_content" rows="6" placeholder="Text-aea"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="post_category">Select Post Category</label>
                                <select name="post_category" class="form-control" id="post_category" name="post_category">

                                    <?php

                                    $sql = "SELECT * FROM category";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo '<option value= ' . $row['id'] . '> ' . $row['name'] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="stuImg">Upload Image</label>
                                <input type="file" class="form-control-file" id="post_image" name="post_image" accept="image/*">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-danger" id="addpost" name="addpost">Add Post</button>
                                <a href="lessons.php" class="btn btn-secondary">Close</a>
                            </div>
                            <?php if (isset($passmsg)) {
                                echo $passmsg;
                            } ?>    
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include('./admininclude/footer.php');
?>