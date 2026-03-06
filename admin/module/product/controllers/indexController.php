<?php

use Dom\Mysql;

function construct()
{
    load_model('index');
    // Dọn dẹp rác hệ thống - khi ảnh mồ côi - không có Object của đối tượng (id của product);
    $prod_file_path = "E:/laragon/www/UNITOP/back_end/php/project/monowear.com/public/uploads/images/product/";
    $time_allow = 5 * 60;
    $expired_time = time() - $time_allow;
    $list_media = get_list_media_none_object();
    foreach ($list_media as $item) {
        $item_time = (int)$item['created_at'];
        if ($item_time < $expired_time) {
            unlink($prod_file_path . $item['file_name']);
            delete_item("tbl_media", "`object_id` IS NULL AND `created_at` = '{$item['created_at']}'");
        }
    }
}

// Danh sách danh mục
function list_catsAction()
{
    // Cập nhật trạng thái AJAX
    if (isset($_POST['status_value'])) {
        $status_value = $_POST['status_value'];
        $status_id = $_POST['status_id'];

        // Cập nhật trong DB
        $new_status = [
            'category_status' => $status_value,
            'updated_at' => time()
        ];
        update_item("tbl_product_categories", $new_status, "`category_id` = '$status_id'");

        // Đếm số lượng trạng thái
        $on_status = count_status("category_status", "tbl_product_categories", "`category_status` = 'Hoạt động'");
        $wait_status = count_status("category_status", "tbl_product_categories", "`category_status` = 'Chờ duyệt'");
        $off_status = count_status("category_status", "tbl_product_categories", "`category_status` = 'Tạm dừng'");

        // Trả về AJAX
        $data = [
            'status_value' => set_status_cat($status_value),
            'status_id' => $status_id,
            'on_status' => $on_status['total'],
            'wait_status' => $wait_status['total'],
            'off_status' => $off_status['total'],
        ];
        echo json_encode($data);
        exit;
    }

    load("helper", "data_tree");
    load("helper", "pagging_page");

    $list_cats = get_list_cats();
    $total_cat = count($list_cats);
    $on_status = count_status("category_status", "tbl_product_categories", "`category_status` = 'Hoạt động'");
    $wait_status = count_status("category_status", "tbl_product_categories", "`category_status` = 'Chờ duyệt'");
    $off_status = count_status("category_status", "tbl_product_categories", "`category_status` = 'Tạm dừng'");

    $list_cats = data_tree($list_cats);
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $info_per_page = 7;
    $start = ($page - 1) * $info_per_page;
    $list_cats = array_slice($list_cats, $start, $info_per_page);

    $num_page = ceil($total_cat / $info_per_page);
    $pagging_page = get_pagging_page($num_page, $page, "?mod=product&action=list_cats");

    $data = [
        'list_cats' => $list_cats,
        'total_cat' => $total_cat,
        'start' => $start,
        "pagging_page" => $pagging_page,
        'on_status' => $on_status,
        'wait_status' => $wait_status,
        'off_status' => $off_status
    ];
    load_view('list_cats', $data);
}

// Thêm mới danh mục
function add_catAction()
{
    $user_info = get_user_info($_SESSION['user_login']['username']);
    if (isset($_POST['btn-add'])) {
        $error = [];
        global $error;

        $category_name = $_POST['category_name'];
        $category_desc = $_POST['category_desc'];
        $category_slug = $_POST['category_slug'];
        $parent_cat = $_POST['parent_cat'];

        check_category_name($category_name);
        // check_category_desc($category_desc);
        check_cat($parent_cat);
        check_category_slug($category_slug);

        if (empty($category_slug)) {
            $error['category_slug'] = "Không để trống Slug";
        }

        if (empty($error)) {
            if (check_category_info($category_name)) {
                $error['category_duplicate'] = "Danh mục đã tồn tại trên hệ thống";
                get_alert_failed("Thêm thất bại");
            } else {
                $category_slug = "san-pham/" . slugify($category_slug);
                $new_cat = [
                    'category_name' => $category_name,
                    'category_desc' => $category_desc,
                    'category_slug' => $category_slug,
                    'category_status' => "Chờ duyệt",
                    'parent_id' => $parent_cat,
                    'created_at' => time(),
                    'user_id' => $user_info['user_id']
                ];
                insert_item("tbl_product_categories", $new_cat);
                set_alert_success("Thêm thành công");
                redirect_to("product", "index", "list_cats");
            }
        } else {
            set_alert_failed("Thêm thất bại");
        }
    }

    $parent_cat = get_parent_cat();
    $data = [
        'parent_cat' => $parent_cat
    ];
    load_view('add_cat', $data);
}


