<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index');
} else {
    if ($_GET['action'] == 'del' && $_GET['scid']) {
        $id = intval($_GET['scid']);
        $query = mysqli_query($con, "update  tblsubcategory set isActive='0' where subCatID ='$id'");
        $msg = "Sub Category Trashed ";
    }
   

?>
    <!DOCTYPE html>
    <html lang="en">

    <?php include('includes/pages-head.php'); ?>
    <title>Leo District 404A2 -- Official Website | Manage Sub Category</title>

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
                                    <h4 class="page-title">Manage SubCategories</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li>
                                            <a href="#">SubCategory </a>
                                        </li>
                                        <li class="active">
                                            Manage SubCategories
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
                                            <a href="add-subcategory.php">
                                                <button id="addToTable" class="btn btn-success waves-effect waves-light">Add <i class="mdi mdi-plus-circle-outline"></i></button>
                                            </a>
                                        </div>

                                        <div class="table-responsive">
                                            <table class="table m-0 table-colored-bordered table-bordered-primary">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th> Category</th>
                                                        <th>Sub Category</th>
                                                        <th>Description</th>
                                                        <th>Date Added</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $query = mysqli_query($con, "Select * from tblsubcategory s join tblcategory c on s.categoryID =c.postCatID  where s.isActive=1");
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
                                                                // $update_date = ($row['subcatupdationdate'] ? date('Y-m-d',strtotime($row['subcatupdationdate'])): "");
                                                            ?>


                                                        <tr>
                                                            <th scope="row"><?php echo htmlentities($cnt); ?></th>
                                                            <td><?php echo htmlentities($row['postCategory']); ?></td>
                                                            <td><?php echo htmlentities($row['subcategory']); ?></td>
                                                            <td><?php echo htmlentities($row['subCatDescription']); ?></td>
                                                            <td><?php echo htmlentities(date('Y-m-d', strtotime($row['dateUpdated']))); ?></td>
                                                            <td><a href="add-subcategory.php?scid=<?php echo htmlentities($row['subCatID']); ?>"><i class="fa fa-pencil" style="color: #29b6f6;"></i></a>
                                                                &nbsp;<a href="manage-subcategories.php?scid=<?php echo htmlentities($row['subCatID']); ?>&&action=del" onclick="return confirm('Do you really want to delete ?')"> <i class="fa fa-trash-o" style="color: #f05050"></i></a> </td>
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