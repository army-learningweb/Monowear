<?php
defined('APPPATH') or exit('Không được phép truy cập');

// get controller name
function get_controller()
{
    global $config;
    $controller = isset($_GET['controller']) ? $_GET['controller'] : $config['default_controller'];
    return $controller;
}

// get module name
function get_module()
{
    global $config;
    $module = isset($_GET['mod']) ? $_GET['mod'] : $config['default_module'];
    return $module;
}

// get action name
function get_action()
{
    global $config;
    $action = isset($_GET['action']) ? $_GET['action'] : $config['default_action'];
    return $action;
}

// load model xử lí
function load_model($name) 
{
    $path = MODULESPATH.DIRECTORY_SEPARATOR.get_module().DIRECTORY_SEPARATOR."models".DIRECTORY_SEPARATOR.$name."Model.php";
    if(file_exists($path)) require $path;
}

// load view xử lí
function load_view($name,$data_send=[]){
    $path = MODULESPATH.DIRECTORY_SEPARATOR.get_module().DIRECTORY_SEPARATOR."views".DIRECTORY_SEPARATOR.$name."View.php";
    if(file_exists($path)){
        if(is_array($data_send)){
            foreach($data_send as $key_data => $value_data){
                $$key_data = $value_data;
            }
        }
        require $path;
    }
}

// load file tiện ích dùng riêng cho từng action
function load($folder, $file)
{   
    if ($folder == 'libraries') {
        $path = LIBPATH . DIRECTORY_SEPARATOR . "$file.php";
    }
    if ($folder == 'helper') {
        $path = HELPERPATH . DIRECTORY_SEPARATOR . "$file.php";
    }
    if (file_exists($path)) require $path;
}

// Gọi đến hàm theo tham số biến
function call_function($list_function = array()) {
    if (is_array($list_function)) {
        foreach ($list_function as $f) {
            if (function_exists($f)) {  
                $f();                  
            }
        }
    }
}


