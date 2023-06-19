<?php
include('includes/alt_config.php');
if (!empty($_POST["clubID"])) {
  global $con;
  $clubID = intval($_POST['clubID']);

  //  echo $clubID; exit;

  $select_query = "SELECT * From tblmembers WHERE clubID = $clubID";
  $sth = $con->query($select_query);
  $result1 = $sth->fetchAll(PDO::FETCH_ASSOC);
  if (!empty($result1) || $result1 != '') {
    $select_query2 = "SELECT * From tblclubpresidents WHERE clubID = $clubID AND isActive = 1";
    $sth = $con->query($select_query2);
    $result2 = $sth->fetch(PDO::FETCH_ASSOC);
    if (empty($result2) || $result2 == '') { ?>
      <option value="">Select Leo</option>

  <?php
    }}else {?>
      <option value="<?php echo htmlentities($result2['presidentID']); ?>"><?php echo htmlentities($result2['president']); ?></option>

    <?php
    }
  
  foreach ($result1 as $mem_fetch) {

    ?>
    <option value="<?php echo htmlentities($mem_fetch['memberID']); ?>"><?php echo htmlentities($mem_fetch['firstName'] .' '. $mem_fetch['lastName']); ?>
    </option>
    <?php
  }
}
?>