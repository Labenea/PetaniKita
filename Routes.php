<?php

    Route::set('', function(){
        $a = new HomeController;
        $a->index();
    });
    Route::set('search', function(){
        $a = new HomeController;
        $a->index();
    });
    Route::set('get/cart', function(){
        $a = new UsersController;
        $a->cartCount();
    });

    Route::set('add/cart', function(){
        $a = new UsersController;
        $a->addCart();
    });

    Route::set('cart', function(){
        $a = new UsersController;
        $a->cart();
    });
    Route::set('remove/cart', function(){
        $a = new UsersController;
        $a->removeCart();
    });
    Route::set('login',function(){
        $a = new UsersController;
        $a->login();
    });
    Route::set('register',function(){
        
        $a = new UsersController;
        $a->register();
    });
    Route::set('logout',function(){
        
        $a = new UsersController;
        $a->logout();
    });
    Route::set('profile',function(){
        
        $a = new UsersController;
        $a->profile();
    });
    Route::set('profile/edit',function(){
        
        $a = new UsersController;
        $a->editProfile();
    });
    Route::set('profile/delete',function(){
        
        $a = new UsersController;
        $a->deleteUser();
    });
    Route::set('product',function(){
        $a = new productController;
        $a->detailProduct();
    });
    Route::set('admin',function(){
        
        $a = new AdminController;
        $a->index();
    });
    Route::set('admin/users',function(){
        
        $a = new AdminController;
        $a->users();
    });
    Route::set('admin/product/categories',function(){
        
        $a = new AdminController;
        $a->categories();
    });
    Route::set('user/add/product',function(){
        
        $a = new UsersController;
        $a->addProduct();
    });
    Route::set('cart/checkout',function(){
        
        $a = new UsersController;
        $a->checkOut();
    });
    Route::set('user/product',function(){
        
        $a = new UsersController;
        $a->userProduct();
    });
    Route::set('user/pesanan',function(){
        
        $a = new UsersController;
        $a->userPesanan();
    });
    Route::set('admin/carousel',function(){
        
        $a = new AdminController;
        $a->carousel();
    });
    Route::set('admin/carousel/delete',function(){
        
        $a = new AdminController;
        $a->deleteCarousel();
    });
    Route::set('wilayah',function(){
        
        $a = new WilayahController;
        $a->index();
    });
    Route::set('wilayah/kota',function(){
        
        $a = new WilayahController;
        $a->getKota();
    });
    Route::set('wilayah/kecamatan',function(){
        
        $a = new WilayahController;
        $a->getKec();
    });
?>