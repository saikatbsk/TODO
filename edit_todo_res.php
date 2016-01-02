<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <?php
  include("dbconnect.php");

  $q = "UPDATE todo SET `todo`.`desc`='".$_POST['desc']."', `todo`.`date`='".$_POST['date']."' WHERE `todo`.`id`=".$_POST['id'];
  $x = mysqli_query($con, $q);

  if($x == 1) {
    header('Location: index.php');
  }
  else {
    /* TODO: Error report */
  }

  mysqli_close($con);
  ?>
</body>
</html>
