<?php
class UsersController extends Controller{

    protected $userModel;

    public function __construct()
    {
        $this->userModel = $this->model('Users');
    }
    public function login(){
        $post = json_decode(file_get_contents('php://input'), true);
        if(isset($post)){
            $data = [
                'username' => $post['username'],
                'password' => $post['password'],
                'error' => '',
            ];
            $data['password'] = md5($post['password']);
            $logedInUser = $this->userModel->login($data);
            if($logedInUser){
                $this->createUserSession($logedInUser);
            }else{
                $data['error'] = 'Password or Username Is Incorect';
                $data['status'] = false;
                $mydata = json_encode($data);
                echo $mydata;
            }
        }else{
            header('location: '.URLROOT.'/');
        }
     

    }

    public function createUserSession($user){
        $_SESSION['user_id'] = $user->id_user;
        $_SESSION['username'] = $user->username;
        $_SESSION['user_status'] = $user->status;
        $_SESSION['message'] = 'Login Success';
        return true;
    }

    public function logout(){
        unset($_SESSION['user_id']);
        header('location: '.URLROOT.'');
    }

    public function register(){
        $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            if(isset($_POST['kota']) || isset($_POST['kota']) || isset($_POST['kota'])){
                
                $data = [
                    'username' => trim($_POST['username']),
                    'password' => trim($_POST['password']),
                    'nama_depan' => trim($_POST['nama_depan']),
                    'nama_belakang' => trim($_POST['nama_belakang']),
                    'email' => trim($_POST['email']),
                    'status' => 1,
                    'notelp' => trim($_POST['no_telp']) ,
                    'jalan' => trim($_POST['jalan']),
                    'kota' => $_POST['kota'],
                    'kecamatan' => $_POST['kecamatan'],
                    'provinsi' => $_POST['provinsi'],
                ];
            }else{
                    $_SESSION['message']= 'All Field Must Be Filed';
             
                    return header('location: '.URLROOT.'register');
            }

            foreach($data as $dat){
                if(empty($dat)){
                    $_SESSION['message']= 'All Field Must Be Filed';
                    
                    return header('location: '.URLROOT.'register');
                }
            }
            $data['password'] = md5($data['password']);
            if($this->userModel->register($data)){
                $logedInUser = $this->userModel->login($data);
                if($logedInUser){
                    $this->createUserSession($logedInUser);
                }
                $_SESSION['message']= 'Register Successful';
                return header('location: '.URLROOT.'');
            } 
        }else{
            $data = [
                'title' => 'Register',
            ];
            return $this->CreateView('Register',$data);
        }
        
    }

    public function profile(){

        if(isLogedIn()){
            $data = $this->userModel->profile();
            if($data){
                return $this->CreateView('Profile',$data);
            }
            
        }else{
            return header('location: '.URLROOT.'');
        }

    }

    public function deleteUser(){
        if(isLogedIn()){
            $data = $this->userModel->deleteUser();
           
            if($data){
                $this->logout();
            }
            
        }else{
            return header('location: '.URLROOT.'');
        }
    }

    public function editProfile(){

        $post = json_decode(file_get_contents('php://input'), true);
        if(isset($post)){
            switch($post['button']){
                case 'Save' :
                     $data = [
                        'nama_depan' => $post['nama_depan'],
                        'nama_belakang' => $post['nama_belakang'],
                     ];
                     if($this->userModel->editNama($data)){
                         return true;
                     }else{
                         $data['status'] = false;
                         $mydata = json_encode($data);
                         echo $mydata;
                     }
                break; 
            }
        }else{
            return header('location: '.URLROOT.'');
        }

    }

    public function addProduct(){
        $imgCount = 0;
        if(!isLogedIn()){   
              return header('location: '.URLROOT.'');
          }
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $fileUpload = [];
            $tmpfile = [];
            $target_dir = APPROOT."/assets/img/product/";
            $data = [];
            $path = [];
            foreach ($_FILES as $va){
                if($va['size'] == 0){
                    $imgCount++;
                }else{
                    $target_file = $target_dir . basename($va['name']);
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    $check = getimagesize($va["tmp_name"]);
                    $fileName = uniqid();
                    $path[] = $fileName.".".$imageFileType;
                    if (file_exists($target_file)) {
                        $_SESSION['message'][] = "Sorry, file already exists.";
                        $uploadOk = 0;
                    }
                    if ($va["size"] > 5*MB) {
                        $_SESSION['message'][] = "Sorry, your file is too large.";
                        $uploadOk = 0;
                    }
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                        $_SESSION['message'][] = "Sorry, only SVG files are allowed.";
                        $uploadOk = 0;
                    }
                    if ($uploadOk == 1){
                        $tmpfile[] = $va['tmp_name'];
                        $fileUpload[] = $fileName.".".$imageFileType;
                      }else{
                        return header('location: '.URLROOT.'user/add/product');
                      }           
                }
            }
            if($imgCount == 3){
                $_SESSION['message'] = "Wajib memasukan minimal 1 gambar";
                return header('location:'.URLROOT.'user/add/product');
            }
            $data = [
                'nama_barang' => $_POST['nama_barang'],
                'jenis_barang' => $_POST['jenis_barang'],
                'deskripsi_barang' => $_POST['deskripsi_barang'],
                'img' => implode(",",$path),
                'kadaluarsa' => $_POST['kadaluarsa_barang'],
                'harga' => str_replace(",","",$_POST['harga_barang']),
                'id_user' => $_SESSION['user_id']
            ];
            foreach($tmpfile as $index => $tmp){
                if(!move_uploaded_file($tmp , $target_dir.$fileUpload[$index])){
                    $_SESSION['message'] = "Terjadi kesalahan dalam mengupload gambar";
                    return header('location:'.URLROOT.'user/add/product');
                }
               
            }
            if($this->userModel->addProduct($data)){
                $_SESSION['message'] = "Barang Berhasil Ditambahkan";
                return header('location:'.URLROOT.'');
            }else{
                return header('location:'.URLROOT.'user/add/product');
            }



        }else{
            $data = $this->userModel->getJenis();
            return $this->CreateView('user/addproduct',$data);
        }
        
    }

    public function cartCount(){
        if(!isLogedIn()){   
            return header('location: '.URLROOT.'');
        }
        $data = $this->userModel->getCartCount($_SESSION['user_id']);
        echo json_encode($data);
    }

    public function removeCart(){
        if(!isLogedIn()){   
            return header('location: '.URLROOT.'');
        }
        if($_SERVER["REQUEST_METHOD"] == "GET"){
            $id = $_GET['id_keranjang'];
            if($this->userModel->removeCart($id)){
                return header('location: '.URLROOT.'cart');
            }
        }
    }

    public function userProduct(){
        if(!isLogedIn()){   
            return header('location: '.URLROOT.'');
        }
        if($data = $this->userModel->userProduct($_SESSION['user_id'])){
            $this->CreateView('user/product',$data);
        }
    }

    public function userPesanan(){
        if(!isLogedIn()){   
            return header('location: '.URLROOT.'');
        }
        if($data = $this->userModel->userPesanan($_SESSION['user_id'])){
            $this->CreateView('user/pesanan',$data);
        }
    }

    public function checkOut(){
        if(!isLogedIn()){   
            return header('location: '.URLROOT.'');
        }
        if($this->userModel->checkOut($_SESSION['user_id'])){

        }
    }

    public function cart(){
        if(!isLogedIn()){   
            return header('location: '.URLROOT.'');
        }
        if($data = $this->userModel->getCart($_SESSION['user_id'])){
            $this->CreateView('user/cart',$data);
        }else{
            $this->CreateView('user/cart');
        }


    }

    public function addCart(){
        if(!isLogedIn()){   
            return header('location: '.URLROOT.'');
        }
        $post = json_decode(file_get_contents('php://input'), true);
        if(isset($post)){
            $data= [
                'id_barang' => $post['id_barang'],
                'user_id' => $_SESSION['user_id'],
            ];
            $check = $this->userModel->checkDuplicate($data);
            if($check){
                $data['id_keranjang'] = $check->id_keranjang;
                if($this->userModel->updateCart($data)){
                    echo true;
                }
            }else{
                if($this->userModel->addCart($data)){
                    echo true;
                }
                
            }
        }
    }

    public function validate(){



    }
}