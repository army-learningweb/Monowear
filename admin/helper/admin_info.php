<?php
function get_user_role($role)
{
    $role_arr = [
        1 => 'Quản lí hệ thống',
        2 => 'Quản lí trang',
        3 => 'Quản lí bài viết',
        4 => 'Quản lí sản phẩm',
        5 => 'Quản lí bán hàng',
        6 => 'Quản lí giao diện',
    ];
    return $role_arr[$role];
}

function set_authority($role)
{
    $authority = [
        'Quản lí hệ thống' => 'boss',
        'Quản lí trang' => 'pages',
        'Quản lí bài viết' => 'post',
        'Quản lí sản phẩm' => 'product',
        'Quản lí bán hàng' => 'sales',
        'Quản lí giao diện' => 'template'
    ];
    return $authority[$role];
}


