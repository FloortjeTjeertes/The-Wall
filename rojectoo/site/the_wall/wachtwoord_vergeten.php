<?php include "php/wachtwoord_vergeten.php"; ?>
<!DOCTYPE html>
<html lang="nl">
  <head>
    <meta charset="utf-8">
    <title>wachtwoord veranderen</title>
  </head>
  <body>
    <form action="wachtwoord_vergeten.php" method="post">
      <label for="password">Nieuw wachtwoord:</label>
      <input type="password" name="password1"><br>
      <label for="password2">Wachtwoord herhalen:</label>
      <input type="password" name="password2"><br>
      <?php
        echo "<input type=hidden name=id value=" . $_GET['id'] . ">";
        echo "<input type=hidden name=validatie value=" . $_GET['validatie'] . ">";
      ?>
      <input type="submit" value="submit">
    </form>
  </body>
</html>
