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

    if (isset($_POST['addCoreOfficer'])) {
        $member = $_POST['members'];
        $position = $_POST['positions'];
        // echo $position; exit;
        $fetchPosition = "SELECT *  From tblcoreofficers WHERE  memberID like '%$member%' OR dOfficesID  = '$position'";
        // echo $fetchPosition; exit;
        $query = mysqli_query($con, $fetchPosition);
        $result = mysqli_fetch_assoc($query);
        if (!empty($result)) {
            $delmsg = "Duplicate Entry! Already Exists";
        } else {
            $insert = "INSERT INTO tblcoreofficers VALUES(NULL,$position, $member,  $currentLSYID, NOW(), $session,  $isActive)";
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
if ($_GET['delcoid']) {
    $coID = $_GET['delcoid'];
    $elete = "DELETE FROM tblcoreofficers WHERE coreofficersID  =  $coID";
    $query = $con->query($elete);
    if ($query) {
        $msg = "Successfully Deleted";
    } else {
        $delmsg = "Error Encountered!, Try again";
    }
}

?>

<?php include('includes/pages-head.php'); ?>
<title>Leo District 404A2 -- Admin | District Core Officers</title>



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
                                <h5 class="page-title">District Core Offices (
                                    <?php echo $currentLSYID; ?>)
                                </h5>
                                <ol class="breadcrumb p-0 m-0">
                                    <li>
                                        <a href="#">Admin</a>
                                    </li>
                                    <li>
                                        <a href="#">District </a>
                                    </li>
                                    <li class="active">
                                        Core Officers
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
                                                Core Officers</a>

                                            <button id="addToTable" class=" btn btn-success waves-effect waves-light" style="float: right" title="Add position" onclick="addPositionForm();">Add
                                                <i class="mdi mdi-plus-circle-outline"></i></button>

                                        </p>
                                        <div class="table-responsive table-wrapper-scroll-y custom-table-scrollbar">
                                            <table class="table m-0 table-colored-bordered table-bordered-primary table-striped" id="table_filter">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th> Name</th>
                                                        <th> Position</th>
                                                        <th style="text-align:center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $select_query = "SELECT * from  tblcoreofficers c JOIN tbldistrictoffices o ON o.dOfficesID = c.dOfficesID
                                                         JOIN tblserviceyr s ON s.serviceYrID  = c.serviceYrID  JOIN tblmembers m ON m.memberID  = c.memberID ";
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
                                                                <?php echo htmlentities($row['firstName'] . ' ' . $row['lastName']); ?>
                                                            </td>
                                                            <td>
                                                                <?php echo htmlentities($row['position']); ?>
                                                            </td>
                                                            <td style="text-align:center">
                                                                <a href="edit-centre?coid=<?php echo htmlentities($row['coreofficersID']); ?>"><i class="fa fa-pencil" style="color: #29b6f6;" title="Edit this Member details"></i></a>
                                                                &nbsp;
                                                                <a href="?delcoid=<?php echo htmlentities($row['coreofficersID']); ?>"><i class="fa fa-trash-o" style="color: #f05050;" onclick="return confirm('Do you really want to delete ?')"></i>&nbsp; </a>
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
                        <div class=" col-md-12 " id="addPosition" style="display:none !important; ">
                            <div class="col-md-6 col-md-offset-2">
                                <p class="text-uppercase font-600 font-secondary text-center"><a>Add COre Officer</a>

                                </p>
                                <form class="form-horizontal" method="POST" name="dpteam" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <?php
                                        $select = "SELECT * FROM tbldistrictoffices";
                                        $query = mysqli_query($con, $select);
                                        ?>
                                        <label class="col-md-4 control-label" for="position">Select Position</label>
                                        <div class="col-md-8">
                                            <select class="form-control" name="positions" id="position" required>
                                                <option value="" selected>Select Position </option>
                                                <?php
                                                // Feching active categories
                                                while ($row = mysqli_fetch_array($query)) {
                                                ?>
                                                    <option value="<?php echo htmlentities($row['dOfficesID']); ?>">
                                                        <?php echo htmlentities($row['position']); ?></option>
                                                <?php } ?>
                                            </select>
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


                                                while ($regions = mysqli_fetch_array($query)) {

                                                    // $ret = mysqli_query($con, "select id,regions from  tblmembertype where Stat=1");
                                                    // while ($result = mysqli_fetch_array($ret)) {
                                                ?>
                                                    <option value="<?php echo htmlentities($regions['regionID']); ?>">
                                                        Region <?php echo htmlentities($regions['region']); ?></option>
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
                                        <label class="col-md-4 control-label" for="members">Select Leo</label>
                                        <div class="col-md-8">
                                            <select class="form-control" name="members" id="members" required>
                                            </select>
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label class="col-md-4 control-label">&nbsp;</label>
                                        <div class="col-md-8 text-center">

                                            <button type="submit" class="btn btn-custom waves-effect waves-light btn-md" name="addCoreOfficer">
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