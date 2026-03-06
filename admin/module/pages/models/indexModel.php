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

function get_user_info($username)
{
    return db_fetch_row("SELECT * FROM `tbl_users` WHERE `username` = '$username'");
}

function get_list_media_none_object()
{
    return db_fetch_array("SELECT * FROM `tbl_media` WHERE `object_id` IS NULL AND `object_type` = 'page'");
}

function check_page_duplicate($page_name)
{
    return db_fetch_row("SELECT * FROM `tbl_pages` WHERE `page_title` = '$page_name'");
}

function get_created_name($id)
{
    $result = db_fetch_row("SELECT * FROM `tbl_users` WHERE `user_id` = '$id'");
    return $result['fullname'];
}

function count_status($status, $table, $where)
{
    $result = db_fetch_array("SELECT COUNT($status) as total FROM `$table` WHERE $where");
    return $result[0];
}

function get_list_pages($start, $info_per_page)
{
    return db_fetch_array("SELECT * FROM `tbl_pages` ORDER BY `created_at` DESC LIMIT $start,$info_per_page");
}

function get_total_pages()
{
    $result = db_count("page_id", "tbl_pages", "page_id");
    return $result;
}

function get_list_pages_by_status($filter_status, $start, $info_per_page)
{
    return db_fetch_array("SELECT * FROM `tbl_pages` WHERE `page_status` = '$filter_status' LIMIT $start,$info_per_page");
}

function get_total_pages_by_status($filter_status)
{
    return db_count("page_status", "tbl_pages", "`page_status` = '$filter_status'");
}

function get_list_pages_by_search($search_page, $start, $info_per_page)
{
    return db_fetch_array("SELECT * FROM `tbl_pages` WHERE `page_title` LIKE '%{$search_page}%' LIMIT $start,$info_per_page");
}

function get_total_pages_by_search($search_page)
{
    return db_count("page_title", "tbl_pages", "`page_title` LIKE '%{$search_page}%'");
}

function get_list_images_of_page($page_id)
{
    return db_fetch_array("SELECT * FROM `tbl_media` WHERE `object_id` = '$page_id' AND `object_type` = 'page'");
}

function get_main_img($page_id)
{
    return db_fetch_row("SELECT * FROM `tbl_media` WHERE `object_id` = '$page_id' AND `is_main` = '1' AND `object_type` = 'page'");
}

function get_page_info($page_id)
{
    return db_fetch_row("SELECT * FROM `tbl_pages` WHERE `page_id` = '$page_id'");
}

function get_old_main_img($page_id)
{
    return db_fetch_row("SELECT * FROM `tbl_media` WHERE `object_id` = '$page_id' AND `is_main` = '1' AND `object_type` = 'page'");
}

function get_new_main_img($new_main_img_id)
{
    return db_fetch_row("SELECT * FROM `tbl_media` WHERE `image_id` = '$new_main_img_id' AND `object_type` = 'page'");
}
