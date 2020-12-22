<?php
class productController extends Controller{

    protected $ProductModel;

    public function __construct()
    {
        $this->ProductModel = $this->model('ProductModel');
    }

    public function detailProduct(){
        if($_GET["id_product"]){
            $id = $_GET['id_product'];
            $res = $this->ProductModel->getDetail($id);
            $data['res'] = $res;
            $this->CreateView('product/detail',$data);
        }
    }
}