<?php
    session_start();
    function isLogedIn(){
        if(isset($_SESSION['user_id'])){
            return true;
        }else{
            return false;
        }
    }
    
    function Message(){
        if(isset($_SESSION['message'])){
            $error = $_SESSION['message'];
            unset($_SESSION['message']);
            return $error;
        }else{
            return false;
        }
    }
