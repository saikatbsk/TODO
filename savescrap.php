<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <?php
  include("dbconnect.php");

  $x = mysqli_query($con, "SELECT * FROM scrap");
  if(mysqli_num_rows($x) == 0) {
    $q = "INSERT INTO scrap (`scrap`.`desc`) VALUES ('".$_POST['scrap']."')";
    $x = mysqli_query($con, $q);
  }
  else {
    $row = mysqli_fetch_array($x);
    $ts = $row['timestamp'];
    $q = "UPDATE scrap SET `scrap`.`desc`='".$_POST['scrap']."' WHERE `scrap`.`timestamp`= '$ts'";
    $x = mysqli_query($con, $q);
  }

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
