<?php

function check_prod_code($prod_code)
{
    global $error;
    if (empty($prod_code)) {
        $error['prod_code'] = "Không để trống mã sản phẩm";
    } else {
        if (strlen($prod_code) < 5 || strlen($prod_code) > 11) {
            $error['prod_code'] = "Từ 5 đến 11 kí tự";
        } else {
            $pattern = "/^([a-zA-Z0-9#]{5,11})$/";
            if (!preg_match($pattern, $prod_code)) {
                $error['prod_code'] = "Chứa kí tự không hợp lệ (!@$%^&*)";
            }
        }
    }
}

function check_prod_name($prod_name)
{
    global $error;
    if (empty($prod_name)) {
        $error['prod_name'] = 'Không để trống tên sản phẩm';
    } else {
        if (strlen($prod_name) < 6 || strlen($prod_name) > 100) {
            $error['prod_name'] = ' Ít nhất từ 6 kí tự';
        } else {
            $pattern = "/^([\p{Lu}]{1})([\p{L}\s_-]{1,99})$/u";
            if (!preg_match($pattern, $prod_name)) {
                $error['prod_name'] = 'Chữ cái đầu phải viết hoa hoặc chứa kí tự không hợp lệ !@#$%^&()';
            }
        }
    }
}

function check_prod_desc($prod_desc)
{
    global $error;
    if (empty($prod_desc)) {
        $error['prod_desc'] = 'Không để trống mô tả';
    } else {
        if (strlen($prod_desc) < 6 || strlen($prod_desc) > 1000) {
            $error['prod_desc'] = 'Ít nhất từ 6 kí tự đến 1000 kí tự';
        } else {
            $pattern = "/^[\p{L}\s.,-_]{6,1000}$/u";
            if (!preg_match($pattern, $prod_desc)) {
                $error['prod_desc'] = 'Chứa kí tự không hợp lệ !@#$%^&()';
            }
        }
    }
}

function check_prod_price($prod_price)
{
    global $error;
    if (empty($prod_price)) {
        $error['prod_price'] = 'Không được để trống giá sản phẩm';
    } else {
        if (strlen($prod_price) < 5 || strlen($prod_price) > 10) {
            $error['prod_price'] = 'Ít nhất từ 6 số';
        } else {
            $pattern = "/^[0-9]{5,10}$/";
            if (!preg_match($pattern, $prod_price)) {
                $error['prod_price'] = 'Chứa kí tự không hợp lệ dấu ( . ) ( , )';
            }
        }
    }
}

function check_prod_quantity($prod_quantity)
{
    global $error;
    if (empty($prod_quantity)) {
        $error['prod_quantity'] = 'Không được để trống số lượng sản phẩm';
    } else {
        if (strlen($prod_quantity) > 4) {
            $error['prod_quantity'] = 'Quá số lượng cho phép , chỉ từ 1 đến 4 số';
        } else {
            $pattern = "/^[0-9]{1,4}$/";
            if (!preg_match($pattern, $prod_quantity)) {
                $error['prod_quantity'] = 'Chứa kí tự không hợp lệ dấu ( . ) ( , )';
            }
        }
    }
}

function check_prod_detail($prod_detail)
{
    global $error;
    if (strlen($prod_detail) > 2000) {
        $error['prod_detail'] = 'Quá số lượng kí tự cho phép dưới 2000 kí tự';
    }
}

function check_prod_cat($prod_cat){
    global $error;
    if(empty($prod_cat)){
        $error['prod_cat'] = "Không để trống danh mục";
    }
}

function check_prod_slug($prod_slug){
    global $error;
    if(empty($prod_slug)){
        $error['prod_slug'] = "Không để trống Slug";
    }
}

function check_main_img($main_img){
    global $error;
    $type_allow = ['png','jpg','jpeg','avif'];
    $file_type = pathinfo($main_img['name'],PATHINFO_EXTENSION);
    $file_size = $main_img['size'];
    if(empty($main_img['name'])){
        $error['main_img'] = "Không để trống ảnh sản phẩm";
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

function check_prod_sales($prod_sales){
    global $error;
    if($prod_sales > 100){
        $error['prod_sales'] = "Tính từ 1% -> 100%";
    }
}
