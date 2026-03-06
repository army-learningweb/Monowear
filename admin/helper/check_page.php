<?php

function check_page_name($page_name)
{
    global $error;
    if (empty($page_name)) {
        $error['page_name'] = 'Không để trống tên trang';
    } else {
        if (strlen($page_name) < 2 || strlen($page_name) > 50) {
            $error['page_name'] = ' Ít nhất từ 2 đến 50 kí tự';
        } else {
            $pattern = "/^([\p{Lu}]{1})([\p{L}\s_-]{1,99})$/u";
            if (!preg_match($pattern, $page_name)) {
                $error['page_name'] = 'Chữ cái đầu viết hoa hoặc chứa kí tự không hợp lệ !@#$%^&()';
            }
        }
    }
}

function check_page_slug($page_slug){
    global $error;
    if(empty($page_slug)){
        $error['page_slug'] = "Không được để trống Slug";
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

