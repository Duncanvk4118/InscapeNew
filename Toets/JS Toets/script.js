// Variabelen
let btn = document.getElementById("updateBtn");
let checkedName = null;
let checkedCountry = null;
let checkedYear = null;

function returnMain() {
  window.location = "index.php";
}

function checkKey(id) {
  // Functie Variabelen
  let inp = document.getElementById(id);

  if (id === "name") {
    if (inp.value.length >= 3 && inp.value.length <= 50) {
      inp.style.backgroundColor = "lightgreen";
      checkedName = "1";
    } else if (inp.value.length == 0) {
      inp.style.backgroundColor = "white";
    } else {
      inp.style.backgroundColor = "red";
      checkedName = null;
    }
  }
}
