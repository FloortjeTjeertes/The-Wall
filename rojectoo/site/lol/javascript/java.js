let change = document.getElementById("change");
let gebruikersnaam2 = document.getElementById("gebruikersnaam2");
let wachtwoord2 = document.getElementById("wachtwoord2");
let wachtwoord3 = document.getElementById("wachtwoord3");
let email = document.getElementById("email");
let fout1 = document.getElementById("fout1");
let fout2 = document.getElementById("fout2");
let fout3 = document.getElementById("fout3");
let fout4 = document.getElementById("fout4");
let submit2 = document.getElementById('submit2');
let tekst1 = document.getElementById("tekst1");
let tekst2 = document.getElementById("tekst2");
let check2 = document.getElementById("check2");
let check3 = document.getElementById("check3");
let nummer = 0;

fout2.style.color = "red";

change.addEventListener('click', verander);
gebruikersnaam2.addEventListener('keyup', gebruikersnaamCheck);
wachtwoord2.addEventListener('keyup', wachtwoordCheck);
wachtwoord3.addEventListener('keyup', wachtwoordHerhalenCheck);
email.addEventListener('keyup', emailCheck);
submit2.addEventListener("click", function(event){
  check();
  if(check1.value == "false" || check2.value  == "false" || check3.value  == "false" || check4.value  == "false"){
    event.preventDefault()
  }});

function verander(){
  switch (nummer) {
    case 0:
      nummer = 1;
      change.value = "Log in";
      tekst1.style.display = "none";
      tekst2.style.display = "block";
      break;
    case 1:
      nummer = 0;
      change.value = "Registeren";
      tekst1.style.display = "block";
      tekst2.style.display = "none";
      break;
  }
}

function gebruikersnaamCheck(){
  fout1.style.color = "red";
  ajaxGebruikersnaam(gebruikersnaam2.value);
  let check1 = document.getElementById("check1");
}

function wachtwoordCheck(){
  if(wachtwoord2.value.length < 6){
    fout2.innerHTML = "minimaal 6 karakters";
    fout2.style.color = "red";
    check2.value = "false";
  } else {
    fout2.innerHTML = "";
    check2.value = "true";
  }
  wachtwoordHerhalenCheck();
}

function wachtwoordHerhalenCheck(){
  if(wachtwoord3.value == ""){
    check3.value = false;
  } else {
    if(wachtwoord2.value === wachtwoord3.value){
      check3.value = "true";
      fout3.innerHTML = "";
    } else {
      check3.value = "false";
      fout3.innerHTML = "Wachtwoorden zijn niet hetzelfde";
      fout3.style.color = "red";
    }
  }
}

function emailCheck(){
  ajaxEmail(email.value);
  let check4 = document.getElementById("check4");
  fout4.style.color = "red";
}

function check(){
  gebruikersnaamCheck();
  wachtwoordCheck();
  wachtwoordHerhalenCheck();
  emailCheck();
}
