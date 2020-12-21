<?php
include(APPROOT . '/Views/include/header.php');
include(APPROOT . '/Views/include/navbar.php');
$error = Message();
?>

<div class="container-fluid py-5" style="max-width: 90%;">
<form action="" id="imgfm" method="POST" enctype="multipart/form-data">
    <h4 class="fw-bold" >Tambah Barang</h4>
    <div class="shadow mt-4 border rounded-2">
        <div class="p-5">
            <h5 class="fw-bold" >Upload Gambar <span class="badge rounded-pill bg-danger">Wajib</span></h5>
            <p class="small p-0 m-0 text-muted">Format gambar .jpg .jpeg .png dan size maksimum 5MB</p>
            <p class="small p-0 m-0 text-muted">Minimal 1 gambar</p>
        </div>
        <div class="p-3">
            <div class="row justify-content-evenly mb-2">
                <label for="img1" id="imgup1" class="mt-md-0 mt-2 border rounded  border-success d-flex justify-content-center align-items-center img-upload ">
                    <i class="fas fs-1 text-muted fa-plus"></i>
                </label>
                <input id="img1" class="gambar" name="img1" style="display: none;" type="file">

                <label for="img2" id="imgup2" class="mt-md-0 mt-2 border rounded  border-success d-flex justify-content-center align-items-center img-upload ">
                <i class="fas fs-1 text-muted fa-plus"></i>
                </label>
                <input id="img2" class="gambar" name="img2" style="display: none;" type="file">

                <label for="img3" id="imgup3" class="mt-md-0 mt-2 border rounded border-success d-flex justify-content-center align-items-center img-upload ">
                    <i class="fas fs-1 text-muted fa-plus"></i>
                </label>
                <input id="img3" class="gambar" name="img3" style="display: none;" type="file">
            </div>
        </div>
    </div>
    <div class="shadow mt-4 border rounded-2">
        <div class="pl-5 pt-5">
            <h5 class="fw-bold" >Informasi Barang <span class="badge rounded-pill bg-danger">Wajib</span></h5>
        </div>
        <div class="px-5 pt-3">
            <div class="row py-3">
                <label class="col-md-4  fw-bold  col-form-label" for="nama_barang">Nama Barang </label>
                <div class="col-md-8 ">
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang">
                </div>
            </div>
            <div class="row py-3">
                <label class="col-md-4  fw-bold  col-form-label" for="jenis_barang">Jenis Barang</label>
                <div class="col-md-8 ">
                    <select class="form-select" id="jenis_barang" name="jenis_barang" aria-label="Default select example">
                        <option selected>Pilih jenis barang</option>
                        <?php foreach($data as $dat): ?>
                            <option value="<?php echo $dat->id?>" ><?php echo $dat->nama_jenis?></option>
                            <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div class="row py-3">
                <label class="col-md-4  fw-bold  col-form-label" for="deskripsi_barang">Deskripsi Barang </label>
                <div class="col-md-6 ">
                    <textarea class="form-control" id="deskripsi_barang" name="deskripsi_barang" rows="5"></textarea>
                </div>
            </div>
            <div class="row py-3">
                <label class="col-md-4  fw-bold  col-form-label" for="kadaluarsa_barang">Kadaluarsa</label>
                <div class="col-auto">
                    <input type="date" class="form-control" id="kadaluarsa_barang" name="kadaluarsa_barang">
                </div>
            </div>
            <div class="row py-3">
                <label class="col-md-4  fw-bold  col-form-label" for="harga_barang">Harga</label>
                <div class="col-md-8 ">
                    <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">Rp</span>
                    <input type="text" id="harga_barang" name="harga_barang" class="form-control"  aria-describedby="basic-addon1">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-5 d-flex justify-content-end">
        <div class="d-grid  gap-2 d-md-block">
            <button class="btn py-2 px-5 btn-green" type="submit">Tambah Barang</button>
        </div>
    </div>
</form>
</div>


<?php
include(APPROOT . '/Views/include/footer.php');
?>