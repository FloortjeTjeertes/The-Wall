const tekst = document.querySelectorAll('.tekst');

for(let i=0; i<tekst.length; i++){
  let teksten = tekst[i];
  teksten.parentNode.removeChild(teksten);
}

const knoppen = document.querySelectorAll('.button');
const knoppenArrey = [];

let achtergrond         = document.createElement("div");
achtergrond.className   = "achtergrond";
let modaalVenster       = document.createElement("div");
modaalVenster.className = "modaalVenster";
let kruisje             = document.createElement('button');
kruisje.className       = "kruisje";
kruisje.innerHTML       = '&#x00D7;';

const inhoudToevoegen = (event) => {
  const nummer = knoppenArrey.indexOf(event.target);
  console.log(nummer);
  modaalVenster.appendChild(kruisje);
  modaalVenster.appendChild(tekst[nummer]);
  achtergrond.appendChild(modaalVenster);
  document.body.appendChild(achtergrond);
}

const sluiten = () => {
  modaalVenster.innerHTML = "";
  achtergrond.innerHTML = "";
  document.body.removeChild(achtergrond);
}

kruisje.addEventListener('click', sluiten);
achtergrond.addEventListener('click', sluiten);
modaalVenster.addEventListener('click', stop);

let inloggen = document.getElementById('inloggen');
let registeer = document.getElementById('registeer');

for (let i=0; i<2; i++) {
  knoppenArrey.push(knoppen[i]);
  knoppen[i].addEventListener('click', inhoudToevoegen);
}

function stop(event){
  event.stopPropagation();
}
