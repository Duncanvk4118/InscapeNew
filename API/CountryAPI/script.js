// function fStart() {
//   let url = "https://restcountries.com/v3.1/all";

//   axios
//     .get(url)
//     .then((response) => {
//       let countries = response.data;
//       fShow(countries);
//     })
//     .catch(function (error) {
//       console.log("Error: ", error);
//     });
// }

// function fShow(countries) {
//   let html = "<table>";
//   console.log(countries);

//   countries.forEach((country) => {
//     html += "<tr>";
//     html += "<td>" + country[0].name.common + "</td>";
//     html += "<td>" + country[0].capital + "</td>";
//     html += "</tr>";
//   });

//   html += "</table>";

//   document.getElementById("out").innerHTML = html;
// }

let landenDiv = document.getElementById("out");

axios
  .get("https://restcountries.com/v2/all")
  .then(function (response) {
    let landen = response.data;
    console.log(landen);

    let html = "<table>";
    html += "<tr>";
    html +=
      "<th>ID</th><th>Land</th><th>Vlag</th><th>Buurlanden</th><th>Munteenheid</th>";
    html += "</tr>";

    landen.forEach(function (land, index) {
      html += "<tr>";
      html += "<td>" + (index + 1) + "</td>";
      html += "<td>" + land.name + "</td>";
      // html += "<td>" + land.alpha3Code + "</td>";
      html += "<td><img src='" + land.flag + "'/> </td>";
      html += "<td>";
      if (land.borders != null && land.borders.length > 0) {
        html += "<ul>";
        land.borders.forEach(function (border) {
          html += "<li>" + border + "</li>";
        });
        html += "</ul>";
      } else {
        html += "Geen buurlanden";
      }
      html += "</td>";
      if (land.currencies && land.currencies.length > 0) {
        html += "<td>" + land.currencies[0].name + "</td>";
      } else {
        html += "<td></td>";
      }
      // html += "<td>" + land.currencies[0].name + "</td>";
      html += "</tr>";
    });
    landenDiv.innerHTML = html;
  })
  .catch(function (error) {
    console.log(error);
    let html = "";
    html += "<div style='color:red'>FOUT: ";
    html += error.response.data.message + "<br>";
    html += "url = " + error.config.url;
    html += "</div>";
    landenDiv.innerHTML = html;
  });
