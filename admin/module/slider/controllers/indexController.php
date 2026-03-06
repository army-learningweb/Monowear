<?php
function construct()
{
    load_model('index');
    // Dọn dẹp rác hệ thống - khi ảnh mồ côi - không có đối tượng (id của slider);
    $slider_file_path = "E:/laragon/www/UNITOP/back_end/php/project/monowear.com/public/uploads/images/sliders/";
    $time_allow = 5 * 60;
    $expired_time = time() - $time_allow;
    $list_media = get_list_media_none_object();
    foreach ($list_media as $item) {
        if ($item['created_at'] < $expired_time) {
            if(file_exists($slider_file_path . $item['file_name'])) unlink($slider_file_path . $item['file_name']);
            delete_item("tbl_media", "`object_id` IS NULL AND `created_at` = '{$item['created_at']}' AND `object_type` = 'slider'");
        }
    }
}

// Danh sách slider
function list_slidersAction()
{

    // Cập nhật trạng thái AJAX
    if (isset($_POST['status_value'])) {
        $status_value = $_POST['status_value'];
        $status_id = $_POST['status_id'];

        // Cập nhật trong DB
        $new_status = [
            'slider_status' => $status_value,
            'updated_at' => time()
        ];
        update_item("tbl_sliders", $new_status, "`slider_id` = '$status_id'");

        // Đếm số lượng trạng thái
        $on_status = count_status("slider_status", "tbl_sliders", "`slider_status` = 'Công khai'");
        $wait_status = count_status("slider_status", "tbl_sliders", "`slider_status` = 'Chờ duyệt'");

        // Trả về AJAX
        $data = [
            'status_value' => set_status_slider($status_value),
            'status_id' => $status_id,
            'on_status' => $on_status['total'],
            'wait_status' => $wait_status['total'],
        ];
        echo json_encode($data);
        exit;
    }

    load("helper", "pagging_page");
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $info_per_page = 5;
    $start = ($page - 1) * $info_per_page;
    $total_sliders = get_total_sliders();
    $num_page = ceil($total_sliders / $info_per_page);
    $list_sliders = get_list_sliders($start, $info_per_page);
    $base_url = "?mod=slider&action=list_sliders";
    $pagging_page = get_pagging_page($num_page, $page, $base_url);

    $on_status = count_status("slider_status", "tbl_sliders", "`slider_status` = 'Công khai'");
    $wait_status = count_status("slider_status", "tbl_sliders", "`slider_status` = 'Chờ duyệt'");

    // Lọc theo trạng thái
    if (isset($_GET['btn-filter'])) {
        if (!empty($_GET['filter_status'])) {
            $filter_status = $_GET['filter_status'];
            $list_sliders = get_list_sliders_by_status($filter_status, $start, $info_per_page);
            $total_sliders = get_total_sliders_by_status($filter_status);
            $num_page = ceil($total_sliders / $info_per_page);
            $base_url .= "&filter_status=$filter_status&btn-filter";
            $pagging_page = get_pagging_page($num_page, $page, $base_url);
        }
    }

    // Tìm kiếm
    if (isset($_GET['btn-search'])) {
        if (!empty($_GET['search_slider'])) {
            $search_slider = $_GET['search_slider'];
            $list_sliders = get_list_sliders_by_search($search_slider, $start, $info_per_page);
            $total_sliders = get_total_sliders_by_search($search_slider);
            $num_page = ceil($total_sliders / $info_per_page);
            $base_url .= "&search_slider=$search_slider&btn-search";
            $pagging_page = get_pagging_page($num_page, $page, $base_url);
        }
    }

    $data = [
        'list_sliders' => $list_sliders,
        'start' => $start,
        'pagging_page' => $pagging_page,
        'on_status' => $on_status,
        'wait_status' => $wait_status
    ];

    load_view('list_sliders', $data);
}

// Thêm slider
function add_sliderAction()
{

    if (isset($_POST['btn-add'])) {

        load("helper", "check_slider");

        $user_info = get_user_info($_SESSION['user_login']['username']);

        $slider_name = $_POST['slider_name'];
        $slider_link = $_POST['slider_link'];
        $slider_desc = $_POST['slider_desc'];
        $slider_order = $_POST['slider_order'];

        $main_img = $_FILES['main_img_slider'];
        $main_img_id = isset($_POST['slider_main_img_id']) ? $_POST['slider_main_img_id'] : '';


        global $error, $conn;
        $error = [];

        check_slider_name($slider_name);
        check_slider_desc($slider_desc);
        check_slider_order($slider_order);
        check_main_img($main_img);

        if (empty($error)) {
            if (check_slider_duplicate($slider_name)) {
                $error['slider_duplicate'] = "Nội dung quảng cáo đã tồn tại trên hệ thống";
            } else if (check_order_duplicate($slider_order)) {
                $error['order_duplicate'] = "Trùng thứ tự slider";
            } else {
                $new_slider = [
                    'slider_title' => $slider_name,
                    'image_id' => $main_img_id,
                    'slider_desc' => $slider_desc,
                    'slider_url' => $slider_link,
                    'display_order' => $slider_order,
                    'user_id' => $user_info['user_id'],
                    'created_at' => time()
                ];
                insert_item("tbl_sliders", $new_slider);
                $slider_id = mysqli_insert_id($conn);
                $new_object = ['object_id' => $slider_id];
                update_item("tbl_media", $new_object, "`image_id` = '$main_img_id' AND `object_type` = 'slider'");
                unset($_POST);
                set_alert_success("Thêm thành công");
                redirect_to("slider", "index", "list_sliders");
            }
        } else {
            set_alert_failed("Thêm thất bại");
        }
    }
    load_view('add_slider');
}

