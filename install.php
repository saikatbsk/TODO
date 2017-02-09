<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>TODO Installer</title>
</head>
<body>
  Beginning installation...<br>
  <?php
    echo "Connecting database.. ";
    include("dbconnect.php");
    echo "Done <br>";

    echo "Creating tables.. ";
    $query1 = "CREATE TABLE IF NOT EXISTS `todo` (`id` int(11) NOT NULL AUTO_INCREMENT, `desc` varchar(200) NOT NULL, `date` date NOT NULL, `done` int(11) NOT NULL, PRIMARY KEY (`id`))";
    $x = mysqli_query($con, $query1);

    $query2 = "CREATE TABLE IF NOT EXISTS `scrap` (`desc` varchar(1024) NOT NULL, `timestamp` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, PRIMARY KEY (`timestamp`))";
    $y = mysqli_query($con, $query2);

    if($x==1 && $y==1){
      echo "Done <br>";
    }
    else{
      echo "Error during installation <br>";
    }

    mysqli_close($con);
  ?>
</body>
</html>
