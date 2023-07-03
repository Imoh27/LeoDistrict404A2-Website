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

        $postSelect = "select * from 
        tblpost p join tblsubcategory s on s.subCatID  =p.postCatID  Inner join  tblcategory c on  
        c.postCatID =s.categoryID  where p.isActive=1 order by p.postID desc 
         LIMIT $offset, $no_of_records_per_page";
        //  echo $postSelect; exit;
        $query = mysqli_query($con, $postSelect);
        while ($row = mysqli_fetch_array($query)) {
        ?>

          <div class="card mb-4">
            <img class="card-img-top" src="app/postimages/<?php echo htmlentities($row['postPhoto']); ?>" alt="<?php echo htmlentities($row['postTitle']); ?>">
            <div class="card-body">
              <h2 class="card-title" style="text-transform:capitalize !important"><?php echo htmlentities($row['postTitle']); ?></h2>
              <p><b>Category: </b><?php echo htmlentities($row['postCategory']); ?> &nbsp; | &nbsp; <b>Sub Category : </b> <a href="category.php?catid=<?php echo htmlentities($row['postCatID ']) ?>"><?php echo htmlentities($row['subcategory']); ?></a> </p>

              <a href="news-details.php?nid=<?php echo htmlentities($row['postID']) ?>" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
              Posted on <?php echo htmlentities(date('d-m-Y', strtotime($row['postUpdated']))); ?>

            </div>
          </div>
        <?php } ?>




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