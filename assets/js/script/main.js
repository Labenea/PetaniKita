import Axios from "axios";

const baseurl =
  window.location.origin +
  "/" +
  window.location.pathname.split("/")[1] +
  "/" +
  window.location.pathname.split("/")[2] +
  "/";
const shop = document.getElementById("shop-notif");

export function updateCart() {
  Axios.get(`${baseurl}get/cart`).then((res) => {
    shop.innerHTML = res.data.jumlah;
  });
}

if (shop) {
  updateCart();
}

// if (shop) {
//   Axios.get(`${baseurl}get/cart`).then((res) => {
//     shop.innerHTML = res.data.jumlah;
//   });
//   const getCount = setInterval(() => {
//     Axios.get(`${baseurl}get/cart`).then((res) => {
//       shop.innerHTML = res.data.jumlah;
//       console.log("fire");
//     });
//   }, 5000);
// }
