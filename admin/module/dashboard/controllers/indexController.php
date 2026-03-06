<?php
function construct(){
    load_model('index');
}

function indexAction(){
    load("helper","pagging_page");
    $order_quantity = get_order_quantity();
    $customers_quantity = get_customer_quantity();
    $revenue = get_revenue();
    $product_quantity = get_product_quantity();
    $post_quantity = get_post_quantity();
    $slider_quantity = get_slider_quantity();
    
    
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $info_per_page = 5;
    $start = ($page - 1) * $info_per_page;
    $base_url = "?mod=dashboard&action=index";
    $new_order = get_new_order($start,$info_per_page);
    $total_order_pending = get_total_pending();
    $num_page = ceil($total_order_pending / $info_per_page);
    $pagging_page = get_pagging_page($num_page, $page, $base_url);
    $data = [
        'order_quantity' => $order_quantity,
        'customers_quantity' => $customers_quantity,
        'product_quantity' => $product_quantity,
        'post_quantity' => $post_quantity,
        'slider_quantity' => $slider_quantity,
        'revenue' => $revenue,
        'new_order' => $new_order,
        'pagging_page' => $pagging_page,
        'start' => $start,
    ];

    load_view('index',$data);
}