// Xóa slider
function delete_sliderAction()
{
    $slider_id = $_GET['slider_id'];
    delete_item("tbl_sliders", "`slider_id` = '$slider_id'");
    $images_of_slider = get_list_images_of_slider($slider_id);
    foreach ($images_of_slider as $item) {
        unlink($item['image_url']);
    }
    delete_item("tbl_media", "`object_id` = '$slider_id' AND `object_type` = 'slider'");
    set_alert_success("Xóa thành công");
    redirect_to("slider", "index", "list_sliders");
}

// Cập nhật Slider
function update_sliderAction()
{

    $slider_id = $_GET['slider_id'];
    $img_slider = get_img_slider($slider_id);
    $slider_info = get_slider_info($slider_id);

    if (isset($_POST['btn-update'])) {
        load("helper", "check_slider");

        $user_info = get_user_info($_SESSION['user_login']['username']);

        $slider_name = $_POST['slider_name'];
        $slider_link = $_POST['slider_link'];
        $slider_desc = $_POST['slider_desc'];
        $slider_order = $_POST['slider_order'];

        $new_main_img_id = isset($_POST['slider_main_img_id']) ? $_POST['slider_main_img_id'] : '';

        global $error, $conn;
        $error = [];

        check_slider_name($slider_name);
        check_slider_desc($slider_desc);
        check_slider_order($slider_order);
        // check_main_img($main_img);

        if (empty($error)) {
            $new_slider = [
                'slider_title' => $slider_name,
                'image_id' => $new_main_img_id,
                'slider_desc' => $slider_desc,
                'slider_url' => $slider_link,
                'display_order' => $slider_order,
                'user_id' => $user_info['user_id'],
                'updated_at' => time()
            ];
            update_item("tbl_sliders", $new_slider, "`slider_id` = '$slider_id'");

            // Thay đổi ảnh 
            if ($new_main_img_id != $img_slider['image_id']) {
                $new_img = get_new_img($new_main_img_id);

                $update_info = [
                    'image_url' => $new_img['image_url'],
                    'file_name' => $new_img['file_name'],
                    'file_size' => $new_img['file_size'],
                    'user_id' => $user_info['user_id']
                ];

                update_item("tbl_media", $update_info, "`object_id` = '$slider_id' AND `object_type` = 'slider'");
                unlink($img_slider['image_url']);
                delete_item("tbl_media", "`image_id` = '{$new_img['image_id']}' AND `object_type` = 'slider'");
            }
            set_alert_success("Cập nhật thành công");
            redirect_to("slider", "index", "list_sliders");
        } else {
            set_alert_failed("Cập nhật thất bại");
        }
    }

    $data = [
        'img_slider' => $img_slider,
        'slider_info' => $slider_info
    ];
    load_view("update_slider", $data);
}

// Upload ảnh ajax
function uploadAction()
{
    $user_info = get_user_info($_SESSION['user_login']['username']);
    // THÊM ẢNH
    if (!empty($_FILES['main_img_data'])) {
        $main_img_data = $_FILES['main_img_data'];
        $file_name = $main_img_data['name'];
        $file_type = basename($main_img_data['type']);
        $file_size = $main_img_data['size'];
        $file_tmp = $main_img_data['tmp_name'];
        $base_name = pathinfo($main_img_data['name'], PATHINFO_FILENAME);

        $upload_dir = "../public/uploads/images/slider/";
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
                'object_type' => "slider",
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
}

// Chuẩn hóa dữ liệu (AJAX)
function validateAction()
{
    load("helper", "check_slider");

    $slider_name = isset($_POST['slider_name']) ? $_POST['slider_name'] : '';
    $slider_desc = isset($_POST['slider_desc']) ? $_POST['slider_desc'] : '';
    $slider_order = isset($_POST['slider_order']) ? $_POST['slider_order'] : '';

    global $error;
    $error = [];

    check_slider_name($slider_name);
    check_slider_desc($slider_desc);
    check_slider_order($slider_order);

    if (empty($error)) {
        $data = [
            'error' => NULL
        ];
    } else {
        $data = ['error' => $error];
    }

    echo json_encode($data);
}
