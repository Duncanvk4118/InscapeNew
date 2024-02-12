function kopie() {
  let vnaam = document.getElementById("vn");
  let anaam = document.getElementById("an");
  let invoernaam = vnaam.value + " " + anaam.value;
  let leeft = document.getElementById("lt");
  let alt = document.getElementById("al");
  let al = alt.value;
  let tot = parseInt(leeft.value) + parseInt(alt.value);
  let outputdiv = document.getElementById("output");

  console.log(vnaam);

  outputdiv.innerHTML =
    "Hallo mijn naam is " +
    invoernaam +
    " en over " +
    al +
    " ben ik " +
    tot +
    " jaar!";
}

function returnPage() {
  window.location.href = "http://localhost/Opdrachten/opdrselect.php";
}
