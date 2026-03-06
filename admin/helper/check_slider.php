<?php

function check_slider_name($slider_name)
{
    global $error;
    if (empty($slider_name)) {
        $error['slider_name'] = 'Không để trống tên slider';
    } else {
        if (strlen($slider_name) < 6 || strlen($slider_name) > 300) {
            $error['slider_name'] = ' Ít nhất từ 6 đến 300 kí tự';
        } else {
            $pattern = "/^[\p{L}\s\p{N}\.,_:\-?]{6,300}$/u";
            if (!preg_match($pattern, $slider_name)) {
                $error['slider_name'] = 'Chứa kí tự không hợp lệ !@#$%^&()';
            }
        }
    }
}

function check_slider_desc($slider_desc)
{
    global $error;
    if (empty($slider_desc)) {
        $error['slider_desc'] = 'Không để trống mô tả';
    } else {
        if (strlen($slider_desc) < 6 || strlen($slider_desc) > 300) {
            $error['slider_desc'] = ' Ít nhất từ 6 đến 300 kí tự';
        } else {
            $pattern = "/^[\p{L}\s\p{N}\.,_:\-?]{6,300}$/u";
            if (!preg_match($pattern, $slider_desc)) {
                $error['slider_desc'] = 'Chứa kí tự không hợp lệ !@#$%^&()';
            }
        }
    }
}


function check_slider_order($slider_order)
{
    global $error;
    if (empty($slider_order)) {
        $error['slider_order'] = 'Chưa chọn thứ tự slider';
    }
}

function check_main_img($main_img){
    global $error;
    $type_allow = ['png','jpg','jpeg','avif'];
    $file_type = pathinfo($main_img['name'],PATHINFO_EXTENSION);
    $file_size = $main_img['size'];
    if(empty($main_img['name'])){
        $error['main_img'] = "Không để trống ảnh";
        return;
    }
    if(!in_array($file_type,$type_allow)){
        $error['main_img'] = "File không đúng định dạng (PNG,JPG,PNG,AVIF)";
        return;
    }
    if($file_size > 5 * 1024 * 1024){
        $error['main_img'] = "File quá kích thước cho phép";
        return;
    }
}

