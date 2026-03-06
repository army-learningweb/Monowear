<?php
function set_status_user($status){
    $arr_status = [
        'active' => '<span class="status active">Đã kích hoạt</span>',
        'inactive' => '<span class="status inactive">Chưa kích hoạt</span>',
        'banned' => '<span class="status banned">Đình chỉ</span>'
    ];
    return $arr_status[$status];
}

function set_status_cat($status){
    $arr_status = [
        'Hoạt động' => '<span class="status active">Hoạt động</span>',
        'Chờ duyệt' => '<span class="status inactive">Chờ duyệt</span>',
        'Tạm dừng' => '<span class="status banned">Tạm dừng</span>'
    ];
    return $arr_status[$status];
}

function set_status_product($status){
    $arr_status = [
        'active' => '<span class="status active">Hoạt động</span>',
        'inactive' => '<span class="status inactive">Chờ duyệt</span>',
        'out_of_stock' => '<span class="status banned">Tạm dừng</span>'
    ];
    return $arr_status[$status];
}

function set_status_post($status){
    $arr_status = [
        'Nháp' => '<span class="status crash">Nháp</span>',
        'Công khai' => '<span class="status on">Công khai</span>',
        'Chờ duyệt' => '<span class="status wait">Chờ duyệt</span>',
        'Lưu trữ' => '<span class="status save">Lưu trữ</span>'
    ];
    return $arr_status[$status];
}

function set_status_page($status){
    $arr_status = [
        'draft' => '<span class="status crash">Nháp</span>',
        'published' => '<span class="status on">Công khai</span>',
        'pending' => '<span class="status pending">Tạm dừng</span>',
        'archived' => '<span class="status save">Lưu trữ</span>'
    ];
    return $arr_status[$status];
}

function set_status_slider($status){
    $arr_status = [
        'Công khai' => '<span class="status active">Công khai</span>',
        'Chờ duyệt' => '<span class="status inactive">Chờ duyệt</span>'
    ];
    return $arr_status[$status];
}

function set_status_order($status){
    $arr_status = [
        'pending' => '<span class="status inactive">Chờ xử lý</span>',
        'processing' => '<span class="status crash">Đang xử lý</span>',
        'shipped' => '<span class="status save">Đã gửi hàng</span>',
        'delivered' => '<span class="status on">Đã giao hàng</span>',
        'canceled' => '<span class="status off">Đã hủy</span>',
    ];
    return $arr_status[$status];
}

function set_status_review($status){
    $arr_status = [
        'Công khai' => '<span class="status active">Công khai</span>',
        'Nháp' => '<span class="status crash">Nháp</span>',
        'Chờ duyệt' => '<span class="status inactive">Chờ duyệt</span>',
    ];
    return $arr_status[$status];
}




?>