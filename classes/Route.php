<?php

class Route {
    
    public static $validRoutes = array();
    public function __construct()
    {
        
    }

    public static function set($route,$function){
        self::$validRoutes[$route] = $function;   
    }

    public function resolve(){
        $url = str_replace(BASEURL,'',$_SERVER['REQUEST_URI']);
        $pos = strpos("$url","?");
        if(!$pos === false){
            $url = substr($url,0,$pos);
        }
        $callback = self::$validRoutes[$url] ?? false;
        if($callback === false){
            http_response_code(404);
            return "Not Found";
        }else{
            $callback->__invoke();
        }
    }

}
?>