<?php 

class Controller{
    
    public function model($model){
        require_once("./Models/$model.php");
        return new $model();
    }
    public function CreateView($viewName,$data = []){
        require_once("./Views/$viewName.php");
    }
}