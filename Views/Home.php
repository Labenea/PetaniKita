<?php
include(APPROOT . '/Views/include/header.php');
include(APPROOT . '/Views/include/navbar.php');
$error = Message();
?>

<div id="carouselHome" class="carousel slide">
  <ol class="carousel-indicators">
    <?php foreach ($data['carousel'] as $k => $val) : ?>
      <li class="item" class="<?php if ($k == 0) {
                                echo 'active';
                              } ?>"></li>
    <?php endforeach ?>
  </ol>
  <div class="carousel-inner">
    <?php foreach ($data['carousel'] as $k => $val) : ?>
      <div class="carousel-item <?php if ($k == 0) {
                                  echo 'active';
                                } ?>">
        <img src="<?php echo BASEURL ?>assets/img/carousel/<?php echo $val->path; ?>" class="d-block w-100" alt="...">
      </div>
    <?php endforeach ?>
  </div>
  <a class="carousel-control-prev" href="#carouselHome" role="button" id="left">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselHome" role="button" id="right">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </a>
</div>

<div id="home" class="container-fluid mt-2" style="max-width: 90%;">
  <?php if ($error != null) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <?php echo $error ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif ?>
  <h3 class="mt-3">
    Top Categories
  </h3>
  <div class="row mt-3">
    <?php foreach ($data['categories'] as $k => $val) : ?>
      <div class="col-6 col-md-3 col-lg  mt-2 mt-md-0">
        <a class="card-cat d-block" href="">
          <div class="img-card">
            <img class="w-100" src="<?php echo BASEURL ?>assets/img/icons/<?php echo $val->img ?>" alt="">
          </div>
          <p class="card-text fs-5"><?php echo $val->nama_jenis ?></p>
        </a>
      </div>
      <?php if ($k == 4) {
        break;
      } ?>
    <?php endforeach ?>
  </div>
  <h3 class="mt-3">
    Top Product
  </h3>
  <div class="row mt-3">
    <?php foreach($data['product'] as $res): ?>
      <?php $img = explode(",",$res->image); ?>
      <div class="col-6 col-md-4 col-lg-3 mt-2" >
                  <a href="<?php echo BASEURL."product?id_product=".$res->id_hasilTani?>"class="card-prod d-block ">
                    <div class="prod-thum">
                      <div
                        class="prod-img"
                        style="
                          background-image: url(<?php echo BASEURL?>assets/img/product/<?php echo $img[0]?>);"
                      ></div>
                    </div>
                    <div class="prod-text mt-2 ml-1">
                      <p><?php echo $res->nama_hasil?> <span class="text-danger"><?php if($res->status_hasilTani == 1){echo 'Expired';}?></span></p>
                    </div>
                    <div class="prod-price ml-1">
                      <p><?php echo number_format($res->harga,0,",",".")?>/Kg</p>
                    </div>
                  </a>
        </div>
        <?php endforeach?>
  </div>
</div>
</div>

<?php
include(APPROOT . '/Views/include/footer.php');
?>