<?php
session_start();
ob_start();

// gọi file xử lí thông qua request
$request_path = MODULESPATH . DIRECTORY_SEPARATOR . get_module() . DIRECTORY_SEPARATOR . "controllers" . DIRECTORY_SEPARATOR . get_controller() . "Controller.php";

// Kiểm tra login
$mod    = !empty($_GET['mod']) ? $_GET['mod'] : '';
$action = !empty($_GET['action']) ? $_GET['action'] : '';
$not_logged_in = empty($_SESSION['user_login']);
$is_login_page = ($mod == "user" && $action == "login");
if ($not_logged_in && !$is_login_page) {
    redirect_to("user","index","login");
    exit();
}

// Nạp controller
if (file_exists($request_path)) {
    require $request_path;
    $action_name = get_action() . "Action";
    call_function(['construct', $action_name]);
}
    
