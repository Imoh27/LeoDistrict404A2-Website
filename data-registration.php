<?php
 include('app/includes/alt_config.php');
error_reporting(0);
// $page = $_GET['page'];
// echo $page; exit;
    if (isset($_POST['enrol'])) {
        global $con;

        $region = strip_tags(htmlspecialchars($_POST['region']));
        $clubs = strip_tags(htmlspecialchars($_POST['clubs']));
        $memberNo = strip_tags(htmlspecialchars($_POST['memberNo']));
        $firstname = strip_tags(htmlspecialchars($_POST['firstname']));
        $middlename = strip_tags(htmlspecialchars($_POST['middlename']));
        $lastname = strip_tags(htmlspecialchars($_POST['lastname']));
        $email = strip_tags(htmlspecialchars($_POST['email']));
        $phone = strip_tags(htmlspecialchars($_POST['phone']));
        $altPhone = strip_tags(htmlspecialchars($_POST['altPhone']));
        $residence = strip_tags(htmlspecialchars($_POST['residence']));
        $memberSince = strip_tags(htmlspecialchars($_POST['memberSince']));
        $gender = strip_tags(htmlspecialchars($_POST['gender']));
        $stateOrigin = strip_tags(htmlspecialchars($_POST['stateOrigin']));
        $lga = strip_tags(htmlspecialchars($_POST['lga']));
        $stateResidence = strip_tags(htmlspecialchars($_POST['stateResidence']));
        $city = strip_tags(htmlspecialchars($_POST['city']));
        $dob = strip_tags(htmlspecialchars($_POST['dob']));
        $occupation = strip_tags(htmlspecialchars($_POST['occupation']));
        $maritalStatus = strip_tags(htmlspecialchars($_POST['maritalStatus']));
        $imgfile = strip_tags(htmlspecialchars(strtolower($_FILES["memberDp"]["name"])));
        $img_size = $_FILES["memberDp"]["size"];
        $added_by = empty($_SESSION['login']) ? 'NULL': $_SESSION['login'];
        $isActive = 1;
        
        $session_user = "SELECT *  From tblusers WHERE loginID = '$added_by'";
        $sth = $con->query($session_user);
        $result = $sth->fetch(PDO::FETCH_OBJ);
        $added_by = empty($result) || !$result ? 'NULL': $result->userID;
        // echo strlen($memberNo); exit;

        // get the image extension
        $extension = substr($imgfile, strlen($imgfile) - 4, strlen($imgfile));
        // allowed extensions
        $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");
        $curr_date = date('Y-m-d');
        $calc_date = date('Y', strtotime($curr_date)) - date('Y', strtotime($dob));
        // echo $calc_date; exit;
        // Validation for allowed extensions .in_array() function searches an array for a specific value.
        
        if ($calc_date < 16) {
          $error = "Please Ensure your age is above 16";
          
        }elseif (strlen($memberNo) < 7) {
            $error = "Invalid Membership No Entered";
          }else{
        if (!in_array($extension, $allowed_extensions)) {
            $error = "Invalid format. Only jpg / jpeg/ png /gif format allowed";
            // echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
        } else {
         
            //rename the image file
            $imgnewfile = md5($imgfile) .'_['.$lastname.'].'. $extension;
            // echo $imgnewfile; exit;
            // Code for move image into directory
            // move_uploaded_file($_FILES["member_dp"]["tmp_name"],"membersimages/".$imgnewfile);

            $select = "SELECT * FROM tblmembers where membershipNo  = $memberNo";
            // echo $select; exit;
            $sth = $con->query($select);
            $results = $sth->fetchAll(PDO::FETCH_ASSOC);
            // echo  $calc_date; exit;
            if (!empty($results)) {
                $error = "Sorry, Seems Entry Already Exists";
            }
            else {
              if ($img_size > 1048000) {
                $error = "Maximum image size of 1mb exceeded";
               
              }else{
                move_uploaded_file($_FILES["memberDp"]["tmp_name"], "app/membersimages/". $imgnewfile);
                $insert = "INSERT INTO tblmembers VALUES(NULL, $clubs, $region,  '$memberNo','$firstname', '$lastname', '$middlename',
                '$email', '$gender', '$phone', '$altPhone', '$residence', '$maritalStatus', '$occupation', '$city', $stateResidence, $stateOrigin, $lga, ' $memberSince', '$dob',
                      '$imgnewfile', NOW(), $added_by, $isActive)";
                // echo $insert; exit;
                $query = $con->query($insert);

                //  echo $query; exit;
                if ($query) {
                    $msg = "Member successfully added ";
                } else {
                    $error = "Something went wrong . Please try again.";
                }
            }
          }
        }
    }
  }


    
    // END ADD MEMBERS 
 include('assets/header.php'); 


?>

<title>Leo District 404A2 -- Official Website | Member Enrollment</title>
</head>

<script>

    function getClubs(val) {
        $.ajax({
            type: "POST",
            url: "app/get_clubs.php",
            data: 'regionID=' + val,
            beforeSend: function() {
                $("#clubs").html('Fetching, Please Wait...');
            },
            success: function(data) {
                $("#clubs").html(data);
            }
        });
    }
    
    function getLga(val) {
        $.ajax({
            type: "POST",
            url: "app/get_lga.php",
            data: 'stateID=' + val,
            beforeSend: function() {
                $("#lga").html('Fetching, Please Wait...');
            },
            success: function(data) {
                $("#lga").html(data);
            }
        });
    }
    </script>
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

