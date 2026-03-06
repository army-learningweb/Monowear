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

function get_rating($product_id,$number_rating){
    return db_count("product_rating","tbl_product_reviews","`product_id` = '$product_id' AND `product_rating` = '$number_rating'");
}

function get_prods_review($id){
    return db_count("product_review","tbl_product_reviews","`product_id` = '$id'");
}

function get_customer_info($username){
    return db_fetch_row("SELECT * FROM `tbl_customers` WHERE `username` = '$username'");
}

function get_prod_review($id){
    return db_fetch_array("SELECT * FROM `tbl_product_reviews` WHERE `product_id` = '$id' AND `review_status` = 'Công khai' ORDER BY `created_at` DESC ");
}

function get_user_id($username){
    $result = db_fetch_row("SELECT `customer_id` FROM `tbl_customers` WHERE `username` = '$username'");
    return $result['customer_id'];
}

function get_list_prods_custom($category_id){
    return db_fetch_array("SELECT * FROM `tbl_products` WHERE `category_id` = '$category_id' AND `product_status` = 'active'");
}

function get_list_prods_none_slug($slug){
    return db_fetch_array("SELECT * FROM `tbl_products` WHERE `product_slug` NOT LIKE '%{$slug}%' AND `product_status` = 'active'");
}

function get_sub_img_prod($id){
    return db_fetch_array("SELECT * FROM `tbl_media` WHERE `object_id` = '$id' AND `is_main` = '0'");
}

function get_main_img_prod($id){
    $result = db_fetch_row("SELECT `file_name` FROM `tbl_media` WHERE `object_id` = '$id' AND `is_main` = '1'");
    return $result['file_name'];
}

function get_prod_info($slug) {
    return db_fetch_row("SELECT * FROM `tbl_products` WHERE `product_slug` LIKE '%$slug%'");
}

function get_img_prod($id)
{
    $result = db_fetch_row("SELECT `file_name` FROM `tbl_media` WHERE `object_id` = '$id' AND `is_main` = '1'");
    return $result['file_name'];
}

function get_list_prods($slug)
{
    return db_fetch_array("SELECT * FROM `tbl_products` WHERE `product_slug` LIKE '%$slug%' AND `product_status` = 'active'");
}
function get_list_menu()
{
    return db_fetch_array("SELECT * FROM `tbl_menu` ORDER BY `menu_order` ASC");
}
