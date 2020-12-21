<?php
include(APPROOT . '/Views/include/header.php');
include(APPROOT . '/Views/include/navbar.php');
$error = Message();
?>

<div class='container-fluid profile mt-5' style="max-width: 90%;">
    <div class="row justify-content-center">
        <div class="col col-md-12 col-lg-8 ">
            <div class="card">
                <div class="card-body">
                    <h5 class=mb-3>Profile</h5>
                    <div class="row mb-4">
                        <div class="col-5 col-md-3">
                            <h6 class="fw-bold">Username</h6>
                        </div>
                        <div class="col-7 col-md-9">
                            <h6><?php echo $data['username'] ?></h6>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-5 col-md-3">
                            <h6 class="fw-bold">Nama Lengkap</h6>
                        </div>
                        <div class="col-7 col-md-9">
                            <h6><?php echo $data['nama_depan'] . " " . $data['nama_belakang'] ?> <span class="ml-2 ubah"><a id="ubahNama" class="text-decoration-none" href="#">Ubah</a></span></h6>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-5 col-md-3">
                            <h6 class="fw-bold">Email</h6>
                        </div>
                        <div class="col-7 col-md-9">
                            <h6><?php echo $data['alamat_email']?></h6>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-5 col-md-3">
                            <h6 class="fw-bold">Password</h6>
                        </div>
                        <div class="col-7 col-md-9">
                            <button class="btn btn-green btn-sm">Change Password</button>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-5 col-md-3">
                            <h6 class="fw-bold">Nomer Hp</h6>
                        </div>
                        <div class="col-7 col-md-9">
                            <h6><?php echo $data['nomor_hp']?><span class="ml-2 ubah"><a id="ubahNo" class="text-decoration-none" href="#">Ubah</a></span></h6>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-5 col-md-3">
                            <h6 class="fw-bold">Alamat</h6>
                        </div>
                        <div class="col-7 col-md-5">
                            <h6><?php echo $data['jalan']?> <span class="ml-2 ubah"><a id="ubahJalan" class="text-decoration-none" href="#">Ubah</a></span></h6>
                        </div>
                        <div class="col-md-4 col-5 offset-md-0 offset-5">
                        <h6><?php echo $data['p_nama']?></h6>
                        <h6><?php echo $data['k_nama']?></h6>
                        <h6><?php echo $data['kc_nama']?></h6>
                        </div>
                    </div>
                    <div class="row mb-4 px-2">
                        <a class="btn btn-danger " href="<?php echo URLROOT ?>profile/delete">Delete Account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="changeModal">
        
    </div>
    <script>
        const namaDepanV = "<?php echo $data["nama_depan"]?>";
        const namaBelakangV = "<?php  echo $data["nama_belakang"]?>";
    </script>
</div>

<?php
include(APPROOT . '/Views/include/footer.php');
?>