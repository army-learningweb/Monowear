<?php
ob_start();
session_start();

// gọi file xử lí thông qua request
$request_path = MODULESPATH . DIRECTORY_SEPARATOR . get_module() . DIRECTORY_SEPARATOR . "controllers" . DIRECTORY_SEPARATOR . get_controller() . "Controller.php";

// Nạp controller
if (file_exists($request_path)) {
    require $request_path;
    $action_name = get_action() . "Action";
    call_function(['construct', $action_name]);
}

