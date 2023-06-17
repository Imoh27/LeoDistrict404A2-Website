<?php
session_start();
//Database Configuration File
include('includes/config.php');
//error_reporting(0);
if (isset($_POST['login'])) {

    // Getting username/ email and password
    $uname = $_POST['username'];
    $password = $_POST['password'];
    // Fetch data from database on the basis of username/email and password
    $sql = mysqli_query($con, "SELECT * FROM tblusers WHERE (loginID='$uname')");
    $num = mysqli_fetch_array($sql);
    if ($num > 0) {
        // $hashpassword=$num['AdminPassword']; // Hashed password fething from database
//verifying Password
// if (password_verify($password, $hashpassword)) {
        $_SESSION['login'] = $_POST['username'];
        echo "<script type='text/javascript'> document.location = 'dashboard'; </script>";
        //   } else {
// echo "<script>alert('Wrong Password');</script>";

        //   }
    }
    //if username or email not found in database
    else {
        echo "<script>alert('User not registered with us');</script>";
    }

}
?>
<?php include ('includes/pages-head.php');?>
<title>Leo District 404A2 -- Official Website | Admin Login</title>

<body style="
  background-image: linear-gradient(rgba(17, 0, 255, 0.45), rgba(0, 64, 255, 0.304)), url(images/hhh.jpg) !important; background-repeat: no-repeat; background-size:cover" class="bg">

    <!-- HOME -->
    <section >
        <div class="container-alt">
            <div class="row">
                <div class="col-sm-12">

                    <div style="margin:50px auto !important" class="wrapper-page">

                        <div class=" account-pages">
                            <div class="text-center ">
                                <h2 class="text-uppercase">
                                    <a href="index" class="text-success">
                                        <span><img src="images/dplogo23-24.jpg" alt="" height="150" width="auto"></span>
                                    </a>
                                </h2>
                                <!--<h4 class="text-uppercase font-bold m-b-0">Sign In</h4>-->
                            </div>
                            <div class="account-content">
                                <form class="form-horizontal" method="post">

                                    <div class="form-group ">
                                        <div class="col-xs-12">
                                            <input class="form-control" type="text" required="" name="username"
                                                placeholder="Username" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <input class="form-control" type="password" name="password" required=""
                                                placeholder="Password" autocomplete="off">
                                        </div>
                                    </div>



                                    <div class="form-group account-btn text-center m-t-10">
                                        <div class="col-xs-12">
                                            <button class="btn w-md btn-loginn btn-bordered waves-effect waves-light"
                                                type="submit" name="login">Log In</button>
                                        </div>
                                    </div>

                                </form>

                                <div class="clearfix"></div>

                            </div>
                        </div>
                        <!-- end card-box-->




                    </div>
                    <!-- end wrapper -->

                </div>
            </div>
        </div>
    </section>
    <!-- END HOME -->

    <script>
        var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/detect.js"></script>
    <script src="assets/js/fastclick.js"></script>
    <script src="assets/js/jquery.blockUI.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>

    <!-- App js -->
    <script src="assets/js/jquery.core.js"></script>
    <script src="assets/js/jquery.app.js"></script>

</body>

</html>