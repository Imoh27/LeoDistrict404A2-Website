 <!-- Navbar Start -->
 <div class="container-fluid nav-bar bg-light">
     <nav class="navbar navbar-expand-lg navbar-light bg-white p-3 py-lg-0 px-lg-4">
         <a href="" class="navbar-brand d-flex align-items-center m-0 p-0 d-lg-none">
             <img src="app/images/dplogo23-24.jpg" alt="" height="50">
             <h2 class="d-inline-flex text-primary ms-2">Leo District 404A2</h2>
         </a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
             <span class="fa fa-bars"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarCollapse">
             <div class="navbar-nav me-auto">
                 <a href="index?page=home" class="nav-item nav-link <?php if ($_GET['page'] == 'home' || !$_GET['page']) { ?>
                        active<?php } ?>">Home</a>
                 <div class="nav-item dropdown">
                     <a class="nav-link <?php if ($_GET['page'] == 'about') { ?>
                            active<?php } ?>" data-bs-toggle="dropdown">About</a>
                     <div class="dropdown-menu fade-up m-0">
                         <a href="about?page=about" class="dropdown-item">Our District</a>
                         <a href="district?page=about&&section=lion-leaders" class="dropdown-item">Lion Leaders</a>
                         <a href="past-dp?page=about&&section=past-dps" class="dropdown-item">Past District Presidents</a>
                         <a href="district?page=about&&section=coreofficers" class="dropdown-item">Core Officers</a>
                         <a href="district?page=about&&section=region-directors" class="dropdown-item">Region Directors</a>
                         <a href="club-presidents?page=about&&club presdients" class="dropdown-item">Club Presidents</a>
                     </div>
                 </div>
                 <div class="nav-item dropdown">
                     <a class="nav-link <?php if ($_GET['page'] == 'activities') { ?>
                            active<?php } ?>" data-bs-toggle="dropdown">Activities</a>
                     <div class="dropdown-menu fade-up m-0">
                         <a href="activities?page=activities&&section=district-activities" class="dropdown-item">District Activities</a>
                         <a href="activities?page=activities&&section=region-activities" class="dropdown-item">Regions activities</a>
                         <a href="activities?page=activities&&section=club-activities" class="dropdown-item">Clubs activities</a>
                     </div>
                 </div>
                 <a href="gallery?page=gallery" class="nav-item nav-link <?php if ($_GET['page'] == 'gallery') { ?>
                        active<?php } ?>">Gallery</a>
                 <a href="news-update?page=blog" class="nav-item nav-link <?php if ($_GET['page'] == 'blog') { ?>
                        active<?php } ?>">Blog</a>

                 <a href="contact?page=contact-us" class="nav-item nav-link <?php if ($_GET['page'] == 'contact-us') { ?>
                        active<?php } ?>">Contact</a>
             </div>
             <div class="h-100 d-inline-flex align-items-center me-4">
                 <i class="far fa-envelope-open text-primary me-2"></i>
                 <p class="m-0">info@leodistrict404a2.com.ng</p>
             </div>
             <div class="h-100 d-inline-flex align-items-center">
                 <a class="btn btn-sm-square bg-white text-primary me-1" href="https://www.facebook.com/groups/leodistirct404a/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                 <a class="btn btn-sm-square bg-white text-primary me-1" href="https://twitter.com/LeoDist404a2?t=UNMJVXY_rO5MOYHOOWGJUA&s=09" target="_blank"><i class="fab fa-twitter"></i></a>
                 <a class="btn btn-sm-square bg-white text-primary me-0" href="https://instagram.com/district404a2?igshid=MzRlODBiNWFlZA==" target="_blank"><i class="fab fa-instagram"></i></a>
             </div>
              <a href="data-registration?page=enrolment-form" target="__blank" class="btn btn-primary btn-rounded py-md-2 px-md-2 ms-lg-3 animated slideInLeft">Register</a>
         </div>
     </nav>
 </div>
 <!-- Navbar End -->