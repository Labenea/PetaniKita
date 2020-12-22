<?php
include(APPROOT . '/Views/include/header.php');

?>

<div class="admin">
    <?php include(APPROOT . '/Views/include/adminSidebar.php') ?>
    <div class="main-admin">
        <div id="main">
            <div>
                <div class="row justify-content-around">
                    <div class="col-3">
                        <div class="admin-card ">
                            <div class="container-fluid">
                            <div class="row align-items-center">
                                <div class="col admin-text">
                                    <h3>1</h3>
                                    <h5>Users</h5>
                                </div>
                                <div class="col-auto px-0">
                                    <div class="admin-icon fs-5">
                                    <i class="fas fa-user"></i>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="admin-card ">
                            <div class="container-fluid">
                            <div class="row align-items-center">
                                <div class="col admin-text">
                                    <h3>2</h3>
                                    <h5>Transaksi</h5>
                                </div>
                                <div class="col-auto px-0">
                                    <div class="admin-icon fs-5">
                                    <i class="fas fa-receipt"></i>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="admin-card ">
                            <div class="container-fluid">
                            <div class="row align-items-center">
                                <div class="col admin-text">
                                    <h3>3</h3>
                                    <h5>Barang</h5>
                                </div>
                                <div class="col-auto px-0">
                                    <div class="admin-icon fs-5">
                                    <i class="fas fa-box-open"></i>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script type="text/javascript" src="<?php echo URLROOT; ?>/assets/dist/admin.bundle.js"></script>
</body>

</html>