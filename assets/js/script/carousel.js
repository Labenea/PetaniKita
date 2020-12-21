import { Carousel } from "bootstrap";
const carouselHome = document.querySelector("#carouselHome");
const itemList = [].slice.call(document.querySelectorAll(".item"));
const right = document.querySelector("#right");
const left = document.querySelector("#left");
if (carouselHome) {
  const carousel = new Carousel(carouselHome, {
    interval: 2000,
  });
  itemList.map((item, index) => {
    item.addEventListener("click", (ev) => {
      carousel.to(index);
    });
  });

  right.addEventListener("click", (ev) => {
    carousel.next();
  });
  left.addEventListener("click", (ev) => {
    carousel.prev();
  });
}
