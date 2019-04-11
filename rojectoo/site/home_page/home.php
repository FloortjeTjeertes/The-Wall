<?php

$servername ="localhost";
$uid="root";
$pwd="";
$database="fotos";

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

  // $description = "blablabla";
  // $titel = "titel";
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/css.css">

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
              <a class="button" href="Upload.php" style="background-color: #B22222; color: #ffffff;">Upload</a>
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
