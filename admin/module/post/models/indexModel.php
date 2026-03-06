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

function get_new_main_img($new_main_img_id){
    return db_fetch_row("SELECT * FROM `tbl_media` WHERE `image_id` = '$new_main_img_id' AND `object_type` = 'post'");
}

function get_old_main_img($post_id){
    return db_fetch_row("SELECT * FROM `tbl_media` WHERE `object_id` = '$post_id' AND `is_main` = '1' AND `object_type` = 'post'");
}

function get_main_img($post_id){
    return db_fetch_row("SELECT * FROM `tbl_media` WHERE `object_id` = '$post_id' AND `is_main` = '1' AND `object_type` = 'post'");
}

function get_post_info($post_id){
    return db_fetch_row("SELECT * FROM `tbl_posts` WHERE `post_id` = '$post_id'");
}

function count_status($status,$table,$where){
    $result = db_fetch_array("SELECT COUNT($status) as total FROM `$table` WHERE $where");
    return $result[0];
}

function get_list_cats(){
    return db_fetch_array("SELECT * FROM `tbl_post_categories` ORDER BY `created_at` DESC");
}

function get_created_name($id){
    $result = db_fetch_row("SELECT * FROM `tbl_users` WHERE `user_id` = '$id'");
    return $result['fullname'];
}

function get_cat_info($cat_id){
    return db_fetch_row("SELECT * FROM `tbl_post_categories` WHERE `category_id` = $cat_id");
}

function get_parent_cat(){
    return db_fetch_array("SELECT `category_name`,`category_id` FROM `tbl_post_categories` WHERE `parent_id` = 0");
}

function get_user_info($username){
    return db_fetch_row("SELECT * FROM `tbl_users` WHERE `username` = '$username'");
}

function check_category_info($category_name){
    return db_fetch_row("SELECT * FROM `tbl_post_categories` WHERE `category_name` = '$category_name'");
}

function get_child_cat(){
    return db_fetch_array("SELECT * FROM `tbl_post_categories` WHERE `category_id` NOT IN (1,2,3) ORDER BY `category_name` ASC");
}

function check_post_availiable($post_name){
    return db_fetch_row("SELECT * FROM `tbl_posts` WHERE `post_name` = '$post_name'");
}

function get_list_media_none_object(){
    return db_fetch_array("SELECT * FROM `tbl_media` WHERE `object_id` IS NULL AND `object_type` = 'post'");
}

function get_image_post($post_id){
    $result = db_fetch_row("SELECT `image_url` FROM `tbl_media` WHERE `object_id` = '$post_id' AND `is_main` = '1' AND `object_type` = 'post'");
    return $result['image_url'];
}

function get_total_list_posts(){
    return db_count("post_id","tbl_posts","post_id");
}

function get_list_posts($start,$info_per_page){
    return db_fetch_array("SELECT * FROM `tbl_posts` ORDER BY `created_at` DESC LIMIT $start,$info_per_page");
}

function get_category_name($category_id){
    $reuslt = db_fetch_row("SELECT `category_name` FROM `tbl_post_categories` WHERE `category_id` = '$category_id'");
    return $reuslt['category_name'];
}

function get_list_posts_by_status($filter_status,$start,$info_per_page){
    return db_fetch_array("SELECT * FROM `tbl_posts` WHERE `post_status` = '$filter_status' ORDER BY `created_at` DESC LIMIT $start,$info_per_page");
}

function get_total_posts_by_status($filter_status){
    return db_count("post_status","tbl_posts","`post_status` = '$filter_status'");
}

function get_list_posts_by_search($search_post,$start,$info_per_page){
    return db_fetch_array("SELECT * FROM `tbl_posts` WHERE `post_name` LIKE '%{$search_post}%' ORDER BY `created_at` DESC LIMIT $start,$info_per_page");
}

function get_total_posts_by_search($search_post){   
    return db_count("post_name","tbl_posts","`post_name` LIKE '%{$search_post}%'");
}

function get_list_images_of_post($post_id){
    return db_fetch_array("SELECT * FROM `tbl_media` WHERE `object_id` = '$post_id' AND `object_type` = 'post'");
}