<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index');
} else {
    $session = $_SESSION['login'];
    $session_user = "SELECT *  From tblusers WHERE loginID = '$session'";
    $query = mysqli_query($con, $session_user);
    $result = mysqli_fetch_assoc($query);
    $session = $result['userID'];

    if ($_GET['oid']) {
        $oid = $_GET['oid'];
        if (isset($_POST['editPosition'])) {
            $position = $_POST['position'];
            $abbr = $_POST['abbr'];
            $update = "update tbldistrictoffices set position='$position', 
            abbr = '$abbr', dateUpdated = NOW(), updatedBy = $session where dOfficesID ='$oid'";
            // echo $update; exit;
            $query = mysqli_query($con, $update);
            if ($query) {
                $msg = "Position Updated ";
            } else {
                $delmsg = "Error Encountered!, Try again ";
            }
        }
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<?php include('includes/pages-head.php'); ?>
<title>Leo District 404A2 -- Official Website | District Offices</title>




<body class="fixed-left">

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <?php include('includes/topheader.php'); ?>

        <!-- ========== Left Sidebar Start ========== -->
        <?php include('includes/leftsidebar.php'); ?>
        <!-- Left Sidebar End -->



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container">


                    <div class="row">
                        <div class="col-xs-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Edit Centre</h4>
                                <ol class="breadcrumb p-0 m-0">
                                    <li>
                                        <a href="#">Admin</a>
                                    </li>
                                    <li>
                                        <a href="#">District </a>
                                    </li>
                                    <li class="active">
                                        Edit Centre
                                    </li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->


                    <div class="row">
                        <div class="col-sm-6">

                            <?php if ($msg) { ?>
                            <div class="alert alert-success" role="alert">
                                <strong>Well done!</strong>
                                <?php echo htmlentities($msg); ?>
                            </div>
                            <?php } ?>

                            <?php if ($delmsg) { ?>
                            <div class="alert alert-danger" role="alert">
                                <strong>Oh snap!</strong>
                                <?php echo htmlentities($delmsg); ?>
                            </div>
                            <?php } ?>


                        </div>

                        <div class="row">
                            <!-- Edit District Offices -->
                            <?php
                                if ($_GET['oid']) {
                                    $oid = $_GET['oid'];

                                    $officedetails = "SELECT *  From tbldistrictoffices WHERE  dOfficesID  = '$oid'";
                                    // echo $officedetails; exit;
                                    $query = mysqli_query($con, $officedetails);
                                    $result = mysqli_fetch_assoc($query);
                                    ?>
                            <div class=" col-md-12 m-t-50" id="editPosition">
                                <div class="col-md-6 col-md-offset-2">
                                    <p class="text-uppercase font-600 font-secondary text-center"><a>Edit Position</a>

                                    </p>
                                    <form class="form-horizontal" name="position" method="post">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Enter Position <p
                                                    class="text-danger d-inline"> *</p></label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" value="<?php if ($result) {
                                                            echo htmlentities($result['position']);
                                                        } ?>" name="position" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Short Form </label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" value="<?php if ($result) {
                                                            echo htmlentities($result['abbr']);
                                                        } ?>" name="abbr">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">&nbsp;</label>
                                            <div class="col-md-10">

                                                <button type="submit"
                                                    class="btn btn-custom waves-effect waves-light btn-md"
                                                    name="editPosition">
                                                    Submit
                                                </button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                            <?php } ?>

                            

                        </div>
                        <!--- end row -->






                    </div> <!-- container -->

                </div> <!-- content -->
                <?php include('includes/footer.php'); ?>
            </div>

        </div>
        <!-- END wrapper -->



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
        <script>
        document.getElementById("addToTable").onclick = function() {
            addPositionForm()
        };

        function addPositionForm() {
            document.getElementById('addPosition').style.display = "block"
        }
        function getClubs(val) {
            $.ajax({
                type: "POST",
                url: "get_clubs.php",
                data: 'regionID=' + val,
                beforeSend: function() {
                    $("#clubs").html('Fetching, Please Wait...');
                },
                success: function(data) {
                    $("#clubs").html(data);
                }
            });
        }

        function getMembers(val) {
            $.ajax({
                type: "POST",
                url: "get_members.php",
                data: 'clubID=' + val,
                beforeSend: function() {
                    $("#members").html('Fetching, Please Wait...');
                },
                success: function(data) {
                    $("#members").html(data);
                }
            });
        }
        </script>

</body>

</html>
<?php } ?>