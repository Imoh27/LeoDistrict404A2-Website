<?php
session_start();
include_once('includes/alt_config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index');
} else {
    global $con;
    $status = 1;
    if (isset($_POST['add-position'])) {
        $position = $_POST['position'];
        $lci_level = $_POST['lci_level'];

        $select = "SELECT  office_title FROM offices where office_title ='$position'";
        // echo $select; exit;
        $sth = $con->query($select);
        $results = $sth->fetch(PDO::FETCH_ASSOC);


        if (!empty($results)) {
            $error = "Sorry! position Already Exist";
        } else {
            $insert = "INSERT INTO offices VALUES(NULL, '$position', $status,  NOW())";
            // echo($insert); exit;
            $query = $con->query($insert);
            if ($query == TRUE) {
                $msg = "Position Successfully Added ";
            } else {
                $error = "Something went wrong . Please try again.";
            }
        }
    }


?>


    <!DOCTYPE html>
    <html lang="en">

    <head>

        <title>CPLC -- Official Calabar Paradise Lions Club Website | Add Executive Position</title>

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

    </head>


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
                                    <h4 class="page-title">Add Executive Position</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li>
                                            <a href="#">Executive Positions </a>
                                        </li>
                                        <li class="active">
                                            Add Executive Position
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
                                    <h4 class="m-t-0 header-title"><b>Add Executive Postion </b></h4>
                                    <hr />



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



                                            <?php
                                                 $select = "SELECT * FROM tbllevel";
                                                 $sth = $con->query($select);
                                                 $result = $sth->fetchAll(PDO::FETCH_ASSOC);
                                            ?>
                                    <div class="row">
                                        <form class="form-horizontal" action="" method="post">
                                            <!-- <div class="col-sm-10 col-sm-offset-1 m-b-30">
                                                <h4 class="col-sm-3 control-label"><b>Select Hierachy </b></h4>
                                                <select class="form-control m-s-10" name="lci_level" id="lci_level" onclick="showField(this.value)" style="display: inline; width: 15% !important">
                                                    <option value="">Select </option>
                                                    <?php
                                                    foreach ($result as $hierachy) {
                                                    ?>
                                                        <option value="<?php echo htmlentities($hierachy['lvl_id']); ?>"><?php echo htmlentities($hierachy['lvl_title']); ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div> -->
                                            <div class="col-md-12 mt-5">
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Position</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" value="" name="position" placeholder="Enter postion" required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">&nbsp;</label>
                                                    <div class="col-md-10">

                                                        <button type="submit" class="btn btn-custom waves-effect waves-light btn-md" name="add-position">
                                                            Submit
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