// Xóa danh mục
function delete_catAction()
{
    $cat_id = $_GET['cat_id'];
    delete_item("tbl_product_categories", "`category_id` = '$cat_id'");
    set_alert_success("Xóa thành công");
    redirect_to("product", "index", "list_cats");
}


// Cập nhật danh mục
function update_catAction()
{
    $cat_id = $_GET['cat_id'];
    $cat_info = get_cat_info($cat_id);
    if (isset($_POST['btn-update'])) {
        $error = [];
        global $error;

        $category_name = $_POST['category_name'];
        $category_desc = $_POST['category_desc'];
        $category_slug = $_POST['category_slug'];
        $parent_cat = isset($_POST['parent_cat']) ? $_POST['parent_cat'] : 0;
        check_category_name($category_name);
        // check_category_desc($category_desc);
        check_category_slug($category_slug);

        if ($cat_id == 1 || $cat_id == 2 || $cat_id == 3) {
        } else {
            check_cat($parent_cat);
        }

        if (empty($error)) {
            if ($cat_info['category_slug'] == $category_slug) {
                $category_slug = $category_slug;
            } else {
                $category_slug = "san-pham/" . slugify($category_slug);
            }
            $new_info = [
                'category_name' => $category_name,
                'category_desc' => $category_desc,
                'category_slug' => $category_slug,
                'parent_id' => $parent_cat,
                'updated_at' => time()
            ];
            update_item("tbl_product_categories", $new_info, "`category_id` = '$cat_id'");

            $new_slug = [
                'menu_slug' => $category_slug
            ];
            update_item("tbl_menu", $new_slug, "`object_id` = '$cat_id'");
            set_alert_success("Cập nhật thành công");
            redirect_to("product", "index", "list_cats");
        } else {
            set_alert_failed("Cập nhật thất bại");
        }
    }
    $parent_cat = get_parent_cat();
    $data = [
        'cat_info' => $cat_info,
        'parent_cat' => $parent_cat
    ];
    load_view('update_cat', $data);
}

