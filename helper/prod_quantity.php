<?php

function get_quantity_text($quantity){
    if($quantity <= 0){
        return "<span style='color:red'>Hết hàng</span>";
    }elseif($quantity <= 5){
        return "<span style='color:orangred'>Sắp hết hàng</span>";
    }else{
        return "<span style='color:green'>Còn hàng</span>";
    }
}