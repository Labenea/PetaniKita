<?php 

class Home extends Controller{
    public static function index()
    {
        $data = [
            'title' => 'Home Page'
        ];
         Controller::CreateView('Home',$data);
    }
}