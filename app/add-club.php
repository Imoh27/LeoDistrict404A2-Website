<?php
session_start();
include_once('includes/alt_config.php');
// include('includes/config.php');
error_reporting(0);
if ($_SESSION['login'] == "" || strlen($_SESSION['login']) == 0) {
    header('location:index');
} else {
    $clubID = intval($_GET['cid']);
    global $con;

    if (isset($_POST['add_club'])) {
        $region = $_POST['region'];
        $clubName = $_POST['clubName'];
        $clubNo = $_POST['clubNo'];
        $sponsorClub = $_POST['sponsorClub'];
        $added_by = $_SESSION['login'];
        $isActive = 1;

        $session_user = "SELECT *  From tblusers WHERE loginID = '$added_by'";
        $sth = $con->query($session_user);
        $result = $sth->fetch(PDO::FETCH_OBJ);
        $added_by = $result->userID;
        // echo $added_by;     exit;

        if ($clubID == '' || empty($clubID)) {

        $select_club = "SELECT * From  tblclubs WHERE regionID = $region AND indexNo = '$clubNo'";
        // echo $select_club;     exit;
        $sth = $con->query($select_club);
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        if (!empty($result)) {
            $error = "Duplicate Data Entry, Club Already Exist! ";
        } else {
            $insert = "INSERT INTO tblclubs VALUES(NULL, $region, '$clubName', '$clubNo', '$sponsorClub', NOW(), $added_by, $isActive)";
            // echo $insert; exit;
            $query = $con->query($insert);
            if ($query == TRUE) {


                $msg = "Region Successfully Added ";

            } else {
                $error = "Something went wrong . Please try again.";
            }
        }
    }else{
        $select_club2 = "SELECT * From  tblclubs";
        $sth = $con->query($select_club2);
        $result2 = $sth->fetch(PDO::FETCH_ASSOC);
        
        $update = "UPDATE tblclubs set regionID  = '$region', clubName = '$clubName', indexNo = '$clubNo', SponsorLions =  '$sponsorClub', dateUpdated = NOW() WHERE clubID  = $clubID";
        //  echo $update; exit;
        $query = $con->query($update);
        if ($query) {
            $msg = "Club details successfully Updated ";
        } else {
            $error = "Something went wrong . Please try again.";
        }
    
    }
    
       
    }


    ?>


    <?php include('includes/pages-head.php'); ?>
    <title>Leo District 404A2 -- Official Website | Add Clubs</title>


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
                                    <h4 class="page-title">Add Club</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li>
                                            <a href="#">Club </a>
                                        </li>
                                        <li class="active">
                                            Add Club
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
                                <form class="form-horizontal" name="add_club" method="post">
                                    <div class="form-group">
                                        <?php
                                        $check_club = "SELECT * FROM tblclubs c JOIN tblregion r ON r.regionID = c.regionID WHERE clubID = $clubID";
                                        // echo $select_query; exit;
                                        $sth = $con->query($check_club);
                                        $chk_club = $sth->fetch(PDO::FETCH_ASSOC);
                                        
                                        $select_query = "SELECT * From tblregion";
                                        // echo $select_query; exit;
                                        $sth = $con->query($select_query);
                                        $result = $sth->fetchAll(PDO::FETCH_ASSOC);

                                        ?>
                                        <label class="col-md-4 control-label">Select Region</label>
                                        <div class="col-md-8">
                                            <select class="form-control" name="region" id="region" required>
                                                <?php 
                                                if (!empty($chk_club) || $chk_club != '') { ?>
                                                <option value="<?php echo htmlentities($chk_club['regionID']); ?>" selected><?php echo htmlentities($chk_club['region']); ?> </option>
                                                <?php
                                                foreach ($result as $region_fetch) {?>
                                                <option value="<?php echo htmlentities($region_fetch['regionID']); ?>"><?php echo htmlentities($region_fetch['region']); ?></option>
                                                
                                                <?php } } else {?>
                                                    <option value="" selected>Select Region </option>
                                                <?php

                                                foreach ($result as $region_fetch) {

                                                    ?>
                                                <option value="<?php echo htmlentities($region_fetch['regionID']); ?>"><?php echo htmlentities($region_fetch['region']); ?></option>
                                                <?php } } ?>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Club Name</label>
                                        <div class="col-md-8">
                                        <?php 
                                                if (!empty($chk_club) || $chk_club != '') { ?>
                                            <input type="text" class="form-control" value="<?php echo htmlentities($chk_club['clubName']); ?>" name="clubName"  required>
                                         <?php } else  {?> 
                                            <input type="text" class="form-control" value="" name="clubName" placeholder="Enter Club name without LEO CLUB" required><?php } ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Club Index No</label>
                                        <div class="col-md-8">
                                        <?php 
                                                if (!empty($chk_club) || $chk_club != '') { ?>
                                            <input type="text" class="form-control" value="<?php echo htmlentities($chk_club['indexNo']); ?>" name="clubNo"  required>
                                         <?php } else  {?> 
                                            <input type="text" class="form-control" value="" name="clubNo" placeholder="Enter Club Index No" required><?php } ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Sponsoring Lions</label>
                                        <div class="col-md-8">
                                        <?php 
                                                if (!empty($chk_club) || $chk_club != '') { ?>
                                            <input type="text" class="form-control" value="<?php echo htmlentities($chk_club['SponsorLions']); ?>" name="sponsorClub"  required>
                                         <?php } else  {?> 
                                            <input type="text" class="form-control" value="" name="sponsorClub" placeholder="Enter Club name without LEO CLUB" required>    <?php } ?>                                    </div>
                                    </div>
                                   
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"></label>
                                        <div class="col-md-9">
                                            <button type="submit" name="add_club"
                                                class=" text-center btn btn-success waves-effect waves-light"></i>&nbsp;
                                                <?php if (!empty($chk_club)) {echo "Update ";}else{?> Add  <?php }?>
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
            jQuery(document).ready(function () {

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