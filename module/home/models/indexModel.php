<?php

function get_img_prod($id)
{
    $result = db_fetch_row("SELECT `file_name` FROM `tbl_media` WHERE `object_id` = '$id' AND `is_main` = '1'");
    return $result['file_name'];
}

function get_list_prod_by_search($prod_search){
    return db_fetch_array("SELECT * FROM `tbl_products` WHERE `product_slug` LIKE '%{$prod_search}%' AND `product_status`= 'active' ORDER BY `created_at` DESC");
}

function get_list_prods_review(){
    return db_fetch_array("SELECT * FROM `tbl_product_reviews` WHERE `review_status` = 'Công khai'");
}

function get_list_prods_sales(){
    return db_fetch_array("SELECT * FROM `tbl_products` WHERE `product_status` = 'active' AND `product_sales` > 0");
}

function get_list_menu(){
    return db_fetch_array("SELECT * FROM `tbl_menu` ORDER BY `menu_order` ASC");
}

function get_list_sliders(){
    return db_fetch_array("
    SELECT `tbl_sliders`.`slider_title`,`tbl_sliders`.`slider_desc`,`tbl_sliders`.`slider_url`,`tbl_media`.`file_name`
    FROM `tbl_sliders` JOIN `tbl_media`
    ON `tbl_sliders`.`image_id` = `tbl_media`.`image_id`
    WHERE `tbl_sliders`.`slider_status` = 'Công khai'
    ");
}

function get_list_prods_up_sales(){
    return db_fetch_array("SELECT * FROM `tbl_products` WHERE `product_status` = 'active' AND `product_up_sales` = 'yes' ORDER BY `created_at` DESC");
}

function get_image_prods($prod_id){
    $result = db_fetch_row("SELECT `file_name` FROM `tbl_media` WHERE `object_id` = '$prod_id' AND `is_main` = '1'");
    return $result['file_name'];
}

function get_list_prods(){
    return db_fetch_array("SELECT * FROM `tbl_products`");
}

function get_list_prod_filter_price(){
    return db_fetch_array("SELECT * FROM `tbl_products` WHERE `product_price` < 100000");
}

function get_list_prod_filter_price_to($to,$from){
    return db_fetch_array("SELECT * FROM `tbl_products` WHERE `product_price` >= $to AND `product_price` <= $from");
}

function get_prod_img($id){
    $result = db_fetch_row("SELECT `file_name` FROM `tbl_media` WHERE `object_id` = '$id' AND `is_main` = '1'");
    return $result['file_name'];
}