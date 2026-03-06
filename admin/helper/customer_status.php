<?php

function set_status_customer($num){
    $status = [
        '0' => '<span class="status banned">Chưa kích hoạt</span>',
        '1' => '<span class="status active">Đã kích hoạt</span>'
    ];
    return $status[$num];
}   

function set_role_customer($num){
    $status = [
        '0' => 'Khách mua hàng',
        '1' => 'Thành viên'
    ];
    return $status[$num];
}
