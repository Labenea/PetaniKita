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
      } else {
        window.location.replace(baseurl);
      }
    });
}