// Danh sách sản phẩm
function list_prodsAction()
{
    // Cập nhật trạng thái Ajax
    if (isset($_POST['status_value'])) {
        $status_value = $_POST['status_value'];
        $status_id = $_POST['status_id'];

        $new_status = [
            'product_status' => $status_value,
            'updated_at' => time()
        ];
        db_update("tbl_products", $new_status, "`product_id` = '$status_id'");

        $on_status = count_status("product_status", "tbl_products", "`product_status` = 'active'");
        $wait_status = count_status("product_status", "tbl_products", "`product_status` = 'inactive'");
        $off_status = count_status("product_status", "tbl_products", "`product_status` = 'out_of_stock'");

        $data = [
            'status_value' => set_status_product($status_value),
            'status_id' => $status_id,
            'on_status' => $on_status['total'],
            'wait_status' => $wait_status['total'],
            'off_status' => $off_status['total']
        ];

        echo json_encode($data);
        exit();
    }

    load("helper", "pagging_page");

    $on_status = count_status("product_status", "tbl_products", "`product_status` = 'active'");
    $wait_status = count_status("product_status", "tbl_products", "`product_status` = 'inactive'");
    $off_status = count_status("product_status", "tbl_products", "`product_status` = 'out_of_stock'");
    $total_prods = get_total_list_products();
    $total_products = get_total_list_products();
    $prod_cat = get_cat();
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $info_per_page = 4;
    $start = ($page - 1) * $info_per_page;
    $base_url = "?mod=product&action=list_prods";
    $list_prods = get_list_prods($start, $info_per_page);
    $num_page = ceil($total_products / $info_per_page);
    $pagging_page = get_pagging_page_media($num_page, $page, $base_url);

    // Sàng lọc sản phẩm 
    if (isset($_GET['btn-filter'])) {
        if (!empty($_GET['filter_cat']) && !empty($_GET['filter_status'])) {
            $filter_status = $_GET['filter_status'];
            $filter_cat = $_GET['filter_cat'];
            if (!check_category($filter_cat)) {
                $list_prods_by_cat = [];
                $cat_by_filter_cat = get_cat_by_filter($filter_cat);
                foreach ($cat_by_filter_cat as $item) {
                    $prods_by_cat = get_prod_by_cat($item['category_id']);
                    $list_prods_by_cat = array_merge($list_prods_by_cat, $prods_by_cat);
                }
                $list_prods_by_cat_filter_status = [];
                foreach ($list_prods_by_cat as $item) {
                    if ($item['product_status'] == $filter_status) {
                        $list_prods_by_cat_filter_status[] = $item;
                    }
                }
                $list_prods = array_slice($list_prods_by_cat_filter_status, $start, $info_per_page);
                $total_products = count($list_prods_by_cat_filter_status);
            } else {
                $list_prods = get_list_prods_filter_both($filter_cat, $filter_status, $start, $info_per_page);
                $total_products = get_total_prods_filter_both($filter_cat, $filter_status);
            }
            $num_page = ceil($total_products / $info_per_page);
            $base_url .= "&filter_cat=$filter_cat&filter_status=$filter_status&btn-filter";
            $pagging_page = get_pagging_page($num_page, $page, $base_url);
        } else if (!empty($_GET['filter_status'])) {
            $filter_status = $_GET['filter_status'];
            $list_prods = get_list_prods_by_status($filter_status, $start, $info_per_page);
            $total_products = get_total_prods_by_status($filter_status);
            $num_page = ceil($total_products / $info_per_page);
            $base_url .= "&filter_status=$filter_status&btn-filter";
            $pagging_page = get_pagging_page($num_page, $page, $base_url);
        } else if (!empty($_GET['filter_cat'])) {
            $filter_cat = $_GET['filter_cat'];
            if (!check_category($filter_cat)) {
                $list_prods_by_cat = [];
                $cat_by_filter_cat = get_cat_by_filter($filter_cat);
                foreach ($cat_by_filter_cat as $item) {
                    $prods_by_cat = get_prod_by_cat($item['category_id']);
                    $list_prods_by_cat = array_merge($list_prods_by_cat, $prods_by_cat);
                }
                $list_prods = array_slice($list_prods_by_cat, $start, $info_per_page);
                $total_products = count($list_prods_by_cat);
            } else {
                $list_prods = get_list_prods_by_cat($filter_cat, $start, $info_per_page);
                $total_products = get_total_prods_by_cat($filter_cat);
            }
            $num_page = ceil($total_products / $info_per_page);
            $base_url .= "&filter_cat=$filter_cat&btn-filter";
            $pagging_page = get_pagging_page($num_page, $page, $base_url);
        }
    }

    // Tìm kiếm sản phẩm
    if (isset($_GET['btn-search'])) {
        if (isset($_GET['search_prod'])) {
            $search_prod = $_GET['search_prod'];
            $list_prods = get_list_prods_by_search($search_prod, $start, $info_per_page);
            $total_products = get_total_prods_by_search($search_prod);
            $num_page = ceil($total_products / $info_per_page);
            $base_url .= "&search_prod=$search_prod&btn-search";
            $pagging_page = get_pagging_page($num_page, $page, $base_url);
        }
    }

    $data = [
        'prod_cat' => $prod_cat,
        'list_prods' => $list_prods,
        'pagging_page' => $pagging_page,
        'start' => $start,
        'on_status' => $on_status,
        'wait_status' => $wait_status,
        'off_status' => $off_status,
        'total_products' => $total_products,
        'total_prods' => $total_prods
    ];
    load_view('list_prods', $data);
}

