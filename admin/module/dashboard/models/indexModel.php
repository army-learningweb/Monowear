<?php

function get_list_order_pending(){
    return db_fetch_array("SELECT * FROM `tbl_orders` WHERE `status` = 'pending' ORDER BY `created_at` DESC");
}

function count_list_order_pending(){
    return db_count("status","tbl_orders","`status` = 'pending'");
}

function get_slider_quantity(){
    return db_count("slider_id","tbl_sliders","slider_id");
}

function get_post_quantity(){
    return db_count("post_id","tbl_posts","post_id");
}


function get_product_quantity(){
    return db_count("product_id","tbl_products","product_id");
}

function get_order_quantity(){
    return db_count("order_id","tbl_orders","order_id");
}

function get_customer_quantity(){
    return db_count("customer_id","tbl_customers","customer_id");
}

function get_revenue(){
    $result = db_fetch_array("SELECT * FROM `tbl_orders` WHERE `status` = 'delivered'");
    $revenue = 0;
    foreach($result as $item){
        $revenue =  $revenue + $item['total_amount'];
    }
    return $revenue;
}

function get_new_order($start,$info_per_page){
    return db_fetch_array("SELECT * FROM `tbl_orders` WHERE `status` = 'pending' LIMIT $start,$info_per_page");
}

function get_customer_name($customer_id){
    $result = db_fetch_row("SELECT `fullname` FROM `tbl_customers` WHERE `customer_id` = '$customer_id'");
    return $result['fullname'];
}

function get_total_pending(){
    return db_count("order_id","tbl_orders","`status` = 'pending'");
}