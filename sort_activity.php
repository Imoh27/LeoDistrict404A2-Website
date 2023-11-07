<?php
   include_once('app/includes/alt_config.php');
if(isset($_POST['activity']) && $_POST['activity']!=""){
 $activity = intval($_POST['gallery']); 
?>
 <div class="row banner-area mb-4" id="activity">

<?php
$select = "SELECT g.galleryID as galleryID, g.foto as photos, g.activityID as activity_id, c.postCategory as postCategory, a.title as title
 FROM tblgallery g JOIN tblactivity a ON a.activityID  = g.activityID  
  INNER JOIN tblcategory c ON c.postCatID = a.activityCatID WHERE a.activityCatID = $activity ORDER BY
   galleryID DESC";
//    echo $select; exit;
$sth = $con->query($select);
$result = $sth->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $photos) { ?>
    <!-- Start single gallery -->
    <div class="col-md-6 col-sm-6 col-lg-3 p-2" data-aos="fade-up" data-aos-delay="200">
        <div class="justify-content-center border border-5 border-white mb-1"  style="width: auto; height: 280px;">
           
            <a data-gall="myGallery" href="app/gallery/<?php echo $photos['photos']; ?> "  >
               <img src="app/gallery/<?php echo $photos['photos']; ?>" alt="" style="width: 100%; height: 100%;" />
            </a>
            <p style="font-size: 12px;" class="gallery-title text-capitalize"><?php echo $photos['title']; ?></p>
        </div>
    </div>
    <!-- End single gallery -->
<?php } ?>
</div>
</div>
<?php } ?>