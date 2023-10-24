<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Load File</title>
</head>
<body>
    <?php
include_once('app/admin/includes/alt_config.php');
    $file = $_GET['file'];
    $select = "SELECT * FROM tblresourcecenter JOIN tblmembertype ON tblmembertype.id = tblresourcecenter.member_wing where actual_file = '$file'";
    // echo $select; exit;
    $sth = $con->query($select); 
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    ?>
    <embed src="app/admin/resources_upload/<?php echo $result['actual_file']; ?>" />
    <!-- <object width="400" height="500" type="application/pdf" data="app/admin/resources_upload/<?php echo $result['actual_file']; ?>?#zoom=85&scrollbar=0&toolbar=0&navpanes=0"> -->
    <!-- <iframe src="app/admin/resources_upload/<?php echo $result['actual_file']; ?>" width="100%" height="100%"> -->
</body>
</html>