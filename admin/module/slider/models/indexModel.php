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

function get_list_media_none_object(){
    return db_fetch_array("SELECT * FROM `tbl_media` WHERE `object_id` IS NULL");
}

function get_user_info($username){
    return db_fetch_row("SELECT * FROM `tbl_users` WHERE `username` = '$username'");
}


function check_slider_duplicate($slider_name){
    return db_fetch_row("SELECT * FROM `tbl_sliders` WHERE `slider_title` = '$slider_name'");
}

function check_order_duplicate($slider_order){
    return db_fetch_row("SELECT * FROM `tbl_sliders` WHERE `display_order` = '$slider_order'");
}

function get_list_sliders($start,$info_per_page){
    return db_fetch_array("SELECT * FROM `tbl_sliders` ORDER BY `created_at` DESC LIMIT $start,$info_per_page");
}

function get_total_sliders(){
    $result = db_count("slider_id","tbl_sliders","`slider_id`");
    return $result;
}

function get_created_name($id){
    $result = db_fetch_row("SELECT * FROM `tbl_users` WHERE `user_id` = '$id'");
    return $result['fullname'];
}

function get_slider_img($slider_id){
    $result = db_fetch_row("SELECT * FROM `tbl_media` WHERE `object_id` = '$slider_id'");
    return $result['image_url'];
}

function count_status($status,$table,$where){
    $result = db_fetch_array("SELECT COUNT($status) as total FROM `$table` WHERE $where");
    return $result[0];
}

function get_list_sliders_by_status($filter_status,$start,$info_per_page){
    return db_fetch_array("SELECT * FROM `tbl_sliders` WHERE `slider_status` = '$filter_status' LIMIT $start,$info_per_page");
}

function get_total_sliders_by_status($filter_status){
    $result = db_fetch_array("SELECT * FROM `tbl_sliders` WHERE `slider_status` = '$filter_status'");
    $total = count($result);
    return $total;
}

function get_list_sliders_by_search($search_slider,$start,$info_per_page){
    return db_fetch_array("SELECT * FROM `tbl_sliders` WHERE `slider_title` LIKE '%$search_slider%' LIMIT $start,$info_per_page");
}


function get_total_sliders_by_search($search_slider){
    $result = db_fetch_array("SELECT * FROM `tbl_sliders` WHERE `slider_title` = '$search_slider'");
    $total = count($result);
    return $total;
}

function get_img_slider($slider_id){
    return db_fetch_row("SELECT * FROM `tbl_media` WHERE `object_id` = '$slider_id'");
}

function get_slider_info($slider_id){
    return db_fetch_row("SELECT * FROM `tbl_sliders` WHERE `slider_id` = '$slider_id'");
}

function get_old_img($slider_id){
    return db_fetch_row("SELECT * FROM `tbl_media` WHERE `object_id` = '$slider_id'");
}

function get_new_img($new_main_img_id){
    return db_fetch_row("SELECT * FROM `tbl_media` WHERE `image_id` = '$new_main_img_id'");
}

function get_main_img($slider_id){
    return db_fetch_row("SELECT * FROM `tbl_media` WHERE `object_id` = '$slider_id' AND `is_main` = '1'");
}

function get_list_images_of_slider($slider_id){
    return db_fetch_array("SELECT * FROM `tbl_media` WHERE `object_id` = '$slider_id'");
}