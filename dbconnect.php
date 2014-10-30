<?php
$con = mysql_connect("host", "user", "password");
if(!$con) {
  die("Unable to connect to database ".mysql_error());
}
mysql_select_db("db", $con);
?>
