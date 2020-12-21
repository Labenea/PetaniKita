<?php
include(APPROOT . '/Views/include/header.php');

?>

<div class="admin">
    <?php include(APPROOT . '/Views/include/adminSidebar.php') ?>
    <div class="main-admin">
        <div class="container-fluid py-2" style="max-width: 98%;">
            <div class="bg-white p-2 d-flex justify-content-between align-items-center">
                <h4 class="mb-0 px-2">Users</h4>
            </div>
            <div class="mt-2 bg-white p-3 table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Username</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data as $k => $user):?>
                        <tr>
                            <th scope="row"><?php echo $k+1;?></th>
                            <td><?php echo $user->username;?></td>
                            <td><?php echo $user->nama_depan;?></td>
                            <td><?php echo $user->nama_belakang;?></td>
                            <td><?php echo $user->alamat_email;?></td>
                            <td><a class="btn btn-sm btn-success" href="">Edit</a><a class="btn btn-sm btn-danger ml-2" href="">Delete</a></td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script type="text/javascript" src="<?php echo URLROOT; ?>/assets/dist/admin.bundle.js"></script>
    </body>

    </html>