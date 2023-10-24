<?php
session_start();
include('app/includes/config.php');
global $con;
?>

<!-- hEADER -->
<?php include('assets/header.php'); ?>
<?php include('assets/navbar.php'); ?>
<title>Leo District 404A2 -- Official Website | News Update</title>

<body>


  <!-- Page Content -->
  <div class="container">



    <div class="row" style="margin-top: 4%">

      <!-- Blog Entries Column -->
      <div class="col-md-8">

        <!-- Blog Post -->
        <?php
        if (isset($_GET['pageno'])) {
          $pageno = $_GET['pageno'];
        } else {
          $pageno = 1;
        }
        $no_of_records_per_page = 6;
        $offset = ($pageno - 1) * $no_of_records_per_page;


        $total_pages_sql = "SELECT COUNT(*) FROM tblpost";
        $result = mysqli_query($con, $total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);

        $latestPostSelect = "select * from 
        tblpost p join tblsubcategory s on s.subCatID  =p.postCatID  Inner join  tblcategory c on  
        c.postCatID =s.categoryID  where p.isActive=1 order by p.postID desc 
         LIMIT 2";
        //  echo $latestPostSelect; exit;
        $query = mysqli_query($con, $latestPostSelect); ?>
        <div class="container-fluid">
          <div class="row ">
            <h4 class="card-header mb-2 py-4">Latest Updates</h4>
            <?php while ($row = mysqli_fetch_array($query)) {
              // $posts = $row['postCatID'];
              ?>
              <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card-box widget-box-one">
                  <img class="card-img-top" src="app/postimages/<?php echo htmlentities($row['postPhoto']); ?>"
                    alt="<?php echo htmlentities($row['postTitle']); ?>">
                  <div class="card-body">
                    <h6 class="card-title" style="text-transform:capitalize !important">
                      <?php echo htmlentities($row['postTitle']); ?>
                    </h6>
                    <p style="font-size:12px"><b>Category: </b>
                      <?php echo htmlentities($row['postCategory']); ?> &nbsp; |
                      &nbsp; <b>Sub Category : </b> <a
                        href="category.php?catid=<?php echo htmlentities($row['postCatID']) ?>"><?php echo htmlentities($row['subcategory']); ?></a>
                      &nbsp; | Posted on
                      <?php echo htmlentities(date('d-m-Y', strtotime($row['postUpdated']))); ?>
                    </p>

                    <a href="news-details.php?sc=<?php echo htmlentities($row['subCatID']); ?>&&nid=<?php echo htmlentities($row['postID']) ?>"
                      class="btn btn-primary btn-sm">Read More &rarr;</a>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
          <div class="row ">
            
            <h4 class="card-header mb-3 mt-5 py-4">Popular News</h4>
            <?php
             $AllPostSelect = "select * from 
             tblpost p join tblsubcategory s on s.subCatID  =p.postCatID  Inner join  tblcategory c on  
             c.postCatID =s.categoryID  where p.isActive=1  order by p.postID desc 
              LIMIT $offset, $no_of_records_per_page";
             //  echo $AllPostSelect; exit;
             $query = mysqli_query($con, $AllPostSelect); 
             while ($allrow = mysqli_fetch_array($query)) {
              ?>
              <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card-box widget-box-one">
                  <img class="card-img-top" src="app/postimages/<?php echo htmlentities($allrow['postPhoto']); ?>"
                    alt="<?php echo htmlentities($allrow['postTitle']); ?>">
                  <div class="card-body">
                    <h6 class="card-title" style="text-transform:capitalize !important">
                      <?php echo htmlentities($allrow['postTitle']); ?>
                    </h6>
                    <p style="font-size:12px"><b>Category: </b>
                      <?php echo htmlentities($allrow['postCategory']); ?> &nbsp; |
                      &nbsp; <b>Sub Category : </b> <a
                        href="category.php?catid=<?php echo htmlentities($allrow['postCatID']) ?>"><?php echo htmlentities($allrow['subcategory']); ?></a>
                      &nbsp; | Posted on
                      <?php echo htmlentities(date('d-m-Y', strtotime($allrow['postUpdated']))); ?>
                    </p>

                    <a href="news-details.php?sc=<?php echo htmlentities($allrow['subCatID']); ?>&&nid=<?php echo htmlentities($allrow['postID']) ?>"
                      class="btn btn-primary btn-sm">Read More &rarr;</a>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>





        <!-- Pagination -->


        <ul class="pagination justify-content-center mb-4">
          <li class="page-item"><a href="?pageno=1" class="page-link">First</a></li>
          <li class="<?php if ($pageno <= 1) {
            echo 'disabled';
          } ?> page-item">
            <a href="<?php if ($pageno <= 1) {
              echo '#';
            } else {
              echo "?pageno=" . ($pageno - 1);
            } ?>" class="page-link">Prev</a>
          </li>
          <li class="<?php if ($pageno >= $total_pages) {
            echo 'disabled';
          } ?> page-item">
            <a href="<?php if ($pageno >= $total_pages) {
              echo '#';
            } else {
              echo "?pageno=" . ($pageno + 1);
            } ?> " class="page-link">Next</a>
          </li>
          <li class="page-item"><a href="?pageno=<?php echo $total_pages; ?>" class="page-link">Last</a></li>
        </ul>
        <div class="col-sm-12 text-center"><img class="img-fluid "  src="img/loaderboard--.png" alt=""></div>
        
        
      </div>
      
      <!-- Sidebar Widgets Column -->
      <?php include('app/includes/sidebar.php'); ?>
    </div>
    <!-- /.row -->
    
  </div>
  <!-- /.container -->

  <!-- Footer -->
  <?php include('assets/footer.php'); ?>


  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


  </head>
</body>

</html>