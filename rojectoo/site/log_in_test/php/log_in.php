<?php
  include "database/data.php";
  include "database/database.php";
  $gebruikersnaam = $_POST['gebruikersnaam'];
  $wachtwoord = $_POST['wachtwoord'];

  try {
    // We proberen (try) verbinding te maken
    $database = new PDO("mysql:host=$servername;dbname=$database", $uid, $pwd);
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }catch (PDOException $e) {
      // En we vangen (catch) fouten af zodat ons script niet crasht
      echo "Fout bij verbinding maken: " . $e->getMessage();
      exit;
  }

  $sql = 'SELECT * FROM account';
  $statement = $database->query($sql);

  $boolean = "false";
  $nummer = 0;

  foreach ($statement as $rij) {
    if($gebruikersnaam === $rij['gebruikersnaam']){
      if(password_verify($wachtwoord , $rij['wachtwoord'])){
        $boolean = "true";
        $nummer = $rij["id"];
      }
    }
  }

  header("Location: http://localhost/test/index.php?log_in=" . $boolean . "&nummer=" . $nummer);
?>
