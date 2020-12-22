import axios from "axios";
const baseurl =
  window.location.origin +
  "/" +
  window.location.pathname.split("/")[1] +
  "/" +
  window.location.pathname.split("/")[2] +
  "/";
const usernameInput = document.getElementById("username");
const passwordInput = document.getElementById("password");
const loginbtn = document.getElementById("loginBtn");
const loginForm = document.getElementById("loginForm");
const passwordDiv = document.getElementById("password-valid");
if (loginbtn) {
  loginbtn.addEventListener("click", (mouseEvent) => {
    login();
  });

  usernameInput.addEventListener("keyup", (ev) => {
    if (ev.key == "Enter") {
      login();
    }
  });

  passwordInput.addEventListener("keyup", (ev) => {
    if (ev.key == "Enter") {
      login();
    }
  });
}

function login() {
  const username = document.getElementById("username").value;
  const password = document.getElementById("password").value;

  axios
    .post(`${baseurl}login`, {
      username: username,
      password: password,
    })
    .then((res) => {
      if (res.data.status == false) {
        usernameInput.classList.add("is-invalid");
        passwordInput.classList.add("is-invalid");
        passwordDiv.className = "invalid-feedback";
        passwordDiv.innerHTML = "Username/Password Salah!!!";
      } else {
        usernameInput.classList.add("is-valid");
        passwordInput.classList.add("is-valid");
        passwordDiv.className = "valid-feedback";
        passwordDiv.innerHTML = "";
        window.location.replace(baseurl);
      }
    });
}
