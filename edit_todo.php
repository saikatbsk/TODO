<!DOCTYPE html>
<html>
<head>
  <title>Edit TODO</title>
  <link rel="shortcut icon" href="images/favicon.png">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.css">
  <link rel="stylesheet" href="jquery/css/jquery-ui.css" />

  <script src="jquery/js/jquery.js"></script>
  <script src="jquery/js/jquery-ui.js"></script>
  <script src="js/script.js"></script>

  <style type="text/css">
    body {
      padding-top: 40px;
      padding-bottom: 40px;
      background-color: #f5f5f5;
    }

    .form-myform {
      max-width: 300px;
      padding: 19px 29px 29px;
      margin: 0 auto 20px;
      background-color: #fff;
      border: 1px solid #e5e5e5;
      -webkit-border-radius: 5px;
      -moz-border-radius: 5px;
      border-radius: 5px;
      -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
      -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
      box-shadow: 0 1px 2px rgba(0,0,0,.05);
    }
    .form-myform .form-myform-heading,
    .form-myform .checkbox {
      margin-bottom: 10px;
    }
    .form-myform input[type="text"],
    .form-myform input[type="password"] {
      font-size: 16px;
      height: auto;
      margin-bottom: 15px;
      padding: 7px 9px;
    }

  </style>
</head>
<body>
  <?php
  include("dbconnect.php");

  $q = "SELECT * FROM todo WHERE id=".$_GET['id'];
  $x = mysql_query($q);
  $row = mysql_fetch_array($x);

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

  mysql_close($con);
  ?>

  <footer class="footer">
    <div class="container">
      <p class="muted credit">:)</p>
    </div>
  </footer>
</body>
</html>
