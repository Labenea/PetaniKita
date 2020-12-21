<?php
include(APPROOT . '/Views/include/header.php');
$error = Message();
?>



<div id="admin" class="admin">
    <?php include(APPROOT . '/Views/include/adminSidebar.php') ?>
    <div id="imageModal"></div>
    <div class="main-admin carousel">
        <div class="container-fluid py-2" style="max-width:98%">
            <div class="bg-white p-2 d-flex justify-content-between align-items-center">
                <h4 class="mb-0 px-2">Carousel</h4>
                <button id="addImage" type="button" class="btn btn-sm btn-primary">Add Images</button>
            </div>
            <div class="bg-white mt-2 p-3">
            <?php if($error != null):?>
            <?php foreach($error as $err):?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo $err?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endforeach ?>
        <?php endif?>
                <div>
                    <ul class="list-group">
                    <?php foreach($data as $k => $val):?>
                        <li class="list-group-item  justify-content-between align-items-center">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <h5><?php echo $k+1?></h5>
                                </div>
                                <div class="col">
                                    <h5><?php echo $val->title?></h5>
                                </div>
                                <div class="col-auto">
                                    <a href="<?php echo URLROOT?>admin/carousel/delete?id=<?php echo $val->id;?>&path=<?php echo $val->path;?>" class="btn btn-sm btn-danger">Delete</a>
                                </div>
                            </div>
                        
                        </li>
                        <?php endforeach ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script type="text/javascript" src="<?php echo URLROOT; ?>/assets/dist/admin.bundle.js"></script>
</body>

</html>