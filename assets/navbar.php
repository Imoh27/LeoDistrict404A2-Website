 
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
                    <a href="index?page=home" class="nav-item nav-link <?php if ($_GET['page'] == 'home' || !$_GET['page']) {?>
                        active<?php } ?>">Home</a>
                    <a href="about?page=about" class="nav-item nav-link <?php if ($_GET['page'] == 'about') {?>
                        active<?php } ?>">About</a>
                    <a href="blog?page=blog" class="nav-item nav-link <?php if ($_GET['page'] == 'blog') {?>
                        active<?php } ?>">Blog</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link" data-bs-toggle="dropdown">Activities</a>
                        <!-- <div class="dropdown-menu fade-up m-0">
                            <a href="booking" class="dropdown-item">Activities</a>
                            <a href="team" class="dropdown-item">Signature Activities</a>
                            <a href="testimonial" class="dropdown-item">Upcoming Activities</a>
                            <a href="404" class="dropdown-item">Past Activities</a>
                        </div> -->
                    </div>
                    <a href="contact?page=contact-us" class="nav-item nav-link <?php if ($_GET['page'] == 'contact-us') {?>
                        active<?php } ?>">Contact</a>
                </div>
                <div class="h-100 d-inline-flex align-items-center me-4">
                    <i class="far fa-envelope-open text-primary me-2"></i>
                    <p class="m-0">leodistrict404A2nig@yahoo.com</p>
                </div>
                <div class="h-100 d-inline-flex align-items-center">
                    <a class="btn btn-sm-square bg-white text-primary me-1"
                        href="https://www.facebook.com/groups/leodistirct404a/" target="_blank"><i
                            class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-sm-square bg-white text-primary me-1"
                        href="https://twitter.com/LeoDist404a2?t=UNMJVXY_rO5MOYHOOWGJUA&s=09" target="_blank"><i
                            class="fab fa-twitter"></i></a>
                    <a class="btn btn-sm-square bg-white text-primary me-0"
                        href="https://instagram.com/district404a2?igshid=MzRlODBiNWFlZA==" target="_blank"><i
                            class="fab fa-instagram"></i></a>
                </div>
                <!-- <div class="mt-4 mt-lg-0 me-lg-n4 py-3 px-4 bg-primary d-flex align-items-center">
                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-white" style="width: 45px; height: 45px;">
                        <i class="fa fa-phone-alt text-primary"></i>
                    </div>
                    <div class="ms-3">
                        <p class="mb-1 text-white">Emergency 24/7</p>
                        <h5 class="m-0 text-secondary">+012 345 6789</h5>
                    </div>
                </div> -->
            </div>
        </nav>
    </div>
    <!-- Navbar End -->