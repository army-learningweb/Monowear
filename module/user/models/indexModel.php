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

function get_item_order($id){
    return db_fetch_array("SELECT * FROM `tbl_order_items` WHERE `order_id` = '$id'");
}

function get_prod_img($id){
    $result = db_fetch_row("SELECT `file_name` FROM `tbl_media` WHERE `object_id` = '$id' AND `is_main` = '1'");
    return $result['file_name'];
}

function get_prod_name($id){
    $result = db_fetch_row("SELECT `product_name` FROM `tbl_products` WHERE `product_id` = '$id'");
    return $result['product_name'];
}

function get_member_order($member_id){
    return db_fetch_array("SELECT * FROM `tbl_orders` WHERE `customer_id` = '$member_id' ORDER BY `created_at` DESC");
}

function  get_member_info($username){
    return db_fetch_row("SELECT * FROM `tbl_customers` WHERE `username` = '$username'");
}

function check_user_exits($username,$email){
    return db_fetch_row("SELECT * FROM `tbl_customers` WHERE `username` = '$username' AND `email` = '$email'");
}

function check_token($active_token){
    return db_fetch_row("SELECT * FROM `tbl_customers` WHERE `active_token` = '$active_token'");
}

function check_alredy_active($active_token){
    return db_fetch_row("SELECT * FROM `tbl_customers` WHERE `active_token` = '$active_token' AND `is_active` = '1'");
}

function check_customer_login($username,$password){
    return db_fetch_row("SELECT * FROM `tbl_customers` WHERE `username` = '$username' AND `password` = '$password'");
}

function get_list_menu(){
    return db_fetch_array("SELECT * FROM `tbl_menu` ORDER BY `menu_order` ASC");
}