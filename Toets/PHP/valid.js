// Variabelen
let btn = document.getElementById("updateBtn");
let fouten = document.getElementById("errors");
let checkedName = null;
let checkedCountry = null;
let checkedYear = null;

function check() {
  btn.disabled = !(checkedName === "1" && checkedCountry === "1" && checkedYear === "1");
}

function checkKey(id) {
  // Functie Variabelen
  let inp = document.getElementById(id);
  if (inp.value.includes("DROP")) {
    alert("HEY!");
  } else {
    if (id === "name") {
      if (inp.value.length >= 3 && inp.value.length <= 50) {
        inp.style.backgroundColor = "lightgreen";
        fouten.innerHTML = "";
        checkedName = "1";
      } else if (inp.value.length === 0) {
        inp.style.backgroundColor = "white";
        checkedName = null;
        fouten.innerHTML = "";
      } else {
        inp.style.backgroundColor = "red";
        checkedName = null;
        fouten.innerHTML = "<p>Minimaal 3 tekens</p>";
      }
    }
    if (id === "country") {
      if (inp.value.length >= 3 && inp.value.length <= 50) {
        inp.style.backgroundColor = "lightgreen";
        checkedCountry = "1";
        fouten.innerHTML = "";
      } else if (inp.value.length === 0) {
        inp.style.backgroundColor = "white";
        fouten.innerHTML = "";
        checkedCountry = null;
      } else {
        inp.style.backgroundColor = "red";
        checkedCountry = null;
        fouten.innerHTML = "<p>Minimaal 3 tekens</p>";
      }
    }
    if (id === "year") {
      if (inp.value >= 1940 && inp.value <= 2024) {
        inp.style.backgroundColor = "lightgreen";
        fouten.innerHTML = "";
        checkedYear = "1";
      } else if (inp.value === "") {
        inp.style.backgroundColor = "white";
        fouten.innerHTML = "";
        checkedYear = null;
      } else {
        inp.style.backgroundColor = "red";
        checkedYear = null;
        fouten.innerHTML = "<p>Jaartal tussen 1940 en 2024</p>";
      }
    }
  }
  check();
}
