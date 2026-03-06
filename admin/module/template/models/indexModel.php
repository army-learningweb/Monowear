<?php
function update_item($table, $arr_data, $where)
{
    return db_update($table, $arr_data, $where);
}

function insert_item($table, $new_info_arr)
{
    return db_insert($table, $new_info_arr);
}

function delete_item($table, $where_id)
{
    return db_delete($table, $where_id);
}

function get_list_order_pending(){
    return db_fetch_array("SELECT * FROM `tbl_orders` WHERE `status` = 'pending' ORDER BY `created_at` DESC");
}

function count_list_order_pending(){
    return db_count("status","tbl_orders","`status` = 'pending'");
}

function get_total_blocks(){
    return db_count("block_id","tbl_blocks","block_id");
}

function check_block_duplicate($block_name)
{
    return db_fetch_row("SELECT * FROM `tbl_blocks` WHERE `block_name` = '$block_name'");
}

function get_list_blocks($start, $info_per_page)
{
    return db_fetch_array("SELECT * FROM `tbl_blocks` ORDER BY `created_at` DESC LIMIT $start,$info_per_page");
}

function get_user_info($username)
{
    return db_fetch_row("SELECT * FROM `tbl_users` WHERE `username` = '$username'");
}

function get_created_name($id)
{
    $result = db_fetch_row("SELECT * FROM `tbl_users` WHERE `user_id` = '$id'");
    return $result['fullname'];
}

function get_block_info($block_id)
{
    return db_fetch_row("SELECT * FROM `tbl_blocks` WHERE `block_id` = '$block_id'");
}

function get_pages()
{
    return db_fetch_array("SELECT * FROM `tbl_pages` WHERE `page_status` = 'published'");
}

function get_product_categories()
{
    return db_fetch_array("SELECT * FROM `tbl_product_categories` WHERE `category_status` = 'Hoạt động' ORDER BY `category_name` ASC ");
}

function get_post_categories()
{
    return db_fetch_array("SELECT * FROM `tbl_post_categories` WHERE `category_status` = 'Hoạt động' ORDER BY `category_name` ASC");
}

function get_parent_cat()
{
    return db_fetch_array("SELECT * FROM `tbl_menu` WHERE `parent_id` = 0");
}

function get_list_menu(){
    return db_fetch_array("SELECT * FROM `tbl_menu` ORDER BY `menu_order` ASC");
}

function check_menu_duplicate($menu_title){
    return db_fetch_row("SELECT * FROM `tbl_menu` WHERE `menu_title` = '$menu_title'");
}

function get_menu_info($menu_id){
    return db_fetch_row("SELECT * FROM `tbl_menu` WHERE `menu_id` = '$menu_id'");
}

function get_slug($field,$table,$field_id,$id){
    $result = db_fetch_row("SELECT `$field` FROM `$table` WHERE `$field_id` = '$id'");
    return $result[$field];
}