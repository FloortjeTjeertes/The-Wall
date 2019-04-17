<?php
  include "database/data.php";
  $gebruikersnaam = $_GET['gebruikersnaam'];
  $boolean = 0;

  $con = mysqli_connect($servername,$uid,$pwd,$database);
  if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
  }
  $sql = 'SELECT * FROM account';
  $statement = $con->query($sql);

  foreach ($statement as $rij) {
    if($gebruikersnaam === $rij['gebruikersnaam']){
      $boolean = 1;
    }
  }

  if($boolean == 1){
    echo "Gebruikersnaam is al in gebruik";
    echo "<input type=hidden id=check1 value=false>";
  } else {
    echo "<input type=hidden id=check1 value=true>";
  }
?>
