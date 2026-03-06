<?php

function update_item($table,$arr_data,$where){
    return db_update($table,$arr_data,$where);
}

function insert_item($table,$new_info_arr){
    return db_insert($table,$new_info_arr);
}

function delete_item($table,$where_id){
    return db_delete($table,$where_id);
}

function get_list_order_pending(){
    return db_fetch_array("SELECT * FROM `tbl_orders` WHERE `status` = 'pending' ORDER BY `created_at` DESC");
}

function count_list_order_pending(){
    return db_count("status","tbl_orders","`status` = 'pending'");
}

function get_prod_name($prod_id){
    $result = db_fetch_row("SELECT `product_name` FROM `tbl_products` WHERE `product_id` = '$prod_id'");
    return $result['product_name'];
}

function get_order_info($order_id){
    return db_fetch_row("SELECT * FROM `tbl_orders` WHERE `order_id` = '$order_id'");
}

function get_customer_info($id){
    return db_fetch_row("SELECT * FROM `tbl_customers` WHERE `customer_id` = '$id'");
}

function get_list_customers( $start,$info_per_page){
    return db_fetch_array("SELECT * FROM `tbl_customers` ORDER BY `created_at` DESC LIMIT $start,$info_per_page");
}

function get_total_list_customers(){
    return db_count("customer_id","tbl_customers","customer_id");
}

function get_order_item($id){
    return db_fetch_array("SELECT * FROM `tbl_orders` WHERE `customer_id` = '$id'");
}

function check_cus_password($password){
    return db_fetch_array("SELECT * FROM `tbl_customers` WHERE `password` = '$password'");
}

function count_order($customer_id){
    return db_count("customer_id","tbl_orders","`customer_id` = '$customer_id'");
}

function count_status($status,$table,$where){
    $result = db_fetch_array("SELECT COUNT($status) as total FROM `$table` WHERE $where");
    return $result[0];
}

function get_total_list_orders(){
    return db_count("order_id","tbl_orders","order_id");
}

function get_total_list_reviews(){
    return db_count("review_id","tbl_product_reviews","review_id");
}

function get_list_orders($start,$info_per_page){
    return db_fetch_array("SELECT * FROM `tbl_orders` ORDER BY `created_at` DESC LIMIT $start,$info_per_page");
}

function get_list_reviews($start,$info_per_page){
    return db_fetch_array("SELECT * FROM `tbl_product_reviews` ORDER BY `created_at` DESC LIMIT $start,$info_per_page");
}

function get_customer_name($customer_id){
    $result = db_fetch_row("SELECT `fullname` FROM `tbl_customers` WHERE `customer_id` = '$customer_id'");
    return $result['fullname'];
}

function get_list_orders_by_status($filter_status,$start,$info_per_page){
    return db_fetch_array("SELECT * FROM `tbl_orders` WHERE `status` = '$filter_status' ORDER BY `created_at` DESC LIMIT $start,$info_per_page");
}

function get_list_reviews_by_status($filter_status,$start,$info_per_page){
    return db_fetch_array("SELECT * FROM `tbl_product_reviews` WHERE `review_status` = '$filter_status' ORDER BY `created_at` DESC LIMIT $start,$info_per_page");
}

function get_total_orders_by_status($filter_status){
    return db_count("status","tbl_orders","`status` = '$filter_status'");
}

function get_total_reviews_by_status($filter_status){
    return db_count("review_status","tbl_product_reviews","`review_status` = '$filter_status'");
}

function get_list_orders_by_search($search_order,$start,$info_per_page){
    return db_fetch_array("SELECT * FROM `tbl_orders` WHERE `order_code` LIKE '%$search_order%' ORDER BY `created_at` DESC LIMIT $start,$info_per_page");
}

function get_list_reviews_by_search($search_review,$start,$info_per_page){
    return db_fetch_array("SELECT * FROM `tbl_product_reviews` WHERE `product_review` LIKE '%{$search_review}%' ORDER BY `created_at` DESC LIMIT $start,$info_per_page");
}

function get_total_orders_by_search($search_order){
    return db_count("order_id","tbl_orders","`order_code` LIKE '%{$search_order}%'");
}

function get_total_reviews_by_search($search_review){
    return db_count("review_id","tbl_product_reviews","`product_review` LIKE '%{$search_review}%'");
}

function get_prod_order_item($order_id){
    return db_fetch_array("SELECT * FROM `tbl_order_items` WHERE `order_id` = '$order_id'");
}

function get_product_name($product_id){
    $result = db_fetch_row("SELECT `product_name` FROM `tbl_products` WHERE `product_id` = '$product_id'");
    return $result['product_name'];
}

function get_product_img($product_id){
    $result = db_fetch_row("SELECT `image_url` FROM `tbl_media` WHERE `object_id` = '$product_id' AND `is_main` = '1'");
    return $result['image_url'];
}

// function check_status_minus_quantity($status_id){
//     $result = db_fetch_array("SELECT * FROM `tbl_products` WHERE `product_id` = $status_id")
// }