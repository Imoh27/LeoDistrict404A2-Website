<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index');
} else {
    $session = $_SESSION['login'];
    $lsyQuery = "SELECT *  From tblserviceyr ORDER BY serviceYrID  desc";
    $query = mysqli_query($con, $lsyQuery);
    $result = mysqli_fetch_assoc($query);
    $currentLSYID = $result['serviceYrID'];
    ?>
<?php include('includes/pages-head.php'); ?>
<title>Leo District 404A2 -- Official Website | Dashboard</title>


<body class="fixed-left">

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <div class="topbar">

            <!-- LOGO -->
            <div class="topbar-left">
                <!-- <a href="index.html" class="logo"><span>Admin</span></span><i class="mdi mdi-layers"></i></a> -->

            </div>

            <!-- Button mobile view to collapse sidebar menu -->
            <?php include('includes/topheader.php'); ?>
        </div>
        <!-- Top Bar End -->


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
                                <h4 class="page-title">Dashboard</h4>
                                <ol class="breadcrumb p-0 m-0">
                                    <li>
                                        <a href="#">Leo District 404A2</a>
                                    </li>
                                    <li>
                                        <a href="#">Admin</a>
                                    </li>
                                    <li class="active">
                                        Dashboard
                                    </li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 text-center">

                            <?php
                                $query = mysqli_query($con, "select * from tblregion");
                                $countregion = mysqli_num_rows($query);

                                $query = mysqli_query($con, "select * from tblmembers");
                                $countmembers = mysqli_num_rows($query);

                                $query = mysqli_query($con, "select * from tblclubs");
                                $countclubs = mysqli_num_rows($query);


                                $dataPoints = array(
                                    array("label" => " Regions", "y" => $countregion),
                                    // array("label" => "Activities and Entertainments", "y" => 261),
                                    // array("label" => "Health and Fitness", "y" => 158),
                                    // array("label" => "Shopping & Misc", "y" => 72),
                                    // array("label" => "Transportation", "y" => 191),
                                    array("label" => " Members", "y" => $countmembers),
                                    array("label" => " Clubs", "y" => $countclubs)
                                );

                                ?>
                            <!DOCTYPE HTML>

                            <script>
                            window.onload = function() {
                                var chart = new CanvasJS.Chart("chartContainer", {
                                    animationEnabled: true,
                                    exportEnabled: true,
                                    title: {
                                        text: "General Statistics"
                                    },
                                    subtitles: [{
                                        text: "for 2023/2024 Lions Service Year"
                                    }],
                                    data: [{
                                        type: "pie",
                                        showInLegend: "true",
                                        legendText: "{label}",
                                        indexLabelFontSize: 16,
                                        indexLabel: "{label} - #percent%",
                                        yValueFormatString: "##0",
                                        dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                                    }]
                                });
                                chart.render();

                            }
                            </script>


                            <div id="chartContainer" style="height: 400px; width: 100%;"></div>
                        </div>


                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="card-box widget-box-one">
                                <i class="mdi mdi-layers widget-one-icon"></i>
                                <div class="wigdet-one-content">
                                    <p class="m-0 text-uppercase font-600 font-secondary text-overflow"
                                        title="All Regions"><a href="manage-members">All Regions</a></p>
                                    <div class="table-responsive table-wrapper-scroll-y custom-table-scrollbar">
                                        <table
                                            class="table m-0 table-colored-bordered table-bordered-primary table-striped"
                                            id="table_filter">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th> Region</th>
                                                    <th style="width: 45%;">Region Direrctor</th>
                                                    <th>Contact</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                   
                                                    // $curr_yr = date('Y');
                                                
                                                    $sql = "Select * from  tblregiondirector rd 
                                                         JOIN tblmembers m ON m.memberID = rd.memberID INNER JOIN tblregion r ON r.regionID = m.regionID where rd.serviceYrID = $currentLSYID ";
                                                    //    echo $sql; exit;
                                                    $query = mysqli_query($con, $sql);
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
                                                            ?>

                                                <tr>
                                                    <th scope="row">
                                                        <?php echo htmlentities($cnt); ?>
                                                    </th>
                                                    <!-- <td><a href="see-full-profile?mid=<?php echo htmlentities($row['id']); ?> " target="__blank"><?php echo htmlentities($row['full_name']); ?></a></td> -->
                                                    <td>
                                                        <?php echo htmlentities($row['region']); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo htmlentities($row['firstName'] . ' ' . $row['lastName']); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo htmlentities($row['phone1']); ?>
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
                        <!-- end col -->


                    </div>
                    <!-- end row -->

                    <?php 
                    $postSelect = "SELECT * FROM tblpost ORDER BY postID DESC LIMIT 1";
                    $query = mysqli_query($con, $postSelect);
                    $post = mysqli_fetch_array($query);
                    ?>
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-12">
                            <div class="card-box widget-box-one">
                                <i class="mdi mdi-layers widget-one-icon"></i>
                                <div class="wigdet-one-content">
                                    <h1 class="m-0 text-uppercase font-600 font-secondary text-overflow"
                                        title="User This Month"> <a href="manage-posts.php">News Update</a></h1>
                                    <a href="#"><img class="img-responsive" src="postimages/<?php echo $post['postPhoto']?>" alt="" height="60" width="auto"></a>
                                    <h3><a href="#"><?php echo $post['postTitle']?></a></h3>
                                    <span class="posted_by"><?php echo date('m-d-Y', strtotime($post['dateUpdated']))?></span>
                                    <span class="comment"> &nbsp; comments <a href="">21<i class="icon-bubble2"></i></a></span>
                                    <p><?php echo substr(strip_tags(stripcslashes($post['postDetails'])), 0, 200)?>...</p>
                                    <p><a href="#">Learn More...</a></p>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <div class="card-box widget-box-one">
                                <i class="mdi mdi-layers widget-one-icon"></i>
                                <div class="wigdet-one-content">
                                    <p class="m-0 text-uppercase font-600 font-secondary text-overflow"
                                        title="Clubs in the District"><a href="manage-activity">Clubs in the
                                            District</a></p>
                                    <div class="table-responsive table-wrapper-scroll-y custom-table-scrollbar" style="overflow-y: auto; height:400px">
                                        <table class="table m-0 table-colored-bordered table-bordered-success"
                                            id="table_filter">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th> Club</th>
                                                    <th>IndexNo</th>
                                                    <th>Region</th>
                                                    <th>Lions Family</th>
                                                    <!-- <th>Contact</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                    $curr_yr = date('Y');

                                                    $sql = "Select * from  tblclubs c 
                                                         JOIN tblregion r ON r.regionID = c.regionID";
                                                    // echo $sql; exit;
                                                    $query = mysqli_query($con, $sql);
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
                                                            ?>

                                                <tr>
                                                    <th scope="row">
                                                        <?php echo htmlentities($cnt); ?>
                                                    </th>
                                                    <td>
                                                        <?php echo htmlentities($row['clubName']); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo htmlentities($row['indexNo']); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo htmlentities($row['region']); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo htmlentities($row['SponsorLions']); ?>
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

                </div> <!-- container -->

            </div> <!-- content -->
            <?php include('includes/footer.php'); ?>

        </div>


        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->


        <!-- Right Sidebar -->
        <!-- <div class="side-bar right-bar">
                <a href="javascript:void(0);" class="right-bar-toggle">
                    <i class="mdi mdi-close-circle-outline"></i>
                </a>
                <h4 class="">Settings</h4>
                <div class="setting-list nicescroll">
                    <div class="row m-t-20">
                        <div class="col-xs-8">
                            <h5 class="m-0">Notifications</h5>
                            <p class="text-muted m-b-0"><small>Do you need them?</small></p>
                        </div>
                        <div class="col-xs-4 text-right">
                            <input type="checkbox" checked data-plugin="switchery" data-color="#7fc1fc" data-size="small" />
                        </div>
                    </div>

                    <div class="row m-t-20">
                        <div class="col-xs-8">
                            <h5 class="m-0">API Access</h5>
                            <p class="m-b-0 text-muted"><small>Enable/Disable access</small></p>
                        </div>
                        <div class="col-xs-4 text-right">
                            <input type="checkbox" checked data-plugin="switchery" data-color="#7fc1fc" data-size="small" />
                        </div>
                    </div>

                    <div class="row m-t-20">
                        <div class="col-xs-8">
                            <h5 class="m-0">Auto Updates</h5>
                            <p class="m-b-0 text-muted"><small>Keep up to date</small></p>
                        </div>
                        <div class="col-xs-4 text-right">
                            <input type="checkbox" checked data-plugin="switchery" data-color="#7fc1fc" data-size="small" />
                        </div>
                    </div>

                    <div class="row m-t-20">
                        <div class="col-xs-8">
                            <h5 class="m-0">Online Status</h5>
                            <p class="m-b-0 text-muted"><small>Show your status to all</small></p>
                        </div>
                        <div class="col-xs-4 text-right">
                            <input type="checkbox" checked data-plugin="switchery" data-color="#7fc1fc" data-size="small" />
                        </div>
                    </div>
                </div>
            </div> -->
        <!-- /Right-bar -->

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

    <!-- Counter js  -->
    <script src="../plugins/waypoints/jquery.waypoints.min.js"></script>
    <script src="../plugins/counterup/jquery.counterup.min.js"></script>

    <!--Morris Chart-->
    <script src="../plugins/morris/morris.min.js"></script>
    <script src="../plugins/raphael/raphael-min.js"></script>

    <!-- Dashboard init -->
    <script src="assets/pages/jquery.dashboard.js"></script>

    <!-- App js -->
    <script src="assets/js/jquery.core.js"></script>
    <script src="assets/js/jquery.app.js"></script>
    <script src="assets/js/chart.min.js"></script>

</body>

</html>
<?php } ?>