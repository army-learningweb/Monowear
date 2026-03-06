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

function get_list_media($start,$info_per_page){
    return db_fetch_array("SELECT * FROM `tbl_media` ORDER BY `created_at` DESC LIMIT $start,$info_per_page");
}

function get_total_list_media(){
    $result = db_count("image_id","tbl_media","image_id");
    return $result;
}

function get_created_name($id){
    $result = db_fetch_row("SELECT * FROM `tbl_users` WHERE `user_id` = '$id'");
    return $result['fullname'];
}

function get_list_media_by_type($filter_type,$start,$info_per_page){
    return db_fetch_array("SELECT * FROM `tbl_media` WHERE `object_type` = '$filter_type' ORDER BY `created_at` DESC LIMIT $start,$info_per_page");
}

function get_total_media_by_type($filter_type){
    return db_count("object_type","tbl_media","`object_type` = '$filter_type'");
}

function get_list_media_by_search($search_img,$start,$info_per_page){
    return db_fetch_array("SELECT * FROM `tbl_media` WHERE `file_name` LIKE '%{$search_img}%' ORDER BY `created_at` DESC LIMIT $start,$info_per_page");
}

function get_total_media_by_search($search_img){   
    return db_count("file_name","tbl_media","`file_name` LIKE '%{$search_img}%'");
}

function get_img_info($image_id){
    return db_fetch_row("SELECT * FROM `tbl_media` WHERE `image_id` = '$image_id'");
}

function get_user_info($username){
    return db_fetch_row("SELECT * FROM `tbl_users` WHERE `username` = '$username'");
}
