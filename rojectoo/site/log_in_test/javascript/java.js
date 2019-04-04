let change = document.getElementById("change");
let tekst1 = document.getElementById("tekst1");
let tekst2 = document.getElementById("tekst2");
let nummer = 0;

change.addEventListener('click', verander);

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
      change.value = "Log in";
      tekst1.style.display = "block";
      tekst2.style.display = "none";
      break;
  }
}
