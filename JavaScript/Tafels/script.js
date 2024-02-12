function calculate() {
  let selector = document.getElementById("num").value;
  let begin = document.getElementById("bnum").value;
  let end = document.getElementById("enum").value;
  let output = document.getElementById("output");
  const numberlist = [];
  for (begin; begin <= end; begin++) {
    let total = begin * selector;
    let out = selector + "*" + begin + "=" + total + "<br />";
    numberlist.push(out);
    let outter = numberlist.join(" ");
    output.innerHTML = outter;
  }
}

function reset() {
  numberlist = [];
  document.getElementById("num").value = "";
  document.getElementById("enum").value = "";
  document.getElementById("bnum").value = "";
  let output = document.getElementById("output");

  output.innerHTML = numberlist;
}