// Thêm sản phẩm
function add_prodAction()
{
    $user_info = get_user_info($_SESSION['user_login']['username']);
    $child_cat = get_child_cat();

    if (isset($_POST['btn-add'])) {
        load("helper", "check_prod");

        $error = [];
        global $error, $conn;

        $prod_main_images_id = isset($_POST['prod_main_img_id']) ? $_POST['prod_main_img_id'] : '';
        $sub_img_id = isset($_POST['sub_img_id']) ? $_POST['sub_img_id'] : '';

        $main_img = $_FILES['main_img_prod'];
        $sub_img = $_FILES['sub_img'];
        $prod_code = $_POST['prod_code'];
        $prod_name = $_POST['prod_name'];
        $prod_desc = $_POST['prod_desc'];
        $prod_slug = $_POST['prod_slug'];
        $prod_price = $_POST['prod_price'];
        $prod_quantity = $_POST['prod_quantity'];
        $prod_cat = $_POST['prod_cat'];
        $prod_details = $_POST['prod_details'];
        $prod_status = "inactive";
        $prod_sales = isset($_POST['prod_sales']) ? (int)$_POST['prod_sales'] : '';
        $prod_up_sales = $_POST['prod_up_sales'];

        check_main_img($main_img);
        check_prod_code($prod_code);
        check_prod_name($prod_name);
        check_prod_desc($prod_desc);
        check_prod_price($prod_price);
        check_prod_quantity($prod_quantity);
        check_prod_cat($prod_cat);
        check_prod_slug($prod_slug);
        check_prod_sales($prod_sales);

        if (empty($error)) {
            if (check_prod_availiable($prod_name, $prod_code)) {
                $error['prod_duplicate'] = "Sản phẩm đã tồn tại trên hệ thống";
            } else {
                $cat_id_slug = get_cat_id_slug($prod_cat);
                $parent_cat_slug = get_parent_cat_slug($cat_id_slug['parent_id']);
                $prod_slug = "$parent_cat_slug/" . slugify($prod_slug);
                $new_prod = [
                    'product_code' => $prod_code,
                    'product_name' => $prod_name,
                    'product_desc' => $prod_desc,
                    'product_price' => $prod_price,
                    'product_sales' => $prod_sales,
                    'product_up_sales' => $prod_up_sales,
                    'product_slug' => $prod_slug,
                    'product_status' => $prod_status,
                    'stock_quantity' => $prod_quantity,
                    'product_details' => $prod_details,
                    'user_id' => $user_info['user_id'],
                    'category_id' => $prod_cat,
                    'created_at' => time(),
                ];
                insert_item("tbl_products", $new_prod);
                $product_id = mysqli_insert_id($conn);

                $new_object = ['object_id' => $product_id];
                update_item("tbl_media", $new_object, "`image_id` = '$prod_main_images_id' AND `object_type` = 'product'");

                if (!empty($sub_img_id)) {
                    foreach ($sub_img_id as $item) {
                        update_item("tbl_media", $new_object, "`image_id` = '$item' AND `object_type` = 'product'");
                    }
                }
                unset($_POST);
                set_alert_success("Thêm thành công");
                redirect_to("product", "index", "list_prods");
            }
        } else {
            set_alert_failed("Thêm thất bại");
        }
    }

    $data = ['child_cat' => $child_cat];
    load_view('add_prod', $data);
}

