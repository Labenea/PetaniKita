import axios from "axios";
const baseurl =
  window.location.origin +
  "/" +
  window.location.pathname.split("/")[1] +
  "/" +
  window.location.pathname.split("/")[2] +
  "/";
const ubahNama = document.getElementById("ubahNama");
if (ubahNama) {
  ubahNama.addEventListener("click", (ev) => {
    changeName();
  });
}

function changeName() {
  const changeModal = document.getElementById("changeModal");
  changeModal.innerHTML = `
    <div class="modal fade"  id="changeNameModal" tabindex="-1"  aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" >Change Name</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row justify-content-center">
            <div class="row mb-3 align-items-center col-11">
              <div class="col-4">
                <h6 class="mb-0">Nama Depan</h6>
              </div>
              <div class="col-8">
                <input class='form-control form-control-sm ' type="text" name="nama_depan" id="nama_depan" value="${namaDepanV}">
              </div>
            </div>
            <div class="row mb-3 align-items-center col-11">
              <div class="col-4">
                <h6 class="mb-0">Nama Belakang</h6>
              </div>
              <div class="col-8">
                <input class='form-control form-control-sm ' type="text" name="nama_belakang" id="nama_belakang" value="${namaBelakangV}" >
              </div>
            </div>
            <div class="col">
                <div class="d-grid gap-2 col-12 mx-auto mt-4">
                    <input class="btn btn-green" id="saveButton" type="button" value="Save">
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    `;
  const myModal = new bootstrap.Modal(
    document.getElementById("changeNameModal")
  );
  myModal.show();
  const saveButton = document.getElementById("saveButton");
  saveButton.addEventListener("click", () => {
    saveChangeName();
  });
}

function saveChangeName() {
  const saveButton = document.getElementById("saveButton").value;
  const namaDepan = document.getElementById("nama_depan").value;
  const namaBelakang = document.getElementById("nama_belakang").value;

  axios
    .post(`${baseurl}profile/edit`, {
      button: saveButton,
      nama_depan: namaDepan,
      nama_belakang: namaBelakang,
    })
    .then((res) => {
      console.log(res);
      if (res.data.status == false) {
      } else {
        window.location.reload();
      }
    });
}
