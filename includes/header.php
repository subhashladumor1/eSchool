<nav class="navbar navbar-expand-sm navbar-dark  pl-5 fixed-top">
    <a class="navbar-brand" href="index.php">eLMS</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon "></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav custom-nav">
            <li class="nav-item custom-item active">
                <a class="nav-link" href="./index.php">Home</a>
            </li>
            <li class="nav-item custom-item">
                <a class="nav-link" href="courses.php">Course</a>
            </li>
            <li class="nav-item custom-item">
                <a class="nav-link" href="blog.php">Blog</a>
            </li>
            <!-- <li class="nav-item custom-item">
                    <a class="nav-link" href="./paymentstatus.php">Payment status</a>
                </li> -->
            <?php


            session_start();

            if (isset($_SESSION['is_login'])) {
                echo '<li class="nav-item custom-item">
                        <a class="nav-link" href="Student/studentProfile.php">My Profile</a>
                    </li>
                    <li class="nav-item custom-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>';
            } else {
                echo '<li class="nav-item custom-item">
                        <a class="nav-link" data-toggle="modal" data-target="#stuLoginModalCenter" href="#">Login</a>
                    </li>
                    <li class="nav-item custom-item">
                        <a class="nav-link" data-toggle="modal" data-target="#stuRegModalCenter" href="#">Signup</a>
                    </li>';
            }
            ?>
            <li class="nav-item custom-item">
                <a class="nav-link" href="./code.php">Online IDE</a>
            </li>

            <li class="nav-item custom-item">
                <a class="nav-link" href="./about.php">About</a>
            </li>
            <li class="nav-item custom-item">
                <a class="nav-link" href="./contact.php">Contact</a>
            </li>

            <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown link
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li> -->
        </ul>
    </div>
</nav>