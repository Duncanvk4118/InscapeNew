const wrapper = document.querySelector(".wrapper");
const loginLink = document.querySelector(".login-link");
const registerLink = document.querySelector(".register-link");

registerLink.addEventListener("click", () => {
  wrapper.classList.add("active");
});

loginLink.addEventListener("click", () => {
  wrapper.classList.remove("active");
});

// Input checker
function fLengthPass() {
  let pass = document.getElementById("passlog").value;
  let test = document.getElementById("test");
  if (pass.length < 8) {
    test.innerHTML = "You need 8 Characters in your password!" + "\n";
  } else {
    test.innerHTML = "";
  }
}
