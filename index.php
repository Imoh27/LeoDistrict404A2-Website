<?php
include('app/includes/alt_config.php');
// error_reporting(0);

global $con;
$lsyQuery = "SELECT *  From tblserviceyr ORDER BY serviceYrID  desc";
$query = $con->query($lsyQuery);
$result = $query->fetch(PDO::FETCH_ASSOC);
$currentLSYID = $result['serviceYrID'];

include('assets/header.php');  
?>
   <title>Leo District 404A2 -- Official Website</title>
</head>
<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-light d-none d-lg-block">
        <div class="row align-items-center top-bar">
            <div class="col-lg-4 col-md-12 text-center text-lg-start">
                <a href="" class=" navbar-brand m-0 p-0">
                    <img src="app/images/dplogo23-24.jpg" alt="" height="70">
                    <h2 class="d-inline-flex text-primary ms-2">Leo District 404A2</h2>
                </a>
            </div>
            <div class="col-lg-9 col-md-12 text-end">
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <?php 
    include('assets/navbar.php'); 
    // Slider Start
    include('assets/slider.php'); 
    // Slider End
    ?>


    

 <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <?php
                $selectLCL = "SELECT * FROM tbllcileaders l JOIN tbldistrictoffices o ON o.dOfficesID  = l.dOfficesID 
                    JOIN tblserviceyr s ON s.serviceYrID = l.serviceYrID WHERE l.serviceYrID =  $currentLSYID LIMIT 4";
                $query = $con->query($selectLCL);
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                // var_dump($result);
                foreach ($result as $lclLeader) { ?>
                    <div class="col-lg-3 col-md-6 service-item-top wow fadeInUp" data-wow-delay="0.1s">
                        <div class="overflow-hidden" style="height: 300px !important;">
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
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="text-secondary text-uppercase">About Us</h6>
                    <h1 class="mb-4">History</h1>
                    <p class="mb-4 " style="text-align: justify">In 1957, Coach Jim Graver set the Leo ball rolling.
                        Graver was the coach of the
                        Abington High School, Pennsylvania, USA, baseball team. Graver was also an active member of the
                        Glenside Lions Club, Pennsylvania. With fellow Lion, William Ernst, Graver talked about starting
                        a service club for high school boys. So they asked their fellow Lions for support. Without
                        hesitation, the Glenside Lions agreed that a Lions youth group was a good idea. Graver and Ernst
                        set to work. On December 5, 1957, the Glenside Lions presented a charter to the Abington High
                        School Leo Club whose members were mostly made up of the high school's baseball team.

                        As the world's first Leo club, the group created the Leo acronym - Leadership, Equality,
                        Opportunity (Equality was later changed to Experience.) And, the group chose maroon and gold -
                        their school colours - to serve as the Leo club colours. Since 1957, when the first club was
                        organized, the Leo movement has grown to more than 5,700 clubs in more than 139 countries with
                        approximately 144,000 members


                        The Leo club motto is:</p>
                    <p class="fw-medium text-primary"><i class="fa fa-check text-success me-3"></i>Leardership</p>
                    <p class="fw-medium text-primary"><i class="fa fa-check text-success me-3"></i>Experience</p>
                    <p class="fw-medium text-primary"><i class="fa fa-check text-success me-3"></i>Opportunity</p>
                    <p class="mb-4" style="text-align: justify">Today, the Leo Club Program is stronger than ever.
                        Community service remains the
                        cornerstone of the program. Like their Lion counterparts, Leo club members enjoy serving their
                        neighbours and watching positive results unfold.</p>
                    <!-- <div class="bg-primary d-flex align-items-center p-4 mt-5">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-white" style="width: 60px; height: 60px;">
                            <i class="fa fa-phone-alt fa-2x text-primary"></i>
                        </div>
                        <div class="ms-3">
                            <p class="fs-5 fw-medium mb-2 text-white">Emergency 24/7</p>
                            <h3 class="m-0 text-secondary">+012 345 6789</h3>
                        </div>
                    </div> -->
                </div>
                <div class="col-lg-6 pt-4" style="min-height: 300px;">
                    <div class="position-relative h-100 wow fadeInUp" data-wow-delay="0.5s">
                        <img class="position-absolute mx-auto img-fluid w-auto h-100" src="img/jimm.jpeg" style="object-fit: cover; padding: 0 0 50px 100px;" alt="">
                        <img class="position-absolute start-0 bottom-0 img-fluid bg-white pt-2 pe-2 w-50 h-50" src="img/jim-coach.jpeg" style="object-fit: cover;" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Fact Start -->
    <div class="container-fluid fact bg-dark my-5 py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.1s">
                    <i class="fas fa-globe fa-2x text-white mb-3"></i>
                    <h2 class="text-white mb-2" data-toggle="counter-up">7400</h2>
                    <p class="text-white mb-0">Clubs Worldwide</p>
                </div>
                <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.3s">
                    <i class="fa fa-users fa-2x text-white mb-3"></i>
                    <h2 class="text-white mb-2" data-toggle="counter-up">160000</h2>
                    <p class="text-white mb-0">Leos</p>
                </div>
                <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.5s">
                    <i class="fas fa-globe fa-2x text-white mb-3"></i>
                    <h2 class="text-white mb-2" data-toggle="counter-up">150</h2>
                    <p class="text-white mb-0">Countries and Territories</p>
                </div>
                <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.7s">
                    <i class="fas fa-hands-helping fa-2x text-white mb-3"></i>
                    <h2 class="text-white mb-2" data-toggle="counter-up">40000</h2>
                    <p class="text-white mb-0">Service Projects in 2021-22</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Fact End -->
    
    <!-- Home Gallery Start -->


    <div class="container py-5 ">
        <div class="row g-0">
            <div class="col-md-12 col-lg-12">
                    <div class="text-center text-lg-start wow fadeInUp" data-wow-delay="0.1s">
                        <h4 class="text-secondary text-uppercase">Gallery</h4>
                    </div>

                    <div class="row banner-area m-0" id="activity">

                        <?php
                        $select = "SELECT g.galleryID as galleryID, g.foto as photos, g.activityID as activity_id, c.postCategory as postCategory, a.title as title FROM
                         tblgallery g JOIN tblactivity a ON a.activityID  = g.activityID   
                         INNER JOIN tblcategory c ON c.postCatID = a.activityCatID  ORDER BY galleryID DESC LIMIT 8";
                        //    echo $select; exit;   
                        $sth = $con->query($select);
                        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($result as $photos) { ?>


                            <!-- Start single gallery -->
                            <div class="col-md-6 col-sm-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="200">
                            <div class=" justify-content-center border border-5 border-white" style="width: auto; height: 250px;">

                                <a  href="app/gallery/<?php echo $photos['photos']; ?>" >
                                     <img style="width: 100%; height: 100%;" src="app/gallery/<?php echo $photos['photos']; ?>" alt="" />
                                </a>
                                <p style="font-size: 12px;" class="text-capitalize gallery-title"><?php echo $photos['title']; ?></p>
                                </div>
                                
                            </div>
                            <!-- End single gallery -->
                        <?php } ?>
                        <div class="col-lg-12 col-sm-12 text-center mt-3">

                            <a style="width:auto;" href="gallery?page=gallery">See more...</a>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <!-- Home Gallery End -->
    
        <!-- Blog News Start -->
       
    <div class="container-fluid py-5 px-4 px-lg-0">
        <div class="row g-0">
            <div class="col-lg-3 d-none d-lg-flex">
                <div class="d-flex align-items-center justify-content-center bg-primary w-100 h-100">
                    <h2 class="display-1 text-white m-0" style="transform: rotate(-90deg);">News Centre</h2>
                </div>
            </div>
            <div class="col-md-12 col-lg-9">
                <div class="ms-lg-5 ps-lg-5">
                    <div class="text-center text-lg-start wow fadeInUp" data-wow-delay="0.1s">
                        <h6 class="text-secondary text-uppercase">Blog</h6>
                        <h1 class="mb-5">Explore Our News Update</h1>
                    </div>
                    <?php
                    $selectNews = "SELECT * from tblpost ORDER BY postID DESC limit 3";
                    $query = $con->query($selectNews);
                    $res = $query->fetchAll(PDO::FETCH_ASSOC);

                    ?>

                    <div class="row me-lg-3  justify-content-center">
                        <?php
                        foreach ($res as $news) { ?>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12  mt-4">
                                <div class="card-box widget-box-one">
                                    <i class="mdi mdi-layers widget-one-icon"></i>
                                    <div class="wigdet-one-content">

                                        <a href="news-details.php?sc=<?php echo htmlentities($news['postCatID']); ?>&&nid=<?php echo htmlentities($news['postID']) ?>"><img class="blog-image wrap" src="app/postimages/<?php echo $news['postPhoto']; ?>" alt="">
                                            <h6 class="mt-4"><?php echo htmlentities($news['postTitle']); ?></h6>
                                        </a>
                                        <span class="posted_by">Posted on: <?php echo htmlentities(date('m-d-Y', strtotime($news['postUpdated']))); ?></span>
                                        <!-- <span class="comment"><a href="">21<i class="icon-bubble2"></i></a></span> -->
                                        <p style="text-align:justify"><?php echo substr(strip_tags(stripcslashes($news['postDetails'])), 0, 200); ?>...</p>
                                        <!-- <p><a href="#">Learn More...</a></p> -->
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="col-lg-12 col-sm-12 text-center mt-3">

                            <a class="btn btn-primary" style="width:auto;" href="news-update?page=blog">See more...</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Blog News End -->

        <!-- Call to Action Start -->
        <div class="container-fluid bg-dark my-5 py-5">
            <div class="container">
                <div class="row g-4">
                    <div class="col-md-12 text-center wow fadeIn" data-wow-delay="0.1s">
                        <i class="fas fa-question fa-2x text-white mb-3"></i>
                        <h1 class="text-white mb-2">Not already enrolled in our database </h1>
                        <p class="text-white mb-0">What are you waiting for?</p>
                        <button class="btn btn-primary my-3"><a target="_blank" class="text-white text-center" href="data-registration?page=enrollment-form">Enrol Now...</a></button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Call to Action End -->

        <!-- Team Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="text-secondary text-uppercase">Our Leaders</h6>
                    <h1 class="mb-5">District President Team</h1>
                </div>
                <div class="row g-4">
                    <?php
                    $select = "SELECT * FROM tbldpsteam d JOIN tbldistrictoffices o ON o.dOfficesID  = d.dOfficesID 
                    JOIN tblserviceyr s ON s.serviceYrID = d.serviceYrID WHERE d.serviceYrID =  $currentLSYID";
                    $query = $con->query($select);
                    $result = $query->fetchAll(PDO::FETCH_ASSOC);
                    // var_dump($result);
                    foreach ($result as $dpsteam) { ?>

                        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="team-item">
                                <div class="position-relative overflow-hidden">
                                    <img class="img-fluid" src="app/dp_team/<?php echo htmlentities($dpsteam['foto']); ?>" alt="" style="width: 100%; height: 100%;">
                                </div>
                                <div class="team-text">
                                    <div class="bg-light">
                                        <h5 class="fw-bold mb-0">
                                            Leo
                                            <?php echo htmlentities($dpsteam['memberName']); ?>
                                        </h5>
                                        <small>
                                            <?php echo htmlentities($dpsteam['position']); ?>
                                        </small>
                                    </div>
                                    <div class="bg-primary">
                                        <a class="btn btn-square mx-1" href="https://facebook.com/<?php echo htmlentities($dpsteam['fbProfile']); ?>"><i class="fab fa-facebook-f"></i></a>
                                        <a class="btn btn-square mx-1" href="https://linkedin.com/<?php echo htmlentities($dpsteam['lnProfile']); ?>"><i class="fab fa-linkedin"></i></a>
                                        <a class="btn btn-square mx-1" href="https://instagram.com/<?php echo htmlentities($dpsteam['igProfile']); ?>"><i class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- Team End -->


       <?php
                $select = "SELECT * FROM tblpdp";
                // echo $select; exit;
                $query = $con->query($select);
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                ?>
        <!-- Past DP Start -->
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="text-center">
                    <h6 class="text-secondary text-uppercase">Our Timeline</h6>
                    <h1 class="mb-5">Past District Presidents</h1>
                </div>
                <div class="owl-carousel testimonial-carousel position-relative wow fadeInUp" data-wow-delay="0.1s">
                <?php foreach ($result as $pdp) {?>
                <div class="testimonial-item text-center">
                    <div class="testimonial-text bg-light text-center p-4 mb-4">
                        <p class="mb-0"><?php echo $pdp['servicetheme']; ?></p>
                    </div>
                    <img class="bg-light rounded-circle p-2 mx-auto mb-2" src="app/pdp_photos/<?php echo $pdp['pdpPhoto']; ?>" style="width: 80px; height: 80px;">
                    
                    <h5 class="mb-1"><?php echo $pdp['fullName']; ?></h5>
                    <p class="m-0"><?php echo $pdp['serviceYR']; ?>  Service Year</p>
                </div>
                <?php } ?>
            </div>
            </div>
        </div>
        <!-- Past Dp End -->
</div>

    <!-- Footer Start -->
    <?php include('assets/footer.php'); ?>
</body>

</html>