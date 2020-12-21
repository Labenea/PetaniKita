import axios from "axios";

const baseurl =
  window.location.origin +
  "/" +
  window.location.pathname.split("/")[1] +
  "/" +
  window.location.pathname.split("/")[2] +
  "/";

const addImage = document.querySelector("#addCategories");
const main = document.querySelector("#categoriesModal");
if (addImage) {
  addImage.addEventListener("click", (ev) => {
    addImages();
  });
}

function addImages() {
  main.innerHTML = `
    <div class="modal fade"  id="addCategoriesModal" tabindex="-1"  aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" >Add Categories</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         <form class="" id="addForm" action="${baseurl}admin/product/categories" method="post" enctype="multipart/form-data">
         <div class="row justify-content-center">
            <div class="row mb-3 align-items-center col-11">
              <div class="col-4">
                <h6 class="mb-0">Title</h6>
              </div>
              <div class="col-8">
                <input class='form-control form-control-sm ' type="text" name="title" id="title" value="">
              </div>
            </div>
            <div class="row mb-3 align-items-center col-11">
                <input class="form-control form-control-sm" name="addCategoriesImg" id="addCategoriesImg" type="file">
                <p class="text-muted fw-light small add-rules mb-0">- Only SVG are allowed</p>
                <p class="text-muted fw-light small add-rules mb-0">- Maximum file size 2MB</p>
            </div>
            <div class="col">
                <div class="d-grid gap-2 col-12 mx-auto mt-4">
                    <input class="btn btn-green" id="addBtn" type="button" value="Add">
                </div>
            </div>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
    `;
  const myModal = new bootstrap.Modal(
    document.getElementById("addCategoriesModal")
  );
  myModal.show();
  const addBtn = document.querySelector("#addBtn");
  const addForm = document.querySelector("#addForm");
  addBtn.addEventListener("click", (ev) => {
    ev.preventDefault();
    addForm.submit();
  });
}
