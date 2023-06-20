<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index');
} else {
    if ($_GET['action'] == 'del' && $_GET['rid']) {
        $id = intval($_GET['rid']);
        $query = mysqli_query($con, "update tblbod set Stat='0' where id='$id'");
        $msg = "BOD Member deleted ";
    }

    $session = $_SESSION['login'];
    $isActive = 1;
    $lsyQuery = "SELECT *  From tblserviceyr ORDER BY serviceYrID  desc";
    $query = mysqli_query($con, $lsyQuery);
    $result = mysqli_fetch_assoc($query);
    $currentLSYID = $result['serviceYrID'];

    if (isset($_POST['addPosition'])) {
        $position = $_POST['position'];
        $fetchPosition = "SELECT *  From tbldistrictoffices WHERE  position = '$position'";
        $query = mysqli_query($con, $fetchPosition);
        $result = mysqli_fetch_assoc($query);
        if (!empty($result)) {
            $error = "Postion Exist";
        }else {
            $insert = "INSERT INTO tbldistrictoffices VALUES(NULL, ' $position', NOW(), $session, $isActive)";
            $query = $con->query($insert);
            if ($query) {
                $msg = "Position entered";
            }

        }
    }

    ?>
<!DOCTYPE html>
<html lang="en">
<?php include('includes/pages-head.php'); ?>
<title>Leo District 404A2 -- Official Website | District Offices</title>



<script>
function getBods(val) {
    $.ajax({
        type: "POST",
        url: "fetch-bod.php",
        data: 'bods=' + val,
        beforeSend: function() {
            $("#table_filter").html('Fetching, Please Wait...');
        },
        success: function(data) {
            $("#table_filter").html(data);
        }
    });
}
document.getElementById("addToTable").onclick = function() {
    addPositionForm()
};

function addPositionForm() {
    document.getElementById('addPosition').style.display = "block"
    // document.getElementById('partner_form').style.display = "none"
}
</script>

<style>
.positionCtrl {
    display: none;
}

/* .interest_form {
                display: block;
            } */
</style>

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
                                <h4 class="page-title">Manage Office</h4>
                                <ol class="breadcrumb p-0 m-0">
                                    <li>
                                        <a href="#">Admin</a>
                                    </li>
                                    <li>
                                        <a href="#">District </a>
                                    </li>
                                    <li class="active">
                                        Offices
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
                            <div class="col-md-12">
                                <div class="demo-box m-t-20">
                                    <div class="col-md-6 col-sm-12 col-md-offset-2" style="margin-bottom: 50px">
                                        <p class=" text-uppercase font-600 font-secondary text-overflow"><a>District
                                                Offices</a>

                                            <button id="addToTable" class=" btn btn-success waves-effect waves-light"
                                                style="float: right" title="Add position"
                                                onclick="addPositionForm();">Add
                                                <i class="mdi mdi-plus-circle-outline"></i></button>

                                        </p>
                                        <div class="table-responsive table-wrapper-scroll-y custom-table-scrollbar">
                                            <table
                                                class="table m-0 table-colored-bordered table-bordered-primary table-striped"
                                                id="table_filter">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th> positions</th>
                                                        <th style="text-align:center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $select_query = "Select * from  tbldistrictoffices";
                                                        // echo $select_query; exit;
                                                        $query = mysqli_query($con, $select_query);
                                                        $rowcount = mysqli_num_rows($query);
                                                        $cnt = 1;

                                                        if ($rowcount == 0) { ?>
                                                    <tr>

                                                        <td colspan="7" align="center">
                                                            <h3 style="color:red">No entry yet</h3>
                                                        </td>
                                                    <tr>
                                                        <?php } else {
                                                            while ($row = mysqli_fetch_array($query)) {
                                                                ?>

                                                    <tr>
                                                        <th scope="row">
                                                            <?php echo htmlentities($cnt); ?>
                                                        </th>
                                                        <td>
                                                            <?php echo htmlentities($row['position']); ?>
                                                        </td>
                                                        <td style="text-align:center">
                                                            <a
                                                                href="add-position?rid=<?php echo htmlentities($row['regionID']); ?>"><i
                                                                    class="fa fa-pencil"
                                                                    style="color: #29b6f6;"></i>&nbsp; </a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                                $cnt++;
                                                            }
                                                        } ?>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="positionCtrl col-md-12 " id="addPosition" style="margin-top: -150px !important">
                                <div class="col-md-6 col-md-offset-2">
                                    <p class="text-uppercase font-600 font-secondary text-center"><a>Add Position</a>

                                    </p>
                                    <form class="form-horizontal" name="position" method="post">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Enter Position</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" value="" name="position" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">&nbsp;</label>
                                            <div class="col-md-10">

                                                <button type="submit"
                                                    class="btn btn-custom waves-effect waves-light btn-md"
                                                    name="addPosition">
                                                    Submit
                                                </button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
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

</body>

</html>
<?php } ?>