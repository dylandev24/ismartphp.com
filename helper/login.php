<?php
    // Kiem tra login
    if(!empty($_COOKIE['is_login'])){
        $_SESSION['is_login'] = $_COOKIE['is_login'];
        $_SESSION['use_login'] = $_COOKIE['use_login'];
        // header("Location:?page=home");
    }
    $page = !empty($_GET['page'])?$_GET['page']:'home';
    // $page = $_GET['page'];
    $path = "pages/{$page}.php";
    
    if(!is_login() && $page != 'login'){
        header("Location:?page=login");
    }
    
    if(is_login() && $page != 'home'){
        header("Location:?page=home");
    }

    if(file_exists($path)){
        require $path;
    }else{
        require 'inc/404_error.php';
    }
