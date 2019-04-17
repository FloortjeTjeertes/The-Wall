function ajaxGebruikersnaam(gebruikersnaam) {
  let controlScript = "php/gebruikersnaam.php"; // PHP script met berekening
  let xmlhttp = new XMLHttpRequest();// maak een instance
  let httpString = controlScript + "?gebruikersnaam=" + gebruikersnaam;
  let httpResponse = "";

  xmlhttp.open("GET", httpString, true);
  xmlhttp.send();
  xmlhttp.onreadystatechange = function() {
    if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
      httpResponse = xmlhttp.responseText; // read the string from the server
      fout1.innerHTML = httpResponse;
    }
  }
}

function ajaxEmail(email) {
  let controlScript = "php/email.php"; // PHP script met berekening
  let xmlhttp = new XMLHttpRequest();// maak een instance
  let httpString = controlScript + "?email=" + email;
  let httpResponse = "";

  xmlhttp.open("GET", httpString, true);
  xmlhttp.send();
  xmlhttp.onreadystatechange = function() {
    if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
      httpResponse = xmlhttp.responseText; // read the string from the server
      fout4.innerHTML = httpResponse;
    }
  }
}
