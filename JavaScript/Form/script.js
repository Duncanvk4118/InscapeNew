// let array = ["naam", "adres"];

const reqFirstName = document.getElementById("reqName");

reqFirstName.onkeyup = function () {
  if (reqFirstName.checkValidity()) {
    reqFirstName.style.background = "rgba(0,255,0,0.6)";
  } else {
    reqFirstName.style.background = "rgba(255,0,0,0.6)";
  }
};