// Xóa sản phẩm
function delete_prodAction()
{
    $prod_id = $_GET['prod_id'];
    delete_item("tbl_products", "`product_id` = '$prod_id'");
    $images_of_prod = get_list_images_of_prod($prod_id);
    foreach ($images_of_prod as $item) {
        unlink($item['image_url']);
    }
    delete_item("tbl_order_items","`product_id` = '$prod_id'");
    delete_item("tbl_product_reviews","`product_id` = '$prod_id'");
    delete_item("tbl_media", "`object_id` = '$prod_id' AND `object_type` = 'product'");
    set_alert_success("Xóa thành công");
    redirect_to("product", "index", "list_prods");
}

// Cập nhật thông tin sản phẩm
function update_prodAction()
{
    $prod_id = $_GET['prod_id'];
    $prod_info = get_prod_info($prod_id);
    $child_cat = get_child_cat();
    $main_img = get_main_img($prod_id);
    $sub_img = get_sub_img($prod_id);
    $user_info = get_user_info($_SESSION['user_login']['username']);

    if (isset($_POST['btn-update'])) {
        load("helper", "check_prod");
        $error = [];
        global $error, $conn;

        $new_main_img_id = isset($_POST['prod_main_img_id']) ? $_POST['prod_main_img_id'] : '';
        $new_sub_img_id = isset($_POST['sub_img_id']) ? $_POST['sub_img_id'] : '';

        $prod_code = $_POST['prod_code'];
        $prod_name = $_POST['prod_name'];
        $prod_desc = $_POST['prod_desc'];
        $prod_slug = $_POST['prod_slug'];
        $prod_price = $_POST['prod_price'];
        $prod_quantity = $_POST['prod_quantity'];
        $prod_cat = $_POST['prod_cat'];
        $prod_details = $_POST['prod_details'];
        $prod_status = "inactive";
        $prod_sales = isset($_POST['prod_sales']) ? $_POST['prod_sales'] : NULL;
        $prod_up_sales = $_POST['prod_up_sales'];

        // check_main_img($main_img);
        check_prod_code($prod_code);
        check_prod_name($prod_name);
        check_prod_desc($prod_desc);
        check_prod_price($prod_price);
        check_prod_quantity($prod_quantity);
        check_prod_cat($prod_cat);
        check_prod_sales($prod_sales);
        check_prod_slug($prod_slug);

        if (empty($error)) {
            if ($prod_info['product_slug'] == $prod_slug) {
                // Nếu là Slug cũ
                if ($prod_info['category_id'] != $prod_cat) {
                    // Nếu thay đổi danh mục
                    $cat_id_slug = get_cat_id_slug($prod_cat);
                    $parent_cat_slug = get_parent_cat_slug($cat_id_slug['parent_id']);
                    $prod_slug = "$parent_cat_slug/" . slugify($prod_name);
                } else {
                    $prod_slug = $prod_slug;
                }
            } else {
                // Nếu là Slug mới
                $cat_id_slug = get_cat_id_slug($prod_cat);
                $parent_cat_slug = get_parent_cat_slug($cat_id_slug['parent_id']);
                $prod_slug = "$parent_cat_slug/" . slugify($prod_slug);
            }

            $new_prod_info = [
                'product_code' => $prod_code,
                'product_name' => $prod_name,
                'product_desc' => $prod_desc,
                'product_price' => $prod_price,
                'product_sales' => $prod_sales,
                'product_up_sales' => $prod_up_sales,
                'product_slug' => $prod_slug,
                'product_status' => $prod_status,
                'stock_quantity' => $prod_quantity,
                'product_details' => $prod_details,
                'user_id' => $user_info['user_id'],
                'category_id' => $prod_cat,
                'updated_at' => time()
            ];
            update_item("tbl_products", $new_prod_info, "`product_id` = '$prod_id'");

            // Thay đổi ảnh chính
            if ($new_main_img_id != $main_img['image_id']) {
                $old_main_img = get_old_main_img($prod_id);
                $new_main_img = get_new_main_img($new_main_img_id);

                $update_info = [
                    'file_name' => $new_main_img['file_name'],
                    'file_size' => $new_main_img['file_size'],
                    'image_url' => $new_main_img['image_url'],
                    'user_id' => $user_info['user_id']
                ];
                update_item("tbl_media", $update_info, "`image_id` = '{$old_main_img['image_id']}' AND `object_type` = 'product'");
                unlink($old_main_img['image_url']);
                delete_item("tbl_media", "`image_id` = '{$new_main_img['image_id']}' AND `object_type` = 'product'");
            }

            // Thay đổi ảnh phụ
            if ($new_sub_img_id) {
                $old_sub_img = get_old_sub_img($prod_id);
                $new_sub_img = get_new_sub_img($new_sub_img_id);

                foreach ($old_sub_img as $key => $value) {
                    if ($new_sub_img[$key]['image_id'] != $value['image_id']) {
                        $new_update_info = [
                            'file_name' => $new_sub_img[$key]['file_name'],
                            'file_size' => $new_sub_img[$key]['file_size'],
                            'image_url' => $new_sub_img[$key]['image_url'],
                            'user_id' => $user_info['user_id'],
                            'object_id' => $prod_id
                        ];
                        update_item("tbl_media", $new_update_info, "`image_id` = '{$value['image_id']}' AND `object_type` = 'product'");
                        unlink($value['image_url']);
                        delete_item("tbl_media", "`image_id` = '{$new_sub_img[$key]['image_id']}' AND `object_type` = 'product'");
                    } else {
                        $new_update_info = [
                            'file_name' => $value['file_name'],
                            'file_size' => $value['file_size'],
                            'image_url' => $value['image_url'],
                            'user_id' => $user_info['user_id'],
                            'object_id' => $prod_id
                        ];
                        update_item("tbl_media", $new_update_info, "`image_id` = '{$value['image_id']}' AND `object_type` = 'product'");
                    }
                }
            }
            set_alert_success("Cập nhật thành công");
            unset($_POST);
            unset($_FILES);
            redirect_to("product", "index", "list_prods");
        } else {
            set_alert_failed("Cập nhật thất bại");
        }
    }


    $data = [
        'prod_info' => $prod_info,
        'child_cat' => $child_cat,
        'main_img' => $main_img,
        'sub_img' => $sub_img
    ];
    load_view('update_prod', $data);
}

