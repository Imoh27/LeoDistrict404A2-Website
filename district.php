<?php include('assets/header.php');
$section = $_GET['section'];
// echo $section; exit;
if ($section == 'lion-leaders') {
    $lion_leaders = $section;
    $hero_title = 'Our Lions Leaders'; ?>

    <title>Leo District 404A2 -- Official Website | <?php echo $hero_title;  ?></title>
<?php
} elseif ($section == 'coreofficers') {
    $core_officers = $section;
    $hero_title = 'District Core Officers'; ?>

    <title>Leo District 404A2 -- Official Website | <?php echo $hero_title;  ?></title>
<?php } elseif($section == 'region-directors') {
    $region_directors = $section; 
    $hero_title = 'Region Directors';?>
    <title>Leo District 404A2 -- Official Website | <?php echo $hero_title;  ?></title>
<?php } ?>

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
                        ><li class="ms-1">About </li>
                        ><li class="ms-1"><?php echo $hero_title;  ?> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End-->

<?php
include_once('app/includes/alt_config.php'); ?>

<!-- Lion Leaders Start -->
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

        <div class="row banner-area m-0" id="leaders">

            <?php
            $lsyQuery = "SELECT *  From tblserviceyr ORDER BY serviceYrID  desc LIMIT 1";
            $query = $con->query($lsyQuery);
            $result = $query->fetch(PDO::FETCH_ASSOC);
            $currentLSYID = $result['serviceYrID'];

            if ($section == 'lion-leaders') {

                $selectLCL = "SELECT * FROM tbllcileaders l JOIN tbldistrictoffices o ON o.dOfficesID  = l.dOfficesID 
            JOIN tblserviceyr s ON s.serviceYrID = l.serviceYrID WHERE l.serviceYrID =  $currentLSYID";
                $query = $con->query($selectLCL);
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                foreach ($result as $lclLeader) { ?>
                    <div class="col-lg-4 col-md-6 service-item-top wow fadeInUp mb-5" data-wow-delay="0.1s">
                        <div class="overflow-hidden bg-dark" style="height: 400px; width:auto">
                            <img class="img-fluid" src="app/leaders_dp/<?php echo htmlentities($lclLeader['foto']); ?>" alt="">
                        </div>
                        <div class="d-flex text-center align-items-center justify-content-center bg-light p-4">
                            <div class="team-text">
                                <div class="bg-light">
                                    <h5 class="fw-bold mb-0">
                                        Lion <?php echo htmlentities($lclLeader['leaderName']); ?>
                                    </h5>
                                    <small>
                                        <?php echo htmlentities($lclLeader['position']); ?>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php }
            } ?>
            <!-- End Lion Leaders -->

            <!-- Start Core Officers -->
            <?php
            if ($section == 'coreofficers') {

                $selectLCL = "SELECT * FROM tblcoreofficers c JOIN tbldistrictoffices o ON o.dOfficesID  = c.dOfficesID 
                JOIN tblserviceyr s ON s.serviceYrID = c.serviceYrID  JOIN tblmembers m ON m.memberID = c.memberID WHERE c.serviceYrID =  $currentLSYID";
                $query = $con->query($selectLCL);
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                foreach ($result as $memberfoto) { ?>
                    <div class="col-lg-4 col-md-6 service-item-top wow fadeInUp mb-5" data-wow-delay="0.1s">
                        <div class="overflow-hidden bg-dark" style="height: 400px; width:auto">
                            <img class="img-fluid" src="app/membersimages/<?php echo htmlentities($memberfoto['memberPhoto']); ?>" alt="">
                        </div>
                        <div class="d-flex text-center align-items-center justify-content-center bg-light p-4">
                            <div class="team-text">
                                <div class="bg-light">
                                    <h5 class="fw-bold mb-0 text-capitalize">
                                        Leo <?php echo htmlentities($memberfoto['firstName'] . ' ' . $memberfoto['lastName']); ?>
                                    </h5>
                                    <small>
                                        <?php echo htmlentities($memberfoto['position']); ?>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php }
            } ?>
            <!-- End Core Officers -->

            <!-- Start Region Directors -->
            <?php
            if ($section == 'region-directors') {

                $selectLCL = "SELECT * FROM tblregiondirector rd 
                JOIN tblserviceyr s ON s.serviceYrID = rd.serviceYrID  JOIN tblmembers m ON m.memberID = rd.memberID INNER JOIN tblregion r ON r.regionID  = m.regionID 
                INNER JOIN tblclubs c ON c.clubID  = m.clubID
                 WHERE rd.serviceYrID =  $currentLSYID";
            //    echo   $selectLCL; exit;
               $query = $con->query($selectLCL);
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                foreach ($result as $memberfoto) { ?>
                    <div class="col-lg-4 col-md-6 service-item-top wow fadeInUp mb-5" data-wow-delay="0.1s">
                        <div class="overflow-hidden bg-dark" style="height: 300px; width:auto">
                            <img class="img-fluid" src="app/membersimages/<?php echo htmlentities($memberfoto['memberPhoto']); ?>" alt="" style="width: 100%; height: 100%;">
                        </div>
                        <div class="d-flex text-center align-items-center justify-content-center bg-light p-4">
                            <div class="team-text">
                                <div class="bg-light">
                                    <h5 class="fw-bold mb-0 text-capitalize">
                                        Leo <?php echo htmlentities($memberfoto['firstName'] . ' ' . $memberfoto['lastName']); ?>
                                    </h5>
                                    <small>
                                        <?php echo htmlentities($memberfoto['clubName']); ?>  <br/>
                                     <b> Region   <?php echo htmlentities($memberfoto['region']); ?> Director</b>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php }
            } ?>
        </div>
    </div>
</div>




</div>
<!-- Footer Start -->
<?php include('assets/footer.php'); ?>