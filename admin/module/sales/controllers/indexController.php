<?php
function construct()
{
    load_model('index');
}

// Danh sách khách hàng
function list_customersAction()
{
    load("helper", "pagging_page");
    load("helper", "customer_status");

    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $info_per_page = 5;
    $start = ($page - 1) * $info_per_page;
    $list_customers = get_list_customers($start, $info_per_page);
    $base_url = "?mod=sales&action=list_customers";
    $total_customers = get_total_list_customers();
    $num_page = ceil($total_customers / $info_per_page);
    $pagging_page = get_pagging_page($num_page, $page, $base_url);
    $data = [
        'list_customers' => $list_customers,
        'start' => $start,
        'total_customers' => $total_customers,
        'pagging_page' => $pagging_page
    ];
    load_view('list_customers', $data);
}

// Cập nhật thông tin khách hàng
function update_customerAction()
{
    $id = $_GET['id'];
    $customer_info = get_customer_info($id);

    if (isset($_POST['btn-update'])) {
        global $error;
        $error = [];

        $username = $_POST['username'];
        $password = $_POST['password'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $address = $_POST['address'];

        check_username($username);
        check_password($password);
        check_fullname($fullname);
        check_email($email);
        check_tel($tel);
        check_address($address);

        if (empty($error)) {
            if (check_cus_password($password)) {
                $password = $password;
            } else {
                $password = md5($password);
            }
            $new_info = [
                'username' => $username,
                'password' => $password,
                'fullname' => $fullname,
                'email' => $email,
                'tel' => $tel,
                'address' => $address,
                'updated_at' => time()
            ];
            update_item("tbl_customers", $new_info, "`customer_id` = '$id'");
            set_alert_success("Cập nhật thành công");
            redirect_to("sales", "index", "list_customers");
        } else {
            set_alert_failed("Cập nhật thất bại");
        }
    }
    $data = [
        'customer_info' => $customer_info
    ];
    load_view('update_customer', $data);
}

// Xóa khách hàng
function delete_customerAction()
{
    $id = $_GET['id'];
    $order_item = get_order_item($id);
    if (!empty($order_item)) {
        foreach ($order_item as $item) {
            delete_item("tbl_order_items", "`order_id` = '{$item['order_id']}'");
        }
        delete_item("tbl_orders", "`customer_id` = '$id'");
    }
    delete_item("tbl_customers", "`customer_id` = '$id'");
    set_alert_success("Xóa thành công");
    redirect_to("sales", "index", "list_customers");
}

// Danh sách đơn hàng
function list_ordersAction()
{

    // Cập nhật trạng thái Ajax
    if (isset($_POST['status_value'])) {
        $status_value = $_POST['status_value'];
        $status_id = $_POST['status_id'];

        $new_status = [
            'status' => $status_value,
            'updated_at' => time()
        ];
        update_item("tbl_orders", $new_status, "`order_id` = '$status_id'");

        $pending_status = count_status("status", "tbl_orders", "`status` = 'pending'");
        $processing_status = count_status("status", "tbl_orders", "`status` = 'processing'");
        $shiped_status = count_status("status", "tbl_orders", "`status` = 'shipped'");
        $delivered_status = count_status("status", "tbl_orders", "`status` = 'delivered'");
        $canceled_status = count_status("status", "tbl_orders", "`status` = 'canceled'");

        $data = [
            'status_value' => set_status_order($status_value),
            'status_id' => $status_id,
            'pending_status' => $pending_status['total'],
            'processing_status' => $processing_status['total'],
            'shiped_status' => $shiped_status['total'],
            'delivered_status' => $delivered_status['total'],
            'canceled_status' => $canceled_status['total'],
        ];

        echo json_encode($data);
        exit();
    }

    load("helper", "pagging_page");

    $pending_status = count_status("status", "tbl_orders", "`status` = 'pending'");
    $processing_status = count_status("status", "tbl_orders", "`status` = 'processing'");
    $shiped_status = count_status("status", "tbl_orders", "`status` = 'shipped'");
    $delivered_status = count_status("status", "tbl_orders", "`status` = 'delivered'");
    $canceled_status = count_status("status", "tbl_orders", "`status` = 'canceled'");
    $total_orders = get_total_list_orders();
    $total_list_orders = get_total_list_orders();
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $info_per_page = 5;
    $start = ($page - 1) * $info_per_page;
    $base_url = "?mod=sales&action=list_orders";
    $list_orders = get_list_orders($start, $info_per_page);
    $num_page = ceil($total_list_orders / $info_per_page);
    $pagging_page = get_pagging_page_media($num_page, $page, $base_url);

    // Sàng lọc theo trạng thái
    if (isset($_GET['btn-filter'])) {
        if (!empty($_GET['filter_status'])) {
            $filter_status = $_GET['filter_status'];
            $list_orders = get_list_orders_by_status($filter_status, $start, $info_per_page);
            $total_list_orders = get_total_orders_by_status($filter_status);
            $num_page = ceil($total_list_orders / $info_per_page);
            $base_url .= "&filter_status=$filter_status&btn-filter";
            $pagging_page = get_pagging_page($num_page, $page, $base_url);
        }
    };

    // Tìm kiếm đơn hàng
    if (isset($_GET['btn-search'])) {
        if (isset($_GET['search_prod'])) {
            $search_prod = $_GET['search_prod'];
            $list_orders = get_list_orders_by_search($search_prod, $start, $info_per_page);
            $total_list_orders = get_total_orders_by_search($search_prod);
            $num_page = ceil($total_list_orders / $info_per_page);
            $base_url .= "&search_prod=$search_prod&btn-search";
            $pagging_page = get_pagging_page($num_page, $page, $base_url);
        }
    }

    $data = [
        'list_orders' => $list_orders,
        'pagging_page' => $pagging_page,
        'start' => $start,
        'pending_status' => $pending_status,
        'processing_status' => $processing_status,
        'shiped_status' => $shiped_status,
        'delivered_status' => $delivered_status,
        'canceled_status' => $canceled_status,
        'total_orders' => $total_orders,
    ];
    load_view('list_orders', $data);
}

// Xóa đơn hàng
function delete_orderAction()
{
    $order_id = $_GET['order_id'];
    delete_item("tbl_order_items", "`order_id` = '$order_id'");
    delete_item("tbl_orders", "`order_id` = '$order_id'");
    set_alert_success("Xóa thành công");
    redirect_to("sales", "index", "list_orders");
}

// Thông tin đơn hàng
function order_detailsAction()
{
    $order_id = $_GET['order_id'];
    $order_info = get_order_info($order_id);
    $order_item = get_prod_order_item($order_id);
    $data = [
        'order_info' => $order_info,
        'order_item' => $order_item
    ];
    load_view("order_details", $data);
}

// Danh sách review sản phẩm
function list_reviewsAction()
{
    // Cập nhật trạng thái Ajax
    if (isset($_POST['status_value'])) {
        $status_value = $_POST['status_value'];
        $status_id = $_POST['status_id'];

        $new_status = [
            'review_status' => $status_value,
        ];

        update_item("tbl_product_reviews", $new_status, "`review_id` = '$status_id'");

        $pub_status = count_status("review_status", "tbl_product_reviews", "`review_status` = 'Công khai'");
        $crash_status = count_status("review_status", "tbl_product_reviews", "`review_status` = 'Nháp'");
        $wait_status = count_status("review_status", "tbl_product_reviews", "`review_status` = 'Chờ duyệt'");

        $data = [
            'status_value' => set_status_review($status_value),
            'status_id' => $status_id,
            'pub_status' => $pub_status['total'],
            'crash_status' => $crash_status['total'],
            'wait_status' => $wait_status['total'],
        ];

        echo json_encode($data);
        exit();
    }

    load("helper", "pagging_page");

    $pub_status = count_status("review_status", "tbl_product_reviews", "`review_status` = 'Công khai'");
    $crash_status = count_status("review_status", "tbl_product_reviews", "`review_status` = 'Nháp'");
    $wait_status = count_status("review_status", "tbl_product_reviews", "`review_status` = 'Chờ duyệt'");

    $total_reviews = get_total_list_reviews();
    $total_list_reviews = get_total_list_reviews();
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $info_per_page = 7;
    $start = ($page - 1) * $info_per_page;
    $base_url = "?mod=sales&action=list_reviews";
    $list_reviews = get_list_reviews($start, $info_per_page);
    $num_page = ceil($total_list_reviews / $info_per_page);
    $pagging_page = get_pagging_page_media($num_page, $page, $base_url);

    // Sàng lọc theo trạng thái
    if (isset($_GET['btn-filter'])) {
        if (!empty($_GET['filter_status'])) {
            $filter_status = $_GET['filter_status'];
            $list_reviews = get_list_reviews_by_status($filter_status, $start, $info_per_page);
            $total_list_reviews = get_total_reviews_by_status($filter_status);
            $num_page = ceil($total_list_reviews / $info_per_page);
            $base_url .= "&filter_status=$filter_status&btn-filter";
            $pagging_page = get_pagging_page_media($num_page, $page, $base_url);
        }
    };

    // Tìm kiếm theo từ khóa đơn hàng
    if (isset($_GET['btn-search'])) {
        if (isset($_GET['search_review'])) {
            $search_review = $_GET['search_review'];
            $list_reviews = get_list_reviews_by_search($search_review, $start, $info_per_page);
            $total_list_reviews = get_total_reviews_by_search($search_review);
            $num_page = ceil($total_list_reviews / $info_per_page);
            $base_url .= "&search_review=$search_review&btn-search";
            $pagging_page = get_pagging_page_media($num_page, $page, $base_url);
        }
    }

    $data = [
        'list_reviews' => $list_reviews,
        'pagging_page' => $pagging_page,
        'start' => $start,
        'pub_status' => $pub_status,
        'crash_status' => $crash_status,
        'wait_status' => $wait_status,
        'total_reviews' => $total_reviews,
    ];

    load_view("list_reviews", $data);
}

// Xóa review
function delete_reviewAction(){
    $review_id = $_GET['review_id'];
    delete_item("tbl_product_reviews","`review_id` = '$review_id'");
    set_alert_success("Xóa thành công");
    redirect_to("sales","index","list_reviews");
    exit();
}