<?php

function set_rating($number)
{
    $arr_rating = [
        1 => "
        <i class='fa-solid fa-star'></i>
        <i class='fa-regular fa-star'></i>
        <i class='fa-regular fa-star'></i>
        <i class='fa-regular fa-star'></i>
        <i class='fa-regular fa-star'></i>
        ",
        2 => "
        <i class='fa-solid fa-star'></i>
        <i class='fa-solid fa-star'></i>
        <i class='fa-regular fa-star'></i>
        <i class='fa-regular fa-star'></i>
        <i class='fa-regular fa-star'></i>
        ",
        3 => "
        <i class='fa-solid fa-star'></i>
        <i class='fa-solid fa-star'></i>
        <i class='fa-solid fa-star'></i>
        <i class='fa-regular fa-star'></i>
        <i class='fa-regular fa-star'></i>
        ",
        4 => "
        <i class='fa-solid fa-star'></i>
        <i class='fa-solid fa-star'></i>
        <i class='fa-solid fa-star'></i>
        <i class='fa-solid fa-star'></i>
        <i class='fa-regular fa-star'></i>
        ",
        5 => "
        <i class='fa-solid fa-star'></i>
        <i class='fa-solid fa-star'></i>
        <i class='fa-solid fa-star'></i>
        <i class='fa-solid fa-star'></i>
        <i class='fa-solid fa-star'></i>
        "
    ];

    return $arr_rating[$number];
}
