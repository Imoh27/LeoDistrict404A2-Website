<?php
session_start();
// include_once('includes/alt_config.php');
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index');
} else {
    // if ($_GET['action'] == 'del' && $_GET['rid']) {
    //     $id = intval($_GET['rid']);
    //     $sql ="update tblmembers set stat='0' where id='$id'";
    //     $query = mysqli_query($con, $sql);
    //     $msg = "Member Sent to Trash ";
    // }


?>


    <!DOCTYPE html>
    <html lang="en">

    <head>

    <title id="mm">CPLC -- Official Calabar Paradise Lions Club Website | Manage Activity</title>

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
        <script src="assets/js/modernizr.min.js"></script>
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

                    <div style="margin-left:20px; display :Inline"> Filter Activity: </div>
                <select name="filter" id="filterBy" onChange="getmMemId(this.value);" style="margin-left:20px; padding:10px">
                                    <option value="">All</option>
                            <?php
                    // Feching active categories
                    $ret = mysqli_query($con, "select id,member_type from tblmembertype LIMIT 2");
                    while ($result = mysqli_fetch_array($ret)) {
                    ?>
                        <option value="<?php echo htmlentities($result['id']); ?>"><?php echo htmlentities($result['member_type']); ?></option>
                    <?php } ?>
                </select>
                <div class="row">
                    <div class="col-sm-6">

                        <?php if ($msg) { ?>
                            <div class="alert alert-success" role="alert">
                                <strong>Well done!</strong> <?php echo htmlentities($msg); ?>
                            </div>
                        <?php } ?>

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
                                    <a href="add-activity">
                                        <button id="addToTable" class="btn btn-success waves-effect waves-light">Add <i class="mdi mdi-plus-circle-outline"></i></button>
                                    </a>
                                    <a href="">
                                        <button class="btn btn-danger waves-effect waves-light">Refesh Page <i class="mdi mdi-reload"></i></button>
                                    </a>

                                </div>

                                <div class="table-responsive" >
                                    <table class="table m-0 table-colored-bordered table-bordered-primary" id="table_filter">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th> Activity Type</th>
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

                                            $query = mysqli_query($con, "Select a.id,a.activity_title, a.description,a.location,a.start_date,a.end_date, 
                                            s.Subcategory from  tblactivity a JOIN tblsubcategory s ON a.activity_type = s.SubCategoryId ");
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
                                                        $end_date = ($row['end_date'] = '0000-00-00' ? "" :  $end_date)
                                                    ?>

                                                <tr id="showRecord">
                                                    <th scope="row"><?php echo htmlentities($cnt); ?></th>
                                                    <td><?php echo htmlentities($row['Subcategory']); ?></td>
                                                    <td><?php echo htmlentities($row['activity_title']); ?></td>
                                                    <td><?php echo htmlentities(substr(strip_tags($row['description']),0,80)); ?></td>
                                                    <td><?php echo htmlentities($row['location']); ?></td>
                                                    <td><?php echo htmlentities($row['start_date']); ?></td>
                                                    <td><?php echo htmlentities($end_date); ?></td>
                                                    <td><a href="/activity-details?a_id=<?php echo htmlentities($row['id']); ?>"><i class="fa fa-eye" style="color: #000;" title="See Details"></i></a>
                                                        &nbsp; <a href="edit-activity?a_id=<?php echo htmlentities($row['id']); ?>"><i class="fa fa-pencil" style="color: #29b6f6;" title="Edit this Member details"></i></a>
                                                        <!-- &nbsp;<a href="manage-activity?rid=<?php echo htmlentities($row['id']); ?>&&action=del"> <i class="fa fa-trash-o" style="color: #f05050" title="Move This Member to Trash"></i></a> </td> -->
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

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>

    </html>
<?php } ?>