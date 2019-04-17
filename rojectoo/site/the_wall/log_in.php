<?php
  ini_set('display_errors', 1);
  include "php/database/database.php";
  include "php/database/data.php";
  $con = mysqli_connect($servername,$uid,$pwd,$database);
  if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
  }

  $con->query($dt);

  $sql = 'SELECT * FROM account';
  $statement = $con->query($sql);

  session_start();

  if($_SESSION == true){
    foreach ($statement as $rij) {
      if($_SESSION['id'] == $rij['id'] && $_SESSION['vertificatie'] == $rij['vertificatie']){
        header("Location: http://26393.hosts2.ma-cloud.nl/bewijzenmap/periode1.3/proj/the_wall/home.php");
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="nl">

<head>
  <meta charset="utf-8">
  <title>Log in test</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="achtergrond">
    <div class="venster">
      <div class="modaalVenster">
        <div id="tekst1">
          <form action="log_in.php" method="post">
            <label for="gebruikersnaam">gebruikersnaam</label>
            <input type="text" name="gebruikersnaam" placeholder="gebruikersnaam"> <br>
            <label for="wachtwoord">wachtwoord</label>
            <input type="password" name="wachtwoord" placeholder="1234456"> <br>
            <input type="submit" value="log in" id="submit1"><br>
            <a href="http://26393.hosts2.ma-cloud.nl/bewijzenmap/periode1.3/proj/the_wall/vergeten.php" target="_blank">Wachtwoord vergeten?</a>
          </form>
        </div>
        <div id="tekst2">
          <form action="php/registeer.php" method="post">
            <label for="gebruikersnaam">gebruikersnaam</label>
            <div id="fout1"><input type="hidden" id="check1" value="false"></div>
            <input type="text" name="gebruikersnaam2" id="gebruikersnaam2" placeholder="gebruikersnaam"> <br>
            <label for="wachtwoord2">wachtwoord</label>
            <div id="fout2">minimaal 6 karakters</div>
            <input type="password" name="wachtwoord2" id="wachtwoord2" placeholder="wachtwoord">
            <label for="wachtwoord3">herhaal wachtwoord</label>
            <div id="fout3"></div>
            <input type="password" name="wachtwoord3" id="wachtwoord3" placeholder="nogmaals wachtwoord"> <br>
            <label for="email">email</label>
            <div id="fout4"><input type="hidden" id="check4" value="false"></div>
            <input type="email" name="email" id="email" placeholder="email"> <br>
            <input type="submit" value="Registeren" id="submit2">
            <div>
              <input type="hidden" id="check2" value="false">
              <input type="hidden" id="check3" value="false">
            </div>
          </form>
        </div>
        <br>
        <input type="button" id="change" value="registeren">
      </div>
    </div>
  </div>

  <script src="javascript/java.js"></script>
  <script src="javascript/ajax.js"></script>
</body>

</html>

<?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include "php/log_in.php";
  }
?>