// Upload ảnh ajax
function uploadAction()
{
    $user_info = get_user_info($_SESSION['user_login']['username']);

    // THÊM ẢNH CHÍNH
    if (!empty($_FILES['prod_main_img_data'])) {
        $prod_main_img_data = $_FILES['prod_main_img_data'];
        $file_name = $prod_main_img_data['name'];
        $file_type = basename($prod_main_img_data['type']);
        $file_size = $prod_main_img_data['size'];
        $file_tmp = $prod_main_img_data['tmp_name'];
        $base_name = pathinfo($prod_main_img_data['name'], PATHINFO_FILENAME);

        $upload_dir = "../public/uploads/images/product/";
        $upload_file = $upload_dir . $file_name;

        $error = [];
        global $error, $conn;
        $type_allow = ['png', 'jpg', 'jpeg', 'avif'];
        if (!in_array($file_type, $type_allow)) {
            $error['file'] = "File không đúng định dạng (PNG,JPG,JPEG,AVIF)";
        } else if ($file_size > 5 * 1024 * 1024) {
            $error['file'] = "File quá kích cỡ cho phép (5MB)";
        } else {
            $n = 1;
            while (file_exists($upload_file)) {
                $new_upload = $upload_dir . $base_name . "-Copy($n)." . $file_type;
                $file_name = $base_name . "-Copy($n)." . $file_type;
                $n++;
                $upload_file = $new_upload;
            }
            move_uploaded_file($file_tmp, $upload_file);
            $new_img = [
                'image_url' => $upload_file,
                'file_name' => $file_name,
                'file_size' => $file_size,
                'object_type' => "product",
                'is_main' => 1,
                'created_at' => time(),
                'user_id' => $user_info['user_id']
            ];
            insert_item("tbl_media", $new_img);
            $image_id = mysqli_insert_id($conn);
        }

        if (empty($error)) {
            $data = [
                'image_id' => $image_id,
                'image_url' => $upload_file,
                'error' => NULL
            ];
        } else {
            $data = [
                'error' => $error
            ];
        }
        echo json_encode($data);
        exit;
    }

    // THÊM ẢNH PHỤ
    if (!empty($_FILES['sub_img_data'])) {
        $sub_img_data = $_FILES['sub_img_data'];
        $upload_dir = "../public/uploads/images/product/";
        $type_allow = ['png', 'jpg', 'jpeg', 'avif'];

        $image_ids = [];
        $image_urls = [];
        $error = [];
        global $error, $conn;

        for ($i = 0; $i < count($sub_img_data['name']); $i++) {
            $file_name = $sub_img_data['name'][$i];
            $file_type = basename($sub_img_data['type'][$i]);
            $file_size = $sub_img_data['size'][$i];
            $file_tmp = $sub_img_data['tmp_name'][$i];
            $base_name = pathinfo($sub_img_data['name'][$i], PATHINFO_FILENAME);

            $upload_file = $upload_dir . $file_name;

            if (!in_array($file_type, $type_allow)) {
                $error['file'] = "File không đúng định dạng (PNG,JPG,JPEG,AVIF)";
            } else if ($file_size > 5 * 1024 * 1024) {
                $error['file'] = "File quá kích cỡ cho phép (5MB)";
            } else {
                $n = 1;
                while (file_exists($upload_file)) {
                    $new_upload = $upload_dir . $base_name . "-Copy($n)." . $file_type;
                    $file_name = $base_name . "-Copy($n)." . $file_type;
                    $n++;
                    $upload_file = $new_upload;
                }
                move_uploaded_file($file_tmp, $upload_file);
                $new_img = [
                    'image_url' => $upload_file,
                    'file_name' => $file_name,
                    'file_size' => $file_size,
                    'object_type' => "product",
                    'is_main' => 0,
                    'created_at' => time(),
                    'user_id' => $user_info['user_id']
                ];
                insert_item("tbl_media", $new_img);
                $image_id = mysqli_insert_id($conn);
                $image_ids[] = $image_id;
                $image_urls[] = $upload_file;
            }
            // $errors[] = $error;
        }

        if (empty($error)) {
            $data = [
                'image_ids' => $image_ids,
                'image_urls' => $image_urls,
                'errors' => NULL
            ];
        } else {
            $data = [
                'error' => $error
            ];
        }

        echo json_encode($data);
        exit;
    }
}

