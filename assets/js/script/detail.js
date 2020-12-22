import Axios from "axios";
import { Carousel } from "bootstrap";
import { updateCart } from "./main.js";
const baseurl =
  window.location.origin +
  "/" +
  window.location.pathname.split("/")[1] +
  "/" +
  window.location.pathname.split("/")[2] +
  "/";
const carouselDetail = document.querySelector("#carouselDetail");
const itemList = [].slice.call(document.querySelectorAll(".item"));
const right = document.querySelector("#right");
const left = document.querySelector("#left");
const alert = document.querySelector("#added");
const add = document.querySelector("#addKeranjang");
const beli = document.querySelector("#beliBarang");
const queryString = window.location.search;
const params = new URLSearchParams(queryString);
const productID = params.get("id_product");

if (carouselDetail) {
  const carousel = new Carousel(carouselDetail, {
    interval: 6000,
  });
  itemList.map((item, index) => {
    item.addEventListener("click", (ev) => {
      carousel.to(index);
    });
  });
  add.addEventListener("click", (ev) => {
    Axios.post(`${baseurl}add/cart`, { id_barang: productID }).then((res) => {
      if (res.data == 1) {
        alert.innerHTML = `<div class="alert alert-success alert-dismissible fade show" role="alert">
          Barang berhasil ditambahkan
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>`;
      }
      updateCart();
    });
  });
  right.addEventListener("click", (ev) => {
    carousel.next();
  });
  left.addEventListener("click", (ev) => {
    carousel.prev();
  });
  function removeClass() {
    itemList.forEach((item) => {
      item.classList.remove("active");
    });
  }

  carouselDetail.addEventListener("slid.bs.carousel", (ev) => {
    removeClass();
    itemList[ev.to].classList.add("active");
  });
}
