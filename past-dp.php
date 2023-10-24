<?php include('assets/header.php');
$hero_title = 'Past District Presidents';
?>
 <title>Leo District 404A2 -- Official Website | <?php echo $hero_title;  ?></title>
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

            
                $selectLCL = "SELECT * FROM  tblpdp";
            //    echo   $selectLCL; exit;
               $query = $con->query($selectLCL);
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                foreach ($result as $pdp) { ?>
                    <div class="col-lg-3 col-md-6 service-item-top wow fadeInUp mb-5" data-wow-delay="0.1s">
                        <div class="overflow-hidden bg-dark" style="height: 200px; width:auto">
                            <img class="img-fluid" src="app/pdp_photos/<?php echo htmlentities($pdp['pdpPhoto']); ?>" alt="">
                        </div>
                        <div class="d-flex text-center align-items-center justify-content-center bg-light p-4">
                            <div class="team-text">
                                <div class="bg-light">
                                    <h5 class="fw-bold mb-0">
                                        <?php echo htmlentities($pdp['fullName']); ?>
                                    </h5>
                                    <small>
                                        <?php echo htmlentities($pdp['serviceYR']); ?>  Service Year<br/>
                                     <b>   <?php echo htmlentities($pdp['servicetheme']); ?></b>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php }?>
        </div>
    </div>
</div>




</div>
<!-- Footer Start -->
<?php include('assets/footer.php'); ?>