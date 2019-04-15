<?php
  include "database/data.php";
  $gebruikersnaam = $_POST['gebruikersnaam2'];
  $wachtwoord = $_POST['wachtwoord2'];
  $herhaaldWachtwoord = $_POST['wachtwoord3'];
  $email = $_POST['email'];

  $verificatie = code();

  $con = mysqli_connect($servername,$uid,$pwd,$database);
  if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
  }

  mail($mail, $vertificatie);

  makeAccount($gebruikersnaam,$wachtwoord,$con,$email);

  function makeAccount($gebruikersnaam,$wachtwoord,$con,$email){
    $wachtwoord2 = password_hash($wachtwoord, PASSWORD_DEFAULT);
    $sql = "INSERT INTO account (id, gebruikersnaam, wachtwoord, email, vertificatie, actives)
    VALUES ('', '$gebruikersnaam', '$wachtwoord2', '$email', '$vertificatie', 'false')";

    if ($con->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
    header("Location: http://localhost/test/index.php");
  }

  function code(){
    $code = "";
    for ($i = 0; $i < 6; $i++) {
      $number = mt_rand(1, 36);

      switch ($number) {
        case 1:
        $code = $code + "A";
        break;

        case 2:
        $code = $code + "B";
        break;

        case 3:
        $code = $code + "C";
        break;

        case 4:
        $code = $code + "D";
        break;

        case 5:
        $code = $code + "E";
        break;

        case 6:
        $code = $code + "F";
        break;

        case 7:
        $code = $code + "G";
        break;

        case 8:
        $code = $code + "H";
        break;

        case 9:
        $code = $code + "I";
        break;

        case 10:
        $code = $code + "J";
        break;

        case 11:
        $code = $code + "K";
        break;

        case 12:
        $code = $code + "L";
        break;

        case 13:
        $code = $code + "M";
        break;

        case 14:
        $code = $code + "N";
        break;

        case 15:
        $code = $code + "O";
        break;

        case 16:
        $code = $code + "P";
        break;

        case 17:
        $code = $code + "Q";
        break;

        case 18:
        $code = $code + "R";
        break;

        case 19:
        $code = $code + "S";
        break;

        case 20:
        $code = $code + "T";
        break;

        case 21:
        $code = $code + "U";
        break;

        case 22:
        $code = $code + "V";
        break;

        case 23:
        $code = $code + "W";
        break;

        case 24:
        $code = $code + "X";
        break;

        case 25:
        $code = $code + "Y";
        break;

        case 26:
        $code = $code + "Z";
        break;

        case 27:
        $code = $code + "1";
        break;

        case 28:
        $code = $code + "2";
        break;

        case 29:
        $code = $code + "3";
        break;

        case 30:
        $code = $code + "4";
        break;

        case 31:
        $code = $code + "5";
        break;

        case 32:
        $code = $code + "6";
        break;

        case 33:
        $code = $code + "7";
        break;

        case 34:
        $code = $code + "8";
        break;

        case 35:
        $code = $code + "9";
        break;

        case 36:
        $code = $code + "0";
        break;
      }
    }
    return $code;
  }

  function mail($mail, $vertificatie){

    $link = "http://localhost/test/registeer.php?vertificatie=" . $vertificatie;
    $msg = "Click the link to activate your account\n" . $link;

    $result = mail($mail, 'Activatie account', $msg);

    if(!$result){
       echo 'Er ging iets fout bij het versturen van de verificatie e-mail';
       exit;
    }else{
       echo 'Klik de link in de verificatie email om je account te bevestigen';
       exit;
    }
  }
?>
