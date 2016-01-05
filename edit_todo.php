<!DOCTYPE html>
<html>
<head>
  <title>Edit TODO</title>
  <meta name=viewport content='width=640'>
  <link rel="shortcut icon" href="images/favicon.png">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.css">
  <link rel="stylesheet" href="jquery/css/jquery-ui.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">

  <script src="jquery/js/jquery.js"></script>
  <script src="jquery/js/jquery-ui.js"></script>
  <script src="js/script.js"></script>

  <style type="text/css">
    body {
      padding-top: 40px;
      padding-bottom: 40px;
      background-color: #f5f5f5;
    }

  </style>
</head>
<body>
  <?php
  include("dbconnect.php");

  $q = "SELECT * FROM todo WHERE id=".$_GET['id'];
  $x = mysqli_query($con, $q);
  $row = mysqli_fetch_array($x);

  echo "<div class='container'>";
  echo "<form class='form-myform form-search' action='edit_todo_res.php' method='post'>";
  echo "<fieldset>";
  echo "<h3>Edit TODO</h3>";
  echo "<input class='input-block-level' type='text' name='id' value='".$row['id']."' readonly='readonly' />";
  echo "<input class='input-block-level' type='text' name='desc' value='".$row['desc']."' />";
  echo "<input class='input-block-level' type='text' name='date' value='".$row['date']."' id='datepicker' />";
  echo "<div style='text-align: center;'>";
  echo "<input class='btn btn-large btn-primary' type='submit' value='Go'>";
  echo "<div>";
  echo "</fieldset>";
  echo "</form>";
  echo "</div>";

  mysqli_close($con);
  ?>

</body>
</html>
