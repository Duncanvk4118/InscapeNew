// API Section
let lastLocation = "";

function fStart() {
  let locationInput = document.getElementById("location").value;
  if (locationInput !== lastLocation) {
    lastLocation = locationInput;

    let url =
      "http://api.openweathermap.org/data/2.5/forecast?q=" +
      locationInput +
      "&appid=7e9e4388a5a4dce0540edfca18c2bdc4";
    axios
      .get(url)
      .then((response) => {
        let weatherPrep = response.data.list;
        fShow(weatherPrep);
      })
      .catch(function (error) {
        console.log("error=", error);
      });
  }
}

function fShow(weatherPrep) {
  let locationInput = document.getElementById("location").value;
  let html = "<table>";
  html += "<caption>Weer Informatie voor: " + locationInput + "</caption>";
  console.log(weatherPrep);
  html += "<tr>";
  html += "<th>Datum</th> <th>Termperatuur</th> <th>Weer Soort</th>";
  html += "</tr>";
  weatherPrep.forEach(function (weather, index) {
    html += "<tr>";
    html += "<td>";
    html += new Date(weather.dt * 1000).toLocaleString();
    html += "</td>";
    html += "<td>";
    html += (weather.main.temp - 273.15).toFixed(0) + "<span>&#8451;</span>";
    html += "</td>";
    html += "<td>";
    html += weather.weather[0].main;
    html += "</td>";
    html += "<td>";
    html +=
      "<img src=https://openweathermap.org/img/w/" +
      weather.weather[0].icon +
      ".png />";
    html += "</td>";
    html += "</tr>";
  });

  html += "</table>";

  let outputElement = document.getElementById("output");
  if (outputElement.querySelector("table") !== null) {
    outputElement.querySelector("table").innerHTML = html;
  } else {
    outputElement.innerHTML = html;
  }
}

// Scroll button
function scrollToSection(sectionId) {
  const section = document.getElementById(sectionId);
  if (section) {
    section.scrollIntoView({ behavior: "smooth", block: "start" });
  }
}

window.addEventListener("scroll", function () {
  const scrollButton = document.getElementById("scrollButton");
  const resultSection = document.getElementById("result");

  if (resultSection.getBoundingClientRect().top < window.innerHeight) {
    scrollButton.style.display = "block";
  } else {
    scrollButton.style.display = "none";
  }
});
