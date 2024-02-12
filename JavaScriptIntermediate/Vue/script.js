Vue.createApp({
  data() {
    return {
      biertjes: [],
      aKeysBiertje: [],
    };
  },
  mounted() {
    let url = "https://15euros.nl/api/bier_basic.php";
    axios.get(url).then((response) => {
      console.log("response =", response);
      for (var key in this.biertjes[0]) {
        this.aKeysBiertje.push(key);
      }
      console.log(this.aKeysBiertje);
      this.biertjes = response.data;
    });
  },
}).mount("#app");
