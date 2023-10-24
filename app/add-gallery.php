<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index');
} else {
    $active = $_SESSION['login'];
    $session_user = "SELECT *  From tblusers WHERE loginID = '$active'";
    $query = mysqli_query($con, $session_user);
    $result = mysqli_fetch_assoc($query);
    $active = $result['userID'];

    // For adding activity  
    if (isset($_POST['submit'])) {
        
        $activity_id = $_POST['activity'];
        $imgfile = $_FILES["activity_images"]["name"];
        $imgsize = $_FILES["activity_images"]["size"];
        // loop Through the file
        $countFiles = count($_FILES['activity_images']['name']);
        for ($i = 0; $i < $countFiles; $i++) {
            $imgfile = strtolower($_FILES['activity_images']['name'][$i]);

            // get the image extension
            $extension = substr($imgfile, strlen($imgfile) - 4, strlen($imgfile));
            // allowed extensions
            $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");
            // Validation for allowed extensions .in_array() function searches an array for a specific value.
            if($imgsize[$i] > 20000000){
                echo "<script>alert('OOP!. Maximum File Size of 20mb Exceeded');</script>"; 
            }
           else if (!in_array($extension, $allowed_extensions)) {
                echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>"; 
            } 
            else {
                //rename the image file
                $imgnewfile = 'ld404A2_'.$imgfile;
                // Code for move image into directory
                move_uploaded_file($_FILES["activity_images"]["tmp_name"][$i], "gallery/" . $imgfile);
                $status = 1;
                $insert = "insert into tblgallery values(NULL, $activity_id,'$imgfile', $active, NOW())";
            //   echo $insert .'<br>';
                $query = mysqli_query($con, $insert);
                if ($query) {
                    $msg = "Gallery successfully added ";
                } else {
                   $error = "Something went wrong . Please try again.";
                }
            }
        }
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <?php include('includes/pages-head.php'); ?>
<title>Leo District 404A2 -- Official Website | Add Gallery</title>
<script>
    
function getActivity(val) {
    $.ajax({
        type: "POST",
        url: "get_activities.php",
        data: 'categoryID=' + val,
        beforeSend: function() {
            $("#activities").html('Fetching, Please Wait...');
        },
        success: function(data) {
            $("#activities").html(data);
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
                                    <h4 class="page-title">Add Photo Gallery </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Photo Gallery</a>
                                        </li>
                                        <li class="active">
                                            Add Photo Gallery
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

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


                        <div class="row">
                            <div class="col-md-4 col-md-offset-4">
                                <div class="p-6">
                                    <div class="">
                                        <form name="addpost" method="post" enctype="multipart/form-data">
                                            <div class="form-group m-b-20">
                                                <label for="activity">Activity</label>
                                                <select class="form-control" name="activity" id="activity"
                                                onChange="getActivity(this.value);"  required>
                                                    <option value="">Select Activity </option>
                                                    <?php
                                                    // Feching active categories
                                                    $ret = mysqli_query($con, "select * from  tblcategory");
                                                    while ($result = mysqli_fetch_array($ret)) {
                                                    ?>
                                                        <option value="<?php echo htmlentities($result['postCatID']); ?>"><?php echo htmlentities($result['postCategory']); ?></option>
                                                    <?php } ?>

                                                </select>
                                            </div>
                                            <div class="col-md-12">
                                            <div class="form-group m-b-20">
                                                <label for="activities">Select Activity</label>
                                                <select class="form-control" name="activities" id="activities" required>

                                                </select>
                                            </div>
                                        </div>


                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="card-box">
                                                        <h4 class="m-b-30 m-t-0 header-title"><b>Gallery Images</b></h4>
                                                        <input type="file" class="form-control" id="activity_images" name="activity_images[]" multiple required>
                                                    </div>
                                                </div>
                                            </div>


                                            <button type="submit" name="submit" class="btn btn-success waves-effect waves-light">Add to Gallery</button>
                                            <button type="button" class="btn btn-danger waves-effect waves-light">Discard</button>
                                        </form>
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


        <script src="../plugins/switchery/switchery.min.js"></script>

        <!--Summernote js-->
        <script src="../plugins/summernote/summernote.min.js"></script>




    </body>

    </html>
<?php } ?>