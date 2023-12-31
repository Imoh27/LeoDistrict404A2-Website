<?php include('assets/header.php');
include('app/includes/alt_config.php'); 
global $con;
$lsyQuery = "SELECT *  From tblserviceyr ORDER BY serviceYrID  desc";
$query = $con->query($lsyQuery);
$result = $query->fetch(PDO::FETCH_ASSOC);
$currentLSYID = $result['serviceYrID'];
?>
<title>Leo District 404A2 -- Official Website | About our District</title>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-light d-none d-lg-block">
        <div class="row align-items-center top-bar">
            <div class="col-lg-3 col-md-12 text-center text-lg-start">
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

    <?php include('assets/navbar.php'); ?>

    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 py-5">
        <div class="container">
            <h1 class="display-3 text-white mb-3 animated slideInDown">About Us</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb text-uppercase">
                    <li class="breadcrumb-item"><a class="text-white">Leo District404A2 Nigeria</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="text-secondary text-uppercase">About Us</h6>
                    <h1 class="mb-4">Welcome to Leo Club District 404A2 Nigeria!</h1>
                    <p class="mb-4" style="text-align: justify">Leo Club District 404A2 Nigeria is a vibrant community of young leaders dedicated to making a positive impact in our local communities. As part of the global Lions Clubs International organization, we are committed to service, leadership, and fostering a spirit of volunteerism among the youth of Nigeria.</p>
                    <p class="mb-4" style="text-align: justify">Our Leo Clubs are youth organizations that bring together passionate and motivated individuals who share a common goal: to serve those in need and create lasting change. Through a variety of community service projects and initiatives, we strive to address the pressing social issues faced by our communities.</p>
                    <p class="mb-4" style="text-align: justify">At Leo Club District 404A2 Nigeria, we believe that every young person has the power to make a difference. We provide a platform for personal and leadership development, empowering our members to take charge and drive positive change. Through engaging activities, workshops, and mentorship programs, we equip our Leos with the skills and knowledge needed to become effective leaders in their communities and beyond.</p>
                    <p class="mb-4" style="text-align: justify">As an integral part of the Lions Clubs International network, our Leo Clubs benefit from the guidance and support of experienced Lions members. This collaboration allows us to leverage the extensive resources, expertise, and global reach of Lions Clubs International to amplify our impact and tackle larger-scale projects that benefit society.</p>
                    <p class="mb-4" style="text-align: justify">Join us in our mission to serve, lead, and inspire. Whether you're a young person passionate about community service or an organization seeking a dynamic partner in making a difference, Leo Club District 404A2 Nigeria welcomes you. Together, let's create a brighter future for Nigeria, one act of service at a time.</p>

                </div>
                <div class="col-lg-6 pt-4" style="min-height: 300px;">
                    <div class="position-relative h-100 wow fadeInUp" data-wow-delay="0.5s">
                        <img class="position-absolute img-fluid w-100 h-100" src="img/dp.jpeg" style="object-fit: cover; padding: 0 0 50px 100px;" alt="">
                        <img class="position-absolute start-0 bottom-0 img-fluid  pt-2 pe-2 w-auto h-50" src="img/dplogo23-24.jpg" alt="">
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
                    <i class="fas fa-users fa-2x text-white mb-3"></i>
                    <h2 class="text-white mb-2" data-toggle="counter-up">37</h2>
                    <p class="text-white mb-0">Clubs in District404A2</p>
                </div>
                <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.3s">
                    <i class="fa fa-users fa-2x text-white mb-3"></i>
                    <h2 class="text-white mb-2" data-toggle="counter-up">3500</h2>
                    <p class="text-white mb-0">Leos in District404A2</p>
                </div>
                <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.5s">
                    <i class="fas fa-globe fa-2x text-white mb-3"></i>
                    <h2 class="text-white mb-2" data-toggle="counter-up">18</h2>
                    <p class="text-white mb-0">States and Territories</p>
                </div>
                <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.7s">
                    <i class="fas fa-hands-helping fa-2x text-white mb-3"></i>
                    <h2 class="text-white mb-2" data-toggle="counter-up">18000</h2>
                    <p class="text-white mb-0">Service Projects in 2010-22</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Fact End -->
    <!-- Invocation Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <!-- <h6 class="text-secondary text-uppercase">INVOCATIONS</h6> -->
                    <h3 class="mb-4 ">LEO PRAYER</h3>
                    <p class="mb-4">One thing I desire each day is to serve my fellow man in whatever capacity I can and in whichever circumstance I find myself. Lord, grant me enough strength to do this and even more.</p>
                    <h3 class="mb-4">LEO PURPOSE</h3>
                    <p class="mb-4">To Promote Service activities among the youths of the community which will develop their individual qualities of Leadership Experience & Opportunity. </p>
                    <h3 class="mb-4">LEO OBJECT</h3>
                    <p class="mb-4">To provide the youths of the world an opportunity for development and contribution, individually and collectively as a responsible member of the local, national and international community. To stimulate among its members, acceptance of high ethical standard. To provide experience through service to the community. To promote international understanding.</p>

                </div>
                <div class="col-lg-6 pt-4" style="min-height: 300px;">
                    <div class="position-relative h-100 wow fadeInUp" data-wow-delay="0.5s">
                        <img class="position-absolute img-fluid w-100 h-100" src="img/1st-council.jpg" style="object-fit: cover; padding: 0 0 50px 100px;" alt="">
                        <img class="position-absolute start-0 bottom-0 img-fluid bg-white pt-2 pe-2 w-50 h-50" src="img/thanks.jpg" style="object-fit: cover;" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 pt-4" style="min-height: 300px;">
                    <div class="position-relative h-100 wow fadeInUp" data-wow-delay="0.5s">
                        <img class="position-absolute img-fluid w-auto h-100" src="img/lion-pic.jpg" style="object-fit: cover; padding:  0 100px 50px 0;" alt="">
                        <img class="position-absolute end-0 bottom-0 img-fluid bg-white pt-2 pe-2 w-50 h-50" src="img/lion-2.jpg" style="object-fit: cover;" alt="">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h3 class="mb-4">LEO PLEDGE</h3>
                    <p class="mb-4">I Pledge my hands, extended and open to help those in need. I Pledge my heart, reach for it and it will be touched. I Pledge my ears, to hear another’s outcry, my eyes, to see the plight of others, my knowledge, to bring a man closer to his dreams. I Pledge myself to the betterment of my community, my State and my Country.</p>
                    <h3 class="mb-4">LIONS CODE OF ETHICS</h3>
                    <p class="mb-4">To show my faith in the worthiness of my vacation by industrious application to the end that I may merit a reputation for quality of service. To seek success and to demand all fair remuneration or profit as my just due, but to accept no profit or success at the price of my own self respect lost because of unfair advantages taken or because of questionable acts on my part. To remember that in building up my business, it is not necessary to tear down another's to be loyal to my client or customers and true to myself. <br><br>Whenever a doubt arises to the right or ethics of my position or action towards others, to resolve such doubt against myself. To hold friendship as an end and not a means, to hold that true friendship exists not on account of the service performed by one to another but that true friendship demands nothing but accept service in the spirit in which it is given. Always to bear in mind my obligations as a citizen to my nation, my state and my community and to give them my unswerving loyalty in word, act and deed. To give them freely on my time, labour and means. To aid others by giving my sympathy to those in distress, my aid to the weak, and my substance to the needy.</p>
                </div>

            </div>
        </div>
    </div>

    <!-- Invovation End -->
    

    <?php 
            $select = "SELECT * FROM tbldpsteam d JOIN tbldistrictoffices o ON o.dOfficesID  = d.dOfficesID 
            JOIN tblserviceyr s ON s.serviceYrID = d.serviceYrID WHERE d.serviceYrID =  $currentLSYID";
            $query = $con->query($select);
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
           //  var_dump($result);
        ?>
        
        <!-- Team Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="text-secondary text-uppercase">Our Leaders</h6>
                    <h1 class="mb-5">District President Team</h1>
                </div>
                <div class="row g-4">
                   <?php
                    foreach ($result as $dpsteam) { ?>

                        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="team-item">
                                <div class="position-relative overflow-hidden" style="width: 260px; height: 300px;">
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


    <!-- Footer Start -->
    <?php include('assets/footer.php'); ?>
</body>

</html>