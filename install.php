<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>TODO Installer</title>
</head>
<body>
  Beginning installation...<br>
  <?php
  echo "Connecting Database..<br>";
  include("dbconnect.php");

  echo "Creating tables..<br>";
  $query="CREATE TABLE IF NOT EXISTS `todo` ( `id` int(11) NOT NULL AUTO_INCREMENT, `desc` varchar(200) NOT NULL, `done` int(11) NOT NULL, PRIMARY KEY (`id`))";
  $x = mysql_query($query);
  if($x==1){
    echo "Done Installing.";
  }
  else{
    echo mysql_error();
  }

  ?>
</body>
</html>
