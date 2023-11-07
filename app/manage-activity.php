<?php
session_start();
// include_once('includes/alt_config.php');
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index');
} else {

    if (isset($_POST['add_activity'])) {
        global $con;
        $category = $_POST['category'];
        $activity_title =  strtolower($_POST['activity_title']);
        $hierarchi =  $_POST['hierarchi'];
        $region_name =  ($_POST['region_name']) ? $_POST['region_name'] : "";
        $club_name =  ($_POST['club_name']) ? $_POST['club_name'] : "";
        $location =  $_POST['location'];
        $start_date =  $_POST['start_date'];
        $to_date =  $_POST['to_date'];
        $activity_details =   str_replace(array(
            '\'', '"',
            ';', '*'
        ), ' ', $_POST['activity_details']);
        $imgfile =  strtolower($_FILES['activity_image']['name']);
        // echo $club_name;  exit;

        // get the image extension
        $extension = substr($imgfile, strlen($imgfile) - 4, strlen($imgfile));
        // allowed extensions
        $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");
        // Validation for allowed extensions .in_array() function searches an array for a specific value.
        if (!in_array($extension, $allowed_extensions)) {
            echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
        } else {
            //rename the image file
            $imgnewfile = md5($imgfile) .'.'. $extension;
            // Code for move image into directory
            move_uploaded_file($_FILES["activity_image"]["tmp_name"], "activityimages/" . $imgnewfile);

            $status = 1;
            $sql = "SELECT * FROM tblactivity WHERE title = '$activity_title' AND activityCatID = $category";
            // echo $sql; exit;
            $sth = mysqli_query($con, $sql);
            if (mysqli_num_rows($sth) > 0) {
                $error = "Something went wrong . Please try again.";
            } else {
                $sql = "INSERT INTO tblactivity VALUES(NULL,  $category, '$activity_title', ' $activity_details', '$location', $hierarchi,  '$club_name', '$region_name', '$start_date', '$to_date',   '$imgnewfile', NOW(), $status)";
                // echo $sql; exit;
                $query = mysqli_query($con, $sql);
                if ($query) {
                    $msg = "Activity successfully added ";
                } else {
                    $error = "Something went wrong . Please try again.";
                }
            }
        }
    }
    if ($_GET['action'] == 'del' && $_GET['id']) {
        $id = intval($_GET['id']);
        $sql = "update tblactivity set isActive='0' where activityID='$id'";
        $query = mysqli_query($con, $sql);
        $msg = "Activity Sent to Trash ";
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
        <title>Leo District 404A2 -- Official Website | Manage Activity</title>
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
        <style>
            .hide {
                display: none;
            }

            .show {
                display: block;
            }

            /* .name_show {
                display: block;
            } */
        </style>


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

                                    <h4 class="page-title" id="mm">Manage Activity</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li>
                                            <a href="#">Activity </a>
                                        </li>
                                        <li class="active">
                                            Manage Activity
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
                                                <button id="addToTable" type="button" class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#activityModal">Add <i class="mdi mdi-plus-circle-outline"></i></button>

                                                <a href="trashed-activity" title="Goto Trash">
                                                    Goto Trash <i class="mdi mdi-delete-sweep"></i>
                                                </a>

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

                                                        $query = mysqli_query($con, "Select * from  tblactivity a JOIN tblcategory c ON a.activityCatID  = c.postCatID Where a.isActive=1");
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
                                                                <td><?php echo htmlentities(substr(strip_tags($row['activityDesc']), 0, 80)); ?></td>
                                                                <td><?php echo htmlentities($row['activityLocation']); ?></td>
                                                                <td><?php echo htmlentities(date('d-m-Y', strtotime($row['startDate']))); ?></td>
                                                                <td><?php echo htmlentities(date('Y-m-d', strtotime($row['endDate']))); ?></td>
                                                                <!-- <td><?php echo htmlentities($row['endDate']); ?></td> -->
                                                                <td>
                                                                    &nbsp; <a href="edit-centre?edit-activity=<?php echo htmlentities($row['activityID']); ?>"><i class="fa fa-pencil" style="color: #29b6f6;" title="Edit this Member details"></i></a>
                                                                    &nbsp;<a href="manage-activity?id=<?php echo htmlentities($row['activityID']); ?>&&action=del" onclick="return confirm('Do you reaaly want to delete ?')">
                                                                        <i class="fa fa-trash-o" style="color: #f05050" title="Move This activity to Trash"></i></a> </td>
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

                <!-- Modal -->
                <div class="modal fade" id="activityModal" tabindex="-1" role="dialog" aria-labelledby="activityModalTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title text-primary" id="exampleModalLongTitle">Add Activity</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form name="addActivity" id="addActivity" method="post" enctype="multipart/form-data">

                                    <div class="col-md-6">
                                        <div class="form-group m-b-20">
                                            <label for="category">Activity Type</label>
                                            <select class="form-control" name="category" id="category">
                                                <option value="">Select Category </option>
                                                <?php
                                                // Feching active categories
                                                $ret = "SELECT postCatID, postCategory from  tblcategory where isActive=1";
                                                $sth = mysqli_query($con, $ret);
                                                while ($result = mysqli_fetch_array($sth)) {
                                                ?>
                                                    <option value="<?php echo htmlentities($result['postCatID']); ?>"><?php echo htmlentities($result['postCategory']); ?></option>
                                                <?php } ?>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group m-b-20">
                                            <label>Hierarchy</label>
                                            <select class="form-control" name="hierarchi" id="hierarchi" onchange="showFields(this.value)">
                                                <option value=""> Select </option>
                                                <option value="0">District Activity </option>
                                                <option value="1">Region Activity</option>
                                                <option value="2">Club Activity</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12 region hide">
                                        <div class=" form-group m-b-20">
                                            <label for="region">Region Name</label>
                                            <input type="text" class="form-control" id="region_name" name="region_name" placeholder="Enter title" maxlength="50">
                                        </div>
                                    </div>
                                    <div class="col-md-12 club hide">
                                        <div class=" form-group m-b-20">
                                            <label for="club">Club Name</label>
                                            <input type="text" class="form-control" id="club_name" name="club_name" placeholder="Enter title" maxlength="50">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group m-b-20">
                                            <label for="activity_title">Activity Title</label>
                                            <input type="text" class="form-control" id="activity_title" name="activity_title" placeholder="Enter title" required maxlength="50">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group m-b-20">
                                            <label for="exampleInputEmail1">Location</label>
                                            <input type="text" class="form-control" id="location" name="location" placeholder="Enter address" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group m-b-20">
                                            <label for="start_date">From</label>
                                            <input type="date" class="form-control" id="start_date" name="start_date" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group m-b-20">
                                            <label for="to_date">To</label>
                                            <input type="date" class="form-control" id="to_date" name="to_date">
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card-box">
                                                <h4 class="m-b-30 m-t-0 header-title"><b>Activity Details</b></h4>
                                                <textarea class="summernote" name="activity_details"></textarea>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card-box">
                                                <h4 class="m-b-30 m-t-0 header-title"><b>Feature Image</b></h4>
                                                <input type="file" class="form-control" id="activity_image" name="activity_image" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" name="add_activity" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
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
    <script>
        function showFields() {
            let output = $("#hierarchi").val();
            // console.log(output);
            if (output == 1) {
                // $("#region_name").removeAttr("style").hide();
                $(".region").addClass("show");
                $(".club").removeClass("show");
            } else if (output == 2) {
                $(".club").addClass("show");
                $(".region").removeClass("show");
            } else {
                $(".club").removeClass("show");
                $(".region").removeClass("show");
            }
        }
    </script>

    </html>
<?php } ?>