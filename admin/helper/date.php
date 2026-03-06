<?php
function set_date($timestamp){
    return date("d-m-Y", $timestamp);
}

function set_time($timestamp){
    return date("H:i:s",$timestamp);
}

function set_date_time($timestamp){
    return date("H:i:s d-m-Y",$timestamp);
}