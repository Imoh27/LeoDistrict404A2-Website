<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index');
} else {

    if ($_GET['action'] = 'del') {
        $postid = intval($_GET['pid']);
        $trash = "update tblpost set isActive=0 where postID ='$postid'";
        // echo $trash; exit;
        $query = mysqli_query($con, $trash);
        if ($query) {
            $msg = "Post Trashed ";
        } else {
            $error = "Something went wrong . Please try again.";
        }
    }
    ?>

    <?php include('includes/pages-head.php'); ?>
    <!-- Summernote css -->
    <link href="../plugins/summernote/summernote.css" rel="stylesheet" />

    <!-- Select2 -->
    <link href="../plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

    <!-- Jquery filer css -->
    <link href="../plugins/jquery.filer/css/jquery.filer.css" rel="stylesheet" />
    <link href="../plugins/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css" rel="stylesheet" />
    <link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
    <title>Leo District 404A2 -- Official Website | Manage Post</title>


    <script>
        function getSubCat(val) {
            $.ajax({
                type: "POST",
                url: "get_subcategory.php",
                data: 'catid=' + val,
                success: function (data) {
                    $("#subcategory").html(data);
                }
            });
        }
    </script>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <?php include('includes/topheader.php'); ?>

            <!-- ========== Left Sidebar Start ========== -->
            <?php include('includes/leftsidebar.php'); ?>


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
                                    <h4 class="page-title">Manage Posts </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li>
                                            <a href="#">Posts</a>
                                        </li>
                                        <li class="active">
                                            Manage Post
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->




                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <div class="m-b-30">

                                        <a href="manage-posts">
                                            <button class="btn btn-danger waves-effect waves-light">Refesh Page <i
                                                    class="mdi mdi-reload"></i></button>
                                        </a>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table m-0 table-colored-bordered table-bordered-primary">
                                            <thead>
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Description</th>
                                                    <th>Category</th>
                                                    <th>Subcategory</th>
                                                    <th>Posted on</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $select = "SELECT * from tblpost p join tblsubcategory s on s.subCatID=p.postCatID inner join tblcategory c on c.postCatID =s.categoryID  where p.isActive=1 ";

                                                $query = mysqli_query($con, $select);
                                                $rowcount = mysqli_num_rows($query);
                                                if ($rowcount == 0) {
                                                    ?>
                                                    <tr>

                                                        <td colspan="4" align="center">
                                                            <h3 style="color:red">No record found</h3>
                                                        </td>
                                                    <tr>
                                                        <?php
                                                } else {
                                                    while ($row = mysqli_fetch_array($query)) {
                                                        $cnt = 1;
                                                        ?>

                                                        <tr>
                                                            <td><b>
                                                                    <?php echo htmlentities($row['postTitle']); ?>
                                                                </b>
                                                            </td>
                                                            <td>
                                                                <?php echo htmlentities(strip_tags($row['postDetails'])); ?>
                                                            </td>
                                                            <td>
                                                                <?php echo htmlentities($row['postCategory']) ?>
                                                            </td>
                                                            <td>
                                                                <?php echo htmlentities($row['subcategory']) ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $row['postUpdated'] ?>
                                                            </td>

                                                            <td><a
                                                                    href="add-post.php?pid=<?php echo htmlentities($row['postID']); ?>"><i
                                                                        class="fa fa-pencil" style="color: #29b6f6;"></i></a>
                                                                &nbsp;<a
                                                                    href="manage-posts.php?pid=<?php echo htmlentities($row['postID']); ?>&&action=del"
                                                                    onclick="return confirm('Do you reaaly want to delete ?')"> <i
                                                                        class="fa fa-trash-o" style="color: #f05050"></i></a>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                } ?>
                                            </tbody>

                                        </table>
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

        <!-- CounterUp  -->
        <script src="../plugins/waypoints/jquery.waypoints.min.js"></script>
        <script src="../plugins/counterup/jquery.counterup.min.js"></script>

        <!--Morris Chart-->
        <script src="../plugins/morris/morris.min.js"></script>
        <script src="../plugins/raphael/raphael-min.js"></script>

        <!-- Load page level scripts-->
        <script src="../plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
        <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <script src="../plugins/jvectormap/gdp-data.js"></script>
        <script src="../plugins/jvectormap/jquery-jvectormap-us-aea-en.js"></script>


        <!-- Dashboard Init js -->
        <script src="assets/pages/jquery.blog-dashboard.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>

    </html>
<?php } ?>