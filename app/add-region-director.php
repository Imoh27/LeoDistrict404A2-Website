<?php
session_start();
include_once('includes/alt_config.php');
// include('includes/config.php');
error_reporting(0);
if ($_SESSION['login'] == "" || strlen($_SESSION['login']) == 0) {
    header('location:index');
} else {
    global $con;
     if (!empty($_GET['rdid'])) {
        $rdID = $_GET['rdid'];
    }
     if (!empty($_GET['action'])) {
        $addARD = $_GET['action'];
        // echo $addARD; exit;
    }
    $lsyQuery = "SELECT *  From tblserviceyr ORDER BY serviceYrID  desc";
    $sth = $con->query($lsyQuery);
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    $currentLSYID = $result['serviceYrID'] ;
    
    $regionID = $_POST['region'];
    // $clubID = $_POST['clubs'];
    $memberID = $_POST['members'];
    $added_by = $_SESSION['login'];
    
    
    $session_user = "SELECT *  From tblusers WHERE loginID = '$added_by'";
    $sth = $con->query($session_user);
    $user_session = $sth->fetch(PDO::FETCH_OBJ);
    $added_by = $user_session->userID;
    
    if (isset($_POST['addRD'])) {
        $isActive = 1;
        $tblRDquery = "SELECT * From  tblregiondirector WHERE regionID = $regionID AND memberID = $memberID";
        // echo $tblRDquery;     exit;
        $sth = $con->query($tblRDquery);
        $rdRECORDS = $sth->fetch(PDO::FETCH_ASSOC);

        $ardMemberID =  0;
            if (!empty($rdRECORDS)) {
                $error = "Duplicate Data Entry, Already Assigned! ";
            } else {
                $insert = "INSERT INTO tblregiondirector VALUES(NULL, $regionID, $memberID, $ardMemberID, $currentLSYID, NOW(), $added_by, $isActive)";
                // echo $insert; exit;
                $query = $con->query($insert);
                if ($query == TRUE) {
    
    
                    $msg = "Region Director Successfully Added ";
    
                } else {
                    $error = "Something went wrong . Please try again.";
                }
            }
        }
        if (isset($_POST['addARD'])) {
            $update = "UPDATE tblregiondirector SET ardMemberID  =  $memberID WHERE regionID = $regionID";
            // echo $update; exit;
            $ardQuery = $con->query($update);
            if ($ardQuery == TRUE) {
    
    
                $msg = "Associate Region Director Successfully Added ";
    
            } else {
                $error = "Something went wrong . Please try again.";
            }
        }

    ?>


<?php include('includes/pages-head.php'); ?>
<title>Leo District 404A2 -- Official Website | Add Clubs</title>
<script>
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
                                <h4 class="page-title">Add Region Director</h4>
                                <ol class="breadcrumb p-0 m-0">
                                    <li>
                                        <a href="#">Admin</a>
                                    </li>
                                    <li>
                                        <a href="#">Region Director </a>
                                    </li>
                                    <li class="active">
                                        Add Region Director
                                    </li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="card-box">

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
                                <form class="form-horizontal" name="addRD" method="post">
                                    <div class="form-group">
                                        <?php
                                            $select = "SELECT * FROM tblregion";
                                            //  echo $select; exit;
                                            $sth = $con->query($select);
                                            $results = $sth->FetchAll(PDO::FETCH_ASSOC);
                                            // echo  $id = $results['id']; exit;
                                            ?>
                                        <label class="col-md-4 control-label" for="region">Select Region</label>
                                        <div class="col-md-8">
                                            <?php 
                                            
                                                $select_region = "SELECT *  From tblregion WHERE regionID = '$regionID'";
                                                //  echo $select_region;     exit;
                                                $sth = $con->query($select_region);
                                                $result = $sth->fetch(PDO::FETCH_OBJ);
                                            ?>
                                            <select class="form-control" name="region" id="region"
                                                onChange="getClubs(this.value);" required>
                                                <option value="" selected>Select Region </option>
                                                <?php
                                                // Feching active categories
                                            

                                                foreach ($results as $regions) {

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
                                            <select class="form-control" name="clubs" id="clubs"
                                                onChange="getMembers(this.value);" required>
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
                                        <label class="col-md-3 control-label"></label>
                                        <div class="col-md-9">
                                            <button type="submit" name="<?php if ($addARD || $addARD != '') {?>addARD<?php }else{?>addRD<?php }?>"
                                                class=" text-center btn btn-success waves-effect waves-light"></i><?php if (!empty($rdID)) {?> Update <?php }else{?> Add <?php } ?>
                                             </button>
                                        </div>
                                    </div>

                                </form>
                            </div>


                        </div>


                        <!-- <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <form class="form-horizontal" name="add-bods" method="post">

                                    <div class="form-group">
                                                <label class="col-md-3 control-label">Enter Service Year</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" value="" name="lsy"
                                                        placeholder="example 2022/2023" required>
                                                </div>
                                            </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">&nbsp;</label>
                                            <div class="col-md-10">

                                                <button type="submit" name="add_bod" class="btn btn-success waves-effect waves-light"><i class="fa fa-plus " style="color: #fff;" title="Edit this Member details"></i>&nbsp; Add Board Member</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div> -->
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
    <script src="assets/js/modernizr.min.js"></script>

    <!-- App js -->
    <script src="assets/js/jquery.core.js"></script>
    <script src="assets/js/jquery.app.js"></script>

    <script>
    jQuery(document).ready(function() {

        $('.summernote').summernote({
            height: 240, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
        });
        // Select2
        $(".select2").select2();

        $(".select2-limiting").select2({
            maximumSelectionLength: 2
        });
    });
    </script>
    <!--Summernote js-->
    <script src="../plugins/summernote/summernote.min.js"></script>


</body>

</html>
<?php } ?>