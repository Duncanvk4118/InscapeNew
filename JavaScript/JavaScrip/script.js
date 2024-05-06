const autodata = [
  ["Saab", 17000],
  ["Volvo", 22000],
  ["Bmw", 21000],
];

function weergeven() {
  document.getElementById("autos").innerHTML = "";
  autodata.forEach((auto) => {
    document.getElementById("autos").innerHTML +=
      "nieuw: " + auto[0] + " " + auto[1] + "<br>";
  });
}

function search(merk, prijs) {
  let indexElement = autodata.findIndex(
    (autoel) => autoel[0] === merk && autoel[1] == prijs
  );
  return indexElement;
}

function add() {
  const inputCar = document.getElementById("car").value;
  const inputNum = document.getElementById("num").value;

  let indexElement = search(inputCar, inputNum);
  if (indexElement == -1) {
    autodata.push([inputCar, inputNum]);
  }

  weergeven();
}

function remove() {
  const inputCar = document.getElementById("car").value;
  const inputNum = document.getElementById("num").value;

  let indexElement = search(inputCar, inputNum);
  if (indexElement != -1) {
    autodata.splice(indexElement, 1);
  }
  weergeven();
}

function modify() {
  const inputCar = document.getElementById("car").value;
  const inputNum = document.getElementById("num").value;
  const inputNewNum = document.getElementById("newnum").value;

  let indexElement = search(inputCar, inputNum);
  if (indexElement != -1) {
    autodata[indexElement][1] = inputNewNum;
  }
  weergeven();
}
//document.getElementById("autos").innerHTML = "De " + item + " kost " + price;

weergeven();
// document.getElementById("autos").innerHTML = cars + "<br />" + price;