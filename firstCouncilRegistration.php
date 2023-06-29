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
                 <!-- <div class="h-100 d-inline-flex align-items-center me-4">
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

    <?php include('assets/navbar.php'); ?>

    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 py-5">
        <div class="container">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Welcome to the Leo Dirstrict 404A2 Nigeria Registration Page for the First Council Meeting!</h1>
            <h4 class="text-white">District 404A2 Nigeria First Council Meeting Registration: Join us to discuss projects, exchange ideas, and strengthen our District. Register now for a transformative experience!</h4>
            
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
                <h3 class="section-title">Registration Form</h3>
                <p>Fill the form to Join us at the First Council Meeting</p>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <select class="form-control" id="member-type" required>
                    <option value="">Are You a?</option>
                    <option value="leo">Leo</option>
                    <option value="leo-lion">Leo-Lion</option>
                  </select>
                  <label for="member-type">Are You a?</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="text" class="form-control" id="membership-id" placeholder="Membership ID" required>
                  <label for="membership-id">Membership ID</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <select class="form-control" id="region" required>
                    <option value="">Select Region</option>
                    <option value="region1">Region 1</option>
                    <option value="region2">Region 2</option>
                    <option value="region3">Region 3</option>
                    <option value="region3">Region 4</option>
                  </select>
                  <label for="region">Region</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="text" class="form-control" id="club" placeholder="Club" required>
                  <label for="club">Club</label>
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
                  <input type="text" class="form-control" id="last-name" placeholder="Last Name" required>
                  <label for="last-name">Last Name</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-floating">
                  <select class="form-control" id="gender" required>
                    <option value="">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                  </select>
                  <label for="gender">Gender</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="email" class="form-control" id="email" placeholder="Email" required>
                  <label for="email">Email</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="text" class="form-control" id="phone" placeholder="Phone No" required>
                  <label for="phone">Phone No</label>
                </div>
              </div>
              <div class="col-12 text-center">
                <button class="btn btn-primary btn-lg" type="submit">Next</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Confirmation Section (Hidden by Default) -->
    <div id="confirmation-section" style="display: none;">
      <div class="d-flex justify-content-center">
        <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
          <div class="bg-light p-5 h-100 d-flex align-items-center">
            <div class="text-center">
              <div id="user-info" class="user-info"></div>
              <div class="amount-container">
                <h3 class="section-title">Amount to Pay</h3>
                <p class="amount">NGN 7000</p>
              </div>
              <button class="btn btn-secondary" id="back-button">Back</button>
              <button class="btn btn-primary" id="confirm-button">Confirm and Make Payment</button>
            </div>
          </div>
        </div>
      </div>
    </div>    
    <!-- Form End -->


    <!-- Footer Start -->
    

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-0 back-to-top"><i class="bi bi-arrow-up"></i></a>

    <?php include('assets/footer.php'); ?>

    <!-- JavaScript Libraries -->
    <script>
    // Get form and confirmation section elements
const form = document.querySelector('form');
const confirmationSection = document.getElementById('confirmation-section');
const backButton = document.getElementById('back-button');
const confirmButton = document.getElementById('confirm-button');

// Add form submission event listener
form.addEventListener('submit', function(event) {
  event.preventDefault(); // Prevent form submission

  // Get form input values
  const memberType = document.getElementById('member-type').value;
  const membershipId = document.getElementById('membership-id').value;
  const region = document.getElementById('region').value;
  const club = document.getElementById('club').value;
  const firstName = document.getElementById('first-name').value;
  const lastName = document.getElementById('last-name').value;
  const gender = document.getElementById('gender').value;
  const email = document.getElementById('email').value;
  const phone = document.getElementById('phone').value;

  // Validate form data here
  // ...

  // Hide form and show confirmation section
  form.style.display = 'none';
  confirmationSection.style.display = 'block';

  // Display user information and amount to pay
  const userInfo = document.getElementById('user-info');
  userInfo.innerHTML = `
    <h3>Confirm Your Information</h3>
    <p><strong>Are You a:</strong> ${memberType}</p>
    <p><strong>Membership ID:</strong> ${membershipId}</p>
    <p><strong>Region:</strong> ${region}</p>
    <p><strong>Club:</strong> ${club}</p>
    <p><strong>First Name:</strong> ${firstName}</p>
    <p><strong>Last Name:</strong> ${lastName}</p>
    <p><strong>Gender:</strong> ${gender}</p>
    <p><strong>Email:</strong> ${email}</p>
    <p><strong>Phone No:</strong> ${phone}</p>
  `;
});

// Add event listener to go back to the form
backButton.addEventListener('click', function() {
  // Show form and hide confirmation section
  form.style.display = 'block';
  confirmationSection.style.display = 'none';
});

// Add event listener to confirm and make payment
confirmButton.addEventListener('click', function() {
  // Handle payment logic here
  // ...
});

      </script>
    
    
</body>

</html>