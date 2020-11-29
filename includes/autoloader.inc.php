<?php
spl_autoload_register('AutoLoader');

function AutoLoader($className){
    $path = './classes/';
    $path2 = './Controllers/';
    $extention = ".php";
    $fullpath = $path . $className . $extention;
    $fullpath2 = $path2 . $className . $extention;
    if(file_exists($fullpath)){
        include_once $fullpath;
    }elseif(file_exists($fullpath2)){
        include_once($fullpath2);
    }
    
}