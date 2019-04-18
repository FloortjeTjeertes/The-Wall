<?php
  session_start();
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

  foreach ($statement as $rij) {
    $auther = $rij['gebruikersnaam'];
    $email = $rij['email'];
    $vertificatie = $rij['vertificatie'];
  }

  if($_SESSION == true){
    if($vertificatie != $_SESSION['vertificatie']){
    }
  } else {
  }

  $sql2 = "SELECT * FROM fotos WHERE auther = '$auther'";
  $statement2 = $con->query($sql2);

  function fotos($statement2){
    foreach ($statement2 as $rij) {
      echo "<h4>". $rij['titel'] ."</h4>";
      echo "<img src=" . $rij['filepath'] . ">";
      echo "<p> auther: " . $rij['auther'] . "</p>";
      echo "<p> description:<br>" . $rij['description'] . "</p>";
      echo "<p> datum: " . $rij['datum'] . "</p>";
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

      <div>
        <h1><?php echo $auther;?></h1>
        <h2>Persoonlijke gegevens</h2>
        <p>Email: <?php echo $email; ?></p>
        <h2>geuploadde fotos</h2>
        <div>
          <?php fotos($statement2); ?>
        </div>
      </div>
  </body>
</html>
