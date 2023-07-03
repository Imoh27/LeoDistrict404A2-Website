<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    $category = $_GET['scid'];
    $categoryID = $_POST['category'];
    $subcatname = $_POST['subcategory'];
    $subcatdescription = $_POST['sucatdescription'];

    $session = $_SESSION['login'];
    $select = "SELECT userID  From tblusers WHERE loginID = '$session'";
    $sth = $con->query($select);
    $result = mysqli_fetch_array($sth);
    $addedBy = $result['userID'];
    $status = 1;
    if (isset($_POST['submitsubcat'])) {

        $lastEntry = "SELECT *  From tblsubcategory Where categoryID  = $categoryID AND subcategory = '$subcatname'";
        $sth = $con->query($lastEntry);
        $result = mysqli_fetch_array($sth);

        if (!empty($result) || $result) {
            $error = "Error . Entry already exists.";
        } else {
            $insert = "INSERT INTO tblsubcategory VALUES(NULL, $categoryID ,'$subcatname',
            '$subcatdescription',NOW(), $addedBy, $status)";
            // echo $insert; exit;
            $query = mysqli_query($con, $insert);
            if ($query) {
                $msg = "Sub-Category created ";
            } else {
                $error = "Something went wrong . Please try again.";
            }
        }
    }

    if (isset($_POST['updatesubcat'])) {
        $update = "UPDATE tblsubcategory SET categoryID  = $categoryID , subcategory = '$subcatname',
            subCatDescription = '$subcatdescription', dateUpdated = NOW()";
            // echo $insert; exit;
            $query = mysqli_query($con, $update);
            if ($query) {
                $msg = "Sub-Category Update ";
            } else {
                $error = "Something went wrong . Please try again.";
            }
    }


    ?>


    <?php include('includes/pages-head.php'); ?>
    <title>Leo District 404A2 -- Official Website | Add SubCategory</title>


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
                                    <h4 class="page-title">Add Sub-Category</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li>
                                            <a href="#">Category </a>
                                        </li>
                                        <li class="active">
                                            Add Sub-Category
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
                                    <h4 class="m-t-0 header-title"><b>Add Sub-Category </b></h4>
                                    <hr />



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




                                <?php $select = "SELECT *  From tblsubcategory s join tblcategory c on s.categoryID =c.postCatID
                                Where categoryID  = $category";
                                $sth = $con->query($select);
                                $results = mysqli_fetch_array($sth);
                                ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <form class="form-horizontal" name="category" method="post">
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Category</label>
                                                <div class="col-md-10">
                                                    <select class="form-control" name="category" required>
                                                        <option value="<?php if ($results || !empty($results)) {
                                                            echo htmlentities($results['categoryID']);
                                                        } ?>"><?php echo htmlentities($results['postCategory']); ?>
                                                        </option>
                                                        <?php
                                                        // Feching active categories
                                                        $ret = mysqli_query($con, "SELECT * FROM  tblcategory where isActive=1 AND postCatID NOT IN('$category')");
                                                        while ($result = mysqli_fetch_array($ret)) {
                                                            ?>
                                                        <option
                                                            value="<?php echo htmlentities($result['postCatID']); ?>">
                                                            <?php echo htmlentities($result['postCategory']); ?>
                                                        </option>
                                                        <?php } ?>

                                                    </select>
                                                </div>
                                            </div>




                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Sub-Category</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" value="<?php if ($results || !empty($results)) {
                                                        echo htmlentities($results['subcategory']);
                                                    } ?>" name="subcategory" required>
                                                </div>
                                            </div>






                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Sub-Category Description</label>
                                                <div class="col-md-10">
                                                    <textarea class="form-control" rows="5" name="sucatdescription"
                                                        required><?php if ($results || !empty($results)) {
                                                            echo htmlentities($results['subCatDescription']);
                                                        } ?></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label">&nbsp;</label>
                                                <div class="col-md-10">

                                                    <button type="submit"
                                                        class="btn btn-custom waves-effect waves-light btn-md" name="<?php if ($results || !empty($results)) {
                                                            echo 'updatesubcat';
                                                        } else {
                                                            echo 'submitsubcat';
                                                        } ?>">
                                                        <?php if ($results || !empty($results)) {
                                                            echo 'UPDATE';
                                                        } else {
                                                            echo 'SUBMIT';
                                                        } ?>
                                                    </button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>


                                </div>











                            </div>
                        </div>
                    </div>
                    <!-- end row -->


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