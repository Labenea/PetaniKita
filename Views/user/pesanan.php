<?php
include(APPROOT . '/Views/include/header.php');
include(APPROOT . '/Views/include/navbar.php');
$error = Message();
?>

<div style="max-width: 85%;" class="mt-3 container-fluid">
    <div class="d-flex mt-4 align-items-center">
        <h4 class="">Pesanan Saya</h4>
    </div>

    <div class="row py-3">
        <div class="col-md-3">
            <h5>Image</h5>
        </div>
        <div class="col-md-4">
            <h5>Nama Barang</h5>
        </div>
        <div class="col-md-3">
            <h5>Tanggal</h5>
        </div>
        <div class="col-md-2">
            <h5>Status</h5>
        </div>
    </div>
    <?php foreach ($data as $res) : ?>
        <?php $img = explode(",", $res->image); ?>
        <div class="row mt-3">
            <div class="col-md-3">
                <img class=" cart-img" src="<?php echo BASEURL . "assets/img/product/" . $img[0] ?>" alt="">
            </div>
            <div class="col-md-4">
                <h3><?php echo $res->nama_hasil ?></h3>
            </div>
            <div class="col-md-3">
                <h2 class="fw-bold"><?php echo $res->tanggal ?></h2>
            </div>
            <div class="col-md-2">
                <div class="d-grid gap-2 d-md-block">
                    <div class="btn   <?php
                                        if ($res->status == 0) {
                                            echo "btn-danger";
                                        } else {
                                            echo "btn-green";
                                        }
                                        ?>" type="button">
                        <?php
                        if ($res->status == 0) {
                            echo "Menunggu Kofirmasi";
                        } else {
                            echo "Terkonfirmasi";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>


<?php
include(APPROOT . '/Views/include/footer.php');
?>