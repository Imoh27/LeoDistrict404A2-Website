<?php
session_start();
include('includes/alt_config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index');
} else {


    // $curr_date = date('Y-m-d');
    $month = date('m', strtotime(date('Y-m-d')));
    $day = date('d', strtotime(date('Y-m-d')));
    // echo $day; exit;

    $sql1 = "SELECT MONTH(end_date) as end_month, DAY(end_date) as end_day FROM tblactivity";
    $sth = $con->query($sql1);
    $resultsss = $sth->fetchAll(PDO::FETCH_ASSOC);
    foreach ($resultsss as $status_check) {
        // echo "DB MONTH IS ".$status_check['end_day']."WHILE CURR MONT IS ".$day; exit;
            if ($status_check['end_month'] <= $month && $status_check['end_day'] < $day) {
                $update_status = "UPDATE tblactivity SET status =  0";
                // echo $update_status; exit;
                $con->query($update_status);
            }
    }

    // echo $curr_date; exit;
    $active = $_SESSION['login'];
    // For adding post  
    if (isset($_POST['submit_activity'])) {
        $activity_subcatid = $_POST['subcategory'];
        $member_wing = $_POST['member_wing'];
        $activity_details = strip_tags($_POST['activity_details']);
        $activity_title = strip_tags($_POST['activity_title']);
        $location = strip_tags($_POST['location']);
        $start_date = strip_tags($_POST['start_date']);
        $to_date = strip_tags($_POST['to_date']);
        $to_date = ($to_date != "") ? $to_date : $start_date;
        $imgfile = $_FILES["activity_image"]["name"];
        $imgsize = $_FILES["activity_image"]["size"];
        $status = 1;
        // get the image extension
        $extension = substr($imgfile, strlen($imgfile) - 4, strlen($imgfile));
        // allowed extensions
        $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");
        // Validation for allowed extensions .in_array() function searches an array for a specific value.
        if (!in_array($extension, $allowed_extensions)) {
            echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
            if ($imgsize > 2000000) {
                echo "<script>alert('OOP!. Max File Size of 2mb Exceeded');</script>";
            }
        } else {
            //rename the image file
            $imgnewfile = '_CPLC-activity_' . $imgfile;
            // Code for move image into directory
            move_uploaded_file($_FILES["activity_image"]["tmp_name"], "activity-upload/" . $imgnewfile);
            $select = "SELECT * FROM tblactivity WHERE activity_type = $activity_subcatid AND member_type = $member_wing";
            $sth = $con->query($select);
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
            if (!empty($result)) {
                $error = "Something went wrong . Entry already exists.";
            } else {

                $sql = "INSERT INTO tblactivity values(Null, $activity_subcatid, $member_wing,'" . $activity_title . "','" . $activity_details . "',
                '$imgnewfile','$location','$start_date','$to_date','$active',NOW(), NOW(), $status)";
                // echo $sql;
                // exit;
                $query = $con->query($sql);

                if ($query) {
                    $msg = "Activity successfully added ";
                } else {
                    $error = "Something went wrong . Please try again.";
                }
            }
            // }
        }
    }
    include('includes/admin-head.php');
