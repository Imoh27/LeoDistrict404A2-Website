<?php
session_start();
include('includes/alt_config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index');
} else {

    $leoID = intval($_GET['lid']);
    global $con;

    $select = "Select * from  tblmembers m JOIN tblclubs c ON c.clubID = m.clubID
    INNER JOIN tblregion r ON r.regionID = c.regionID where m.memberID = $leoID";

    // echo $sql; exit;
    // $select = "SELECT * FROM tblmembers JOIN tblmembertype ON tblmembertype.id = tblmembers.member_type_id where tblmembers.id =$memid";
    $sth = $con->query($select);
    $results = $sth->fetch(PDO::FETCH_ASSOC);

    $leoName = $results['firstName'] . ' ' . $results['lastName'];
    // echo  $leoName; exit;


    ?>
    <?php include('includes/pages-head.php'); ?>
    <title>Leo District 404A2 -- Official Website | Leo
        <?php echo htmlentities($results['firstName'] . ' ' . $results['lastName']); ?>
    </title>


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
                                    <h4 class="page-title"> <span style="color: #337ab7;">Leo
                                            <?php echo htmlentities($results['firstName'] . ' ' . $results['lastName']); ?>
                                        </span> </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a>Member</a>
                                        </li>
                                        <li>
                                            <a>Member Profile </a>
                                        </li>
                                        <li class="active">
                                            <?php echo htmlentities($results['firstName'] . ' ' . $results['lastName']); ?>
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <?php
                        $select = "SELECT memberPhoto FROM tblmembers where memberID =  $leoID";
                        //    echo $select; exit;
                        $sth = $con->query($select);
                        $result = $sth->fetch(PDO::FETCH_ASSOC);
                        $photo = $result['memberPhoto'];
                        //    echo $photo; exit;
                        ?>

                        <div class="row">
                            <form action="" method="POST" name="add_member" enctype="multipart/form-data">
                                <div class="profile-img-wrap col-md-6 col-md-offset-1 col-sm-12">

                                    <?php

                                    if (!$result) {
                                        echo "<img class='profile-img' src='membersimages/usericon.png'";
                                    } else {
                                        echo '<img class="profile-img" src="membersimages/' . $photo . '"/>';
                                    }

                                    ?>


                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <div class="card-box">
                                        <h6 class=" m-t-0 header-title"><b>Full Name: </b></h6>
                                        <?php echo $full_name; ?>
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-12 ">
                                    <div class="card-box">
                                        <h4 class="m-t-0 header-title"><b>Residence Address: </b></h4>
                                        <?php echo $results['address']; ?>
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-6  ">
                                    <div class="card-box">
                                        <h4 class="m-t-0 header-title"><b>Email: </b></h4>
                                        <?php echo $results['e_mail']; ?>
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-4">
                                    <div class="card-box">
                                        <h4 class=" m-t-0 header-title"><b>Phone No: </b></h4>
                                        <?php echo $results['pri_num']; ?>
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-4 ">
                                    <div class="card-box">
                                        <h4 class=" m-t-0 header-title"><b>Member Since:</b></h4>
                                        <?php echo $results['member_since']; ?>
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-3">
                                    <div class="card-box m-b-30">
                                        <h4 class=" m-t-0 header-title"><b>Gender </b></h4>
                                        <?php echo $results['gender']; ?>
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-5 col-md-offset-1">
                                    <div class="card-box">
                                        <h4 class="m-t-0 header-title"><b>State of Origin</b></h4>
                                        <?php echo $results['state_origin']; ?>
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-5 ">
                                    <div class="card-box">
                                        <h4 class="m-t-0 header-title"><b>City </b></h4>
                                        <?php echo $results['city']; ?>
                                    </div>
                                </div>


                                <div class="col-md-3 col-sm-4">
                                    <div class="card-box">
                                        <h4 class="m-t-0 header-title"><b>Date of Birth </b></h4>
                                        <?php echo $results['dob']; ?>
                                    </div>
                                </div>

                                <div class="col-md-4 col-md-offset-1 col-sm-4 ">
                                    <div class="card-box">
                                        <h4 class="m-t-0 header-title"><b>Occupation </b></h4>
                                        <?php echo $results['occupation']; ?>
                                    </div>
                                </div>


                                <div class="col-md-3 col-sm-3">
                                    <div class="card-box">
                                        <h4 class="m-t-0 header-title"><b>Marital Status: </b></h4>
                                        <?php echo $results['marital_status']; ?>
                                    </div>
                                </div>

                                <div class="col-sm-10 text-center">
                                    <a class="btn btn-success waves-effect waves-light"
                                        href="edit-member?mid=<?php echo htmlentities($memid); ?>"><i class="fa fa-pencil"
                                            style="color: #fff;" title="Edit this Member details"></i> Edit Member</a>
                                    <!-- <a class="btn btn-danger waves-effect waves-light" href="manage-omega-leos"> <i class="fa fa-arrow-left " style="color: #fff" title="Go Back"> Back</i></a> -->
                                    <!-- <button type="button" class="btn btn-danger waves-effect waves-light">Discard</button> -->
                                </div>
                            </form>
                        </div>
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
            jQuery(document).ready(function () {

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