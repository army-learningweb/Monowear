<?php

function check_post_name($post_name)
{
    global $error;
    if (empty($post_name)) {
        $error['post_name'] = 'Không để trống tiêu đề bài viết';
    } else {
        if (strlen($post_name) < 6 || strlen($post_name) > 300) {
            $error['post_name'] = ' Ít nhất từ 6 đến 300 kí tự';
        } else {
            $pattern = "/^[\p{L}\s\p{N}\.,_:\-?]{6,300}$/u";
            if (!preg_match($pattern, $post_name)) {
                $error['post_name'] = 'Chứa kí tự không hợp lệ !@#$%^&()';
            }
        }
    }
}

function check_post_desc($post_desc)
{
    global $error;
    if (empty($post_desc)) {
        $error['post_desc'] = 'Không để trống mô tả';
    } else {
        if (strlen($post_desc) < 6 || strlen($post_desc) > 300) {
            $error['post_desc'] = 'Ít nhất từ 6 đến 300 kí tự';
        } else {
            $pattern = "/^[\p{L}\s.,-_]{6,300}$/u";
            if (!preg_match($pattern, $post_desc)) {
                $error['post_desc'] = 'Chứa kí tự không hợp lệ !@#$%^&()';
            }
        }
    }
}


function check_post_detail($post_detail)
{
    global $error;
    if (strlen($post_detail) > 5000) {
        $error['post_detail'] = 'Quá số lượng kí tự cho phép dưới 2000 kí tự';
    }
}

function check_post_cat($post_cat){
    global $error;
    if(empty($post_cat)){
        $error['post_cat'] = "Không để trống danh mục";
    }
}

function check_post_slug($post_slug){
    global $error;
    if(empty($post_slug)){
        $error['post_slug'] = "Không để trống Slug";
    }
}

function check_main_img($main_img){
    global $error;
    $type_allow = ['png','jpg','jpeg','avif'];
    $file_type = pathinfo($main_img['name'],PATHINFO_EXTENSION);
    $file_size = $main_img['size'];
    if(empty($main_img['name'])){
        $error['main_img'] = "Không để trống ảnh bài viết";
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

