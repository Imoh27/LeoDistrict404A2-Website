<?php
include('cc/header.php');
include('cc/header-nav.php');
?>
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


<?php
include('cc/off-canvas.php');
?>


<div class="offcanvas-overlay"></div>
<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area d-flex" data-bg-image="assets/images/about-image/breadcrumb-bg.jpg">
    <div class="container align-self-center">
        <div class="row">
            <div class="col-md-12 ">
                <div class="breadcrumb-content text-center ">
                    <h2>Activites</h2>
                    <ul class="nav">
                        <li><a href="index">Home</a></li>
                        <li>All activities </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End-->

<?php
include_once('app/admin/includes/alt_config.php');
// Feching active categories
$select = "SELECT SubCategoryId, Subcategory from tblsubcategory";
//    echo $select; exit;
$sth = $con->query($select);
$results = $sth->fetchAll(PDO::FETCH_ASSOC); ?>
<!-- Gallery Area Start -->
<div class="gallery-area pt-100px pb-100px">
    <div class="container">
        <div class="row">

            <!-- Start section title -->
            <div class="col-md-12 text-center m-5 mb-5" data-aos="fade-up" data-aos-delay="200">
                <div class="section-title" style="display: inline !important;">
                    <h2 class="title">See Our Activities</h2>
                </div>
                <div style="float:right; display: inline !important">
                    Sort Activity By :<select name="filter" id="filterBy" onChange="sortActivity(this.value);" style="width: 25%; margin-left:20px; padding:10px;">
                            <option value="">All</option>

                            <?php
                            foreach ($results as $result) {
                                // echo $result['SubCategoryId']; exit;
                            ?>
                                <option value="<?php echo htmlentities($result['SubCategoryId']); ?>"><?php echo htmlentities($result['Subcategory']); ?></option>
                            <?php } ?>
                        </select>
                </div>
                
            </div>
            <!-- End section title -->
        </div>

        <!-- Start main gallery -->
        <div class="row banner-area m-0" id="activity">

            <?php
            include_once('app/admin/includes/alt_config.php');
            $select = "SELECT * FROM tblactivity ";
            //    echo $select; exit;
               $sth = $con->query($select);
               $result = $sth->fetchAll(PDO::FETCH_ASSOC); ?>

                <!-- Start single gallery -->
                <div class="row banner-area" data-aos="fade-up" data-aos-delay="200">
            <?php 
                foreach ($result as $activity) {
                    $photo = $activity['photo'];
                    $a_id = $activity['id'];
                ?>
                
                    <div class="col-lg-4 col-md-6 col-sm-12 single-event  banner-wrapper mb-4">
                        <div class="event-image">
                            <a href="activity-details?activity=<?php echo $a_id?>"><img class="img-responsive w-100" src="app/admin/activity-upload/<?php echo htmlentities($photo);?>" alt=""></a>
                        </div>
                        <div class="event-content">
                            <h5><a class="event-title" href="activity-details?activity=<?php echo $a_id?>"><?php echo htmlentities($activity['activity_title']); ?></a></h5>
                            <i class="fa fa-map-marker event-location"></i>
                            <h6 class="event-location" style="color: #fff;" data-toggle="tooltip" data-placement="top" title="<?php echo htmlentities($activity['description']); ?> ">
                                <?php echo $activity['location']; ?>
                            </h6>
                            <span class="event-date"><i class="fa fa-calendar"></i>  <?php echo htmlentities($activity['start_date']); ?></span>
                        </div>
                    </div>
            <?php } ?>
           
        </div>
        </div>
    </div>
    <!-- End main gallery -->
</div>
</div>

<?php
include('cc/footer.php');
?>