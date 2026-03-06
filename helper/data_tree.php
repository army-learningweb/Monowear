<?php

function has_child($list_cat, $id)
{
    foreach ($list_cat as $item) {
        if ($item['parent_id'] == $id) return true;
    }
    return false;
}

function data_tree($list_cat, $parent_id = 0, $level = 0)
{
    $result = [];
    foreach ($list_cat as $item) {
        if ($item['parent_id'] == $parent_id) {
            $item['level'] = $level;
            $result[] = $item;
            if (has_child($list_cat, $item['category_id'])) {
                $result_child = data_tree($list_cat, $item['category_id'], $level + 1);
                $result = array_merge($result, $result_child);
            }
        }
    }
    return $result;
}

function has_child_post($list_cat, $post_id)
{
    foreach ($list_cat as $item) {
        if ($item['parent_id'] == $post_id) return true;
    }
    return false;
}

function data_tree_post($list_cat, $parent_id = 0, $level = 0)
{
    foreach ($list_cat as $item) {
        if ($item['parent_id'] == $parent_id) {
            $item['level'] = $level;
            $result[] = $item;
            if (has_child_post($list_cat, $item['post_id'])) {
                $new_result = data_tree_post($list_cat, $item['post_id'], $level + 1);
                $result = array_merge($result, $new_result);
            }
        }
    }
    return $result;
}

function has_child_menu($list_menu, $menu_id)
{
    foreach ($list_menu as $item) {
        if ($item['parent_id'] == $menu_id) return true;
    }
    return false;
}

function data_tree_menu($list_menu, $parent_id = 0, $level = 0)
{
    $result = [];
    foreach ($list_menu as $item) {
        if ($item['parent_id'] == $parent_id) {
            $item['level'] = $level;
            $result[] = $item;
            if (has_child_menu($list_menu, $item['menu_id'])) {
                $new_result = data_tree_menu($list_menu, $item['menu_id'], $level + 1);
                $result = array_merge($result, $new_result);
            }
        }
    }
    return $result;
}

function render_menu($data, $parent_id = 0, $level = 0, $menu_id="")
{
    if ($level == 0) {
        $str_html = " <ul id='$menu_id'>";
    } else {
        $str_html = " <ul class='sub_menu'>";
    }
    foreach ($data as $item) {
        if ($item['parent_id'] == $parent_id) {
            $str_html .= "<li data-id='{$item['menu_id']}'><a href='" . $item['menu_slug']. "' data-id='{$item['menu_id']}'>{$item['menu_title']}</a>";
            if (has_child_menu($data, $item['menu_id'])) {
                $str_html .= render_menu($data, $item['menu_id'], $level + 1);
            }
            $str_html .= "</li>";
        }
    }
    $str_html .= "</ul>";
    return $str_html;
}
