<?php
function construct()
{
    load_model("index");
}

function indexAction()
{
    load("helper", "date");
    load("helper", "disscount");
    load("helper", "rating");
    load("helper", "slug");

    $list_prods_up_sales = get_list_prods_up_sales();
    $list_prods_sales = get_list_prods_sales();
    $list_prods = get_list_prods();
    $list_prods_review = get_list_prods_review();
    $path_prods_img = "./public/uploads/images/product/";
    $path_slider = "./public/uploads/images/slider/";
    $list_sliders = get_list_sliders();

    // Tìm kiếm sản phẩm
    if (isset($_GET['btn-search'])) {
        $prod_search_slug = slugify($_GET['search_prod']);
        slug_redirect("trang-chu/tim-kiem/$prod_search_slug");
        exit();
    }

    $data = [
        'list_prods_up_sales' => $list_prods_up_sales,
        'list_prods_sales' => $list_prods_sales,
        'list_prods' => $list_prods,
        'list_prods_review' => $list_prods_review,
        'path_prods_img' => $path_prods_img,
        'list_sliders' => $list_sliders,
        'path_slider' => $path_slider,
        'list_prod_by_search' => isset($list_prod_by_search) ? $list_prod_by_search : '',
    ];
    load_view("index", $data);
}

// Lọc sản phẩm Ajax
function filter_prodAction()
{
    load("helper", "disscount");
    $price_val = $_POST['price_val'];
    $path_prods_img = "./public/uploads/images/product/";
    $list_prod_filter = [];

    if ($price_val == 1) {
        $list_prod_filter_price = get_list_prod_filter_price();
    }

    if($price_val == 2){
        $list_prod_filter_price = get_list_prod_filter_price_to(100000,200000);
    }

    if($price_val == 3){
        $list_prod_filter_price = get_list_prod_filter_price_to(200000,300000);
    }

    if($price_val == 4){
        $list_prod_filter_price = get_list_prod_filter_price_to(300000,999999);
    }

    foreach ($list_prod_filter_price as $item) {
        $list_prod_filter[] = [
            'product_id' => $item['product_id'],
            'product_name' => $item['product_name'],
            'product_price' => currency_format($item['product_price']),
            'product_images' => get_prod_img($item['product_id']),
            'product_sales' =>  $item['product_sales'],
            'product_up_sales' => $item['product_up_sales'],
            'product_slug' => $item['product_slug'],
            'product_sales_price' => currency_format(disscount_price($item['product_sales'], $item['product_price']))
        ];
    }

    $data = [
        'list_prod_filter' => $list_prod_filter,
        'path_prods_img' => $path_prods_img
    ];

    echo json_encode($data);
}
