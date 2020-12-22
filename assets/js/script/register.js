import axios from "axios";
const baseurl =
  window.location.origin +
  "/" +
  window.location.pathname.split("/")[1] +
  "/" +
  window.location.pathname.split("/")[2] +
  "/";
const provinsi = document.querySelector("#provinsi");
const kota = document.querySelector("#kota");
const kec = document.querySelector("#kecamatan");
const registerForm = document.getElementById("registerForm");
const pass = document.getElementById("password");
const vpass = document.getElementById("cpassword");

let valid = false;

if (provinsi) {
  vpass.addEventListener("input", (ev) => {
    if (vpass.value != pass.value) {
      valid = false;
      vpass.classList.remove("is-valid");
      vpass.classList.add("is-invalid");
    } else {
      valid = true;
      vpass.classList.remove("is-invalid");
      vpass.classList.add("is-valid");
      pass.classList.add("is-valid");
    }
  });

  registerForm.addEventListener("submit", (ev) => {
    if (valid) {
      registerForm.submit();
    } else {
      ev.preventDefault();
    }
  });

  if (provinsi) {
    axios.post(`${baseurl}wilayah`).then((res) => {
      res.data.forEach((dat) => {
        provinsi.innerHTML += `<option value=${dat.id}>${dat.nama}</option>`;
      });
    });
  }
  provinsi.addEventListener("change", (ev) => {
    getKota(provinsi.value);
  });

  kota.addEventListener("change", (ev) => {
    getKec(kota.value);
  });
  function getKota(id) {
    kota.innerHTML = "<option selected disabled>Kota/Kabupaten</option>";
    axios.post(`${baseurl}wilayah/kota`, { id: id }).then((res) => {
      res.data.forEach((dat) => {
        kota.innerHTML += `<option value=${dat.id}>${dat.nama}</option>`;
      });
    });
  }

  function getKec(id) {
    kec.innerHTML = "<option selected disabled>Kecamatan</option>";
    axios.post(`${baseurl}wilayah/kecamatan`, { id: id }).then((res) => {
      res.data.forEach((dat) => {
        kec.innerHTML += `<option value=${dat.id}>${dat.nama}</option>`;
      });
    });
  }
}
