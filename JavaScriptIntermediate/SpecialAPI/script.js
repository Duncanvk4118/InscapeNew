// const xmlhttp = new XMLHttpRequest();

// xmlhttp.onload = function () {
//   const myObj = JSON.parse(this.responseText);
//   document.getElementById("demo").innerHTML = myObj;
// };
// xmlhttp.open(
//   "GET",
//   "http://localhost:8888/InscapeNew/JavaScriptIntermediate/SpecialAPI/api.php"
// );
// xmlhttp.send();

// const xmlhttp = new XMLHttpRequest();
// xmlhttp.onload = function () {
//   const myObj = JSON.parse(this.responseText);
//   document.getElementById("demo").innerHTML = myObj;
// };
// xmlhttp.open(
//   "GET",
//   "http://localhost:8888/InscapeNew/JavaScriptIntermediate/SpecialAPI/api.php"
// );
// xmlhttp.send();

const xmlhttp = new XMLHttpRequest();
xmlhttp.onload = function () {
  //   myObj = JSON.parse(this.responseText);
  dataJSON = this.responseText;
  json = JSON.parse(dataJSON);
  let text = "";
  for (let x in json) {
    text += json[x] + "<br>";
  }
  document.getElementById("demo").innerHTML = text;
};
xmlhttp.open(
  "GET",
  "http://localhost:8888/InscapeNew/JavaScriptIntermediate/SpecialAPI/api.php?"
);
xmlhttp.send();
