<?php 

class HomeController extends Controller{

    protected $HomeModel;

    public function __construct()
    {
        $this->HomeModel = $this->model('HomeModel');
    }

    public function index()
    {
        if(isset($_GET['keyword'])){
            $keyword = $_GET['keyword'];
            $res = $this->HomeModel->searchProduct($keyword);
            if(empty($res)){
                $data["message"] = $res;
                return $this->CreateView("Search",$data);
            }else{
                $data['product'] = $res;
                return $this->CreateView("Search",$data);
            }
        }
        $this->HomeModel->checkKadaluarsa();
        $carousel = $this->HomeModel->getCarousel();
        $categories = $this->HomeModel->getCategories();
        $product = $this->HomeModel->getProduct();
        $data = [
            'title' => 'Home'
        ];
        $data['carousel'] = $carousel;
        $data['categories'] = $categories;
        $data['product'] = $product;
        return $this->CreateView('Home',$data);
    }
}