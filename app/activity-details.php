<?php
session_start();
include('includes/alt_config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index');
} else {
    
    $act_id = intval($_GET['a_id']);
    global $con;

    $select = "SELECT a.id,a.activity_title, a.description,a.location,a.start_date,a.end_date, a.photo,
    s.Subcategory, c.CategoryName from  activity a JOIN tblsubcategory s ON a.activity_category  = s.SubCategoryId INNER JOIN tblcategory c ON c.id = s.CategoryId WHERE a.id = $act_id";
    // echo $select; exit;
    $sth = $con->query($select);
    $results = $sth->fetch(PDO::FETCH_ASSOC);

    // echo  $full_name; exit;
    $end_date = ($results['end_date'] = '0000-00-00' ? " ---- " :  $end_date)

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <!-- App title -->
        <title>Leo District 404A2 -- Admin | <?php echo htmlentities( $results['CategoryName'].''); ?> Details</title>

        <!-- Summernote css -->
        <link href="../plugins/summernote/summernote.css" rel="stylesheet" />

        <!-- Select2 -->
        <link href="../plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

        <!-- Jquery filer css -->
        <link href="../plugins/jquery.filer/css/jquery.filer.css" rel="stylesheet" />
        <link href="../plugins/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css" rel="stylesheet" />

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
        <!-- <script>
            function getSubCat(val) {
                $.ajax({
                    type: "POST",
                    url: "get_subcategory.php",
                    data: 'catid=' + val,
                    success: function(data) {
                        $("#subcategory").html(data);
                    }
                });
            }
        </script> -->
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
                                    <h4 class="page-title">See Details of ( <span style="color: #337ab7;"><?php echo $results['CategoryName'] .' - '; ?></span> <?php echo  $results['Subcategory']; ?> ) </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Activity</a>
                                        </li>
                                        <li>
                                            <a href="#">Activity Details </a>
                                        </li>
                                        <li class="active">
                                            <?php echo $results['Subcategory']; ?>
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>                                                              
                        <!-- end row -->

                      <?php
                     
                       $photo = $results['photo'];
                    //    echo $photo; exit;
                       ?>

                        <div class="row">
                            <form action="" method="POST" name="add_member" enctype="multipart/form-data">
                                <div class="activity-img-wrap col-md-6 col-md-offset-1 col-sm-12  ">

                                       <?php
                                                       
                                                        if(!$results){
                                                          echo "<img class='activity-img' src='membersimages/usericon.png'";  
                                                        }
                                                        else {
                                                            echo '<img class="activity-img" src="activity-upload/'.$photo.'"/>'; 
                                                        }
                                            
                                       ?>


                                </div>


                                <div class="col-md-3 col-sm-12">
                                    <div class="card-box">
                                        <h4 class=" m-t-0 header-title"><b>Activity Title:  </b></h4>
                                        <?php echo $results['activity_title'] ; ?>
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-6 ">
                                    <div class="card-box">
                                        <h4 class="m-t-0 header-title"><b>Location: </b></h4>
                                        <?php echo $results['location']; ?>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6 ">
                                    <div class="card-box">
                                        <h4 class="m-t-0 header-title"><b>Activity Details: </b></h4>
                                        <?php echo $results['description']; ?>
                                    </div>
                                </div>


                                <div class="col-md-3 col-sm-6  ">
                                    <div class="card-box">
                                        <h4 class="m-t-0 header-title"><b>From:  </b></h4>
                                        <?php echo $results['start_date']; ?>
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-4">
                                    <div class="card-box">
                                        <h4 class=" m-t-0 header-title"><b>To:  </b></h4>
                                        <?php echo $results['end_date']; ?>
                                    </div>
                                </div>

                               

                                <div class="col-sm-10 text-center">
                                    <a class="btn btn-success waves-effect waves-light" href="edit-activity?a_id=<?php echo htmlentities($act_id); ?>"><i class="fa fa-pencil" style="color: #fff;" title="Edit this Member details"></i> Update</a>
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
        <script src="../plugins/switchery/switchery.min.js"></script>

        <!--Summernote js-->
        <script src="../plugins/summernote/summernote.min.js"></script>




    </body>

    </html>
<?php } ?>