<?php 

class HomeController extends Controller{

    protected $HomeModel;

    public function __construct()
    {
        $this->HomeModel = $this->model('HomeModel');
    }

    public function index()
    {
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