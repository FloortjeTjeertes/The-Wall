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
}

$servername = "127.0.0.1";
$uid = "c3652JRJman";
$pwd = "Hallojoep1";
$database = "c3652theWall";
$con = mysqli_connect($servername,$uid,$pwd,$database);

if(!$con){
  die('kan niet verbinden: '.mysqli_error($con));
}

$id = $_SESSION['id'];
$vertificatie = "";
$auther = "";

$sql = "SELECT * FROM account WHERE id = $id";
$statement = $con->query($sql);

foreach ($statement as $rij) {
  $vertificatie = $rij['vertificatie'];
  $auther = $rij['gebruikersnaam'];
}
if($_SESSION['session'] == "true"){
  if($_SESSION['vertificatie'] != $vertificatie){
    header("Location: http://26393.hosts2.ma-cloud.nl/bewijzenmap/periode1.3/proj/the_wall/log_in.php");
  }
} else {
  header("Location: http://26393.hosts2.ma-cloud.nl/bewijzenmap/periode1.3/proj/the_wall/log_in.php");
}

//foto upload
if(isset($_FILES['image'])){
  $titel = $_POST['titel'];
  $description = $_POST['description'];
$Datum=date("Y-m-d");
  $errors = array();
  $file_name = $_FILES['image']['name'];
  $file_size = $_FILES['image']['size'];
  $file_tmp = $_FILES['image']['tmp_name'];
  $file_type = $_FILES['image']['type'];

  // de explode string-functie breekt een string in een array
  // hierbij breek je de string na de . (punt) waardoor je de bestands type hebt
  $filename_deel = explode('.',$_FILES['image']['name']);
  // end laat de laatste waarde van de array zoen
  $bestandstype = end($filename_deel);
  // voor het geval er JPG ipv jpg is geschreven
  $file_ext = strtolower($bestandstype);

  $bestandstypen = array("jpeg","jpg","png");

  if(in_array($file_ext,$bestandstypen)=== false){
  $errors[] = "<script>alert('Dit bestandstype kan niet, kies een JPEG of een PNG bestand.');</script>";
  }

  if($file_size > 2097152){
    $errors[] ='Het bestand moet kleiner zijn dan 2 MB';
        echo "<script>alert(Het bestand moet kleiner zijn dan 2 MB');</script>";
  }
  if(empty($errors)==true){
     // move_upload_file stuurt je bestand naar een andere lokatie

     move_uploaded_file($file_tmp,"uploads/".$file_name);
     echo "<script>alert('Gelukt');</script>";
  } else{
    echo "<script>alert('het bestand is te groot');</script>";
     // print_r($errors);
  }
//function word aangeroepen
  bestanden_upload($con,$file_name,$Datum,$titel,$description,$auther);
}
//upload info
function bestanden_upload($con,$file_name,$Datum,$title, $description,$auther){
  $sql="INSERT INTO fotos(Datum,user,filepath,description,titel)
  values('$Datum', '$auther','uploads/$file_name','$description','$title')";
$file_name="";
if ($con->query($sql)=== TRUE){
  echo "<script>alert(' verbinding');</script>";
}
else{
  echo "<script>alert('Error".$sql."<br>".$con->error.";</script>";
}
}

 ?>

<!DOCTYPE html>
<html lang="nl" dir="ltr">
  <head>
    <link rel="stylesheet" type="text/css" href="upload.css">
    <meta charset="utf-8">
    <title> geupload</title>
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
              <a class="button" href="profiel.php">Profiel</a>
            </li>
            <li>
              <a class="button" href="upload.php" style="background-color: #B22222; color: #ffffff;">Upload</a>
            </li>
            <li>
              <a class="button" href="home.php">Home</a>
            </li>
          </ul>
        </div>
        <h1 style="float: right; margin-top: 2em;">Social Stories</h1>
      </div>
</div>
<div class="container">

      <div id="midle" class="midle">
    <div id="uploadbox">
    beste <?php echo $auther; ?><br> upload hier je foto
    <form action="" method="POST" enctype="multipart/form-data">
    <input  required type="file" name="image">
<select required id="catogorie" name="catogorie">
  <option value="cat">cat</option>
  <option value="memes">memes</option>
  <option value="cursed">cursed</option>
  <option value="nsfw">nsfw</option>
  <option value="huizen">huizen</option>
  <option value="animals">animals</option>
  <option value="food">food</option>
</select>


    </div>
    <div id="deRest">
<input id="titel" type="text" name="titel" placeholder="name" value="">
<br>
<div id="pic"></div>

<input id="description" type="text" name="description" placeholder="description" value="">
      <input type="submit"/>
      </form>
      <div>

        </div>

      </div>
      <!-- //einde upload -->
      <!-- //einde wrapper -->
    </div>
</div>

  </body>
</html>
