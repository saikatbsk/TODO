<!DOCTYPE HTML>
<html>
<head>
  <title>TODO</title>
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.css">
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
      <h2>Manage yourself</h2>
    </div>

    <div class="row">
      <div class="span4">
        <form class="form-search" action="add_todo.php" method="post">
          <fieldset>
            <legend>Add new TODO</legend>
            <div class="input-append">
              <input class="span2 search-query" type="text" name="desc" placeholder="Description…">
              <input class="btn" type="submit" value="Add">
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
                <th>Actions</th>
              </tr>
            </thead>
        ";
        if(mysql_num_rows($x) == 0) {
          echo "<tr>";
          echo "<td>Sorry no todo to display</td>";
          echo "<td>:-(</td>";
          echo "</tr>";
        }
        else {
          while($row = mysql_fetch_array($x)) {
            echo "<tr>";
            echo "<td>".$row['desc']."</td>";
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

  <script src="bootstrap/js/jquery.js"></script>
  <script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>
