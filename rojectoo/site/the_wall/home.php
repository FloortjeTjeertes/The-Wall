<?php
session_start();

if($_SESSION['session'] != "true") {
  header("Location: http://26393.hosts2.ma-cloud.nl/bewijzenmap/periode1.3/proj/the_wall/log_in.php");
} else if(empty($_SESSION['id'])) {
  header("Location: http://26393.hosts2.ma-cloud.nl/bewijzenmap/periode1.3/proj/the_wall/log_in.php");
} else if(empty($_SESSION['vertificatie'])) {
  header("Location: http://26393.hosts2.ma-cloud.nl/bewijzenmap/periode1.3/proj/the_wall/log_in.php");
} else if(empty($_SESSION['active'])) {
  header("Location: http://26393.hosts2.ma-cloud.nl/bewijzenmap/periode1.3/proj/the_wall/log_in.php");
}

$id = $_SESSION['id'];
$vertificatie = "";

$servername = "127.0.0.1";
$uid = "c3652JRJman";
$pwd = "Hallojoep1";
$database = "c3652theWall";

try {
    // We proberen (try) verbinding te maken
    $database = new PDO("mysql:host=$servername;dbname=$database", $uid, $pwd);
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }catch (PDOException $e) {
      // En we vangen (catch) fouten af zodat ons script niet crasht
      echo "Fout bij verbinding maken: " . $e->getMessage();
      exit;
  }

  $sql = 'SELECT * FROM fotos LIMIT 10';
  $statement = $database->query($sql);

  $sql = "SELECT * FROM account WHERE id = $id";
  $statement = $database->query($sql);

  foreach ($statement as $rij) {
    $vertificatie = $rij['vertificatie'];
  }

  if($_SESSION['session'] == "true"){
    if($_SESSION['vertificatie'] != $vertificatie){
      header("Location: http://26393.hosts2.ma-cloud.nl/bewijzenmap/periode1.3/proj/the_wall/log_in.php");
    }
  } else {
    header("Location: http://26393.hosts2.ma-cloud.nl/bewijzenmap/periode1.3/proj/the_wall/log_in.php");
  }
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css.css">

    <title>Home</title>
  </head>

  <body>

    <div class="wrapper">
      <div id="header">
        <a href="home.php">
          <img src="logo/logo.png" class="Logo1" alt="Logo">
        </a>

        <div id="topnav">
          <ul>
            <li>
              <a class="button" href="profiel.html">Profiel</a>
            </li>
            <li>
              <a class="button" href="upload.php" style="background-color: #B22222; color: #ffffff;">Upload</a>
            </li>
          </ul>
        </div>
        <h1 style="float: right; margin-top: 2em;">Social Stories</h1>
      </div>


    </div>
    <div id="container">
      <div id="imglist">
        <div id="images">
          <?php
            foreach ($statement as $rij) {
              echo '<div id="fotolijst">
              '. $rij['titel'] . '
              <br>
              <img id="foto" src= ' . $rij['filepath'] . '></img>
              <br>' . $rij['description'] .


              '</div>';
            }
          ?>
        </div>
      </div>
    </div>



  </body>
</html>

  <!-- ======================================================oude code voor het geval dat====================================================== -->

      <!-- <input type="button" class="button" id="profiel" value="Profiel"> -->
