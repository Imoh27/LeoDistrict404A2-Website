<?php include('assets/header.php'); ?>
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
                <a href="" class="navbar-brand m-0 p-0">
                    <h1 class="text-primary m-0">Leo District 404A2</h1>
                </a>
            </div>
            <div class="col-lg-9 col-md-12 text-end">
                <!--  <div class="h-100 d-inline-flex align-items-center me-4">
                    <i class="fa fa-map-marker-alt text-primary me-2"></i>
                    <p class="m-0">123 Street, New York, USA</p>
                </div>
                <div class="h-100 d-inline-flex align-items-center me-4">
                    <i class="far fa-envelope-open text-primary me-2"></i>
                    <p class="m-0">info@example.com</p>
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


    <!-- Navbar Start -->
    <?php include('assets/navbar.php'); ?>

    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 py-5">
        <div class="container">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Enroll Here!</h1>
            
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Form Start -->

    <div class="d-flex justify-content-center">
        <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
          <div class="bg-light p-5 h-100 d-flex align-items-center">
            <form>
              <div class="row g-3">
                <div class="col-md-12 text-center fh5co-heading mb-4">
                  <h3 class="section-title">Enrollment Form</h3>
                  <p>Fill out the form below if you are a Leo of District 404A2 Nigeria.</p>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="membership-no" placeholder="Membership No" required>
                    <label for="membership-no">Membership No</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="year-joined" placeholder="Year Joined" required>
                    <label for="year-joined">Year Joined</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <select class="form-control" id="region" name="region" required>
                      <option value="">Select Region</option>
                      <option value="region1">Region 1</option>
                      <option value="region2">Region 2</option>
                      <option value="region3">Region 3</option>
                    </select>
                    <label for="region">Region</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <select class="form-control" id="clubs" name="clubs" required>
                      <option value="">Select Club</option>
                      <option value="club1">Club 1</option>
                      <option value="club2">Club 2</option>
                      <option value="club3">Club 3</option>
                    </select>
                    <label for="clubs">Club</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="first-name" placeholder="First Name" required>
                    <label for="first-name">First Name</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="middle-name" placeholder="Middle Name">
                    <label for="middle-name">Middle Name</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="last-name" placeholder="Last Name" required>
                    <label for="last-name">Last Name</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="date" class="form-control" id="dob" required>
                    <label for="dob">Date of Birth</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="email" class="form-control" id="email" placeholder="Email Address" required>
                    <label for="email">Email Address</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="phone1" placeholder="Phone 1" required>
                    <label for="phone1">Phone 1</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="phone2" placeholder="Phone 2">
                    <label for="phone2">Phone 2</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="address" placeholder="Address" required>
                    <label for="address">Address</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="city" placeholder="City" required>
                    <label for="city">City</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="state" placeholder="State" required>
                    <label for="state">State</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating">
                    <input type="file" class="form-control" id="picture" required>
                    <label for="picture">Upload Picture</label>
                  </div>
                </div>
                <div class="col-12 text-center">
                  <button class="btn btn-primary btn-lg" type="submit">Enroll</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      
    <!-- Form End -->


    <!-- Footer Start -->
    <?php include('assets/footer.php'); ?>

</body>

</html>