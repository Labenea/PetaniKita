<?php
include(APPROOT . '/Views/include/header.php');
include(APPROOT . '/Views/include/navbar.php');
$error = Message();
$img = explode(",", $data['res']->image);
setlocale(LC_MONETARY, "id_ID");
?>


<div id="detail" class="container-fluid" style="width: 90%;">
    <div id="added"></div>
    <div class="row py-3 pl-3">
        <div class="carousel-height col-md-5">
            <div id="carouselDetail" class="carousel slide " data-bs-ride="carousel">
                <div class="carousel-inner rounded-3">
                    <?php foreach ($img as $key => $image) : ?>
                        <div class="carousel-item <?php if ($key == 0) {
                                                        echo "active";
                                                    } ?>">
                            <img src="<?php BASEURL ?>assets/img/product/<?php echo $image ?>" class=" w-100" alt="...">
                        </div>
                    <?php endforeach ?>
                </div>
                <a class="carousel-control-prev" id="left" role="button">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </a>
                <a class="carousel-control-next" id="right" role="button">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </a>
            </div>
            <ol class="indicator py-3 list-inline">
                <?php foreach ($img as $key => $image) : ?>
                    <li class="item rounded-3 list-inline-item <?php if ($key == 0) {
                                                                    echo "active";
                                                                } ?>" style="background-image: url(<?php echo BASEURL ?>assets/img/product/<?php echo $image ?>);"></li>
                <?php endforeach ?>
            </ol>
        </div>
        <div class="col-md-7">
            <h2 class="pl-md-4 pt-3"><?php echo $data['res']->nama_hasil ?></h2>
            <h6 class="pl-md-4 small text-muted">By : <?php echo $data['res']->nama ?> </h6>
            <h3 class="pl-md-4 pt-3">Rp<?php echo number_format($data['res']->harga, 0, ",", ".") ?></h3>
            <div class="pl-md-4 pt-4 row align-items-center">
                <div class="col-md-2">
                    <h6 class="text-muted fw-bold">Status</h6>
                </div>
                <div class="col-md">
                    <h4 class="fw-Bold <?php if ($data['res']->status_hasilTani == 2) {
                                            echo 'text-success';
                                        } else {
                                            echo 'text-danger';
                                        } ?>"><?php echo $data['res']->nama_status ?></h4>
                </div>
            </div>
            <div class="pl-md-4 pt-4 row align-items-center">
                <div class="col-md-2">
                    <h6 class="text-muted fw-bold">Expired</h6>
                </div>
                <div class="col-md">
                    <h4 class="fw-Bold <?php if ($data['res']->status_hasilTani == 2) {
                                            echo 'text-success';
                                        } else {
                                            echo 'text-danger';
                                        } ?>"><?php echo $data['res']->kadaluarsa_hasilTani ?></h4>
                </div>
            </div>
            <div class="pl-md-4 pt-4 row align-items-center">
                <div class="col-md-2">
                    <h6 class="text-muted fw-bold">Jenis</h6>
                </div>
                <div class="col-md">
                    <h4 class="fw-Bold"><?php echo $data['res']->jenis ?></h4>
                </div>
            </div>
            <div class="pl-md-4 pt-4">
                <div class="d-grid gap-2 d-md-block">
                    <button id="addKeranjang" <?php if(!isLogedIn() || $data['res']->status_hasilTani == 1 || $data['res']->id_user == $_SESSION['user_id']){echo 'disabled';}?> class="btn btn-primary" type="button">Masukan Keranjang</button>
                    <button id="beliBarang" <?php if(!isLogedIn() ||  $data['res']->status_hasilTani == 1 || $data['res']->id_user == $_SESSION['user_id']){echo 'disabled';}?> class="btn btn-green" type="button">Beli Sekarang</button>
                </div>
            </div>
        </div>
    </div>
    <div class="pt-2 pl-3">
        <h3>Deskripsi</h3>
        <p class="pt-2 px-2">
            <?php echo $data['res']->deskripsi ?>
        </p>
    </div>
</div>


<?php
include(APPROOT . '/Views/include/footer.php');
?>