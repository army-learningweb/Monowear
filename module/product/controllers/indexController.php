<?php

function construct()
{
    load_model('index');
    load("helper", "disscount");
}


function indexAction()
{
    load("helper", "title-page");
    $slug = $_GET['slug'];
    $list_prods = get_list_prods($slug);

    if ($slug == 'khac') {
        $category_id = 24;
        $list_prods = get_list_prods_custom($category_id);
    }

    $path_img_prods = "./public/uploads/images/product/";
    $data = [
        'list_prods' => $list_prods,
        'path_img_prods' => $path_img_prods,
        'slug' => $slug
    ];
    load_view('index', $data);
}

// Chi tiết sản phẩm
function product_detailsAction()
{
    load("helper", "rating");
    load("helper", "date");
    load("helper", "prod_quantity");
    $slug = $_GET['slug'];
    $slug_prod = explode("-", $slug);
    $slug_complete = "$slug_prod[0]";
    $prod_info = get_prod_info($slug);
    $customer_info = isset($_SESSION['customer']) ? get_customer_info($_SESSION['customer']['username']) : '';
    $prod_review = get_prod_review($prod_info['product_id']);
    $list_prods_none_slug = get_list_prods_none_slug($slug_complete);
    $total_prods_review = get_prods_review($prod_info['product_id']);
    $path_img_prods = "./public/uploads/images/product/";

    // Rating star
    $rating_one = get_rating($prod_info['product_id'], 1);
    $rating_two = get_rating($prod_info['product_id'], 2);
    $rating_three = get_rating($prod_info['product_id'], 3);
    $rating_four = get_rating($prod_info['product_id'], 4);
    $rating_five = get_rating($prod_info['product_id'], 5);

    $arr_rating[1] = $rating_one;
    $arr_rating[2] = $rating_two;
    $arr_rating[3] = $rating_three;
    $arr_rating[4] = $rating_four;
    $arr_rating[5] = $rating_five;

    $top_rating = array_search(max($arr_rating),$arr_rating);
    
    if (isset($_POST['btn-review'])) {

        $product_id = $prod_info['product_id'];
        $user_id = isset($_SESSION['customer']) ? (int)get_user_id($_SESSION['customer']['username']) : NULL;
        $fullname = isset($_POST['fullname']) ? $_POST['fullname'] : NULL;
        $product_review = isset($_POST['product_review']) ? $_POST['product_review'] : NULL;
        $product_rating = isset($_POST['rating_value']) ? $_POST['rating_value'] : NULL;
        $created_at = time();

        global $error;
        $error = [];

        if (!isset($_SESSION['customer'])) {
            check_fullname($fullname);
        }

        if (empty($product_review) && empty($product_rating)) {
            $error['review'] = "Bạn chưa đánh giá hoặc, bình chọn";
        }

        if (strlen($product_review) > 500) {
            $error['review-details'] = 'Không quá 500 kí tự';
        }

        $pattern = "/^[\p{L}\s.-_,!()]{0,500}$/u";
        if (!preg_match($pattern, $product_review)) {
            $error['review-details'] = 'Chứa kí tự không hợp lệ !@#$%^&*()';
        }

        if (empty($error)) {
            if (isset($_SESSION['customer'])) {
                $fullname = $customer_info['fullname'];
                if (empty($product_rating)) {
                    $new_review = [
                        'product_id' => $product_id,
                        'user_id' => $user_id,
                        'fullname' => $fullname,
                        'product_review' => $product_review,
                        'created_at' => $created_at
                    ];
                    insert_item("tbl_product_reviews", $new_review);
                } else {
                    $new_review = [
                        'product_id' => $product_id,
                        'user_id' => $user_id,
                        'fullname' => $fullname,
                        'product_review' => $product_review,
                        'product_rating' => $product_rating,
                        'created_at' => $created_at
                    ];
                    insert_item("tbl_product_reviews", $new_review);
                }
            } else {
                if (empty($product_rating)) {
                    $new_review = [
                        'product_id' => $product_id,
                        'fullname' => $fullname,
                        'product_review' => $product_review,
                        'created_at' => $created_at
                    ];
                    insert_item("tbl_product_reviews", $new_review);
                } else {
                    $new_review = [
                        'product_id' => $product_id,
                        'fullname' => $fullname,
                        'product_review' => $product_review,
                        'product_rating' => $product_rating,
                        'created_at' => $created_at
                    ];
                    insert_item("tbl_product_reviews", $new_review);
                }
            }
            unset($_POST);
            set_alert_success("Gửi thành công");
            redirect_to("product", "index", "product_details");
            exit();
        } else {
            set_alert_failed("Gửi thất bại");
        }
    }
    $data = [
        'prod_info' => $prod_info,
        'path_img_prods' => $path_img_prods,
        'list_prods_none_slug' => $list_prods_none_slug,
        'prod_review' => $prod_review,
        'total_prods_review' => $total_prods_review,
        'top_rating' => $top_rating
    ];
    load_view('product_details', $data);
}

// Chuẩn hóa dữ liệu review
function validate_reviewsAction()
{
    $fullname = isset($_POST['fullname']) ? $_POST['fullname'] : '';
    $product_review = isset($_POST['product_review']) ? $_POST['product_review'] : '';

    global $error;
    $error = [];

    check_fullname($fullname);

    if (strlen($product_review) <= 1 || strlen($product_review) > 500) {
        $error['product_review'] = 'Từ 2 đến 500 kí tự';
    }

    $pattern = "/^[\p{L}\s.-_,!()]{0,500}$/u";
    if (!preg_match($pattern, $product_review)) {
        $error['product_review'] = 'Chứa kí tự không hợp lệ @#$%^&*';
    }

    if (empty($error)) {
        $data = ['error' => NULL];
    } else {
        $data = ['error' => $error];
    }

    echo json_encode($data);
}
