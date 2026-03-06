
<?php
function construct()
{   
    load_model('index');
    // Dọn dẹp rác hệ thống - khi ảnh mồ côi - không có Object của đối tượng (id của page);
    $page_file_path = "E:/laragon/www/UNITOP/back_end/php/project/monowear.com/public/uploads/images/pages/";
    $time_allow = 5 * 60;
    $expired_time = time() - $time_allow;
    $list_media = get_list_media_none_object();
    foreach ($list_media as $item) {
        if ($item['created_at'] < $expired_time) {
            if(file_exists($item['image_url'])){
                unlink($page_file_path . $item['file_name']);
            }
            delete_item("tbl_media", "`object_id` IS NULL AND `created_at` = '{$item['created_at']}' AND `object_type` = 'page'");
        }
    }
   
}

// Danh sách trang
function list_pagesAction(){

    // Ajax cập nhật trạng thái
    if (isset($_POST['status_value'])) {
        $status_value = $_POST['status_value'];
        $status_id = $_POST['status_id'];

        // Cập nhật trong DB
        $new_status = [
            'page_status' => $status_value,
            'updated_at' => time()
        ];
        update_item("tbl_pages", $new_status, "`page_id` = '$status_id'");

        // Đếm số lượng trạng thái
        $draft_status = count_status("page_status","tbl_pages","`page_status` = 'draft'");
        $published_status = count_status("page_status","tbl_pages","`page_status` = 'published'");
        $pending_status = count_status("page_status","tbl_pages","`page_status` = 'pending'");
        $archived_status = count_status("page_status","tbl_pages","`page_status` = 'archived'");

        // Trả về AJAX
        $data = [
            'status_value' => set_status_page($status_value),
            'status_id' => $status_id,
            'draft_status' => $draft_status['total'],
            'published_status' => $published_status['total'],
            'pending_status' => $pending_status['total'],
            'archived_status' => $archived_status['total']
        ];
        echo json_encode($data);
        exit;
    }

    load("helper","pagging_page");

    $draft_status = count_status("page_status","tbl_pages","`page_status` = 'draft'");
    $published_status = count_status("page_status","tbl_pages","`page_status` = 'published'");
    $pending_status = count_status("page_status","tbl_pages","`page_status` = 'pending'");
    $archived_status = count_status("page_status","tbl_pages","`page_status` = 'archived'");

    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $info_per_page = 5;
    $start = ($page - 1) * $info_per_page;
    $total_pages = get_total_pages();
    $list_pages = get_list_pages($start,$info_per_page);
    $num_page = ceil($total_pages / $info_per_page);
    $base_url = "?mod=pages&action=list_pages";
    $pagging_page = get_pagging_page($num_page,$page,$base_url);

    // Sàng lọc theo trạng thái
    if (isset($_GET['btn-filter'])) {
        if (!empty($_GET['filter_status'])) {
            $filter_status = $_GET['filter_status'];
            $list_pages = get_list_pages_by_status($filter_status, $start, $info_per_page);
            $total_pages = get_total_pages_by_status($filter_status);
            $num_page = ceil($total_pages / $info_per_page);
            $base_url .= "&filter_status=$filter_status&btn-filter";
            $pagging_page = get_pagging_page($num_page, $page, $base_url);
        }
    }

    // Tìm kiếm trang
    if (isset($_GET['btn-search'])) {
        if (isset($_GET['search_page'])) {
            $search_page = $_GET['search_page'];
            $list_pages = get_list_pages_by_search($search_page, $start, $info_per_page);
            $total_pages = get_total_pages_by_search($search_page);
            $num_page = ceil($total_pages / $info_per_page);
            $base_url .= "&search_page=$search_page&btn-search";
            $pagging_page = get_pagging_page($num_page, $page, $base_url);
        }
    }

    $data = [
        'list_pages' => $list_pages,
        'start' => $start,
        'pagging_page' => $pagging_page,
        'draft_status' => $draft_status,
        'published_status' => $published_status,
        'pending_status' => $pending_status,
        'archived_status' => $archived_status
    ];
    load_view('list_pages',$data);
}

// Thêm trang
function add_pageAction()
{
    if (isset($_POST['btn-add'])) {
        load("helper", "check_page");

        $user_info = get_user_info($_SESSION['user_login']['username']);
        $page_name = $_POST['page_name'];
        $page_slug = slugify($_POST['page_slug']);
        $page_content = $_POST['page_details'];

        global $error;
        $error = [];

        check_page_name($page_name);
        check_page_slug($page_slug);

        if (empty($error)) {
            if (check_page_duplicate($page_name)) {
                $error['page_duplicate'] = "Trang đã tồn tại trên hệ thống";
            } else {
                $new_page = [
                    'page_title' => $page_name,
                    'page_slug' => $page_slug,
                    'page_content' => $page_content,
                    'user_id' => $user_info['user_id'],
                    'created_at' => time()
                ];
                insert_item("tbl_pages", $new_page);
                unset($_POST);
                set_alert_success("Thêm thành công");
                redirect_to("pages","index","list_pages");
            }
        }else{
            set_alert_failed("Thêm thất bại");
        }
    }
    load_view('add_page');
}

// Xóa trang
function delete_pageAction()
{
    $page_id = $_GET['page_id'];
    delete_item("tbl_pages", "`page_id` = '$page_id'");
    set_alert_success("Xóa thành công");
    redirect_to("pages", "index", "list_pages");
}

// Cập nhật trang
function update_pageAction()
{
    $page_id = $_GET['page_id'];
    $page_info = get_page_info($page_id);
    $user_info = get_user_info($_SESSION['user_login']['username']);

    if (isset($_POST['btn-update'])) {
        load("helper", "check_page");
        $error = [];
        global $error, $conn;
       
        $page_name = $_POST['page_name'];

        if($page_info['page_slug'] == $_POST['page_slug']){
            $page_slug = $_POST['page_slug'];
        }else{
            $page_slug = slugify($_POST['page_slug']);
        }
        
        $page_content = $_POST['page_details'];

        // check_main_img($main_img);
       
        check_page_name($page_name);
        check_page_slug($page_slug);

        if (empty($error)) {
            $new_page_info = [
                'page_title' => $page_name,
                'page_slug' => $page_slug,
                'page_content' => $page_content,
                'updated_at' => time(),
                'user_id' => $user_info['user_id']
            ];
            update_item("tbl_pages", $new_page_info, "`page_id` = '$page_id'");
            set_alert_success("Cập nhật thành công");
            redirect_to("pages","index","list_pages");
        } else {
            set_alert_failed("Cập nhật thất bại");
        }
    }

    
    $data = [
        'page_info' => $page_info
    ];
    load_view('update_page', $data);
}

// Chuẩn hóa dữ liệu (AJAX)
function validateAction()
{
    load("helper", "check_page");
    $page_name = isset($_POST['page_name']) ? $_POST['page_name'] : '';
    $page_slug = isset($_POST['page_slug']) ? $_POST['page_slug'] : '';

    global $error;
    $error = [];
    
    check_page_name($page_name);
    check_page_slug($page_slug);

    if (empty($error)) {
        $data = [
            'error' => NULL
        ];
    } else {
        $data = ['error' => $error];
    }

    echo json_encode($data);
}