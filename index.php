<!DOCTYPE HTML>
<html>
<head>
  <title>TODO</title>
  <link rel="shortcut icon" href="images/favicon.png">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.css" />
  <link rel="stylesheet" href="jquery/css/jquery-ui.css" />

  <script src="jquery/js/jquery.js"></script>
  <script src="jquery/js/jquery-ui.js"></script>
  <script src="js/script.js"></script>

  <style type="text/css">
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
  <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container">
        <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="brand" href="#">TODO</a>
        <div class="nav-collapse collapse">
          <ul class="nav">
            <li><a href="about.html">About</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="hero-unit">
      <img class="img-responsive" src="images/TODO.png">
    </div>

    <div class="row">
      <div class="span4">
        <form class="form-search form-myform" action="add_todo.php" method="post">
          <fieldset>
            <h3>Add new TODO</h3>
            <div class="">
              <input class="input-block-level" type="text" name="desc" placeholder="Description..." />
              <input class="input-block-level" type="text" name="date" placeholder="Date..." id="datepicker" />
              <input class="btn btn-large btn-primary" type="submit" value="Add">
            </div>
          </fieldset>
        </form>
      </div>

      <div class="span8">
        <legend>TODO List</legend>
        <?php
        include("dbconnect.php");
        $x = mysql_query("SELECT * FROM todo WHERE `todo`.`done`=0");
        echo "
        <table class='table table-hover'>
          <thead>
            <tr>
              <th>Descriptions</th>
              <th>Date</th>
              <th>Actions</th>
            </tr>
          </thead>
          ";
          if(mysql_num_rows($x) == 0) {
            echo "<tr>";
            echo "<td>Sorry no todo to display :-(</td>";
            echo "<td>-</td>";
            echo "<td>-</td>";
              echo "</tr>";
            }
            else {
              while($row = mysql_fetch_array($x)) {
                $d = date('Y-m-d');
                if($d == $row['date']) {
                  $display_date = 'Today';
                }
                else {
                  $display_date = $row['date'];
                }
                echo "<tr>";
                echo "<td>".$row['desc']."</td>";
                echo "<td>".$display_date."</td>";
                echo "<td><a href='done_todo.php?id=".$row['id']."'>done</a> | <a href='edit_todo.php?id=".$row['id']."'>edit</a> | <a href='del_todo.php?id=".$row['id']."'>delete</a>";
                echo "</tr>";
              }
            }

            $x = mysql_query("SELECT * FROM todo WHERE `todo`.`done`=1");
            if(mysql_num_rows($x) == 0) {
              echo "</tbody>";
              echo "</table>";
            }
            else {
              while($row = mysql_fetch_array($x)) {
                echo "<tr>";
                echo "<td><strike>".$row['desc']."</strike></td>";
                echo "<td><strike>".$row['date']."</strike></td>";
                echo "<td><a href='del_todo.php?id=".$row['id']."'>delete</a>";
                echo "</tr>";
              }
              echo "</tbody>";
              echo "</table>";
            }
            mysql_close($con);
            ?>
          </div>
        </div>
      </div>

      <footer class="footer">
        <div class="container">
          <p class="muted credit">:)</p>
        </div>
      </footer>

      <script src="bootstrap/js/bootstrap.js"></script>
    </body>
    </html>
