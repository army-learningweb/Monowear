<?php
function delete_item($table,$where){
    return db_delete($table,$where);
}

function update_user_by_id($id,$arr_data){
    return db_update("tbl_users",$arr_data,"`user_id` = '$id'");
}

function get_user_info_by_id($id){
    return db_fetch_row("SELECT * FROM `tbl_users` WHERE `user_id` = '$id'");
}

function delete_user($id){
    return db_delete("tbl_users","`user_id` = $id");
}

function get_list_order_pending(){
    return db_fetch_array("SELECT * FROM `tbl_orders` WHERE `status` = 'pending' ORDER BY `created_at` DESC");
}

function count_list_order_pending(){
    return db_count("status","tbl_orders","`status` = 'pending'");
}

function insert_user($arr_data){
    return db_insert("tbl_users",$arr_data);
}

function check_user_info($username,$email){
    return db_fetch_row("SELECT * FROM `tbl_users` WHERE `username` = '$username' AND `email` = '$email'");
}

function update_admin_info($username,$arr_data){
    return db_update("tbl_users",$arr_data,"`username` = '$username'");
}

function get_list_users($start,$info_per_page){
    return db_fetch_array("SELECT * FROM `tbl_users` WHERE `user_id` NOT IN (1) ORDER BY `created_at` DESC LIMIT $start,$info_per_page");
}

function get_total_list_users(){
    $result = db_fetch_array("SELECT * FROM `tbl_users` WHERE `user_role` NOT IN ('Quản lí hệ thống')");
    $total = count($result);
    return $total;
}

function get_user_info($username){
    return db_fetch_row("SELECT * FROM `tbl_users` WHERE `username` = '$username'");
}

function check_user_login($username,$password_hash){
    return db_fetch_row("SELECT * FROM `tbl_users` WHERE `username` = '$username' AND `password_hash` = '$password_hash'");
}

function update_time_login($username,$time_login){
    return db_update("tbl_users",$time_login,"`username` = '$username'");
}