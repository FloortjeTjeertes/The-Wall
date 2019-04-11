<!DOCTYPE html>
<html lang="nl">
  <head>
    <meta charset="utf-8">
    <title>wachtwoord veranderen</title>
  </head>
  <body>
    <form action="wachtwoord_vergeten.php" method="post">
      <?php include "php/wachtwoord_vergeten.php"; ?>
      <label for="password">Nieuw wachtwoord:</label>
      <input type="password" name="password1"><br>
      <label for="password2">Wachtwoord herhalen:</label>
      <input type="password" name="password2"><br>
      <input type="submit" value="submit">
    </form>
  </body>
</html>