// Chuẩn hóa dữ liệu (AJAX)
function validateAction()
{
    load("helper", "check_prod");

    $prod_code = isset($_POST['prod_code']) ? $_POST['prod_code'] : '';
    $prod_name = isset($_POST['prod_name']) ? $_POST['prod_name'] : '';
    $prod_desc = isset($_POST['prod_desc']) ? $_POST['prod_desc'] : '';
    $prod_price = isset($_POST['prod_price']) ? $_POST['prod_price'] : '';
    $prod_quantity = isset($_POST['prod_quantity']) ? $_POST['prod_quantity'] : '';
    $prod_cat = isset($_POST['prod_cat']) ? $_POST['prod_cat'] : '';
    $prod_slug = isset($_POST['prod_slug']) ? $_POST['prod_slug'] : '';
    $prod_sales = isset($_POST['prod_sales']) ? $_POST['prod_sales'] : '';

    global $error;
    $error = [];

    check_prod_code($prod_code);
    check_prod_name($prod_name);
    check_prod_desc($prod_desc);
    check_prod_price($prod_price);
    check_prod_quantity($prod_quantity);
    check_prod_cat($prod_cat);
    check_prod_slug($prod_slug);
    check_prod_sales($prod_sales);

    if (empty($error)) {
        $data = [
            'error' => NULL
        ];
    } else {
        $data = ['error' => $error];
    }

    echo json_encode($data);
}
