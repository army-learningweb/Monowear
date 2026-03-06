<?php
function get_list_menu(){
    return db_fetch_array("SELECT * FROM `tbl_menu` ORDER BY `menu_order` ASC");
}

function get_post_info($slug){
    return db_fetch_row("SELECT * FROM `tbl_posts` WHERE `post_slug` = '$slug'");
}

function get_post_img($id){
    $result = db_fetch_row("SELECT `file_name` FROM `tbl_media` WHERE `object_id` = '$id' AND `object_type` = 'post'");
    return $result['file_name'];
}

function get_list_post(){
    return db_fetch_array("SELECT * FROM `tbl_posts` WHERE `post_status` = 'Công khai'");
}

function get_page_infomation($slug){
    return db_fetch_row("SELECT * FROM `tbl_pages` WHERE `page_slug` = '$slug'");
}