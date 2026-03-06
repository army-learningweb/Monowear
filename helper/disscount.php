<?php

function disscount_price($disscount,$price){
    $price_disscount =  $price * ($disscount / 100);
    $sub_price = $price - $price_disscount;
    return $sub_price;
}