<?php
  include "database/data.php";
  $gebruikersnaam = $_POST['gebruikersnaam'];
  $wachtwoord = $_POST['wachtwoord'];

  $con = mysqli_connect($servername,$uid,$pwd,$database);
  if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
  }

  $sql = "SELECT * FROM account";
  $statement = $con->query($sql);

  foreach ($statement as $rij) {
    if($gebruikersnaam === $rij['gebruikersnaam']){
      if(password_verify($wachtwoord , $rij['wachtwoord'])){
        if($rij['active'] == "true"){
          $_SESSION['session'] = "true";
          $_SESSION['id'] = $rij['id'];
          $_SESSION['vertificatie'] = $rij['vertificatie'];
        }
      }
    }
  }
?>
