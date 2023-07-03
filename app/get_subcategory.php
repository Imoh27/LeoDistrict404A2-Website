<?php
include('includes/config.php');
if(!empty($_POST["catid"])) 
{
 $id=intval($_POST['catid']);
$query=mysqli_query($con,"SELECT * FROM tblsubcategory WHERE categoryID =$id and isActive=1");
?>

<?php
 while($row=mysqli_fetch_array($query))
 {
  ?>
  <option value="<?php echo htmlentities($row['subCatID']); ?>"><?php echo htmlentities($row['subcategory']); ?></option>
  <?php
 }
}
?>