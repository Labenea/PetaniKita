<?php
class AdminController extends Controller{


    protected $adminModel;

    public function __construct()
    {
        $this->adminModel = $this->model('AdminModel');
    }

    public function index(){
        if(isLogedIn()){
            
            if($_SESSION["user_status"] > 1){
                return $this->CreateView('admin/dashboard');
            }else{
                return header('location: '.URLROOT.'');
            }

        }else{
            return header('location: '.URLROOT.'');
        }
    }

    public function carousel(){
      if(isLogedIn()){   
        if($_SESSION["user_status"] < 1){
          return header('location: '.URLROOT.'');
        }
      }else{
        return header('location: '.URLROOT.'');
      }
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $target_dir = APPROOT."/assets/img/carousel/";
            if($_FILES['addImage']['size'] == 0 || empty($_POST['title'])){
              $_SESSION['message'][]= 'All field must be filled';
              return header('location: '.URLROOT.'admin/carousel');
            }
            $target_file = $target_dir . basename($_FILES["addImage"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $check = getimagesize($_FILES["addImage"]["tmp_name"]);
            $uploadData = [
              'title' => $_POST['title'],
              'path' => basename($_FILES["addImage"]["name"]),
            ];
            $data = [];
          
            if($check !== false) {
                $uploadOk = 1;
              } else {
                $data['error'][] = "File is not an image.";
                $uploadOk = 0;
              }

              if (file_exists($target_file)) {
                $data['error'][] = "Sorry, file already exists.";
                $uploadOk = 0;
              }

              if ($_FILES["addImage"]["size"] > 2*MB) {
                $data['error'][] = "Sorry, your file is too large.";
                $uploadOk = 0;
              }
              if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                $data['error'][] = "Sorry, only JPG, JPEG & PNG  files are allowed.";
                    $uploadOk = 0;
                    }

                    if ($uploadOk == 1){
                        if ($this->adminModel->addCarousel($uploadData) && move_uploaded_file($_FILES["addImage"]["tmp_name"], $target_file)) {
                          $data['success'] = "Image Uploaded";
                          return header('location: '.URLROOT.'admin/carousel');
                        } else {
                          $data['error'][] = "Sorry, there was an error uploading your file.";
                          $this->CreateView('admin/carousel',$data);
                        }
                      }
                    
        }else{
            $data = $this->adminModel->getCarousel();
            $this->CreateView('admin/carousel',$data);
        }
    }

    public function deleteCarousel(){
      if(isLogedIn()){   
        if($_SESSION["user_status"] < 1){
          return header('location: '.URLROOT.'');
        }
      }else{
        return header('location: '.URLROOT.'');
      }
      if($_GET['id']){
        $id = $_GET['id'];
        if($this->adminModel->deleteCarousel($id)){
          unlink(APPROOT."/assets/img/carousel/".$_GET['path']);
          return header('location: '.URLROOT.'admin/carousel');
        }
      }else{
        return header('location: '.URLROOT.'admin/carousel');
      }
    }

    public function users(){
      if(isLogedIn()){   
        if($_SESSION["user_status"] < 1){
          return header('location: '.URLROOT.'');
        }
      }else{
        return header('location: '.URLROOT.'');
      }
      $data = $this->adminModel->getUsers();
      $this->CreateView('admin/users',$data);


    }

    public function categories(){
      if(isLogedIn()){   
        if($_SESSION["user_status"] < 1){
          return header('location: '.URLROOT.'');
        }
      }else{
        return header('location: '.URLROOT.'');
      }

      if($_SERVER["REQUEST_METHOD"] == "POST"){
        $target_dir = APPROOT."/assets/img/icons/";
        if($_FILES['addCategoriesImg']['size'] == 0 || empty($_POST['title'])){
          $_SESSION['message'][]= 'All field must be filled';
          return header('location: '.URLROOT.'admin/product/categories');
        }
        $target_file = $target_dir . basename($_FILES["addCategoriesImg"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["addCategoriesImg"]["tmp_name"]);
        $uploadData = [
          'title' => $_POST['title'],
          'path' => basename($_FILES["addCategoriesImg"]["name"]),
        ];
        $data = [];
      
          if (file_exists($target_file)) {
            $_SESSION['message'][] = "Sorry, file already exists.";
            $uploadOk = 0;
          }

          if ($_FILES["addCategoriesImg"]["size"] > 2*MB) {
            $_SESSION['message'][] = "Sorry, your file is too large.";
            $uploadOk = 0;
          }
          if($imageFileType != "svg") {
            $_SESSION['message'][] = "Sorry, only SVG files are allowed.";
                $uploadOk = 0;
                }
                if ($uploadOk == 1){
                    if ($this->adminModel->addCategories($uploadData) && move_uploaded_file($_FILES["addCategoriesImg"]["tmp_name"], $target_file)) {
                      $_SESSION['message']['success'] = "Image Uploaded";
                      return header('location: '.URLROOT.'admin/product/categories');
                    } else {
                      $_SESSION['message'][] = "Sorry, there was an error uploading your file.";
                      return header('location: '.URLROOT.'admin/product/categories');
                    }
                  }else{
                    return header('location: '.URLROOT.'admin/product/categories');
                  }
          }else{
            $data = $this->adminModel->getCategories();
            $this->CreateView('admin/categories',$data);
          }
      
    }
}
