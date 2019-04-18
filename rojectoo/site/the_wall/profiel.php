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
  };
  include "php/database/data.php";
  $id = $_SESSION['id'];

  $con = mysqli_connect($servername,$uid,$pwd,$database);
  if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
  }
  $sql = "SELECT * FROM account WHERE id = $id";
  $statement = $con->query($sql);

  $auther = "";
  $email = "";
  $vertificatie = "";

  foreach ($statement as $rij) {
    $auther = $rij['gebruikersnaam'];
    $email = $rij['email'];
    $vertificatie = $rij['vertificatie'];
  }

  if($_SESSION['session'] == "true"){
    if($_SESSION['vertificatie'] != $vertificatie){
      header("Location: http://26393.hosts2.ma-cloud.nl/bewijzenmap/periode1.3/proj/the_wall/log_in.php");
    }
  } else {
    header("Location: http://26393.hosts2.ma-cloud.nl/bewijzenmap/periode1.3/proj/the_wall/log_in.php");
  }

  $sql2 = "SELECT * FROM fotos WHERE user = '$auther'";
  $statement2 = $con->query($sql2);

  function fotos($statement2){
    foreach ($statement2 as $rij) {
      echo "<div class=foto>";
      echo "<h4>". $rij['titel'] ."</h4>";
      echo "<img id=image src=" . $rij['filepath'] . ">";
      echo "<p> auther: " . $rij['user'] . "</p>";
      echo "<p> description:<br>" . $rij['description'] . "</p>";
      echo "<p> datum: " . $rij['datum'] . "</p>";
      echo "</div>";
    }
  }
?>

<!DOCTYPE html>
<html lang="nl">
  <head>
    <meta charset="utf-8">
    <title>profiel <?php echo $auther;?></title>
    <link rel="stylesheet" href="profiel.css">
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
              <a class="button" href="profiel.php" style="background-color: #B22222; color: #ffffff;">Profiel</a>
            </li>
            <li>
              <a class="button" href="upload.php">Upload</a>
            </li>
            <li>
              <a class="button" href="home.php">Home</a>
            </li>
          </ul>
        </div>
        <h1 style="float: right; margin-top: 2em;">Social Stories</h1>
      </div>
    </div>

      <div id="container">
        <div id="teksten">
          <h1 id="titel"><?php echo $auther;?></h1>
          <h2 id="kopje1">Persoonlijke gegevens</h2>
          <p id="email">Email: <?php echo $email; ?></p>
          <h2 id="kopje2">geuploadde fotos</h2>
        </div>
        <div id="fotolijst">
          <div id="midden">
            <?php fotos($statement2); ?>
          </div>
        </div>
      </div>
  </body>
</html>
