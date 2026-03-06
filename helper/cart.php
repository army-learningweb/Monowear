<?php

function update_cart()
{

    $total_price = 0;
    $total_quantity = 0;
    $total_shipping_price = 0;
    $shipping_fee = 30000;

    foreach ($_SESSION['cart']['buy'] as $item) {
        $total_price += $item['product_sub_price'];
        $total_quantity += $item['product_quantity'];
    }

    $total_shipping_price = $total_price + $shipping_fee;

    $_SESSION['cart']['total'] = [
        'total_price' => $total_price,
        'total_quantity' => $total_quantity
    ];

    $_SESSION['cart']['order'] = [
        'tmp_price' => $total_price,
        'total_shipping_price' => $total_shipping_price
    ];
    
}
