<?php include('assets/header.php');?>
<title>Leo District 404A2 -- Official Website | Club Projects</title>
<script>
    function sortActivity(val) {
        $.ajax({
            type: "POST",
            url: "sort_activity.php",
            data: 'activity=' + val,
            beforeSend: function() {
                $("#activity").html('Fetching, Please Wait...');
            },
            success: function(data) {
                $("#activity").html(data);
            }
        });
    }
</script>
</header>
<!-- Header Section End Here -->


<?php include('assets/navbar.php'); ?>


<div class="offcanvas-overlay"></div>
<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area d-flex" data-bg-image="img/breadcrumb-bg.jpg">
    <div class="container align-self-center">
        <div class="row">
            <div class="col-md-12 ">
                <div class="breadcrumb-content text-center ">
                    <!-- <h2>District Activities</h2> -->
                    <ul class="nav">
                        <li><a href="index">Home</a></li>
                        <li>Gallery </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End-->

<?php
include_once('app/includes/alt_config.php');


if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}
$no_of_records_per_page = 12;
$offset = ($pageno-1) * $no_of_records_per_page;


$total_pages_sql = "SELECT COUNT(*) as total_records FROM tblactivity";
// echo $total_pages_sql; exit;
$sth = $con->query($total_pages_sql);
$result = $sth->fetch(PDO::FETCH_ASSOC);

$total_pages = ceil($result['total_records'] / $no_of_records_per_page);

// Feching active categories
$select = "SELECT * from  tblcategory";
//    echo $select; exit;
$sth = $con->query($select);
$results = $sth->fetchAll(PDO::FETCH_ASSOC); ?>
<!-- Gallery Area Start -->
<div class="gallery-area pt-100px pb-100px">
    <div class="container">
        <div class="row">

            <!-- Start section title -->
            <div class="col-md-12 text-center mb-5" data-aos="fade-up" data-aos-delay="200">
                <div class="section-title" style="display: inline !important;">
                    <h2 class="title">District Activities</h2>
                </div>

            
            </div>
            <!-- End section title -->
        </div>

        <!-- Start main gallery -->
        <div class="row banner-area m-0" id="activity">

            <?php
            include_once('app/includes/alt_config.php');
            $select = "SELECT * FROM tblactivity  ORDER BY activityID  
              DESC LIMIT $offset, $no_of_records_per_page";
            //    echo $select; exit;
            $sth = $con->query($select);
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $photos) { ?>


                <!-- Start single gallery -->
                <div class="col-md-6 col-sm-6 col-lg-3 single-gallery p-2" data-aos="fade-up" data-aos-delay="200">
                <div class="bg-light p-4">
                            <div class="d-flex align-items-center justify-content-center border border-5 border-white mb-4"
                                style="width: 100%; height: 200px;">
                                <img src="app/activityimages/<?php echo $photos['activityFoto']; ?>" alt="Image" style="width: 100%; height: 100%;">
                            </div>
                            <h4 class="mb-3"><?php echo $photos['title']; ?></h4>
                            <p style="font-size:12px; text-transform: capitalize"><b>Location: </b>
                            <?php echo $photos['activityLocation']; ?> &nbsp; |
                            &nbsp;  Date
                            <?php echo htmlentities(date('d-m-Y', strtotime($photos['startDate']))); ?>
                            </p>
                        </div>
                </div>
                <!-- End single gallery -->
            <?php } ?>
        </div>
    </div>
    <!-- End main gallery -->
</div>
<ul class="pagination justify-content-center mb-4">
        <li class="page-item"><a href="?pageno=1"  class="page-link">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?> page-item">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>" class="page-link">Prev</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?> page-item">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?> " class="page-link">Next</a>
        </li>
        <li class="page-item"><a href="?pageno=<?php echo $total_pages; ?>" class="page-link">Last</a></li>
    </ul>
</div>
<!-- Footer Start --> 
<?php include('assets/footer.php');?>