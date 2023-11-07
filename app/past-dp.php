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

    $lsyQuery = "SELECT *  From tblserviceyr ORDER BY serviceYrID  desc";
    $query = mysqli_query($con, $lsyQuery);
    $result = mysqli_fetch_assoc($query);
    $currentLSYID = $result['serviceYrID'];

    $isActive = 1;

    if (isset($_POST['addpdp'])) {
        $pdpName = $_POST['pdpName'];
        $clubs = $_POST['clubs'];
        $lsy = $_POST['lsy'];
        $theme = $_POST['theme'];
        $imgfile = strtolower($_FILES["pdpPhoto"]["name"]);

        // get the image extension
        $extension = substr($imgfile, strlen($imgfile) - 4, strlen($imgfile));
        // allowed extensions
        $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");
        // Validation for allowed extensions .in_array() function searches an array for a specific value.
        if (!in_array($extension, $allowed_extensions)) {
            $error = "Invalid format. Only jpg / jpeg/ png /gif format allowed";
            // echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
        } else {
            //rename the image file
            $imgnewfile = md5($imgfile) .'.'. $extension;

            $fetch = "SELECT *  From tblpdp WHERE  fullName like '%$pdpName%' OR serviceYR  = '$lsy'";
            // echo $fetch; exit;
            $query = mysqli_query($con, $fetch);
            $result = mysqli_fetch_assoc($query);
            if (!empty($result)) {
                $delmsg = "Duplicate Entry! Already Exists";
            } else {
                // Code for move image into directory
                move_uploaded_file($_FILES["pdpPhoto"]["tmp_name"], "pdp_photos/". $imgnewfile);
                $insert = "INSERT INTO tblpdp VALUES(NULL,'$pdpName', $clubs, '$theme', '$lsy', '$imgnewfile', NOW(), $session)";
                // echo $insert; exit;
                $query = $con->query($insert);
                if ($query) {
                    $msg = "Successfully Added";
                } else {
                    $delmsg = "Error Encountered!, Try again";
                }
            }
        }
    }
    if ($_GET['delpdpid']) {
        $pdpID = $_GET['delpdpid'];
        $delete = "DELETE FROM tblpdp WHERE pdpID =  $pdpID";
        $query = $con->query($delete);
        if ($query) {
            // echo ('Location: ');
            $msg = "Successfully Deleted";
        } else {
            $delmsg = "Error Encountered!, Try again";
        }
    }

?>

    <!DOCTYPE html>
    <html lang="en">
    <?php include('includes/pages-head.php'); ?>
    <title>Leo District 404A2 -- Admin | Past District Presidents</title>



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

                        <?php
                        $lsyQuery = "SELECT *  From tblserviceyr ORDER BY serviceYrID  desc";
                        $query = mysqli_query($con, $lsyQuery);
                        $result = mysqli_fetch_assoc($query);
                        $currentLSYID = $result['serviceYr'];
                        ?>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">DP'd Team (
                                        <?php echo $currentLSYID; ?>)
                                    </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a>Admin</a>
                                        </li>
                                        <li>
                                            <a>District </a>
                                        </li>
                                        <li class="active">
                                            Past District Presidents
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
                                            <p class=" text-uppercase font-600 font-secondary text-overflow"><a>Past District
                                                    Presidents
                                                </a>

                                                <button id="addToTable" class=" btn btn-success waves-effect waves-light" style="float: right" title="Add position" onclick="addPositionForm();">Add
                                                    <i class="mdi mdi-plus-circle-outline"></i></button>

                                            </p>
                                            <div class="table-responsive table-wrapper-scroll-y custom-table-scrollbar">
                                                <table class="table m-0 table-colored-bordered table-bordered-primary table-striped" id="table_filter">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th> Name</th>
                                                            <th> Club</th>
                                                            <th> Service Year</th>
                                                            <th> Service Slogan</th>
                                                            <th style="text-align:center">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $select_query = "SELECT * from  tblpdp p JOIN tblclubs c ON c.clubID = p.clubID";
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
                                                                    <?php echo htmlentities($row['fullName']); ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo htmlentities($row['clubName']); ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo htmlentities($row['serviceYR']); ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo htmlentities($row['servicetheme']); ?>
                                                                </td>
                                                                <td style="text-align:center">
                                                                    <a href="edit-centre?pdpid=<?php echo htmlentities($row['pdpID']); ?>"><i class="fa fa-pencil" style="color: #29b6f6;" title="Edit this Member details"></i></a>
                                                                    &nbsp;
                                                                    <a href="?delpdpid=<?php echo htmlentities($row['pdpID']); ?>"><i class="fa fa-trash-o" style="color: #f05050;"></i>&nbsp; </a>
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
                            </div>
                            <!--- end row -->

                            <!-- Start Add team -->
                            <div class=" col-md-12 " id="addPosition" style="display:none !important">
                                <div class="col-md-6 col-md-offset-2">
                                    <p class="text-uppercase font-600 font-secondary text-center"><a>Add PDP</a>

                                    </p>
                                    <form class="form-horizontal" method="POST" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Full Name </label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" value="" name="pdpName" require>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <?php
                                            $select = "SELECT * FROM tblregion";
                                            //  echo $select; exit;
                                            $query = mysqli_query($con, $select);
                                            // echo  $id = $results['id']; exit;
                                            ?>
                                            <label class="col-md-4 control-label" for="region">Select Region</label>
                                            <div class="col-md-8">
                                                <select class="form-control" name="region" id="region" onChange="getClubs(this.value);" required>
                                                    <option value="" selected>Select Region </option>
                                                    <?php
                                                    // Feching active categories


                                                    while ($row = mysqli_fetch_array($query)) {

                                                        // $ret = mysqli_query($con, "select id,regions from  tblmembertype where Stat=1");
                                                        // while ($result = mysqli_fetch_array($ret)) {
                                                    ?>
                                                        <option value="<?php echo htmlentities($row['regionID']); ?>">
                                                            Region <?php echo htmlentities($row['region']); ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="club">Select Clubs</label>
                                            <div class="col-md-8">
                                                <select class="form-control" name="clubs" id="clubs" onChange="getMembers(this.value);" required>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Service Year </label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" Placeholder="2023/2024" name="lsy">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Theme </label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" Placeholder="" name="theme">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Feature Image </label>
                                            <div class="col-md-8">
                                                <input type="file" class="form-control" id="pdpPhoto" name="pdpPhoto" required>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-md-4 control-label">&nbsp;</label>
                                            <div class="col-md-8 text-center">

                                                <button type="submit" class="btn btn-custom waves-effect waves-light btn-md" name="addpdp">
                                                    Submit
                                                </button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                            <!-- End Add Team -->






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