<!-- ALERT  -->
<div class="row justify-content-center align-items-center">
                        <div class="col-sm-6">
                            <!---Success Message--->
                            <?php if ($msg) { ?>
                            <div class="alert alert-success" role="alert">
                                <strong>Well done!</strong>
                                <?php echo htmlentities($msg); ?>
                            </div>
                            <?php } ?>

                            <!---Error Message--->
                            <?php if ($error) { ?>
                            <div class="alert alert-danger" role="alert">
                                <strong>Oh snap!</strong>
                                <?php echo htmlentities($error); ?>
                            </div>
                            <?php } ?>


                        </div>
                    </div>

<!-- END ALERT -->
    <!-- Form Start -->

    <div class="d-flex justify-content-center">
        <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
          <div class="bg-light p-5 h-100 d-flex align-items-center">
            <form action="" method="POST" id="regleo" name="regleo" enctype="multipart/form-data" onSubmit="return valid();">
              <div class="row g-3">
                <div class="col-md-12 text-center fh5co-heading mb-4">
                  <h3 class="section-title">Enrollment Form</h3>
                  <p>Fill out the form below if you are a Leo of District 404A2 Nigeria.</p>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="memberNo" name="memberNo" placeholder="Membership No" required>
                    <label for="memberNo">Membership No</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="year-joined" name="memberSince" placeholder="Year Joined" required>
                    <label for="memberSince">Year Joined</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                  <?php
                                            $select = "SELECT * FROM tblregion";
                                            //  echo $select; exit;
                                            $sth = $con->query($select);
                                            $results = $sth->FetchAll(PDO::FETCH_ASSOC);
                                            // echo  $id = $results['id']; exit;
                                            ?>
                                            <!-- <label for="member_type">Select Region</label> -->
                                            <select class="form-control" name="region" id="region"
                                                onChange="getClubs(this.value);" required>
                                               
                                                <option value="" selected>Select Region </option>
                                                <?php
                                                foreach ($results as $regions) {
                                                    ?>
                                                <option value="<?php echo htmlentities($regions['regionID']); ?>">
                                                   Region <?php echo htmlentities($regions['region']); ?></option>
                                                <?php } ?>

                                            </select>
                    <label for="region">Region</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <select class="form-control" id="clubs" name="clubs" required>
                      
                    </select>
                    <label for="clubs">Club</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name" required>
                    <label for="first-name">First Name</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="middle-name" name="middlename" placeholder="Middle Name">
                    <label for="middle-name">Middle Name</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="last-name" name="lastname" placeholder="Last Name" required>
                    <label for="last-name">Last Name</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="date" class="form-control" id="dob" name="dob" required>
                    <label for="dob">Date of Birth</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                  <select name="maritalStatus" id="maritalStatus" class="form-control">
                                        <option value=""></option>
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                        <option value="Other">Other</option>
                                    </select>
                    <label for="dob">Marital Status</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                  <select name="gender" id="gender" class="form-control">
                                        
                                        <option value=""></option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                    <label for="dob">Gender</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" title="Enter Email Format" required>
                    <label for="email">Email Address</label>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="phone1" name="phone" placeholder="Phone 1" required>
                    <label for="phone1">Phone 1</label>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="phone2" name="altPhone" placeholder="Phone 2">
                    <label for="phone2">Phone 2</label>
                  </div>
                </div>
                
                <div class="col-md-3">
                  <div class="form-floating">
                  <?php
                                        $select = "SELECT * FROM tblstates";
                                        //  echo $select; exit;
                                        $sth = $con->query($select);
                                        $results = $sth->FetchAll(PDO::FETCH_ASSOC);
                                        // echo  $id = $results['id']; exit;
                                        ?>
                                    <select class="form-control" name="stateOrigin" id="stateOrigin"
                                        onChange="getLga(this.value);" required>
                                       
                                        <option value="" selected>Select State </option>
                                        <?php 
                                            // Feching active categories
                                        

                                            foreach ($results as $states) {
                                                ?>
                                        <option value="<?php echo htmlentities($states['stateID']); ?>">
                                            <?php echo htmlentities($states['stateName']); ?></option>
                                        <?php } ?>

                                    </select>
                                    <label for="stateOrigin">Origin</label>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-floating">
                  <select class="form-control" name="lga" id="lga" required>

</select>
                    <label for="lga">lga</label>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-floating">
                  <?php
                                        $select = "SELECT * FROM tblstates";
                                        //  echo $select; exit;
                                        $sth = $con->query($select);
                                        $results = $sth->FetchAll(PDO::FETCH_ASSOC);
                                        // echo  $id = $results['id']; exit;
                                        ?>
                                    <select class="form-control" name="stateResidence" id="stateResidence"  required>
                                        
                                        <option value="" selected>Select State </option>
                                        <?php 
                                            // Feching active categories
                                        

                                            foreach ($results as $states) {
                                                ?>
                                        <option value="<?php echo htmlentities($states['stateID']); ?>">
                                            <?php echo htmlentities($states['stateName']); ?></option>
                                        <?php } ?>

                                    </select>
                                    <label for="stateResidence">Residence</label>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="city" name="city" placeholder="City" required>
                    <label for="city">City</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="residence" id="residence" placeholder="Address" required>
                    <label for="residence">Address</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="occupation" name="occupation" placeholder="Occupation" required>
                    <label for="occupation">Occupation</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating">
                    <input type="file" class="form-control" name="memberDp" id="memberDp" required>
                    <label for="memberDp">Upload Picture: <p style="display: inline;" class="text-danger">Maximum Size 1mb</p></label>
                  </div>
                </div>
                <div class="col-12 text-center">
                  <button class="btn btn-primary btn-lg" type="submit" name="enrol">Enroll</button>
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