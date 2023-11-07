<?php
session_start();
// include_once('includes/alt_config.php');
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index');
} else {
    
        if ($_GET['action'] == 'restore' && $_GET['rid']) {
            $id = intval($_GET['rid']);
            $sql ="update tblactivity set isActive=1 where activityID='$id'";
            $query = mysqli_query($con, $sql);
            $msg = "Activity Restores ";
        }
    if ($_GET['action'] == 'del' && $_GET['delid']) {
        $id = intval($_GET['delid']);
        $sql ="DELETE FROM tblactivity where activityID='$id'";
        $query = mysqli_query($con, $sql);
        $msg = "Parmanently Deleted ";
    }


?>


    <!DOCTYPE html>
    <html lang="en">

    <head>

        <?php include('includes/pages-head.php'); ?>
        <!-- Summernote css -->
        <link href="../plugins/summernote/summernote.css" rel="stylesheet" />

        <!-- Select2 -->
        <link href="../plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

        <!-- Jquery filer css -->
        <link href="../plugins/jquery.filer/css/jquery.filer.css" rel="stylesheet" />
        <link href="../plugins/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css" rel="stylesheet" />
        <link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
        <title>Leo District 404A2 -- Admin | Manage Activity</title>
        <!-- App css -->
        <script>
            function getmMemId(val) {
                $.ajax({
                    type: "POST",
                    url: "filter_activity.php",
                    data: 'request=' + val,
                    beforeSend: function() {
                        $("#table_filter").html('Fetching, Please Wait...');
                    },
                    success: function(data) {
                        $("#table_filter").html(data);
                    }
                });
            }
        </script>

    </head>


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

                                    <h4 class="page-title" id="mm">Trashed Activity</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li>
                                            <a href="#">Activity </a>
                                        </li>
                                        <li class="active">
                                            Trashed Activity
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        
                        <div class="row">
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

                                    <!-- Delete Message -->
                                    <?php if ($delmsg) { ?>
                                        <div class="alert alert-danger" role="alert">
                                            <strong>Oh snap!</strong> <?php echo htmlentities($delmsg); ?>
                                        </div>
                                    <?php } ?>


                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="demo-box m-t-20">
                                            <div class="m-b-30">
                                                <a href="manage-activity" title="Back to anage activity" class="btn btn-sm btn-primary"><i class="mdi mdi-keyboard-backspace"></i></a>
                                            </div>

                                            <div class="table-responsive">
                                                <table class="table m-0 table-colored-bordered table-bordered-primary" id="table_filter">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th> Category</th>
                                                            <th>Title</th>
                                                            <th>Description</th>
                                                            <th>location</th>
                                                            <th>Start Date</th>
                                                            <th>End Date</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php

                                                        $query = mysqli_query($con, "Select * from  tblactivity a JOIN tblcategory c ON a.activityCatID  = c.postCatID WHERE a.isActive = 0");
                                                        $cnt = 1;
                                                        $rowcount = mysqli_num_rows($query);
                                                        if ($rowcount == 0) {
                                                        ?>
                                                            <tr>

                                                                <td colspan="7" align="center">
                                                                    <h3 style="color:red">No record found</h3>
                                                                </td>
                                                            <tr>
                                                                <?php
                                                            } else {
                                                                while ($row = mysqli_fetch_array($query)) {
                                                                    // $end_date = ($row['endDate'] = '0000-00-00' ? "" :  date('d-m-Y', strtotime($end_date)));
                                                                ?>

                                                            <tr id="showRecord">
                                                                <th scope="row"><?php echo htmlentities($cnt); ?></th>
                                                                <td><?php echo htmlentities($row['postCategory']); ?></td>
                                                                <td><?php echo htmlentities($row['title']); ?></td>
                                                                <td width="250"><?php echo htmlentities(substr(strip_tags($row['activityDesc']), 0, 80)); ?></td>
                                                                <td width="150"><?php echo htmlentities($row['activityLocation']); ?></td>
                                                                <td><?php echo htmlentities(date('d-m-Y', strtotime($row['startDate']))); ?></td>
                                                                <td><?php echo htmlentities(date('Y-m-d', strtotime($row['endDate']))); ?></td>
                                                                <!-- <td><?php echo htmlentities($row['endDate']); ?></td> -->
                                                                <td>
                                                                    &nbsp; <a href="?rid=<?php echo htmlentities($row['activityID']); ?>&&action=restore" title="Restore this activity" onclick="return confirm('Restore this activity');"><i class="mdi mdi-backup-restore"></i></a>
                                                                    &nbsp;<a href="manage-activity?delid=<?php echo htmlentities($row['activityID']); ?>&&action=del" onclick="return confirm('Sure you want to delete parmanently')"> <i class="fa fa-trash-o" style="color: #f05050" title="Move This Member to Trash"></i></a> </td>
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
                                <!--- end row -->



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


    </body>


    </html>
<?php } ?>