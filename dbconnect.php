<?php
$time_zone = 'Asia/Kolkata';

$con = mysql_connect("localhost", "saikat", "ppioneer");
if(!$con) {
  die("Unable to connect to database ".mysql_error());
}
mysql_select_db("todo_db", $con);
?>
