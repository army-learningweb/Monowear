<?php

function construct()
{
    load_model('index');
    load("helper", "cart");
    load("helper","disscount");
    // show_array($_SESSION);
}

// Danh sách giỏ hàng
function show_cartAction()
{
    load("helper", "date");
    load("helper", "status");

    $path_img = "./public/uploads/images/product/";
    $list_prods = get_list_prods();
    $data = [
        'path_img' => $path_img,
        'list_prods' => $list_prods
    ];
    load_view('show_cart', $data);
}

// Thêm vào giỏ hàng
function add_cartAction()
{
    $product_id = $_GET['prod_id'];
    $product_quantity = isset($_POST['prod_quantity']) ? $_POST['prod_quantity'] : 1;
    $product_info = get_product_info($product_id);
    $product_img = get_product_img($product_id);

    if (!empty($product_info['product_sales'])) {
        $product_price = disscount_price($product_info['product_sales'], $product_info['product_price']);
    } else {
        $product_price = $product_info['product_price'];
    }

    if (isset($_SESSION['cart']['buy'][$product_id])) {
        if (isset($_POST['prod_quantity'])) {
            $_SESSION['cart']['buy'][$product_id]['product_quantity'] += $product_quantity;
        } else {
            $_SESSION['cart']['buy'][$product_id]['product_quantity'] += 1;
        }
        $_SESSION['cart']['buy'][$product_id]['product_sub_price'] =  $product_price * $_SESSION['cart']['buy'][$product_id]['product_quantity'];
    } else {
        $_SESSION['cart']['buy'][$product_id] = [
            'product_id' => $product_info['product_id'],
            'product_code' => $product_info['product_code'],
            'product_name' => $product_info['product_name'],
            'product_price' => $product_price,
            'product_quantity' => $product_quantity,
            'product_sub_price' => $product_price * $product_quantity,
            'product_img' => $product_img
        ];
    }
    update_cart();
    set_alert_success("Thêm thành công");

    $process = $_GET['process'];
    if(!empty($process)){
        slug_redirect("gio-hang/tien-hanh-thanh-toan");
    }else{
        slug_redirect("gio-hang");
    }
}

// Xóa giỏ hàng
function delete_prodAction()
{
    unset($_SESSION['cart']);
    set_alert_success("Xóa thành công");
    slug_redirect("gio-hang");
}

// Xóa sản phẩm trong giỏ hàng
function delete_itemAction()
{
    $prod_id = $_GET['prod_id'];
    unset($_SESSION['cart']['buy'][$prod_id]);
    update_cart();
    if(empty($_SESSION['cart']['buy'])){
        unset($_SESSION['cart']);
    }
    set_alert_success("Xóa thành công");
    slug_redirect("gio-hang");
}

// Thay đổi số lượng ở trang giỏ hàng
function change_quantityAction()
{
    $prod_id = $_POST['prod_id'];
    $prod_quantity = $_POST['prod_quantity'];

    $_SESSION['cart']['buy'][$prod_id]['product_quantity'] = $prod_quantity;
    $_SESSION['cart']['buy'][$prod_id]['product_sub_price'] =
    $_SESSION['cart']['buy'][$prod_id]['product_quantity'] * $_SESSION['cart']['buy'][$prod_id]['product_price'];

    update_cart();
    
    $new_qty = $prod_quantity;
    $new_sub_price = currency_format($_SESSION['cart']['buy'][$prod_id]['product_sub_price']);
    $total_price = currency_format($_SESSION['cart']['total']['total_price']);
    $total_quantity =  $_SESSION['cart']['total']['total_quantity'];

    $data = [
        'prod_quantity' => $new_qty,
        'prod_id' => $prod_id,
        'prod_sub_price' => $new_sub_price,
        'prod_total_price' =>  $total_price,
        'prod_total_quantity' => $total_quantity
    ];

    echo json_encode($data);
    exit();
}