<?php include('assets/header.php');
include('app/includes/config.php');
$error='';
$msg ='';
if (isset($_POST['submit'])) {
  global $con;
  $name = $_POST['firstname'] . ' ' . $_POST['lastname'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  $lastEntry = "SELECT *  From tblcontactentry Where contactName = '$name' 
  AND contactMail = '$email' AND subject = '$subject' AND message = '$message'";
  $sth = $con->query($lastEntry);
  $result = mysqli_fetch_array($sth);
  if (!empty($result) || $result) {
    $error = "Sorry! Message Already Sent. Thanks for Contacting Us";
  } else {
    $insert = "INSERT INTO tblcontactentry VALUES(NULL, '$name', '$email', '$subject', '$message', NOW())";
    // echo $insert; exit;
    $query = mysqli_query($con, $insert);
    if ($query) {
      $msg = "Message Sent, Thanks for Contacting Us ";
    } else {
      $error = "Something went wrong . Please try again.";
    }
  }
}

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
      <h1 class="display-3 text-white mb-3 animated slideInDown">Contact Us</h1>
    </div>
  </div>
  <!-- Page Header End -->


  <!-- Contact Start -->
  <div class="container-xxl py-5">
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <!---Success Message--->
          <?php if ($msg || !empty($msg)) { ?>
          <div class="alert alert-success" role="alert">
            <strong>Well done!</strong>
            <?php echo htmlentities($msg); ?>
          </div>

          <!---Error Message--->
          <?php } elseif ($error || !empty($error)) { ?>
          <div class="alert alert-danger" role="alert">
            <strong>Oh snap!</strong>
            <?php echo htmlentities($error); ?>
          </div>
          <?php } ?>


        </div>
        <div class="row g-4">
          <div class="col-md-6">
            <div class="contact-form wow fadeInUp" data-wow-delay="0.1s">
              <form method="POST" action="">
                <div class="row g-3">
                  <div class="col-md-6">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name"
                        required>
                      <label for="name">First Name</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name"
                        required>
                      <label for="email">Last Name</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-floating">
                      <input type="email" class="form-control" id="email" name="email" placeholder="Your Email"
                        required>
                      <label for="email">Your Email</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject">
                      <label for="subject">Subject</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-floating">
                      <textarea class="form-control" placeholder="Leave a message here" name="message" id="message"
                        style="height: 150px" required></textarea>
                      <label for="message">Message</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <button class="btn btn-dark w-100 py-3" type="submit" name="submit">Send Message</button>
                  </div>
                </div>
              </form>
            </div>
          </div>

          <div class="col-md-6 bg-dark">
            <div class="contact-info">
              <h3 class="text-warning">District President</h3>
              <p class="text-white fs-5 fw-bold" >Leo Ikoh Unoh</p>
              <p class="text-white" >08063652747</p>

              <h3 class="text-warning mt-5">District Secretary</h3>
              <p class="text-white fs-5 fw-bold" >Leo Micheal Isidore</p>
              <p class="text-white" >08134374318</p>
            </div>
          </div>
        </div>

        <div class="row g-4 region-details">
          <div class="col-md-6">
            <div class="contact-info">
              <h4>Region Directors and Associate Region Directors</h4>

              <h5>Region 1</h5>
              <p>Region Director: Leo Jude Micheal</p>
              <p>0803587264</p>
              <p>Associate Region Director: Leo Frank Ayade</p>
              <p>08054736412</p>
            </div>
          </div>

          <div class="col-md-6">
            <div class="contact-info">
              <h5>Region 2</h5>
              <p>Region Director: Leo Jude Micheal</p>
              <p>0803587264</p>
              <p>Associate Region Director: Leo Frank Ayade</p>
              <p>08054736412</p>
            </div>
          </div>

          <div class="col-md-6">
            <div class="contact-info">
              <h5>Region 3</h5>
              <p>Region Director: Leo Jude Micheal</p>
              <p>0803587264</p>
              <p>Associate Region Director: Leo Frank Ayade</p>
              <p>08054736412</p>
            </div>
          </div>

          <div class="col-md-6">
            <div class="contact-info">
              <h5>Region 4</h5>
              <p>Region Director: Leo Jude Micheal</p>
              <p>0803587264</p>
              <p>Associate Region Director: Leo Frank Ayade</p>
              <p>08054736412</p>
            </div>
          </div>

          <div class="col-md-6">
            <div class="contact-info">
              <h5>Region 5</h5>
              <p>Region Director: Leo Jude Micheal</p>
              <p>0803587264</p>
              <p>Associate Region Director: Leo Frank Ayade</p>
              <p>08054736412</p>
            </div>
          </div>

          <div class="col-md-6">
            <div class="contact-info">
              <h5>Region 6</h5>
              <p>Region Director: Leo Jude Micheal</p>
              <p>0803587264</p>
              <p>Associate Region Director: Leo Frank Ayade</p>
              <p>08054736412</p>
            </div>
          </div>

          <!-- Repeat the structure for other regions -->
        </div>
      </div>
    </div>
    </div>

    <!-- Contact End -->


    <!-- Footer Start -->
    <?php include('assets/footer.php'); ?>

</body>

</html>