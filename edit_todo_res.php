<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <?php
  include("dbconnect.php");

  $q = "UPDATE todo SET `todo`.`desc`='".$_POST['desc']."' WHERE `todo`.`id`=".$_POST['id'];
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
