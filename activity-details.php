<?php
include_once('app/includes/alt_config.php');
$activity = $_GET['activity'];

$select = "SELECT * FROM tblactivity WHERE activityID = $activity";
$sth = $con->query($select);
$photos = $sth->fetch(PDO::FETCH_ASSOC); 

// echo "".$activity.""; exit;

  //  Navigation
 include('assets/header.php');
        include('assets/navbar.php');
     ?>
<title class="text-capitalize">Leo District 404A2 -- Activity | <?php 
              if (!empty($photos['club_name'])) {
                echo ''. htmlentities($photos['club_name']) .'';
              }elseif (!empty($photos['region_name'])) {
                echo ''. htmlentities($photos['region_name']) .'';
              }else {
                echo '';
              }
               ?> - <?php echo $photos['title']; ?> </title>
</head>
<body>
  

  <!-- Page Content -->
  <div class="container">


    <div class="row" style="margin-top: 4%">

      <!-- Blog Entries Column -->
      <div class="col-md-12 justify-content-center">

        <!-- Blog Post -->
      
          <div class="card mb-4">

            <div class="card-body">
              <h2 class="card-title" style="text-transform:capitalize !important">
                <?php echo htmlentities($photos['title']); ?>
              </h2>
              <p class="text-capitalize"><b> <?php 
              if (!empty($photos['club_name'])) {
                echo ''. htmlentities($photos['club_name']) .'';
              }elseif (!empty($photos['region_name'])) {
                echo ''. htmlentities($photos['region_name']) .'';
              }else {
                echo '';
              }
               ?></b>&nbsp;
                
                 <b> location: </b><?php echo htmlentities($photos['activityLocation']) ?>
                |
                <b> Date: </b>
                <?php echo htmlentities(date('m-d-Y', strtotime($photos['startDate']))); ?>
              </p>
              <hr />

              <img class="img-fluid rounded" src="app/activityimages/<?php echo $photos['activityFoto'];  ?>"
                alt="<?php echo htmlentities($photos['title']); ?>">

              <p class="card-text">
                <?php
                $pt = $photos['activityDesc'];
                echo (substr($pt, 0)); ?>
              </p>
            </div>
            <div class="card-footer text-muted">


            </div>
          </div>

       

      </div>
    </div>
  </div>


  <?php include('assets/footer.php'); ?>


  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>