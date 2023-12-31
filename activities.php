<?php include('assets/header.php');
$section = $_GET['section'];
$curr_date = date('Y-m-d');
// echo $section; exit;
if ($section == 'district-activities') {
    $hierrachy = 0;
    $hero_title = 'District Activities'; ?>

    <title>Leo District 404A2 -- Official Website | <?php echo $hero_title;  ?></title>
<?php
} elseif ($section == 'region-activities') {
    $hierrachy = 1;
    $hero_title = 'Region Activities'; ?>

    <title>Leo District 404A2 -- Official Website | <?php echo $hero_title;  ?></title>
<?php } else { ?>
    <title>Leo District 404A2 -- Official Website | <?php echo $hero_title;  ?></title>

<?php $hierrachy = 2;
    $hero_title = 'Club Activities';
} ?>
<?php include('assets/navbar.php'); ?>
</header>
<!-- Header Section End Here -->
<body>
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
                        ><li class="ms-1">Activities </li>
                        ><li class="ms-1"><?php echo $hero_title;  ?> </li>
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
$offset = ($pageno - 1) * $no_of_records_per_page;


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

            <!-- Page Header Start -->
            <div class="container-fluid page-header mb-5 py-5">
                <div class="container">
                    <h1 class="display-3 text-white mb-3 animated slideInDown"><?php echo $hero_title;  ?></h1>
                    <nav aria-label="breadcrumb animated slideInDown">
                        <ol class="breadcrumb text-uppercase">
                            <li class="breadcrumb-item"><a class="text-white">Leo District404A2 Nigeria</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- Page Header End -->
        </div>

        <!-- Start main gallery -->
        <div class="row banner-area m-0" id="activity">
            <h4 class="card-header mb-2">Upcoming Activities</h4>
            <?php
            include_once('app/includes/alt_config.php');
            $select = "SELECT * FROM tblactivity WHERE startDate > '$curr_date'";
            // echo $select; exit;
            if ($section == 'district-activities') {
                $select .= " AND hierarchy = 0 AND isActive=1 AND startDate";
            } elseif ($section == 'region-activities') {
                $select .= " AND hierarchy = 1 AND isActive=1 AND startDate";
            } else {
                $select .= " AND hierarchy = 2 AND isActive=1 AND startDate";
            }

            $select .= " ORDER BY activityID  
            DESC LIMIT $offset, $no_of_records_per_page";
            //    echo $select; exit;
            $sth = $con->query($select);
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $photos) { ?>


                <!-- Start single gallery -->
                <div class="col-md-6 col-sm-6 col-lg-3 p-2 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="bg-light p-4">

                        <div class="d-flex align-items-center justify-content-center border border-5 border-white mb-5" style="width: 100%; height: 300px; padding:2px">
                            <a href="activity-details?a=<?php echo $photos['title']; ?>&&activity=<?php echo $photos['activityID']; ?>">
                                <img src="app/activityimages/<?php echo $photos['activityFoto']; ?>" alt="Image" style="width: 100%; height: 100%;">
                            </a>
                        </div>
                        <a href="activity-details?activity=<?php echo $photos['activityID']; ?>">
                            <h4 class="mb-3 fs-6 text-capitalize"><?php echo $photos['title']; ?></h4>
                        </a>
                        <p style="font-size:12px; text-transform: capitalize"><b><?php if ($section == 'region-activities') {
                                                                                        echo $photos['region_name'] . '  &nbsp; |';
                                                                                    } elseif ($section == 'club-activities') {
                                                                                        echo 'Club: ' . $photos['club_name'] . '  &nbsp; |';
                                                                                    } ?></b>
                            <b>Location: </b>
                            <?php echo $photos['activityLocation']; ?> &nbsp; |
                            &nbsp;<b>Date:</b>
                            <?php echo htmlentities(date('d-m-Y', strtotime($photos['startDate']))); ?>
                        </p>
                        <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                        <div class="sharethis-sticky-share-buttons"></div>
                    </div>
                </div>
                <!-- End single gallery -->

            <?php } 
            
            if (!empty( $result )) { ?>
            <ul class="pagination justify-content-center mb-4">
                <li class="page-item"><a href="?pageno=1" class="page-link">First</a></li>
                <li class="<?php if ($pageno <= 1) {
                                echo 'disabled';
                            } ?> page-item">
                    <a href="<?php if ($pageno <= 1) {
                                    echo '#';
                                } else {
                                    echo "?pageno=" . ($pageno - 1);
                                } ?>" class="page-link">Prev</a>
                </li>
                <li class="<?php if ($pageno >= $total_pages) {
                                echo 'disabled';
                            } ?> page-item">
                    <a href="<?php if ($pageno >= $total_pages) {
                                    echo '#';
                                } else {
                                    echo "?pageno=" . ($pageno + 1);
                                } ?> " class="page-link">Next</a>
                </li>
                <li class="page-item"><a href="?pageno=<?php echo $total_pages; ?>" class="page-link">Last</a></li>
            </ul>
        <?php } ?>
            <?php
            include_once('app/includes/alt_config.php');
            $select = "SELECT * FROM tblactivity WHERE startDate <= '$curr_date'";
            // echo $select; exit;
            if ($section == 'district-activities') {
                $select .= " AND hierarchy = 0 AND isActive=1 AND startDate";
            } elseif ($section == 'region-activities') {
                $select .= " AND hierarchy = 1 AND isActive=1 AND startDate";
            } else {
                $select .= " AND hierarchy = 2 AND isActive=1 AND startDate";
            }

            $select .= " ORDER BY activityID DESC";
            //    echo $select; exit;
            $sth = $con->query($select);
            $result = $sth->fetchAll(PDO::FETCH_ASSOC); ?>

            <h4 class="card-header mb-2">Past Activities</h4>
            <?php foreach ($result as $photos) { ?>
                <div class="col-md-6 col-sm-6 col-lg-3 p-2 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="bg-light p-4">

                        <div class="d-flex align-items-center justify-content-center border border-5 border-white mb-4" style="width: 100%; height: 250px;">
                            <a href="activity-details?a=<?php echo $photos['title']; ?>&&activity=<?php echo $photos['activityID']; ?>">
                                <img src="app/activityimages/<?php echo $photos['activityFoto']; ?>" alt="Image" style="width: 100%; height: 100%;">
                            </a>
                        </div>
                        <a href="activity-details?activity=<?php echo $photos['activityID']; ?>">
                            <h4 class="mb-3 fs-6 text-capitalize"><?php echo $photos['title']; ?></h4>
                        </a>
                        <p style="font-size:12px; text-transform: capitalize"><b><?php if ($section == 'region-activities') {
                                                                                        echo $photos['region_name'] . '  &nbsp; |';
                                                                                    } elseif ($section == 'club-activities') {
                                                                                        echo 'Club: ' . $photos['club_name'] . '  &nbsp; |';
                                                                                    } ?></b>
                            <b>Location: </b>
                            <?php echo $photos['activityLocation']; ?> &nbsp; |
                            &nbsp;<b>Date:</b>
                            <?php echo htmlentities(date('d-m-Y', strtotime($photos['startDate']))); ?>
                        </p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <!-- End main gallery -->
</div>

</div>
</body>
<!-- Footer Start -->
<?php include('assets/footer.php'); ?>