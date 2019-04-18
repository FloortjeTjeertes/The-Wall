<?php
session_start();

$boolean = true;

if($_SESSION['session'] != "true") {
  $boolean = false;
} else if(empty($_SESSION['id'])) {
  $boolean = false;
} else if(empty($_SESSION['vertificatie'])) {
  $boolean = false;
} else if(empty($_SESSION['active'])) {
  $boolean = false;
};

if($boolean == false){
  echo "<li><a class=button href=log_in.php>Inloggen</a></li>";
} else {
  include "php/database/data.php";
  $id = $_SESSION['id'];

  $con = mysqli_connect($servername,$uid,$pwd,$database);
  if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
  }

  $sql2 = "SELECT * FROM account WHERE id = $id";
  $statement2 = $con->query($sql2);

  $vertificatie = "";
  foreach ($statement2 as $rij) {
    $vertificatie = $rij['vertificatie'];
  }

  if($_SESSION['session'] == "true"){
    if($_SESSION['vertificatie'] != $vertificatie){
      echo "<li><a class=button href=log_out.php>Uitloggen</a></li>";
    } else {
      echo "<li><a class=button href=log_in.php>Inloggen</a></li>";
    }
  } else {
    echo "<li><a class=button href=log_in.php>Inloggen</a></li>";
  }
}
?>
