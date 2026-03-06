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

function get_parent_cat_slug($parent_id){
    $result = db_fetch_row("SELECT `category_slug` FROM `tbl_product_categories` WHERE `category_id` = '$parent_id'");
    return $result['category_slug'];
}

function get_cat_id_slug($prod_cat){
    return db_fetch_row("SELECT * FROM `tbl_product_categories` WHERE `category_id` = '$prod_cat'");
}

function get_prod_by_cat($cat_id){
    return db_fetch_array("SELECT * FROM `tbl_products` WHERE `category_id` = '$cat_id' ORDER BY `created_at` DESC");
}

function get_cat_by_filter($filter_cat){
    return db_fetch_array("SELECT * FROM `tbl_product_categories` WHERE `parent_id` = '$filter_cat'");
}

function check_category($filter_cat){
    return db_fetch_array("SELECT * FROM `tbl_products` WHERE `category_id` = '$filter_cat'");
}

function get_old_sub_img($prod_id){
    return db_fetch_array("SELECT * FROM `tbl_media` WHERE `object_id` = '$prod_id' AND `is_main` = '0' AND `object_type` = 'product'");
}

function get_new_sub_img($new_sub_img_id){
    foreach($new_sub_img_id as $item){
        $result = db_fetch_row("SELECT * FROM `tbl_media` WHERE `image_id` = '$item'");
        $row[] = $result;
    }
    return $row;
}

function get_old_main_img($prod_id){
    return db_fetch_row("SELECT * FROM `tbl_media` WHERE `object_id` = '$prod_id' AND `is_main` = '1' AND `object_type` = 'product'");
}

function get_new_main_img($new_main_img_id){
    return db_fetch_row("SELECT * FROM `tbl_media` WHERE `image_id` = '$new_main_img_id' AND `object_type` = 'product'");
}

function get_sub_img($prod_id){
    return db_fetch_array("SELECT * FROM `tbl_media` WHERE `object_id` = '$prod_id' AND `is_main` = '0' AND `object_type` = 'product'");
}

function get_main_img($prod_id){
    return db_fetch_row("SELECT * FROM `tbl_media` WHERE `object_id` = '$prod_id' AND `is_main` = '1' AND `object_type` = 'product'");
}

function get_prod_info($prod_id){
    return db_fetch_row("SELECT * FROM `tbl_products` WHERE `product_id` = '$prod_id'");
}

function get_list_images_of_prod($prod_id){
    return db_fetch_array("SELECT * FROM `tbl_media` WHERE `object_id` = '$prod_id' AND `object_type` = 'product'");
}

function get_total_prods_by_search($search_prod){
    return db_count("product_name","tbl_products","`product_name` LIKE '%{$search_prod}%'");
}

function get_list_prods_by_search($search_prod,$start,$info_per_page){
    return db_fetch_array("SELECT * FROM `tbl_products` WHERE `product_name` LIKE '%{$search_prod}%' ORDER BY `created_at` DESC LIMIT $start,$info_per_page");
}

function get_total_prods_filter_both($filter_cat,$filter_status){
    $result = db_fetch_array("SELECT COUNT(*) as total FROM `tbl_products` WHERE `category_id` = '$filter_cat' AND `product_status` = '$filter_status'");
    return $result[0]['total'];
}

function get_list_prods_filter_both($filter_cat,$filter_status,$start,$info_per_page){
    return db_fetch_array("SELECT * FROM `tbl_products` WHERE `category_id` = '$filter_cat' AND `product_status` = '$filter_status' ORDER BY `created_at` DESC LIMIT $start,$info_per_page");
}

function get_total_prods_by_cat($filter_cat){
    return db_count("category_id","tbl_products","`category_id` = '$filter_cat'");
}

function get_list_prods_by_cat($filter_cat,$start,$info_per_page){
    return db_fetch_array("SELECT * FROM `tbl_products` WHERE `category_id` = '$filter_cat' ORDER BY `created_at` DESC LIMIT $start,$info_per_page");
}

function get_total_prods_by_status($filter_status){
    return db_count("product_status","tbl_products","`product_status` = '$filter_status'");
}

function get_list_prods_by_status($filter_status,$start,$info_per_page){
    return db_fetch_array("SELECT * FROM `tbl_products` WHERE `product_status` = '$filter_status' ORDER BY `created_at` DESC LIMIT $start,$info_per_page");
}

function get_list_prod_filter_status($status_value){
    return db_fetch_array("SELECT * FROM `tbl_products` WHERE `product_status` = '$status_value'");
}

function get_total_list_products(){
    return db_count("product_id","tbl_products","product_id");
}

function get_category_name($category_id){
    $reuslt = db_fetch_row("SELECT `category_name` FROM `tbl_product_categories` WHERE `category_id` = '$category_id'");
    return $reuslt['category_name'];
}

function get_image_product($product_id){
    $result = db_fetch_row("SELECT `image_url` FROM `tbl_media` WHERE `object_id` = '$product_id' AND `is_main` = '1' AND `object_type` = 'product'");
    return $result['image_url'];
}

function get_list_prods($start,$info_per_page){
    return db_fetch_array("SELECT * FROM `tbl_products` ORDER BY `created_at` DESC LIMIT $start,$info_per_page");
}

function get_list_media_none_object(){
    return db_fetch_array("SELECT * FROM `tbl_media` WHERE `object_id` IS NULL AND `object_type` = 'product'");
}

function count_status($status,$table,$where){
    $result = db_fetch_array("SELECT COUNT($status) as total FROM `$table` WHERE $where");
    return $result[0];
}

function get_child_cat(){
    return db_fetch_array("SELECT * FROM `tbl_product_categories` WHERE `category_id` NOT IN (1,2,3) ORDER BY `parent_id` ASC");
}

function get_cat(){
    return db_fetch_array("SELECT * FROM `tbl_product_categories` ORDER BY `parent_id` ASC");
}

function check_prod_availiable($prod_name,$prod_code){
    return db_fetch_row("SELECT * FROM `tbl_products` WHERE `product_name` = '$prod_name' OR `product_code` = '$prod_code'");
}

function get_image_by_id($image_id){
    return db_fetch_row("SELECT * FROM `tbl_media` WHERE `image_id` = $image_id AND `object_type` = 'product'");
}

function get_cat_info($cat_id){
    return db_fetch_row("SELECT * FROM `tbl_product_categories` WHERE `category_id` = $cat_id");
}

function check_category_info($category_name){
    return db_fetch_row("SELECT * FROM `tbl_product_categories` WHERE `category_name` = '$category_name'");
}

function get_user_info($username){
    return db_fetch_row("SELECT * FROM `tbl_users` WHERE `username` = '$username'");
}

function get_parent_cat(){
    return db_fetch_array("SELECT `category_name`,`category_id` FROM `tbl_product_categories` WHERE `parent_id` = 0");
}

function get_list_cats(){
    return db_fetch_array("SELECT * FROM `tbl_product_categories`");
}

function get_created_name($id){
    $result = db_fetch_row("SELECT * FROM `tbl_users` WHERE `user_id` = '$id'");
    return $result['fullname'];
}

function get_time_created_img(){
    $result = db_fetch_array("SELECT `created_at` FROM `tbl_media`");
    $time = [];
    foreach($result as $item){
        $time[] = $item['created_at'];
    }
    return $time;
}