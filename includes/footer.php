<footer class="container-fluid bg-dark text-center p-2">
    <small class="text-white">Copyright &copy; 2022 || Designed by Subhash, Bharat & Ninad || <a href="#" data-toggle="modal" data-target="#adminLoginModalCenter">Admin Login</a></small>
</footer>

 <!-- *********** Start Registration Form Modal *************** -->

 <div class="modal fade" id="stuRegModalCenter" tabindex="-1" role="dialog" aria-labelledby="stuRegModalCenterLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="stuRegModalCenterLabel">Student Registration</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                     <!-- ****************** Start Student Registration Form ******************* -->
                     <?php include('studentregistration.php');?>
                    <!-- ****************** End Student Registration Form ******************* -->
                </div>
                <div class="modal-footer">
                    <span id="successMsg"></span>
                    <button id="signup" type="button" class="btn btn-primary" onclick="addStu()" >Signup</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- *********** End Registration Form Modal *************** -->

    <!-- ******************************************************* -->

    <!-- *********** Start Student Login Form Modal *************** -->

    <div class="modal fade" id="stuLoginModalCenter" tabindex="-1" role="dialog" aria-labelledby="stuLoginModalCenterLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="stuLoginModalCenterLabel">Student Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                     <!-- ****************** Start Student Login Form ******************* -->
                    <form id="stuLoginForm">
                       
                        <div class="form-group">
                            <i class="fas fa-envelope"></i><label for="stuLogemail" class="pl-2 font-weight-bold">Email</label>
                            <input type="text" class="form-control" placeholder="Enter Email" name="stuLogemail"
                                id="stuLogemail">
                        </div>
                        <div class="form-group">
                            <i class="fas fa-key"></i><label for="stuLogpass" class="pl-2 font-weight-bold">Password</label>
                            <input type="password" class="form-control" placeholder="Enter Passoword" name="stuLogpass"
                                id="stuLogpass">
                        </div>
                    </form>

                    <!-- ****************** End Student Login Form ******************* -->
                </div>
                <div class="modal-footer">
                    <small id="statusLogMsg"></small>
                    <button type="button" class="btn btn-primary" id="stuLogBtn" onclick="checkStuLogin()">login</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- *********** End Student Login Form Modal *************** -->

    <!-- ******************************************************* -->

    <!-- *********** Start Admin Login Form Modal *************** -->

    <div class="modal fade" id="adminLoginModalCenter" tabindex="-1" role="dialog" aria-labelledby="adminLoginModalCenterLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="adminLoginModalCenterLabel">Admin Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                     <!-- ****************** Start Admin Login Form ******************* -->
                    <form id="adminLoginForm">
                       
                        <div class="form-group">
                            <i class="fas fa-envelope"></i><label for="adminLogemail" class="pl-2 font-weight-bold">Email</label>
                            <input type="text" class="form-control" placeholder="Enter Email" name="adminLogemail"
                                id="adminLogemail">
                        </div>
                        <div class="form-group">
                            <i class="fas fa-key"></i><label for="adminLogpass" class="pl-2 font-weight-bold">Password</label>
                            <input type="password" class="form-control" placeholder="Enter Passoword" name="adminLogpass"
                                id="adminLogpass">
                        </div>
                    </form>

                    <!-- ****************** End Admin Login Form ******************* -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="stuLogBtn" onclick="checkAdminLogin()">login</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- *********** End Admin Login Form Modal *************** -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
        integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
        integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
        crossorigin="anonymous"></script>

    <!-- jQUERY AND Boostrap JavaScript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/testislider.js"></script>

    <!-- Fontawesome JavaScript -->
    <script src="js/all.min.js"></script>
    <!-- Include New JavaScript File AJAXREQUEST  for Student Login / Signup Request-->
    <script src="js/ajaxrequest.js"></script>
    
    <!-- Include New JavaScript File AJAXREQUEST for Admin Login Request -->
    <script src="js/adminajaxrequest.js"></script>
</body>

</html>