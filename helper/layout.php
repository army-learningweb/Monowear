<?php

function get_header(){
    $path = "layout/header.php";
    if(file_exists($path)) require $path;
}

function get_footer(){
    $path = "layout/footer.php";
    if(file_exists($path)) require $path;
}

function get_sidebar(){
    $path = "layout/sidebar.php";
    if(file_exists($path)) require $path;
}

function get_topbar(){
    $path = "layout/topbar.php";
    if(file_exists($path)) require $path;
}

function get_404($url){
    echo "
    <div class='error-layout'>
    <h1>404 ERROR <i class='fa-solid fa-circle-exclamation'></i></h1>
    <p>Hiện không có dữ liệu</p>
    <p>Vui lòng nhấn vào đây <a href='$url'>Quay lại</a></p>
    </div>
    ";
}

function get_support(){
    $path = "layout/support.php";
    if(file_exists($path)) require $path;
}

function get_sub_header(){
    $path = "layout/sub_header.php";
    if(file_exists($path)) require $path;
}