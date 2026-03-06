<?php

function get_title_page($slug){
    $page = [
        'ao' => 'Áo',
        'ao-thun' => 'Áo Thun',
        'ao-so-mi' => 'Áo Sơ Mi',
        'ao-polo' => 'Áo Polo',
        'quan-short' => 'Quần Short',
        'quan-jean' => 'Quần Jean',
        'quan' => 'Quần',
        'phu-kien' => 'Phụ kiện',
        'tat' => 'Tất',
        'khac' => 'Phụ kiện khác'
    ];
    return $page[$slug];
}