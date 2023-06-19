<?php
include('includes/config.php');
if(!empty($_POST["stateID"])) 
{
 $stateID=intval($_POST['stateID']);
$query=mysqli_query($con,"SELECT * FROM tbllga WHERE stateID =$stateID");
?>
<option value="">Select LGA</option>
<?php
 while($row=mysqli_fetch_array($query))
 {
  ?>
  <option value="<?php echo htmlentities($row['lgaID']); ?>"><?php echo htmlentities($row['lgaName']); ?></option>
  <?php
 }
}
?>