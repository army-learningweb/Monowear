<?php 

function set_images_type($object_type){
    $type = [
        'product' => 'Sản phẩm',
        'post' => 'Bài viết',
        'page' => 'Trang',
        'slider' => 'Quảng cáo'
    ];
    return $type[$object_type];
}

function set_images_role($is_main){
    $role = [
        '1' => 'Ảnh chính',
        '0' => 'Ảnh phụ'
    ];
    return $role[$is_main];
}