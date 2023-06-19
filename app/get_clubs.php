<?php
include('includes/config.php');
if(!empty($_POST["regionID"])) 
{
 $regionID=intval($_POST['regionID']);
$query=mysqli_query($con,"SELECT * FROM tblclubs WHERE regionID =$regionID");
?>
<option value="">Select Clubs</option>
<?php
 while($row=mysqli_fetch_array($query))
 {
  ?>
  <option value="<?php echo htmlentities($row['clubID']); ?>"><?php echo htmlentities($row['clubName']); ?></option>
  <?php
 }
}
?>