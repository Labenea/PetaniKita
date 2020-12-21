<?php
    class WilayahController extends Controller{
        protected $wilayaModel;

       public function __construct()
       {
           $this->wilayaModel = $this->model('Wilayah');
       } 

       public function index(){
            $post = json_decode(file_get_contents('php://input'), true);
            if(isset($_POST)){
                $data = $this->wilayaModel->getProvinsi();
                $mydata = json_encode($data);
                echo $mydata;
            }else{
                return header('location: '.URLROOT.'/');
            }
        
       }
       public function getKota(){
        $post = json_decode(file_get_contents('php://input'), true);
        if(isset($post)){
            $id = $post['id'];
            $data = $this->wilayaModel->getKota($id);
            $mydata = json_encode($data);
            echo $mydata;
        }else{
            return header('location: '.URLROOT.'/');
        }
       }

       public function getKec(){
        $post = json_decode(file_get_contents('php://input'), true);
        if(isset($post)){
            $id = $post['id'];
            $data = $this->wilayaModel->getKec($id);
            $mydata = json_encode($data);
            echo $mydata;
        }else{
            return header('location: '.URLROOT.'/');
        }
       }
    }