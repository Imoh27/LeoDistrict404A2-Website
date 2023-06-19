<?php
session_start();
include('includes/alt_config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index');
} else {
    $session = $_SESSION['login'];
    $allow_date = '05';
    $isActive = 1;
    // echo $allow_date; exit;

    global $con;
         $session_check = "SELECT userID FROM tblusers WHERE loginID = '$session'";
        $sth = $con->query($session_check);
        $result = $sth->fetch(PDO::FETCH_OBJ);
        // if ($result == TRUE || !empty($result)) 
             $updatedBy = $result->userID; 
    if (isset($_POST['add-lsy'])) {
        $lsy = $_POST['lsy'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $current_month = date('m');
        // echo $current_month; exit;

        if ($current_month < $allow_date) {
            $error = "Sorry!, Currrent Fiscal Year still Running, Create New Service Year Allowed from May";
        } else {
            $select_query = "SELECT * FROM tblserviceyr WHERE serviceYr = '$lsy'";
            $sth = $con->query($select_query);
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
            if ($result == TRUE || !empty($result)) {
                $error = "Something went wrong . Service year already Created.";
            }else{
                $insert = "INSERT INTO tblserviceyr VALUES(NULL,'$lsy','$start_date','$end_date', NOW(), $updatedBy, $isActive)";
                $query = $con->query($insert);
                if ($query) {
                    $msg = "Service Year Created ";
                } else {
                    $error = "Something went wrong . Please try again.";
                }
            }
        }
    }



    ?>


    <?php include('includes/pages-head.php'); ?>
    <title>Leo District 404A2 -- Official Website | Add Service Year</title>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <?php include('includes/topheader.php'); ?>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
            <?php include('includes/leftsidebar.php'); ?>
            <!-- Left Sidebar End -->

            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">


                        <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Create Service Year</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li>
                                            <a href="#">Service Year </a>
                                        </li>
                                        <li class="active">
                                            Create Service Year
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>Create Service Year </b></h4>
                                    <p class="text-danger">New Service year can only be created from May of running service
                                        year</p>
                                    <hr />



                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!---Success Message--->
                                        <?php if ($msg) { ?>
                                        <div class="alert alert-success" role="alert">
                                            <strong>Well done!</strong>
                                            <?php echo htmlentities($msg); ?>
                                        </div>
                                        <?php } ?>

                                        <!---Error Message--->
                                        <?php if ($error) { ?>
                                        <div class="alert alert-danger" role="alert">
                                            <strong>Oh snap!</strong>
                                            <?php echo htmlentities($error); ?>
                                        </div>
                                        <?php } ?>


                                    </div>
                                </div>





                                <div class="row">
                                    <div class="col-md-6">
                                        <form class="form-horizontal" name="lsy" method="post">
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Enter Service Year</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" value="" name="lsy"
                                                        placeholder="example 2022/2023" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Start Date</label>
                                                <div class="col-md-4">
                                                    <input type="date" name="start_date" class="form-control">
                                                </div>
                                                <label class="col-md-2 control-label">End Date</label>
                                                <div class="col-md-4">
                                                    <input type="date" name="end_date" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label">&nbsp;</label>
                                                <div class="col-md-10">

                                                    <button type="submit"
                                                        class="btn btn-custom waves-effect waves-light btn-md"
                                                        name="add-lsy">
                                                        Submit
                                                    </button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>


                                </div>











                            </div>
                        </div>
                    </div>
                    <!-- end row -->


                    </div> <!-- container -->

                </div> <!-- content -->

                <?php include('includes/footer.php'); ?>

            </div>
        </div>

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
        <script src="../plugins/switchery/switchery.min.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>

    </html>
<?php } ?>