


<?php
if(isset($_FILES['image'])){
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
  $errors[] = "Dit bestandstype kan niet, kies een JPEG of een PNG bestand.";
  }

  if($file_size > 2097152){
    $errors[] ='Het bestand moet kleiner zijn dan 2 MB';
  }

  if(empty($errors)==true){
     // move_upload_file stuurt je bestand naar een andere lokatie
     move_uploaded_file($file_tmp,"uploads/".$file_name);
     echo "Gelukt";
  } else{
     print_r($errors);
  }


}

 ?>

<!DOCTYPE html>
<html lang="nl" dir="ltr">
  <head>
    <link rel="stylesheet" type="text/css" href="css.css">
    <meta charset="utf-8">
    <title><div id=upload status></div> geupload</title>
  </head>
  <body>
    <nav></nav>
    <h3>foto uploaden</h3>
    <div id="wrapper">
<div id="upload box">
beste <div id=naam>uw naam</div> upload hier je foto
<form action="" method="POST" enctype="multipart/form-data">
<input type="file" name="image">
<!-- <select class="select" name="categorie">
</select> -->
<input type="submit"/>
</form>
</div>
<!-- //einde upload -->
      </div>
      <!-- //einde wrapper -->
  </body>
</html>