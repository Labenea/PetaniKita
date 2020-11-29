<?php 

class Controller{

    public static function CreateView($viewName,$data = []){
        require_once("./Views/$viewName.php");
    }
}