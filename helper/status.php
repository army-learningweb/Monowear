<?php

function set_status_order($status){
    $arr_status = [
        'pending' => '<span class="status pending">Chờ xử lý</span>',
        'processing' => '<span class="status processing">Đang xử lý</span>',
        'shipped' => '<span class="status shipped">Đã gửi hàng</span>',
        'delivered' => '<span class="status delivered">Đã giao hàng</span>',
        'canceled' => '<span class="status canceled">Đã hủy</span>',
    ];
    return $arr_status[$status];
}