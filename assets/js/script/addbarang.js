const imgList = [].slice.call(document.querySelectorAll(".gambar"));
const harga = document.getElementById("harga_barang");
const fm = document.getElementById("imgfn");
console.log(imgList);

const keycodes = {
  backspace: 8,
  delete: 46,
  leftArrow: 37,
  rightArrow: 39,
  number1: 48,
  number9: 57,
};

if (harga) {
  harga.addEventListener("keydown", (ev) => {
    formatnum(ev);
  });
  harga.addEventListener("input", (ev) => {
    if (harga.value) {
      var n = parseInt(harga.value.replace(/\D/g, ""), 10);
      harga.value = n.toLocaleString("id-ID");
      return true;
    }
  });
}

// harga.addEventListener("keypress", (ev) => {
//   formatnum(harga.value);
// });

if (imgList) {
  imgList.map((img, index) => {
    img.addEventListener("change", (ev) => {
      imagePreview(ev, index);
    });
  });
}

function imagePreview(ev, index) {
  console.log(URL.createObjectURL(ev.target.files[0]));
  const img = document.getElementById(`imgup${index + 1}`);
  img.style.backgroundImage =
    "url(" + URL.createObjectURL(ev.target.files[0]) + ")";
  img.style.backgroundSize = "cover";
  img.innerHTML = "";
  img.onload = function () {
    URL.revokeObjectURL(img.src); // free memory
  };
}

function formatnum(evt) {
  charCode = evt.keyCode;
  if (
    charCode > 31 &&
    (charCode < 48 || charCode > 57) &&
    charCode !== keycodes.delete &&
    charCode !== keycodes.backspace &&
    charCode !== keycodes.leftArrow &&
    charCode !== keycodes.rightArrow
  ) {
    evt.preventDefault();
    return false;
  }
}
