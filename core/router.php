<?php
//Triệu gọi đến file xử lý thông qua request

$request_path = MODULESPATH . DIRECTORY_SEPARATOR . get_module() . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR . get_controller() . 'Controller.php';

if (file_exists($request_path)) {
    require $request_path;
} else {
    require 'layout/404.php';
}
$action_name = get_action() . 'Action';

call_function(array('construct', $action_name));


// $page = !empty($_GET['mod']) ? $_GET['mod'] : 'home';
// // $page = $_GET['page'];
// $path = "modules/{$page}.php";
// // Kiem tra login
// if (!empty($_COOKIE['is_login'])) {
//     $_SESSION['is_login'] = $_COOKIE['is_login'];
//     $_SESSION['use_login'] = $_COOKIE['use_login'];
//     // header("Location:?page=home");
// }

// if ((!is_login() && $page != 'login')) {
//     header("Location:?mod=login");
// }