?>
    <title>CPLC -- Official Calabar Paradise Lions Club Website | Add Activity</title>


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
                                    <h4 class="page-title">Add Activity </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Activity</a>
                                        </li>

                                        <li class="active">
                                            Add Activity
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-sm-6">
                                <!---Success Message--->
                                <?php if ($msg) { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>Well done!</strong> <?php echo htmlentities($msg); ?>
                                    </div>
                                <?php } ?>

                                <!---Error Message--->
                                <?php if ($error) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                    </div>
                                <?php } ?>


                            </div>
                        </div>


                        <div class="row">
                            <div class="p-6">
                                <div class="">
                                    <form name="addpost" method="post" enctype="multipart/form-data">
                                        <div class="col-md-5 ">
                                            <div class="form-group m-b-20">
                                                <label for="member_wing">Membership Wing</label>
                                                <select class="form-control" name="member_wing" id="member_wing" onChange="getSubCat(this.value);" required>
                                                    <option value="">Select Wing </option>
                                                    <?php
                                                    // Feching active categories
                                                    $ret = "Select * from   tblmembertype";
                                                    $sth = $con->query($ret);
                                                    $results = $sth->fetchAll(PDO::FETCH_ASSOC);
                                                    foreach ($results as $result) {
                                                    ?>
                                                        <option value="<?php echo htmlentities($result['id']); ?>"><?php echo htmlentities($result['member_type']); ?></option>
                                                    <?php } ?>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-md-offset-1">
                                            <div class="form-group m-b-20">
                                                <label for="exampleInputEmail1">Activity Type</label>
                                                <select class="form-control" name="category" id="category" onChange="getSubCat(this.value);">
                                                    <option value="">Select Category </option>
                                                    <?php
                                                    // Feching active categories
                                                    $ret = "select id,CategoryName from  tblcategory where Is_Active=1";
                                                    $sth = $con->query($ret);
                                                    $results = $sth->fetchAll(PDO::FETCH_ASSOC);
                                                    foreach ($results as $result) {
                                                    ?>
                                                        <option value="<?php echo htmlentities($result['id']); ?>"><?php echo htmlentities($result['CategoryName']); ?></option>
                                                    <?php } ?>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-md-offset-1">
                                            <div class="form-group m-b-20">
                                                <label for="subcategory">Sub Category</label>
                                                <select class="form-control" name="subcategory" id="subcategory" required>

                                                </select>
                                            </div>

                                        </div>

                                        <div class="col-md-6 col-md-offset-1">
                                            <div class="form-group m-b-20">
                                                <label for="activity_title">Activity Title</label>
                                                <input type="text" class="form-control" id="activity_title" name="activity_title" placeholder="Enter title" required maxlength="50">
                                            </div>
                                        </div>

                                        <div class="col-md-10 col-md-offset-1">
                                            <div class="form-group m-b-20">
                                                <label for="exampleInputEmail1">Location</label>
                                                <input type="text" class="form-control" id="location" name="location" placeholder="Enter address" required>
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-md-offset-1">
                                            <div class="form-group m-b-20">
                                                <label for="start_date">From</label>
                                                <input type="date" class="form-control" id="start_date" name="start_date" required>
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-md-offset-1">
                                            <div class="form-group m-b-20">
                                                <label for="to_date">To</label>
                                                <input type="date" class="form-control" id="to_date" name="to_date">
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card-box">
                                                    <h4 class="m-b-30 m-t-0 header-title"><b>Activity Details</b></h4>
                                                    <textarea class="summernote" name="activity_details" required></textarea>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card-box">
                                                    <h4 class="m-b-30 m-t-0 header-title"><b>Feature Image</b></h4>
                                                    <input type="file" class="form-control" id="activity_image" name="activity_image">
                                                </div>
                                            </div>
                                        </div>


                                        <button type="submit" name="submit_activity" class="btn btn-success waves-effect waves-light">Add Activity</button>
                                        <button type="button" class="btn btn-danger waves-effect waves-light">Discard</button>
                                    </form>
                                </div>
                            </div> <!-- end p-20 -->
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->



                </div> <!-- container -->

            </div> <!-- content -->

            <?php include('includes/footer.php'); ?>

        </div>


        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->


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

        <!--Summernote js-->
        <script src="../plugins/summernote/summernote.min.js"></script>
        <!-- Select 2 -->
        <script src="../plugins/select2/js/select2.min.js"></script>
        <!-- Jquery filer js -->
        <script src="../plugins/jquery.filer/js/jquery.filer.min.js"></script>

        <!-- page specific js -->
        <script src="assets/pages/jquery.blog-add.init.js"></script>

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
        <script src="../plugins/switchery/switchery.min.js"></script>

        <!--Summernote js-->
        <script src="../plugins/summernote/summernote.min.js"></script>




    </body>

    </html>
<?php } ?>