let output = document.getElementById("output");

function seeDate() {
  output.innerHTML = Date();
  output.style.backgroundColor = "#000";
  output.style.color = "#fff";
  output.style.textAlign = "start";
}

function sayHi() {
  output.innerHTML = "Hello!";
  output.style.backgroundColor = "#fff";
  output.style.color = "#000";
  output.style.textAlign = "center";
}
