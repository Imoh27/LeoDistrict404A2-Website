<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index');
} else {
    if ($_GET['action'] == 'del' && $_GET['rid']) {
        $id = intval($_GET['rid']);
        $query = mysqli_query($con, "update tblbod set Stat='0' where id='$id'");
        $msg = "BOD Member deleted ";
    }

    $session = $_SESSION['login'];
    $lsyQuery = "SELECT *  From tblserviceyr ORDER BY serviceYrID  desc";
    $query = mysqli_query($con, $lsyQuery);
    $result = mysqli_fetch_assoc($query);
    $currentLSYID = $result['serviceYrID'];

    ?>
<!DOCTYPE html>
<html lang="en">
<?php include('includes/pages-head.php'); ?>
<title>Leo District 404A2 -- Official Website | Manage Region</title>



<script>
function getBods(val) {
    $.ajax({
        type: "POST",
        url: "fetch-bod.php",
        data: 'bods=' + val,
        beforeSend: function() {
            $("#table_filter").html('Fetching, Please Wait...');
        },
        success: function(data) {
            $("#table_filter").html(data);
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
                                <h4 class="page-title">Manage Region</h4>
                                <ol class="breadcrumb p-0 m-0">
                                    <li>
                                        <a href="#">Admin</a>
                                    </li>
                                    <li>
                                        <a href="#">Regions </a>
                                    </li>
                                    <li class="active">
                                        Manage Region
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
                                    
                                    <div class="col-md-4 col-sm-12" style="margin-bottom: 50px">
                                        <p class=" text-uppercase font-600 font-secondary text-overflow"
                                                ><a >All Regions</a>
                                            <a href="add-region" style="float: right" title="Add Region">
                                                <button id="addToTable"
                                                    class=" btn btn-success waves-effect waves-light">Add
                                                    <i class="mdi mdi-plus-circle-outline"></i></button>
                                            </a>
                                        </p>
                                        <div class="table-responsive">
                                            <table class="table m-0 table-colored-bordered table-bordered-primary"
                                                id="table_filter">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th> Region Name</th>
                                                        <th style="text-align:center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $select_query = "Select * from  tblregion";
                                                        // echo $select_query; exit;
                                                        $query = mysqli_query($con, $select_query);
                                                        $rowcount = mysqli_num_rows($query);
                                                        $cnt = 1;

                                                        if ($rowcount == 0) { ?>
                                                    <tr>

                                                        <td colspan="7" align="center">
                                                            <h3 style="color:red">No entry yet</h3>
                                                        </td>
                                                    <tr>
                                                        <?php } else {
                                                            while ($row = mysqli_fetch_array($query)) {
                                                                ?>

                                                    <tr>
                                                        <th scope="row">
                                                            <?php echo htmlentities($cnt); ?>
                                                        </th>
                                                        <td>
                                                           Region  <?php echo htmlentities($row['region']); ?>
                                                        </td>
                                                        <td style="text-align:center">
                                                            <a
                                                                href="add-region?rid=<?php echo htmlentities($row['regionID']); ?>"><i
                                                                    class="fa fa-pencil"
                                                                    style="color: #29b6f6;"></i>&nbsp; </a>
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
                                    <?php 
                                
                                    
                                    $RDselect_query = "Select rd.regionID as foreignRID, rd.ardMemberID as foreignARDID, r.region as regionNAME,m.firstName as RDfirstName, m. lastName as RDlastName from  tblregiondirector rd 
                                    JOIN tblmembers m ON m.memberID = rd.memberID INNER JOIN tblregion r ON r.regionID = m.regionID where rd.serviceYrID = $currentLSYID ";
                                //    echo $RDselect_query; exit;
                                   $RDquery = mysqli_query($con, $RDselect_query);
                                   $rowcount = mysqli_num_rows($RDquery);

                                //    $ardRow = mysqli_fetch_array($query);
                                //    $ard = $ardRow['ardMemberID'];
                                //    var_dump($ard); 
                                   $cnt = 1;
                                    ?>
                                    <div class="col-md-6 col-sm-12 ms-5 ">
                                        <p class=" text-uppercase font-600 font-secondary text-overflow"
                                           ><a >Region Directors</a>
                                            <a href="add-region-director" title="Add Region Director" style="float: right">
                                                <button id="addToTable"
                                                    class=" btn btn-success waves-effect waves-light">Add
                                                    <i class="mdi mdi-plus-circle-outline"></i></button>
                                            </a>
                                        </p>
                                        <div class="table-responsive">
                                            <table class="table m-0 table-colored-bordered table-bordered-primary"
                                                id="table_filter">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th> Region Name</th>
                                                        <th>Region Director</th>
                                                        <th class="text-center">ARD</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        if ($rowcount == 0) { ?>
                                                    <tr>

                                                        <td colspan="7" align="center">
                                                            <h3 style="color:red">No entry yet</h3>
                                                        </td>
                                                    <tr>
                                                        <?php } else {
                                                            while ($row = mysqli_fetch_array($RDquery)) {
                                                                $ardMemberID = $row['foreignARDID'];
                                                                ?>

                                                    <tr>
                                                        <th scope="row">
                                                            <?php echo htmlentities($cnt); ?>
                                                        </th>
                                                        <td>
                                                           Region  <?php echo htmlentities($row['regionNAME']); ?>
                                                        </td>
                                                        <td>
                                                            <?php echo htmlentities($row['RDfirstName'] . ' ' . $row['RDlastName']); ?>
                                                        </td>
                                                        <td style="text-align:center">
                                                        

                                                        <?php 
                                                            if ($row['foreignARDID'] == 0) {?>
                                                            <a
                                                            href="add-region-director?action=addARD"><i
                                                            class="fa fa-plus"
                                                            style="color: #29b6f6;"></i>&nbsp; Add ARD</a>
                                                            <?php } else {
                                                                    // $ardSelect = "Select rd.regionID as foreignRID, rd.ardMemberID as foreignARDID, m.firstName as RDfirstName, m. lastName as RDlastName from  tblregiondirector rd 
                                                                    // JOIN tblmembers m ON m.memberID = rd.memberID INNER JOIN tblregion r ON r.regionID = m.regionID where rd.serviceYrID = $currentLSYID AND rd.ardMemberID != 0";
                                                                    $ardSelect = "Select * from   tblmembers m where memberID =  $ardMemberID ";
                                                                //    echo $ardSelect; exit;
                                                                   $ARDquery = mysqli_query($con, $ardSelect);
                                                                   $ardrow = mysqli_fetch_array($ARDquery);
                                                                   if (!empty($ardrow)) {
                                                                    $ardname = $ardrow['firstName']. ' ' . $ardrow['lastName'];
                                                                   }
                                                                
                                                                ?><?php echo htmlentities($ardname); }?>
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