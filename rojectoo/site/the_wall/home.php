<?php

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
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="icon" href="logo/logo.png" type="image/gif" sizes="16x16">

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
            <?php include "php/inOrOut.php"; ?>
            <li>
              <a class="button" href="profiel.php">Profiel</a>
            </li>
            <li>
              <a class="button" href="upload.php">Upload</a>
            </li>
            <li>
              <a class="button" href="home.php" style="background-color: #B22222; color: #ffffff;">Home</a>
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
              Titel: '. $rij['titel'] . '
              <br>
              <img id="foto" src= ' . $rij['filepath'] . '></img>
              <br> Auther: ' . $rij['user'] . '
              <br> Description:<br>' . $rij['description'] .


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
