let output = document.getElementById("out_title");

let url =
  "http://api.openweathermap.org/data/2.5/forecast?lat=52.51&lon=6.08&appid=7e9e4388a5a4dce0540edfca18c2bdc4";
function fLoad() {
  var request = new XMLHttpRequest();
  request.open("GET", url);
  request.onload = function () {
    var thisData = JSON.parse(request.responseText);
    var list = thisData.list;
    console.log(list.length);
    var table = `
      <table>
        <tr>
          <th> Datum-Tijd </th>
          <th> Tijd </th>
          <th> Temperatuur </th>
          <th> Vochtigheid </th>
          <th> Druk </th>
          <th> Bewolking </th>
          <th> Wind </th>
        </tr>
    `;

    for (let i = 0; i < list.length; i++) {
      table += `
        <tr>
          <td>${list[i].dt_txt}</td>
          <td>${list[i].dt_txt.split(" ")[1]}</td>
          <td>${list[i].main.temp}</td>
          <td>${list[i].main.humidity}</td>
          <td>${list[i].main.pressure}</td>
          <td>${list[i].clouds.all}</td>
          <td>${list[i].wind.speed}</td>
        </tr>
      `;
    }

    table += `</table>`;
    output.innerHTML = table;
    // console.log(list[i]);
    // output.innerHTML = list[i];
  };
  // output.innerHTML = thisData.list[0];
  // console.log(thisData.list[0]);
  request.send();
}

// function fLaadWeer() {
//   fetch(url)
//     .then((data) => {
//       return data.json();
//     })
//     .then((json) => {
//       console.log("Weather, geladen met AJAX via FETCH API van JS:", json);
//       fJson2Html(json); // geef JSON en title door aan function
//     });
// }

// function fJson2Html(json) {
//   // document.getElementById("out_title").innerHTML = title;

//   var table = "<table>";
//   table += "<tr>";
//   table += "<th>";
//   table += "nr";
//   table += "</th>";
//   table += "<th>";
//   table += "naam";
//   table += "</th>";
//   table += "<th>";
//   table += "brouwer";
//   table += "</th>";
//   table += "</tr>";
//   for (var i = 0; i < json.length; i++) {
//     table += "<tr>";
//     table += "<td>" + (i + 1) + "</td>"; // zet een volgorde nummer voor in de rij
//     table += "<td>" + json[i].weather + "</td>"; // haal van de array nr i van de json, de object key "naam" op
//     table += "<td>" + json[i].preassure + "</td>"; // haal van de array nr i van de json, de object key "brouwer" op
//     table += "</tr>";
//   }
//   table += "</table>";

//   // document.getElementById("out_title").innerHTML = title; // vul de title die meegegeven is aan de functie in "out_title" in
//   document.getElementById("out_data").innerHTML = table; // vul "out_data" met de uit de json opgebouwe table
// }
