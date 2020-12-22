<?php
require(APPROOT . "/Views/include/header.php");
$error = Message();
?>

<div class="container-fluid regist">
    <div class="row mt-5 mb-5 justify-content-center">
        <div class="col col-lg-10 col-md-12">
            <div class="card">
                <div class="card-body p-5">
                <?php if ($error != null) : ?>
    <div class="container-fluid" style="">
        <div class="alert alert-danger" role="alert">
            <?php echo $error; ?>
        </div>
    </div>

<?php endif ?>
                    <div class="row justify-content-center">
                        <a href="<?php echo BASEURL ?>">
                            <h1 class="title col-12 mt-1">
                                <span class="green">Petani</span><span class="orange">Kita</span>
                            </h1>
                        </a>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <form id="registerForm" class="row justify-content-center" action="<?php echo BASEURL ?>register" method="post">
                                <div class="col-12 ">
                                    <div class="row mb-3">
                                        <label for="name" class="form-label">Nama</label>
                                        <div class="col-md-6">
                                            <input type="text" name="nama_depan" id="nama_depan" class="form-control form-control-sm" />
                                            <div id="" class="form-text">Nama Depan</div>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="nama_belakang" id="nama_belakang" class="form-control form-control-sm" />
                                            <div id="" class="form-text">Nama Belakang</div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="username" class="form-label">Username</label>
                                            <input type="text" name="username" id="username" class="form-control form-control-sm" />
                                        </div>
                                        <div class="col-md-6">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" name="email" id="email" class="form-control form-control-sm" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" name="password" id="password" class="form-control form-control-sm" />
                                        </div>
                                        <div class="col-md-6">
                                            <label for="cpassword" class="form-label">Confirm Password</label>
                                            <input type="password" name="cpassword" id="cpassword" class="form-control form-control-sm" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <label for="no_telp" class="form-label">No Telp</label>
                                            <input type="text" name="no_telp" id="no_telp" class="form-control form-control-sm" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <label for="jalan" class="form-label">Jalan</label>
                                            <input type="text" name="jalan" id="jalan" class="form-control form-control-sm" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="provinsi" class="form-label">Provinsi</label>
                                            <select id="provinsi" name="provinsi" class="form-select form-select-sm" aria-label=".form-select-sm " >
                                                <option selected  value="" >Provinsi</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="kota" class="form-label">Kota/Kabupaten</label>
                                            <select id="kota" name="kota" class="form-select form-select-sm" aria-label=".form-select-sm " >
                                            <option selected  hidden value="" ></option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="kecamatan"  class="form-label">Kecamatan</label>
                                            <select id="kecamatan" name="kecamatan" class="form-select form-select-sm" aria-label=".form-select-sm " >
                                            <option selected  hidden value="" ></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3 justify-content-end">
                                        <div class="col-12">
                                            <div class="d-grid gap-2 col-12 mx-auto mt-4">
                                                <button class="btn btn-primary" id="registerBtn" type="submit">
                                                    Sign Up
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-5  bg-card"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
require(APPROOT . "/Views/include/footer.php");
?>