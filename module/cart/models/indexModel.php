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

function get_list_prods(){
    return db_fetch_array("SELECT * FROM `tbl_products` WHERE `product_status` = 'active'");
}

function get_customer_info($username){
    return db_fetch_row("SELECT * FROM `tbl_customers` WHERE `username` = '$username'");
}

function get_product_img($product_id){
    $result = db_fetch_row("SELECT `file_name` FROM `tbl_media` WHERE `object_id` = '$product_id' AND `is_main` = '1'");
    return $result['file_name'];
}

function get_product_info($product_id){
    return db_fetch_row("SELECT * FROM `tbl_products` WHERE `product_id` = '$product_id'");
}

function get_list_menu(){
    return db_fetch_array("SELECT * FROM `tbl_menu` ORDER BY `menu_order` ASC");
}

function get_order_info($order_id){
    return db_fetch_row("SELECT * FROM `tbl_orders` WHERE `order_id` = '$order_id'");
}

function get_main_img_prod($id){
    $result = db_fetch_row("SELECT `file_name` FROM `tbl_media` WHERE `object_id` = '$id' AND `is_main` = '1'");
    return $result['file_name'];
}