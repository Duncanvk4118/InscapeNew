let box = document.getElementById("dialogue");

function show(name) {
  document.getElementById("header").innerHTML = name;
  box.style.top = "100px";
}

function hide() {
  box.style.top = "-250px";
}
