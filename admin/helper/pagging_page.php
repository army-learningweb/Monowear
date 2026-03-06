<?php

use League\Flysystem\ConnectionRuntimeException;

function get_pagging_page($num_page, $page, $url)
{
    $str_pagging = "<ul class='pagination'>";
    if ($page > 1) {
        $prev_page = $page - 1;
        $str_pagging .= " <li class='page-item'><a class='page-link prev' href='$url&page=$prev_page'>Trước</a></li>";
    }
    for ($i = 1; $i <= $num_page; $i++) {
        if ($i == $page) {
            $str_pagging .= " <li class='page-item active'><a class='page-link' href='$url&page=$i'>$i</a></li>";
        } else {
            $str_pagging .= " <li class='page-item'><a class='page-link' href='$url&page=$i'>$i</a></li>";
        }
    }
    if ($page < $num_page) {
        $next_page = $page + 1;
        $str_pagging .= " <li class='page-item'><a class='page-link next' href='$url&page=$next_page'>Sau</a></li>";
    }
    $str_pagging .= "</ul>";
    return $str_pagging;
};

function get_pagging_page_media($num_page, $page, $url)
{
    $str_pagging = "<ul class='pagination'>";
    if ($page > 1) {
        $prev_page = $page - 1;
        $str_pagging .= " <li class='page-item'><a class='page-link prev' href='$url&page=$prev_page'>Trước</a></li>";
    }

    $group_num_page = 3;
    $group_position = floor(($page - 1) / $group_num_page);
    $start = $group_position * $group_num_page + 1;
    $end = min($start + $group_num_page - 1,$num_page);

    for ($i = $start; $i <= $end; $i++) {
        $active = ($i == $page) ? "active" : '';
        $str_pagging .= " <li class='page-item $active'><a class='page-link' href='$url&page=$i'>$i</a></li>";
    }

    if($page <= ($num_page - 1)){
        $str_pagging .= " <li class='page-item'><a class='page-link'>...</a></li>";
        $str_pagging .= " <li class='page-item'><a class='page-link' href='$url&page=$num_page'>$num_page</a></li>";
    }

    if ($page < $num_page) {
        $next_page = $page + 1;
        $str_pagging .= " <li class='page-item'><a class='page-link next' href='$url&page=$next_page'>Sau</a></li>";
    }
    $str_pagging .= "</ul>";
    return $str_pagging;
};
