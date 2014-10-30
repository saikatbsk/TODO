<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <?php
  include("dbconnect.php");

  $q = "DELETE FROM `todo` WHERE `todo`.`id`=".$_GET['id'];
  $x = mysql_query($q);

  if($x == 1) {
    header('Location: index.php');
  }
  else {
    /* TODO: Error report */
  }

  mysql_close($con);
  ?>
</body>
</html>
