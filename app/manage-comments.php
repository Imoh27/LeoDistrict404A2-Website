<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    $commentStatus = $_GET['status'];
    if ($_GET['disid']) {
        $disid = intval($_GET['disid']);
        $query = mysqli_query($con, "update tblcomments set isActive=0 where id='$disid'");
        $msg = "Comment unapprove ";
    }
    // Code for restore
    if ($_GET['appid']) {
        $appid = intval($_GET['appid']);
        $query = mysqli_query($con, "update tblcomments set isActive=1 where id='$appid'");
        $msg = "Comment approved";
    }

    // Code for deletion
    if ($_GET['action'] == 'del' && $_GET['rid']) {
        $delid = intval($_GET['rid']);
        $query = mysqli_query($con, "delete from  tblcomments  where id='$delid'");
        $delmsg = "Comment deleted forever";
    }

    ?>
       <?php include('includes/pages-head.php'); ?>
    <title>Leo District 404A2 -- Official Website | Manage Comments</title>


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
                                    <h4 class="page-title">Manage Comments</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <!-- <li>
                                            <a href="#">Comments </a>
                                        </li> -->
                                        <li class="active">
                                            Manage Comments
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
                                        <strong>Well done!</strong>
                                        <?php echo htmlentities($msg); ?>
                                    </div>
                                <?php } ?>

                                <?php if ($delmsg) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Oh snap!</strong>
                                        <?php echo htmlentities($delmsg); ?>
                                    </div>
                                <?php } ?>


                            </div>








                            <div class="row">
                                <div class="col-md-12">
                                    <div class="demo-box m-t-20">

                                        <div class="table-responsive">
                                            <table class="table m-0 table-colored-bordered table-bordered-primary">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th> Name</th>
                                                        <th>Email Id</th>
                                                        <th width="300">Comment</th>
                                                        <th>Status</th>
                                                        <th>Post / News</th>
                                                        <th>Comment Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                if ($commentStatus == 'unapproved') { 
                                                    $comment = "Select * from  tblcomments c join tblpost p on p.postID=c.post WHERE c.isActive= 0";
                                                    // echo $comment; exit;
                                                    $query=mysqli_query($con, $comment);
                                                    $cnt=1;
                                                    while ($row = mysqli_fetch_array($query)) {
                                                        ?>

                                                        <tr>
                                                            <th scope="row">
                                                                <?php echo htmlentities($cnt); ?>
                                                            </th>
                                                            <td>
                                                                <?php echo htmlentities($row['name']); ?>
                                                            </td>
                                                            <td>
                                                                <?php echo htmlentities($row['email']); ?>
                                                            </td>
                                                            <td>
                                                                <?php echo htmlentities($row['comment']); ?>
                                                            </td>
                                                            <td>
                                                                    Wating for approval
                                                            </td>


                                                            <td><a href="add-post.php?pid=<?php echo htmlentities($row['post']);?>"><?php echo htmlentities($row['postTitle']);?></a> </td>
<td><?php echo htmlentities(date('d-m-Y', strtotime($row['commentDATE'])));?></td>
<td>
  <a href="manage-comments.php?status=unapproved&&appid=<?php echo htmlentities($row['id']);?>" onclick="return confirm('Do you wish to approve this comment?')" title="Approve this comment"><i class="ion-arrow-return-right" style="color: #29b6f6;"></i></a> 


	&nbsp;<a href="manage-comments.php?rid=<?php echo htmlentities($row['id']);?>&&action=del"> <i class="fa fa-trash-o" style="color: #f05050"></i></a> </td>
</tr>
<?php
$cnt++;
 } }
elseif ($commentStatus == 'approved') { $comment = "Select * from  tblcomments c join tblpost p on p.postID=c.post WHERE c.isActive= 1";
    // echo $comment; exit;
    $query=mysqli_query($con, $comment);
    $cnt=1;
    while ($row = mysqli_fetch_array($query)) {
        ?>

        <tr>
            <th scope="row">
                <?php echo htmlentities($cnt); ?>
            </th>
            <td>
                <?php echo htmlentities($row['name']); ?>
            </td>
            <td>
                <?php echo htmlentities($row['email']); ?>
            </td>
            <td>
                <?php echo htmlentities($row['comment']); ?>
            </td>
            <td>
                    Approved
            </td>


            <td><a href="add-post.php?pid=<?php echo htmlentities($row['post']);?>"><?php echo htmlentities($row['postTitle']);?></a> </td>
<td><?php echo htmlentities(date('d-m-Y', strtotime($row['commentDATE'])));?></td>
<td>
<a href="manage-comments.php?status=approved&&disid=<?php echo htmlentities($row['id']);?>" onclick="return confirm('Do you wish to unapprove this comment')" title="Disapprove this comment"><i class="ion-arrow-return-right" style="color: #29b6f6;"></i></a> 
&nbsp;<a href="manage-comments.php?rid=<?php echo htmlentities($row['id']);?>&&action=del"> <i class="fa fa-trash-o" style="color: #f05050"></i></a> </td>
</tr>
<?php
$cnt++;
} }?>
                                                </tbody>

                                            </table>
                                        </div>




                                    </div>

                                </div>


                            </div>
                            <!--- end row -->



                            <div class="row">
                                <div class="col-md-12">
                                    <div class="demo-box m-t-20">
                                        <div class="m-b-30">


                                        </div>





                                    </div>

                                </div>


                            </div>


















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