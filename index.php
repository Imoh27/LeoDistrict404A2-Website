<?php
include('app/includes/alt_config.php');
// error_reporting(0);

global $con;
$lsyQuery = "SELECT *  From tblserviceyr ORDER BY serviceYrID  desc";
$query = $con->query($lsyQuery);
$result = $query->fetch(PDO::FETCH_ASSOC);
$currentLSYID = $result['serviceYrID'];

// echo $page; exit;
include('assets/header.php'); 
?>

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
                <!-- <div class="h-100 d-inline-flex align-items-center me-4">
                    <i class="fa fa-map-marker-alt text-primary me-2"></i>
                    <p class="m-0">123 Street, New York, USA</p>
                </div> -->
                <!-- <div class="h-100 d-inline-flex align-items-center me-4">
                    <i class="far fa-envelope-open text-primary me-2"></i>
                    <p class="m-0">leodistrict404A2Nigeria@gmail.com</p>
                </div>
                <div class="h-100 d-inline-flex align-items-center">
                    <a class="btn btn-sm-square bg-white text-primary me-1" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-sm-square bg-white text-primary me-1" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-sm-square bg-white text-primary me-1" href=""><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-sm-square bg-white text-primary me-0" href=""><i class="fab fa-instagram"></i></a>
                </div> -->
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <?php include('assets/navbar.php'); ?>


    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/slider-image/homepagebagraound-image.jpeg" alt="" height="400">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                    style="background: rgba(0, 0, 0, .4);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h5 class="text-white text-uppercase mb-3 animated slideInDown">LEO DISTRICT 404A2
                                    NIGERIA</h5>
                                <h1 class="display-3 text-white animated slideInDown mb-4">Unity in Service: - Promoting
                                    Humanity</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">Are you already a member of the Leo Club?
                                    We're excited to have you continue your journey of service and leadership with us!
                                </p>
                                <a href="form.php?page=enrolment-form" target="__blank"
                                    class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Enroll Now!</a>
                                <!-- <a href="" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Free Quote</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/slider-image/environment-banner.jpg" alt="" height="400">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                    style="background: rgba(0, 0, 0, .4);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <!-- <h5 class="text-white text-uppercase mb-3 animated slideInDown">global cause</h5> -->
                                <img class="slide-icon image-wrap" src="img/slider-image/environment.png" alt="">
                                <h1 class="display-3 text-white animated slideInDown mb-4 text-capitalize">lions
                                    maintain healthy environment</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">Human life is supported by the soil.
                                    We've seen how good stewardship of natural resources can enhance people's lives and
                                    increase community participation.
                                    Our surroundings are more than just a backdrop: they are our home. And we're
                                    determined to look after it.
                                </p>
                                <a href="https://www.lionsclubs.org/en/start-our-global-causes/environment"
                                    target="__blank"
                                    class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Find out
                                    more...</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/slider-image/sight-banner.jpg" alt="" height="400">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                    style="background: rgba(0, 0, 0, .4);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <!-- <h5 class="text-white text-uppercase mb-3 animated slideInDown">global cause</h5> -->
                                <img class="slide-icon image-wrap" src="img/slider-image/sight.png" alt="">
                                <h1 class="display-3 text-white animated slideInDown mb-4 text-capitalize">lions
                                    promotes vision everyday</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2"><b>></b> 1 billion people live with
                                    vision impairment that could have been prevented or can be corrected.<br>
                                    US$14.3 billion is needed to treat existing cases of refractive error and cataracts
                                    worldwide.
                                </p>
                                <a href="https://www.lionsclubs.org/en/start-our-global-causes/vision" target="__blank"
                                    class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Find out
                                    more...</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/slider-image/diabetes1-1.png" alt="" height="400">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                    style="background: rgba(0, 0, 0, .4);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <!-- <h5 class="text-white text-uppercase mb-3 animated slideInDown">GLOBAL cause</h5> -->
                                <img class="slide-icon image-wrap" src="img/slider-image/diabetes-icon.png" alt="">
                                <h1 class="display-3 text-white animated slideInDown mb-4 text-capitalize">lions fights
                                    diabetes everyday</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">Lions from all over the world are
                                    battling for improved diabetes treatment. We undertake initiatives and activities to
                                    help people
                                    with diabetes live better lives and to prevent others from having type two diabetes.
                                </p>
                                <a href="https://www.lionsclubs.org/en/start-our-global-causes/diabetes"
                                    target="__blank"
                                    class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Find out
                                    more...</a>
                                <!-- <a href="" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Free Quote</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/slider-image/slide-two.jpg" alt="" height="400">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                    style="background: rgba(0, 0, 0, .4);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <!-- <h5 class="text-white text-uppercase mb-3 animated slideInDown">GLOBAL cause</h5> -->
                                <img class="slide-icon image-wrap" src="img/slider-image/childhood-cancer.png" alt="">
                                <h1 class="display-3 text-white animated slideInDown mb-4 text-capitalize">lions fights
                                    childhood cancer</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">Cancer is a leading cause of death for
                                    children and adolescents around the world.
                                    Approximately 300,000 children aged 0 to 19 years old are diagnosed with cancer each
                                    year.
                                </p>
                                <a href="https://www.lionsclubs.org/en/start-our-global-causes/childhood-cancer"
                                    target="__blank"
                                    class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Find out
                                    more...</a>
                                <!-- <a href="" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Free Quote</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/slider-image/hunger-banner.jpg" alt="" height="400">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                    style="background: rgba(0, 0, 0, .4);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <!-- <h5 class="text-white text-uppercase mb-3 animated slideInDown">GLOBAL cause</h5> -->
                                <img class="slide-icon image-wrap" src="img/slider-image/hunger.png" alt="">
                                <h1 class="display-3 text-white animated slideInDown mb-4 text-capitalize">lions fights
                                    hunger everyday</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2"><b>></b>815 million people affected by
                                    hunger in 2016: 11% of the global population 155 million children under age five are
                                    stunted
                                    due to chronic malnutrition 1/3 of annual food production is lost or wasted
                                    throughout the supply chain
                                </p>
                                <a href="https://www.lionsclubs.org/en/start-our-global-causes/hunger" target="__blank"
                                    class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Find out
                                    more...</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <!-- Carousel End -->


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <?php
                $selectLCL = "SELECT * FROM tbllcileaders l JOIN tbldistrictoffices o ON o.dOfficesID  = l.dOfficesID 
                    JOIN tblserviceyr s ON s.serviceYrID = l.serviceYrID WHERE l.serviceYrID =  $currentLSYID";
                $query = $con->query($selectLCL);
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                // var_dump($result);
                foreach ($result as $lclLeader) { ?>
                <div class="col-lg-3 col-md-6 service-item-top wow fadeInUp" data-wow-delay="0.1s">
                    <div class="overflow-hidden" style="height: 300px !important;">
                        <img class="img-fluid" src="app/leaders_dp/<?php echo htmlentities($lclLeader['foto']); ?>"
                            alt="">
                    </div>
                    <div class="d-flex text-center align-items-center justify-content-center bg-light p-4">
                        <div class="team-text">
                            <div class="bg-light">
                                <h5 class="fw-bold mb-0">
                                    <?php echo htmlentities($lclLeader['leaderName']); ?>
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
                        <img class="position-absolute img-fluid w-100 h-100" src="img/jimm.jpeg"
                            style="object-fit: cover; padding: 0 0 50px 100px;" alt="">
                        <img class="position-absolute start-0 bottom-0 img-fluid bg-white pt-2 pe-2 w-50 h-50"
                            src="img/jim-coach.jpeg" style="object-fit: cover;" alt="">
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


    <!-- Project Start -->
    <div class="container-fluid py-5 px-4 px-lg-0">
        <div class="row g-0">
            <div class="col-lg-3 d-none d-lg-flex">
                <div class="d-flex align-items-center justify-content-center bg-primary w-100 h-100">
                    <h1 class="display-3 text-white m-0" style="transform: rotate(-90deg);">District Projects</h1>
                </div>
            </div>
            <div class="col-md-12 col-lg-9">
                <div class="ms-lg-5 ps-lg-5">
                    <div class="text-center text-lg-start wow fadeInUp" data-wow-delay="0.1s">
                        <h6 class="text-secondary text-uppercase">Our Core Projects</h6>
                        <h1 class="mb-5">Explore Our Activities</h1>
                    </div>
                    <div class="owl-carousel service-carousel position-relative wow fadeInUp" data-wow-delay="0.1s">
                        <div class="bg-light p-4">
                            <div class="d-flex align-items-center justify-content-center border border-5 border-white mb-4"
                                style="width: 100%; height: 200px;">
                                <img src="img/project-image-1.jpeg" alt="Image" style="width: 100%; height: 100%;">
                            </div>
                            <h4 class="mb-3">Food Bank 2022</h4>
                            <p class="message">On December 26, 2022, the Calabar Crystal Leo Club organized a food bank
                                project for Mrs. Iquo Etim Willie, who lives at 26 Murray Street in Calabar, Cross River
                                State. We had to do an evaluative assessment on every prospective beneficiary of this
                                project in order to choose a qualified applicant. The club selected Mrs. Iquo Etim
                                Willie as a project beneficiary because she is a mother of three sons who tragically
                                lost her husband and two of her children in an accident. She is now left with just her
                                son, who sells ice cream to make ends meet, and a 6-year-old granddaughter. Selling
                                recycled plastic bottles and cartons is how this woman makes ends meet. We made the
                                decision to give this woman non-perishable food items that can last up to 6 months
                                because of this.</p>
                            <a href="" class="btn bg-white text-primary w-100 mt-2">Read More<i
                                    class="fa fa-arrow-right text-secondary ms-2"></i></a>
                        </div>
                        <div class="bg-light p-4">
                            <div class="d-flex align-items-center justify-content-center border border-5 border-white mb-4"
                                style="width: 100%; height: 200px;">
                                <img src="img/project-image-1.jpeg" alt="Image" style="width: 100%; height: 100%;">
                            </div>
                            <h4 class="mb-3">Food Bank 2022</h4>
                            <p class="message">On December 26, 2022, the Calabar Crystal Leo Club organized a food bank
                                project for Mrs. Iquo Etim Willie, who lives at 26 Murray Street in Calabar, Cross River
                                State. We had to do an evaluative assessment on every prospective beneficiary of this
                                project in order to choose a qualified applicant. The club selected Mrs. Iquo Etim
                                Willie as a project beneficiary because she is a mother of three sons who tragically
                                lost her husband and two of her children in an accident. She is now left with just her
                                son, who sells ice cream to make ends meet, and a 6-year-old granddaughter. Selling
                                recycled plastic bottles and cartons is how this woman makes ends meet. We made the
                                decision to give this woman non-perishable food items that can last up to 6 months
                                because of this.</p>
                            <a href="" class="btn bg-white text-primary w-100 mt-2">Read More<i
                                    class="fa fa-arrow-right text-secondary ms-2"></i></a>
                        </div>
                        <div class="bg-light p-4">
                            <div class="d-flex align-items-center justify-content-center border border-5 border-white mb-4"
                                style="width: 100%; height: 200px;">
                                <img src="img/project-image-1.jpeg" alt="Image" style="width: 100%; height: 100%;">
                            </div>
                            <h4 class="mb-3">Food Bank 2022</h4>
                            <p class="message">On December 26, 2022, the Calabar Crystal Leo Club organized a food bank
                                project for Mrs. Iquo Etim Willie, who lives at 26 Murray Street in Calabar, Cross River
                                State. We had to do an evaluative assessment on every prospective beneficiary of this
                                project in order to choose a qualified applicant. The club selected Mrs. Iquo Etim
                                Willie as a project beneficiary because she is a mother of three sons who tragically
                                lost her husband and two of her children in an accident. She is now left with just her
                                son, who sells ice cream to make ends meet, and a 6-year-old granddaughter. Selling
                                recycled plastic bottles and cartons is how this woman makes ends meet. We made the
                                decision to give this woman non-perishable food items that can last up to 6 months
                                because of this.</p>
                            <a href="" class="btn bg-white text-primary w-100 mt-2">Read More<i
                                    class="fa fa-arrow-right text-secondary ms-2"></i></a>
                        </div>
                        <div class="bg-light p-4">
                            <div class="d-flex align-items-center justify-content-center border border-5 border-white mb-4"
                                style="width: 100%; height: 200px;">
                                <img src="img/project-image-1.jpeg" alt="Image" style="width: 100%; height: 100%;">
                            </div>
                            <h4 class="mb-3">Food Bank 2022</h4>
                            <p class="message">On December 26, 2022, the Calabar Crystal Leo Club organized a food bank
                                project for Mrs. Iquo Etim Willie, who lives at 26 Murray Street in Calabar, Cross River
                                State. We had to do an evaluative assessment on every prospective beneficiary of this
                                project in order to choose a qualified applicant. The club selected Mrs. Iquo Etim
                                Willie as a project beneficiary because she is a mother of three sons who tragically
                                lost her husband and two of her children in an accident. She is now left with just her
                                son, who sells ice cream to make ends meet, and a 6-year-old granddaughter. Selling
                                recycled plastic bottles and cartons is how this woman makes ends meet. We made the
                                decision to give this woman non-perishable food items that can last up to 6 months
                                because of this.</p>
                            <a href="" class="btn bg-white text-primary w-100 mt-2">Read More<i
                                    class="fa fa-arrow-right text-secondary ms-2"></i></a>
                        </div>
                        <div class="bg-light p-4">
                            <div class="d-flex align-items-center justify-content-center border border-5 border-white mb-4"
                                style="width: 100%; height: 200px;">
                                <img src="img/project-image-1.jpeg" alt="Image" style="width: 100%; height: 100%;">
                            </div>
                            <h4 class="mb-3">Food Bank 2022</h4>
                            <p class="message">On December 26, 2022, the Calabar Crystal Leo Club organized a food bank
                                project for Mrs. Iquo Etim Willie, who lives at 26 Murray Street in Calabar, Cross River
                                State. We had to do an evaluative assessment on every prospective beneficiary of this
                                project in order to choose a qualified applicant. The club selected Mrs. Iquo Etim
                                Willie as a project beneficiary because she is a mother of three sons who tragically
                                lost her husband and two of her children in an accident. She is now left with just her
                                son, who sells ice cream to make ends meet, and a 6-year-old granddaughter. Selling
                                recycled plastic bottles and cartons is how this woman makes ends meet. We made the
                                decision to give this woman non-perishable food items that can last up to 6 months
                                because of this.</p>
                            <a href="" class="btn bg-white text-primary w-100 mt-2">Read More<i
                                    class="fa fa-arrow-right text-secondary ms-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Project End -->

    <!-- Blog News -->
    <div class="container-fluid py-5 px-4 px-lg-0">
        <div class="row g-0">

            <div class="col-md-12 col-lg-9">
                <div class="ms-lg-5 ps-lg-5">
                    <div class="text-center text-lg-start wow fadeInUp" data-wow-delay="0.1s">
                        <h6 class="text-secondary text-uppercase">Blog</h6>
                        <h1 class="mb-5">Recent News Update</h1>
                    </div>
                    <div class="row me-lg-3 justify-content-center">

                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="card-box widget-box-one">
                                <i class="mdi mdi-layers widget-one-icon"></i>
                                <div class="wigdet-one-content">

                                    <a href="#"><img class="blog-image wrap" src="app/images/hhh.jpg" alt=""></a>
                                    <h5><a href="" #="">Medical Mission in Southern Kenya</a></h5>
                                    <span class="posted_by">Sep. 15th</span>
                                    <span class="comment"><a href="">21<i class="icon-bubble2"></i></a></span>
                                    <p style="text-align:justify" >Far far away, behind the word mountains, far from the countries Vokalia and
                                        Consonantia,
                                        there live the blind texts.</p>
                                    <p><a href="#">Learn More...</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="card-box widget-box-one">
                                <i class="mdi mdi-layers widget-one-icon"></i>
                                <div class="wigdet-one-content">

                                    <a href="#"><img class="blog-image wrap" src="app/images/hhh.jpg" alt=""></a>
                                    <h5><a href="" #="">Medical Mission in Southern Kenya</a></h5>
                                    <span class="posted_by">Sep. 15th</span>
                                    <span class="comment"><a href="">21<i class="icon-bubble2"></i></a></span>
                                    <p style="text-align:justify" >Far far away, behind the word mountains, far from the countries Vokalia and
                                        Consonantia,
                                        there live the blind texts.</p>
                                    <p><a href="#">Learn More...</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="card-box widget-box-one">
                                <i class="mdi mdi-layers widget-one-icon"></i>
                                <div class="wigdet-one-content">

                                    <a href="#"><img class="blog-image wrap" src="app/images/hhh.jpg" alt=""></a>
                                    <h5><a href="" #="">Medical Mission in Southern Kenya</a></h5>
                                    <span class="posted_by">Sep. 15th</span>
                                    <span class="comment"><a href="">21<i class="icon-bubble2"></i></a></span>
                                    <p style="text-align:justify" >Far far away, behind the word mountains, far from the countries Vokalia and
                                        Consonantia,
                                        there live the blind texts.</p>
                                    <p><a href="#">Learn More...</a></p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- <div class="owl-carousel service-carousel position-relative wow fadeInUp" data-wow-delay="0.1s">
                        <div class="bg-light p-4">
                            <div class="d-flex align-items-center justify-content-center border border-5 border-white mb-4"
                                style="width: 200px; height: 200px;">
                                <img src="img/project-image-1.jpeg" alt="Image" style="width: 100%; height: 100%;">
                            </div>
                            <h4 class="mb-3">Food Bank 2022</h4>
                            <p class="message">On December 26, 2022, the Calabar Crystal Leo Club organized a food bank
                                project for Mrs. Iquo Etim Willie, who lives at 26 Murray Street in Calabar, Cross River
                                State. We had to do an evaluative assessment on every prospective beneficiary of this
                                project in order to choose a qualified applicant. The club selected Mrs. Iquo Etim
                                Willie as a project beneficiary because she is a mother of three sons who tragically
                                lost her husband and two of her children in an accident. She is now left with just her
                                son, who sells ice cream to make ends meet, and a 6-year-old granddaughter. Selling
                                recycled plastic bottles and cartons is how this woman makes ends meet. We made the
                                decision to give this woman non-perishable food items that can last up to 6 months
                                because of this.</p>
                            <a href="" class="btn bg-white text-primary w-100 mt-2">Read More<i
                                    class="fa fa-arrow-right text-secondary ms-2"></i></a>
                        </div>
                        <div class="bg-light p-4">
                            <div class="d-flex align-items-center justify-content-center border border-5 border-white mb-4"
                                style="width: 200px; height: 200px;">
                                <img src="img/project-image-1.jpeg" alt="Image" style="width: 100%; height: 100%;">
                            </div>
                            <h4 class="mb-3">Food Bank 2022</h4>
                            <p class="message">On December 26, 2022, the Calabar Crystal Leo Club organized a food bank
                                project for Mrs. Iquo Etim Willie, who lives at 26 Murray Street in Calabar, Cross River
                                State. We had to do an evaluative assessment on every prospective beneficiary of this
                                project in order to choose a qualified applicant. The club selected Mrs. Iquo Etim
                                Willie as a project beneficiary because she is a mother of three sons who tragically
                                lost her husband and two of her children in an accident. She is now left with just her
                                son, who sells ice cream to make ends meet, and a 6-year-old granddaughter. Selling
                                recycled plastic bottles and cartons is how this woman makes ends meet. We made the
                                decision to give this woman non-perishable food items that can last up to 6 months
                                because of this.</p>
                            <a href="" class="btn bg-white text-primary w-100 mt-2">Read More<i
                                    class="fa fa-arrow-right text-secondary ms-2"></i></a>
                        </div>
                        <div class="bg-light p-4">
                            <div class="d-flex align-items-center justify-content-center border border-5 border-white mb-4"
                                style="width: 200px; height: 200px;">
                                <img src="img/project-image-1.jpeg" alt="Image" style="width: 100%; height: 100%;">
                            </div>
                            <h4 class="mb-3">Food Bank 2022</h4>
                            <p class="message">On December 26, 2022, the Calabar Crystal Leo Club organized a food bank
                                project for Mrs. Iquo Etim Willie, who lives at 26 Murray Street in Calabar, Cross River
                                State. We had to do an evaluative assessment on every prospective beneficiary of this
                                project in order to choose a qualified applicant. The club selected Mrs. Iquo Etim
                                Willie as a project beneficiary because she is a mother of three sons who tragically
                                lost her husband and two of her children in an accident. She is now left with just her
                                son, who sells ice cream to make ends meet, and a 6-year-old granddaughter. Selling
                                recycled plastic bottles and cartons is how this woman makes ends meet. We made the
                                decision to give this woman non-perishable food items that can last up to 6 months
                                because of this.</p>
                            <a href="" class="btn bg-white text-primary w-100 mt-2">Read More<i
                                    class="fa fa-arrow-right text-secondary ms-2"></i></a>
                        </div>
                        <div class="bg-light p-4">
                            <div class="d-flex align-items-center justify-content-center border border-5 border-white mb-4"
                                style="width: 200px; height: 200px;">
                                <img src="img/project-image-1.jpeg" alt="Image" style="width: 100%; height: 100%;">
                            </div>
                            <h4 class="mb-3">Food Bank 2022</h4>
                            <p class="message">On December 26, 2022, the Calabar Crystal Leo Club organized a food bank
                                project for Mrs. Iquo Etim Willie, who lives at 26 Murray Street in Calabar, Cross River
                                State. We had to do an evaluative assessment on every prospective beneficiary of this
                                project in order to choose a qualified applicant. The club selected Mrs. Iquo Etim
                                Willie as a project beneficiary because she is a mother of three sons who tragically
                                lost her husband and two of her children in an accident. She is now left with just her
                                son, who sells ice cream to make ends meet, and a 6-year-old granddaughter. Selling
                                recycled plastic bottles and cartons is how this woman makes ends meet. We made the
                                decision to give this woman non-perishable food items that can last up to 6 months
                                because of this.</p>
                            <a href="" class="btn bg-white text-primary w-100 mt-2">Read More<i
                                    class="fa fa-arrow-right text-secondary ms-2"></i></a>
                        </div>
                        <div class="bg-light p-4">
                            <div class="d-flex align-items-center justify-content-center border border-5 border-white mb-4"
                                style="width: 200px; height: 200px;">
                                <img src="img/project-image-1.jpeg" alt="Image" style="width: 100%; height: 100%;">
                            </div>
                            <h4 class="mb-3">Food Bank 2022</h4>
                            <p class="message">On December 26, 2022, the Calabar Crystal Leo Club organized a food bank
                                project for Mrs. Iquo Etim Willie, who lives at 26 Murray Street in Calabar, Cross River
                                State. We had to do an evaluative assessment on every prospective beneficiary of this
                                project in order to choose a qualified applicant. The club selected Mrs. Iquo Etim
                                Willie as a project beneficiary because she is a mother of three sons who tragically
                                lost her husband and two of her children in an accident. She is now left with just her
                                son, who sells ice cream to make ends meet, and a 6-year-old granddaughter. Selling
                                recycled plastic bottles and cartons is how this woman makes ends meet. We made the
                                decision to give this woman non-perishable food items that can last up to 6 months
                                because of this.</p>
                            <a href="" class="btn bg-white text-primary w-100 mt-2">Read More<i
                                    class="fa fa-arrow-right text-secondary ms-2"></i></a>
                        </div>
                    </div> -->
                </div>
            </div>
            <div class="col-lg-3 d-none d-lg-flex">
                <div class="d-flex align-items-center justify-content-center bg-warning w-100 h-100">
                    <h1 class="m-0 fs-100 display-3" style="transform: rotate(90deg);">Recent News</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Project End -->

    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="text-secondary text-uppercase">Our Learders</h6>
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
                            <img class="img-fluid" src="app/dp_team/<?php echo htmlentities($dpsteam['foto']); ?>"
                                alt="">
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
                                <a class="btn btn-square mx-1"
                                    href="https://facebook.com/<?php echo htmlentities($dpsteam['fbProfile']); ?>"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square mx-1"
                                    href="https://linkedin.com/<?php echo htmlentities($dpsteam['lnProfile']); ?>"><i
                                        class="fab fa-linkedin"></i></a>
                                <a class="btn btn-square mx-1"
                                    href="https://instagram.com/<?php echo htmlentities($dpsteam['igProfile']); ?>"><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <?php } ?>
            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Testimonial Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h6 class="text-secondary text-uppercase">Past Leaders</h6>
                <h1 class="mb-5">Past District Presidents</h1>
            </div>
            <div class="owl-carousel testimonial-carousel position-relative wow fadeInUp" data-wow-delay="0.1s">
                <div class="testimonial-item text-center">
                    <div class="testimonial-text bg-light text-center p-4 mb-4">
                        <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et
                            eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                    <img class="bg-light rounded-circle p-2 mx-auto mb-2" src="img/don.jpeg"
                        style="width: 80px; height: 80px;">
                    <div class="mb-2">
                        <small class="fa fa-star text-secondary"></small>
                        <small class="fa fa-star text-secondary"></small>
                        <small class="fa fa-star text-secondary"></small>
                        <small class="fa fa-star text-secondary"></small>
                        <small class="fa fa-star text-secondary"></small>
                    </div>
                    <h5 class="mb-1">Leo Daniel Don</h5>
                    <p class="m-0">2021/2022 Service Year</p>
                </div>
                <div class="testimonial-item text-center">
                    <div class="testimonial-text bg-light text-center p-4 mb-4">
                        <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et
                            eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                    <img class="bg-light rounded-circle p-2 mx-auto mb-2" src="img/edo.jpeg"
                        style="width: 80px; height: 80px;">
                    <div class="mb-2">
                        <small class="fa fa-star text-secondary"></small>
                        <small class="fa fa-star text-secondary"></small>
                        <small class="fa fa-star text-secondary"></small>
                        <small class="fa fa-star text-secondary"></small>
                        <small class="fa fa-star text-secondary"></small>
                    </div>
                    <h5 class="mb-1">Edoabasi Lawrance</h5>
                    <p class="m-0">2020/2021 Service Year</p>
                </div>
                <div class="testimonial-item text-center">
                    <div class="testimonial-text bg-light text-center p-4 mb-4">
                        <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et
                            eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                    <img class="bg-light rounded-circle p-2 mx-auto mb-2" src="img/ib.jpeg"
                        style="width: 80px; height: 80px;">
                    <div class="mb-2">
                        <small class="fa fa-star text-secondary"></small>
                        <small class="fa fa-star text-secondary"></small>
                        <small class="fa fa-star text-secondary"></small>
                        <small class="fa fa-star text-secondary"></small>
                        <small class="fa fa-star text-secondary"></small>
                    </div>
                    <h5 class="mb-1">Ibikari Bell-gam</h5>
                    <p class="m-0">2018/2019 Service Year</p>
                </div>
                <div class="testimonial-item text-center">
                    <div class="testimonial-text bg-light text-center p-4 mb-4">
                        <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et
                            eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                    <img class="bg-light rounded-circle p-2 mx-auto mb-2" src="img/esor.jpeg"
                        style="width: 80px; height: 80px;">
                    <div class="mb-2">
                        <small class="fa fa-star text-secondary"></small>
                        <small class="fa fa-star text-secondary"></small>
                        <small class="fa fa-star text-secondary"></small>
                        <small class="fa fa-star text-secondary"></small>
                        <small class="fa fa-star text-secondary"></small>
                    </div>
                    <h5 class="mb-1">Bassey Asuquo</h5>
                    <p class="m-0">2019/2022 Service Year</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


    <!-- Footer Start -->
    <?php include('assets/footer.php'); ?>
</body>

</html>