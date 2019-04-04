<!DOCTYPE html>
<html lang="nl">

<head>
  <meta charset="utf-8">
  <title>Log in test</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="achtergrond">
    <div class="venster">
      <div class="modaalVenster">
        <div id="tekst1">
          <form action="php/log_in.php" method="post">
            <label for="gebruikersnaam">gebruikersnaam</label>
            <input type="text" name="gebruikersnaam" placeholder="gebruikersnaam" required> <br>
            <label for="wachtwoord">wachtwoord</label>
            <input type="password" name="wachtwoord" placeholder="1234456" required> <br>
            <input type="submit" value="log in">
          </form>
        </div>
        <div id="tekst2">
          <form action="php/registeer.php" method="post">
            <label for="gebruikersnaam">gebruikersnaam</label>
            <input type="text" name="gebruikersnaam2" placeholder="gebruikersnaam" required> <br>
            <label for="wachtwoord">wachtwoord</label>
            <input type="password" name="wachtwoord2" placeholder="wachtwoord" required> <br>
            <label for="wachtwoord2">herhaal wachtwoord</label>
            <input type="password" name="wachtwoord3" placeholder="nogmaals wachtwoord" required> <br>
            <label for="email">email</label>
            <input type="email" name="email" placeholder="email" required> <br>
            <input type="submit" value="registeer">
          </form>
        </div>
        <br>
        <input type="button" id="change" value="registeren">
      </div>
    </div>
  </div>

  <script src="javascript/java.js"></script>
</body>

</html>
