<?php
include(APPROOT . '/Views/include/header.php');
include(APPROOT . '/Views/include/navbar.php');
$error = Message();
?>
<div id="home" class="container-fluid mt-2" style="max-width: 90%;">
    <?php if ($error != null) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $error ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>
   <p class="mt-5 small text-muted">
       Menampilkan hasil untuk : <?php echo $_GET['keyword']?>
   </p>
    <div class="row mt-3">
        <?php if(isset($data['product'])):?>
        <?php foreach ($data['product'] as $res) : ?>
            <?php $img = explode(",", $res->image); ?>
            <div class="col-6 col-md-4 col-lg-3 mt-2">
                <a href="<?php echo BASEURL . "product?id_product=" . $res->id_hasilTani ?>" class="card-prod d-block ">
                    <div class="prod-thum">
                        <div class="prod-img" style="
                          background-image: url(<?php echo BASEURL ?>assets/img/product/<?php echo $img[0] ?>);"></div>
                    </div>
                    <div class="prod-text mt-2 ml-1">
                        <p><?php echo $res->nama_hasil ?> <span class="text-danger"><?php if ($res->status_hasilTani == 1) {
                                                                                        echo 'Expired';
                                                                                    } ?></span></p>
                    </div>
                    <div class="prod-price ml-1">
                        <p><?php echo number_format($res->harga,0,",",".") ?>/Kg</p>
                    </div>
                </a>
            </div>
        <?php endforeach ?>
        <?php else: ?>
            <h2 class="mt-3">
                Produk Tidak Ditemukan !
            </h2>
        <?php endif?>
    </div>
</div>


<?php
include(APPROOT . '/Views/include/footer.php');
?>