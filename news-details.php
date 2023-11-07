<?php
session_start();
include('app/includes/config.php');
$postid = intval($_GET['nid']);
$subcatID = intval($_GET['sc']);
//Genrating CSRF Token
if (empty($_SESSION['token'])) {
  $_SESSION['token'] = bin2hex(random_bytes(32));
}

if (isset($_POST['submitComment'])) {
  //Verifying CSRF Token
  if (!empty($_POST['csrftoken'])) {
    if (hash_equals($_SESSION['token'], $_POST['csrftoken'])) {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $comment = $_POST['comment'];

      $st1 = '0';
      $insertComment = "insert into tblcomments values(NULL, $postid,'$name','$email','$comment', now(), $st1)";
      // echo $insertComment; exit;
      $query = mysqli_query($con, $insertComment);
      if ($query):
        echo "<script>alert('comment successfully submit. Comment will be display after admin review ');</script>";
        unset($_SESSION['token']);
      else:
        echo "<script>alert('Something went wrong. Please try again.');</script>";

      endif;

    }
  }
}
?>
<?php include('assets/header.php'); ?>
<?php include('assets/navbar.php'); ?>
<link rel="stylesheet" href="css/modern-business.css">
 <?php
        $pid = intval($_GET['nid']);
        $postSelect = "select * from 
        tblpost p join tblsubcategory s on s.subCatID  =p.postCatID  Inner join  tblcategory c on  
        c.postCatID =s.categoryID  where postID = $postid";
        //  echo $postSelect; exit;
        $query = mysqli_query($con, $postSelect);
       while ($row = mysqli_fetch_array($query)) {
          ?>
        
<title>Leo District 404A2 -- News Update | <?php echo ucwords(htmlentities($row['postTitle'])); ?></title>
 
<body>

  <!-- Navigation -->
  <!-- <?php include('includes/header.php'); ?> -->

  <!-- Page Content -->
  <div class="container">



    <div class="row" style="margin-top: 4%">

      <!-- Blog Entries Column -->
      <div class="col-md-8">

        <!-- Blog Post -->
        

          <div class="card mb-4">

            <div class="card-body">
              <h2 class="card-title" style="text-transform:capitalize !important">
                <?php echo htmlentities($row['postTitle']); ?>
              </h2>
              <p><b>Category : </b>
                <?php echo htmlentities($row['postCategory']); ?> &nbsp; | <b>
                  Subcategory: </b><a href="category.php?catid=<?php echo htmlentities($row['postCatID']) ?>"><?php echo htmlentities($row['subcategory']); ?></a>
                |
                <b> Posted on </b>
                <?php echo htmlentities(date('m-d-Y', strtotime($row['postUpdated']))); ?>
              </p>
              <hr />

              <img class="img-fluid" src="app/postimages/<?php echo htmlentities($row['postPhoto']); ?>" srcset=""
                alt="<?php echo htmlentities($row['postTitle']); ?>">

              <p class="card-text">
                <?php
                $pt = $row['postDetails'];
                echo (substr($pt, 0)); ?>
              </p>

            </div>
            <div class="card-footer text-muted">


            </div>
          </div>
        <?php } ?>

       
          <h4 class="card-header mb-2">Related News</h4>
          <div class="container-fluid row">
              <?php
              $subCat = "select * from tblsubcategory WHERE subCatID = $subcatID";
              //  echo $subCat; exit;
              $query = mysqli_query($con, $subCat);
              $rowSubCat = mysqli_fetch_array($query);
              $SubCatId = $rowSubCat['subCatID'];
      
              $postSelect = "SELECT * from 
                    tblpost p join tblsubcategory s on s.subCatID  =p.postCatID  Inner join  tblcategory c on  
                    c.postCatID =s.categoryID  where p.postCatID = $SubCatId AND   p.postID NOT IN ('$postid')  LIMIT 3 ";
              //  echo $postSelect; exit;
              $Postquery = mysqli_query($con, $postSelect);
              while ($row = mysqli_fetch_array($Postquery)) {?>
                <div class="col-md-4 col-lg-4 card mb-4 mx-1">
                  <a href="news-details.php?sc=<?php echo htmlentities($row['subCatID']);?>&&nid=<?php echo htmlentities($row['postID']) ?>"><img class="card-img-top"
                      src="app/postimages/<?php echo htmlentities($row['postPhoto']); ?>"
                      alt="<?php echo htmlentities($row['postTitle']); ?>"></a>
                  <div class="card-body">
                    <a href="news-details.php?sc=<?php echo htmlentities($row['subCatID']);?>&&nid=<?php echo htmlentities($row['postID']) ?>">
                      <h6 class="card-title" style="text-transform:capitalize !important">
                        <?php echo htmlentities($row['postTitle']); ?>
                      </h6>
                    </a>
                  </div>
                </div>
              <?php } ?>
          </div>
          
      </div>
    
       <!-- Sidebar Widgets Column -->
      <?php include('app/includes/sidebar.php'); ?>
     
    </div>
    <!-- /.row -->
    <!---Comment Section --->

    <div class="row">
      <div class="col-md-8">
        <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body form-floating">
            <form name="comment" method="post">
              <input type="hidden" name="csrftoken" value="<?php echo htmlentities($_SESSION['token']); ?>" />
              <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Enter your fullname" required>
              </div>

              <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Enter your Valid email" required>
              </div>


              <div class="form-group">
                <textarea class="form-control" name="comment" rows="3" placeholder="Comment" required></textarea>
              </div>
              <button type="submit" class="btn btn-primary" name="submitComment">Submit</button>
            </form>
          </div>
        </div>

        <!---Comment Display Section --->

        <?php
        $isActive = 1;
        $comments = "select * from  tblcomments where post='$pid' and isActive='$isActive'";
        $query = mysqli_query($con, $comments);
        while ($row = mysqli_fetch_array($query)) {
          ?>
        <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="images/usericon.png" alt="">
          <div class="media-body">
            <h5 class="mt-0">
              <?php echo htmlentities($row['name']); ?> <br />
              <span style="font-size:11px;"><b>at</b>
                <?php echo htmlentities($row['commentDATE']); ?>
              </span>
            </h5>

            <?php echo htmlentities($row['comment']); ?>
          </div>
        </div>
        <?php } ?>

      </div>
      
    </div>
  </div>


  <?php include('assets/footer.php'); ?>


  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>