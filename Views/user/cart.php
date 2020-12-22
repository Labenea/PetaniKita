<?php
include(APPROOT . '/Views/include/header.php');
include(APPROOT . '/Views/include/navbar.php');
$error = Message();
?>

<div style="max-width: 85%;" class="mt-3 container-fluid">
    <h4 class=" pt-4">Keranjang</h4>
    <div class="row py-3">
        <div class="col-md-3">
            <h5>Image</h5>
        </div>
        <div class="col-md-4">
            <h5>Nama Barang</h5>
        </div>
        <div class="col-md-3">
            <h5>Harga Barang</h5>
        </div>
        <div class="col-md-2">
            <h5>Menu</h5>
        </div>
    </div>
    <?php foreach($data as $res):?>
        <?php $img = explode(",",$res->image);?>
    <div class="row mt-3">
        <div class="col-md-3">
            <img class=" cart-img" src="<?php echo BASEURL."assets/img/product/".$img[0]?>" alt="">
        </div>
        <div class="col-md-4">
            <h3><?php echo $res->nama_hasil?></h3>
            <p class="text-muted small">By:<?php echo $res->username_penjual?></p>
        </div>
        <div class="col-md-3">
            <h2 class="fw-bold">Rp<?php echo number_format($res->harga,0,",",".")?></h2>
        </div>
        <div class="col-md-2">
            <div class="d-grid gap-2 d-md-block">
                <a href="<?php echo BASEURL."remove/cart?id_keranjang=".$res->id_keranjang?>" class="btn btn-danger" type="button">Remove</a>
            </div>
        </div>
    </div>
    <?php endforeach?>
    <div class="d-flex mt-3 justify-content-end">
    <div class="d-grid gap-2 d-md-block">
                <a href="<?php echo BASEURL?>cart/checkout" class="btn btn-success px-5" type="button">Check Out</a>
            </div>
    </div>
</div>


<?php
include(APPROOT . '/Views/include/footer.php');
?>