<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index');
} else {
    if ($_GET['action'] == 'del' && $_GET['rid']) {
        $id = intval($_GET['rid']);
        $mt_id = intval($_GET['m_tid']);
        $query = mysqli_query($con, "update tblmembers set stat='0' where id='$id' AND member_type_id = $mt_id");
        $msg = "Member Sent to Trash ";
    }

?>

<?php include('includes/pages-head.php'); ?>
<title>Leo District 404A2 -- Official Website | Manage Leos</title>

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
                        <?php
                          $select = "Select member_type  from  tblmembertype where id=1";
                          $query = mysqli_query($con, $select);
                        //   echo $select; exit;
                          $row = mysqli_fetch_array($query)
                            ?>                       
                                    <h4 class="page-title">Manage Leos</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li>
                                            <a href="#">Leos </a>
                                        </li>
                                        <li class="active">
                                            Manage Leo
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
                                            <a href="add-member.php">
                                                <button id="addToTable" class="btn btn-success waves-effect waves-light">Add <i class="mdi mdi-plus-circle-outline"></i></button>
                                            </a>
                                            <a href="manage-members">
                                                <button class="btn btn-danger waves-effect waves-light">Refesh Page <i class="mdi mdi-reload"></i></button>
                                            </a>
                                            <div style="margin-left:20px; display :Inline"> Sort by: </div>
                                            <select name="filter" id="filterBy" onChange="getmMemId(this.value);" style="margin-left:20px; padding:10px">
                                                                <option value="">All</option>
                                                                <option value="club">Club</option>
                                                                <option value="region">Region</option>
                                                      
                                            </select>
                                        </div>

                                        <div class="table-responsive table-wrapper-scroll-y custom-table-scrollbar">
                                            <table class="table m-0 table-colored-bordered table-bordered-primary"  id="table_filter">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th> Name</th>
                                                        <th> Member No</th>
                                                        <th>Sex</th>
                                                        <th> Club</th>
                                                        <th> Region</th>
                                                        <th>Address</th>
                                                        <th>Email</th>
                                                        <th> Phone</th>
                                                        <th>City</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $sql = "Select * from  tblmembers m 
                                                    JOIN tblclubs c ON c.clubID = m.clubID INNER JOIN tblregion r ON r.regionID = c.regionID where m.isActive = 1";
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
                                                            <th scope="row"><?php echo htmlentities($cnt); ?></th>
                                                            <td><?php echo htmlentities($row['firstName'].' '. $row['lastName']); ?></td>
                                                            <td><?php echo htmlentities($row['membershipNo']); ?></td>
                                                            <td><?php echo htmlentities($row['gender']); ?></td>
                                                            <td><?php echo htmlentities($row['clubName']); ?></td>
                                                            <td><?php echo htmlentities($row['region']); ?></td>
                                                            <td><?php echo htmlentities($row['address']); ?></td>
                                                            <td><?php echo htmlentities($row['memberEmail']); ?></td>
                                                            <td><?php echo htmlentities($row['phone1']); ?></td>
                                                            <td><?php echo htmlentities($row['city']); ?></td>
                                                            <td><a href="details?leo=<?php echo htmlentities($row['firstName'].''.$row['lastName']); ?>&&lid=<?php echo htmlentities($row['memberID']); ?>"><i class="fa fa-eye" style="color: #000;" title="View Member Profile"></i></a>
                                                                &nbsp; <a href="add-member?leo=<?php echo htmlentities($row['firstName'].''.$row['lastName']); ?>&&lid=<?php echo htmlentities($row['memberID']); ?>"><i class="fa fa-pencil" style="color: #29b6f6;" title="Edit this Member details"></i></a>
                                                                &nbsp;<a href="manage-members?rid=<?php echo htmlentities($row['id']); ?>&&m_tid=<?php echo htmlentities($row['mt_id']); ?>&&action=del"> <i class="fa fa-trash-o" style="color: #f05050" title="Move This Member to Trash"></i></a> </td>
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