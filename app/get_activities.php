<?php
include('includes/config.php');
if(!empty($_POST["categoryID"])) 
{
 $categoryID=intval($_POST['categoryID']);
$query=mysqli_query($con,"SELECT * FROM tblactivity WHERE activityCatID  =$categoryID");

 while($row=mysqli_fetch_array($query))
 {
  ?>
  <option value="<?php echo htmlentities($row['activityID']); ?>"><?php echo htmlentities($row['title']); ?></option>
  <?php
 }
}
?>