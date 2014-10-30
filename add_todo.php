<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <?php
  include("dbconnect.php");

  $q = "INSERT INTO todo (`todo`.`desc`, `todo`.`done`) VALUES('".$_POST['desc']."', 0)";
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
