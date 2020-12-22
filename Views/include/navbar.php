<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
  <div class="container-fluid" style="max-width: 90%;">
    <a class="navbar-brand title fs-2 " href="<?php echo BASEURL ?>"><span class="green">Petani</span><span class="orange">Kita</span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample04">
      <div class="row justify-content-between mr-auto ml-auto w-100">
          <form class="col-md-6 d-flex align-items-center mt-2 mb-2 " action="<?php echo BASEURL?>search" method="get">
          <div class="input-group input-group-sm ">
            <input type="text" class="form-control" name="keyword" placeholder="Search Products" aria-describedby="button-addon2" />
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
              Search
            </button>
          </div>
          </form>
        <?php if (!isLogedIn()) : ?>
          <ul class="navbar-nav col-md justify-content-end mb-2 mb-md-0 pr-0">
            <li class="nav-item d-grid gap-2 d-md-block ml-2 mt-2 mb-2">
              <button class="btn btn-sm fs-7 login mr-2 px-3" data-toggle="modal" data-target="#loginModal" aria-current="page">Login</button>
            </li>
            <li class="nav-item d-grid gap-2 d-md-block ml-2 mt-2 mb-2">
              <a class="btn btn-sm fs-7 register" aria-current="page" href="<?php echo URLROOT ?>register ">Register</a>
            </li>
          </ul>
        <?php else : ?>
          <ul class="navbar-nav col-md justify-content-end mb-2 mb-md-0 pr-0">
          <li class="nav-item  pr-3 mt-auto mb-auto">
              <a href="<?php echo BASEURL?>cart" class="text-dark position-relative" >
              <i class="fs-5 fas fa-bell"></i>
              <span id="notif" class="position-absolute top-0 start-100 translate-middle badge border border-light rounded-circle bg-danger ">0</span>
              </a>
            </li>
            <li class="nav-item pr-3 mt-auto mb-auto">
              <a href="<?php echo BASEURL?>cart" class="text-dark position-relative" >
              <i class="fs-5  fas fa-shopping-basket"></i>
              <span id="shop-notif" class="position-absolute top-0 start-100 translate-middle badge border border-light rounded-circle bg-danger "></span>
              </a>
            </li>
            <li class="nav-item ml-2 mt-auto dropdown  mb-auto">
              <button class="nav-link d-flex btn btn-outline-light " id="profileBtn" data-bs-toggle="dropdown">
                <img src="<?php echo BASEURL ?>assets/img/account.svg" alt="">

                <div class=" name"><?php echo $_SESSION['username']; ?></div>

              </button>
              <ul class="dropdown-menu dropdown-menu-right " style="margin-top: 14px;" aria-labelledby="profileBtn">
              <li><a class="dropdown-item py-2 pl-3" href="<?php echo URLROOT ?>user/product">Barang Saya</a></li>
              <li><a class="dropdown-item py-2 pl-3" href="<?php echo URLROOT ?>user/pesanan">Pesanan Saya</a></li>
              <li><a class="dropdown-item py-2 pl-3" href="<?php echo URLROOT ?>profile">Profile</a></li>
                <li><a class="dropdown-item py-2 pl-3" href="<?php echo URLROOT ?>logout">Logout</a></li>
              </ul>
            </li>
       
          </ul>
        <?php endif ?>
      </div>
    </div>
  </div>
</nav>

<div class=" modal  fade" id="loginModal" tabindex="-1">
  <div class="modal-dialog mwidth modal-dialog-centered">
    <div class="modal-content login-modal ">
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row justify-content-end">
            <div class="col-1 pr-0 pl-0">
              <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-11">
              <h5>Login</h5>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-11 ">
              <form class="needs-validation" id="loginForm" action="" method="post" novalidate>
                <div class="mt-3">
                  <label class="form-label fw-bold" for="username">Username</label>
                  <input class='form-control ' type="text" name="username" id="username">
                </div>
                <div class="mt-3">
                  <label class="form-label fw-bold" for="password">Password</label>
                  <input class='form-control ' type="password" name="password" id="password">
                  <div id="password-valid" class="">
                  </div>
                </div>
                <div class="d-grid gap-2 col-12 mx-auto mt-4">
                  <button class="btn btn-primary" id="loginBtn" type="button">Login</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>