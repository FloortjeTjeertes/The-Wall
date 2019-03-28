<?php
  include "database/data.php";
  include "database/database.php";
  $gebruikersnaam = $_POST['gebruikersnaam2'];
  $wachtwoord = $_POST['wachtwoord2'];
  $herhaaldWachtwoord = $_POST['wachtwoord3'];
  $email = $_POST['email'];

  $con = mysqli_connect($servername,$uid,$pwd,$database);
  if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
  }

  $con->query($db);
  $con->query($dt);

  if(checkWachtwoord($wachtwoord, $herhaaldWachtwoord) == true){
    makeAccount($gebruikersnaam,$wachtwoord,$con,$email);
  }else{
    header("Location: http://localhost/test/index.html?registeren=false");
  }

  function makeAccount($gebruikersnaam,$wachtwoord,$con,$email){
    $sql = "INSERT INTO account (id, gebruikersnaam, wachtwoord, email)
    VALUES ('', '$gebruikersnaam', '$wachtwoord', '$email')";

    if ($con->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
    header("Location: http://localhost/test/index.html");
  }

  function checkWachtwoord($wachtwoord, $herhaaldWachtwoord){
    if($wachtwoord === $herhaaldWachtwoord){
      return true;
    }else{
      return false;
    }
  }
?>
