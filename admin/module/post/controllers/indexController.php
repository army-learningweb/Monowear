<?php
function construct()
{

    load_model('index');
    // Dọn dẹp rác hệ thống - khi ảnh mồ côi - không có Object của đối tượng (id của post);
    $post_file_path = "E:/laragon/www/UNITOP/back_end/php/project/monowear.com/public/uploads/images/post/";
    $time_allow = 30 * 60;
    $expired_time = time() - $time_allow;
    $list_media = get_list_media_none_object();
    foreach ($list_media as $item) {
        if ($item['created_at'] < $expired_time) {
            if (file_exists($post_file_path . $item['file_name'])) unlink($post_file_path . $item['file_name']);
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
        update_item("tbl_post_categories", $new_status, "`category_id` = '$status_id'");

        // Đếm số lượng trạng thái
        $on_status = count_status("category_status", "tbl_post_categories", "`category_status` = 'Hoạt động'");
        $wait_status = count_status("category_status", "tbl_post_categories", "`category_status` = 'Chờ duyệt'");
        $off_status = count_status("category_status", "tbl_post_categories", "`category_status` = 'Tạm dừng'");

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
    $on_status = count_status("category_status", "tbl_post_categories", "`category_status` = 'Hoạt động'");
    $wait_status = count_status("category_status", "tbl_post_categories", "`category_status` = 'Chờ duyệt'");
    $off_status = count_status("category_status", "tbl_post_categories", "`category_status` = 'Tạm dừng'");

    $list_cats = data_tree($list_cats);
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $info_per_page = 7;
    $start = ($page - 1) * $info_per_page;
    $list_cats = array_slice($list_cats, $start, $info_per_page);

    $num_page = ceil($total_cat / $info_per_page);
    $pagging_page = get_pagging_page($num_page, $page, "?mod=post&action=list_cats");

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
        check_category_slug($category_slug);
        check_cat($parent_cat);

        if (empty($error)) {
            if (check_category_info($category_name)) {
                $error['category_duplicate'] = "Danh mục đã tồn tại trên hệ thống";
                get_alert_failed("Thêm thất bại");
            } else {
                $category_slug = "bai-viet/" . slugify($category_slug);
                $new_cat = [
                    'category_name' => $category_name,
                    'category_desc' => $category_desc,
                    'category_slug' => $category_slug,
                    'category_status' => "Chờ duyệt",
                    'parent_id' => $parent_cat,
                    'created_at' => time(),
                    'user_id' => $user_info['user_id']
                ];
                insert_item("tbl_post_categories", $new_cat);
                set_alert_success("Thêm thành công");
                redirect_to("post", "index", "list_cats");
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
    delete_item("tbl_post_categories", "`category_id` = '$cat_id'");
    set_alert_success("Xóa thành công");
    redirect_to("post", "index", "list_cats");
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
        check_category_slug($category_slug);

        if ($cat_id == 1 || $cat_id == 2 || $cat_id == 3) {
        } else {
            check_cat($parent_cat);
        }

        if (empty($error)) {
            if ($cat_info['category_slug'] == $_POST['category_slug']) {
                $category_slug = $category_slug;
            } else {
                $category_slug = "bai-viet/".slugify($_POST['category_slug']);
            }
            $new_info = [
                'category_name' => $category_name,
                'category_desc' => $category_desc,
                'category_slug' => $category_slug,
                'parent_id' => $parent_cat,
                'updated_at' => time()
            ];
            update_item("tbl_post_categories", $new_info, "`category_id` = '$cat_id'");
            set_alert_success("Cập nhật thành công");
            redirect_to("post", "index", "list_cats");
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

// Danh sách bài viết
function list_postsAction()
{

    // Cập nhật trạng thái Ajax
    if (isset($_POST['status_value'])) {
        $status_value = $_POST['status_value'];
        $status_id = $_POST['status_id'];

        $new_status = [
            'post_status' => $status_value,
            'updated_at' => time()
        ];
        db_update("tbl_posts", $new_status, "`post_id` = '$status_id'");

        $crash_status = count_status("post_status", "tbl_posts", "`post_status` = 'Nháp'");
        $on_status = count_status("post_status", "tbl_posts", "`post_status` = 'Công khai'");
        $wait_status = count_status("post_status", "tbl_posts", "`post_status` = 'Chờ duyệt'");
        $save_status = count_status("post_status", "tbl_posts", "`post_status` = 'Lưu trữ'");

        $data = [
            'status_value' => set_status_post($status_value),
            'status_id' => $status_id,
            'crash_status' => $crash_status['total'],
            'on_status' => $on_status['total'],
            'wait_status' => $wait_status['total'],
            'save_status' => $save_status['total']
        ];

        echo json_encode($data);
        exit();
    }

    load("helper", "pagging_page");

    $crash_status = count_status("post_status", "tbl_posts", "`post_status` = 'Nháp'");
    $on_status = count_status("post_status", "tbl_posts", "`post_status` = 'Công khai'");
    $wait_status = count_status("post_status", "tbl_posts", "`post_status` = 'Chờ duyệt'");
    $save_status = count_status("post_status", "tbl_posts", "`post_status` = 'Lưu trữ'");
    $total_posts = get_total_list_posts();
    $total_posts_page = get_total_list_posts();
    $child_cat = get_child_cat();
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $info_per_page = 7;
    $start = ($page - 1) * $info_per_page;
    $base_url = "?mod=post&action=list_posts";
    $list_posts = get_list_posts($start, $info_per_page);
    $num_page = ceil($total_posts_page / $info_per_page);
    $pagging_page = get_pagging_page($num_page, $page, $base_url);

    // Sàng lọc bài viết 
    if (isset($_GET['btn-filter'])) {
        if (!empty($_GET['filter_status'])) {
            $filter_status = $_GET['filter_status'];
            $list_posts = get_list_posts_by_status($filter_status, $start, $info_per_page);
            $total_posts = get_total_posts_by_status($filter_status);
            $num_page = ceil($total_posts / $info_per_page);
            $base_url .= "&filter_status=$filter_status&btn-filter";
            $pagging_page = get_pagging_page($num_page, $page, $base_url);
        }
    }

    // Tìm kiếm bài viết
    if (isset($_GET['btn-search'])) {
        if (isset($_GET['search_post'])) {
            $search_post = $_GET['search_post'];
            $list_posts = get_list_posts_by_search($search_post, $start, $info_per_page);
            $total_posts = get_total_posts_by_search($search_post);
            $num_page = ceil($total_posts / $info_per_page);
            $base_url .= "&search_post=$search_post&btn-search";
            $pagging_page = get_pagging_page($num_page, $page, $base_url);
        }
    }

    $data = [
        'child_cat' => $child_cat,
        'list_posts' => $list_posts,
        'pagging_page' => $pagging_page,
        'start' => $start,
        'crash_status' => $crash_status,
        'on_status' => $on_status,
        'wait_status' => $wait_status,
        'save_status' => $save_status,
        'total_posts' => $total_posts,
        'total_posts_page' => $total_posts_page
    ];
    load_view('list_posts', $data);
}

// Thêm bài viết
function add_postAction()
{
    $user_info = get_user_info($_SESSION['user_login']['username']);
    $child_cat = get_child_cat();

    if (isset($_POST['btn-add-post'])) {
        load("helper", "check_post");

        $error = [];
        global $error, $conn;

        $post_main_images_id = isset($_POST['post_main_img_id']) ? $_POST['post_main_img_id'] : '';
        $main_img_post = $_FILES['main_img_post'];
        $post_name = $_POST['post_name'];
        $post_desc = $_POST['post_desc'];
        $post_slug = $_POST['post_slug'];
        $post_cat = $_POST['post_cat'];
        $post_details = $_POST['post_details'];
        $post_status = "Chờ duyệt";

        check_main_img($main_img_post);
        check_post_name($post_name);
        check_post_desc($post_desc);
        check_post_cat($post_cat);
        check_post_slug($post_slug);

        if (empty($error)) {
            if (check_post_availiable($post_name)) {
                $error['post_duplicate'] = "Bài viết đã tồn tại trên hệ thống";
                set_alert_failed("Thêm thất bại");
            } else {
                $post_slug = "bai-viet/". slugify($post_slug);
                $new_post = [
                    'post_name' => $post_name,
                    'post_desc' => $post_desc,
                    'post_slug' => $post_slug,
                    'post_status' => $post_status,
                    'post_details' => $post_details,
                    'user_id' => $user_info['user_id'],
                    'category_id' => $post_cat,
                    'created_at' => time(),
                ];
                insert_item("tbl_posts", $new_post);
                $post_id = mysqli_insert_id($conn);

                $new_object = ['object_id' => $post_id];
                update_item("tbl_media", $new_object, "`image_id` = '$post_main_images_id' AND `object_type` = 'post'");

                unset($_POST);

                set_alert_success("Thêm thành công");
                redirect_to("post", "index", "list_posts");
            }
        } else {
            set_alert_failed("Thêm thất bại");
        }
    }

    $data = ['child_cat' => $child_cat];
    load_view('add_post', $data);
}

// Xóa bài viết
function delete_postAction()
{
    $post_id = $_GET['post_id'];
    delete_item("tbl_posts", "`post_id` = '$post_id'");
    $images_of_post = get_list_images_of_post($post_id);
    foreach ($images_of_post as $item) {
        unlink($item['image_url']);
    }
    delete_item("tbl_media", "`object_id` = '$post_id' AND `object_type` = 'post'");
    set_alert_success("Xóa thành công");
    redirect_to("post", "index", "list_posts");
}

// Cập nhật thông tin bài viết
function update_postAction()
{
    $post_id = $_GET['post_id'];
    $post_info = get_post_info($post_id);
    $child_cat = get_child_cat();
    $main_img_post = get_main_img($post_id);
    $user_info = get_user_info($_SESSION['user_login']['username']);

    if (isset($_POST['btn-update'])) {
        load("helper", "check_post");
        $error = [];
        global $error, $conn;

        $new_main_img_id = isset($_POST['post_main_img_id']) ? $_POST['post_main_img_id'] : '';

        $post_name = $_POST['post_name'];
        $post_desc = $_POST['post_desc'];
        $post_slug = $_POST['post_slug'];
        $post_cat = $_POST['post_cat'];
        $post_details = $_POST['post_details'];
        $post_status = "Chờ duyệt";

        // check_main_img($main_img);

        check_post_name($post_name);
        check_post_desc($post_desc);
        check_post_cat($post_cat);
        check_post_slug($post_slug);

        if (empty($error)) {
            if ($post_info['post_slug'] == $_POST['post_slug']) {
                $post_slug = $post_slug;
            } else {
                $post_slug = "bai-viet/" . slugify($_POST['post_slug']);
            }
            $new_post_info = [
                'post_name' => $post_name,
                'post_desc' => $post_desc,
                'post_slug' => $post_slug,
                'post_status' => $post_status,
                'post_details' => $post_details,
                'user_id' => $user_info['user_id'],
                'category_id' => $post_cat,
                'updated_at' => time()
            ];
            update_item("tbl_posts", $new_post_info, "`post_id` = '$post_id'");


            // Thay đổi ảnh chính
            if ($new_main_img_id != $main_img_post['image_id']) {
                $old_main_img = get_old_main_img($post_id);
                $new_main_img = get_new_main_img($new_main_img_id);
                show_array($old_main_img);
                show_array($new_main_img);
                $update_info = [
                    'file_name' => $new_main_img['file_name'],
                    'file_size' => $new_main_img['file_size'],
                    'image_url' => $new_main_img['image_url'],
                    'user_id' => $user_info['user_id']
                ];
                update_item("tbl_media", $update_info, "`image_id` = '{$old_main_img['image_id']}' AND `object_type` = 'post'");
                unlink($old_main_img['image_url']);
                delete_item("tbl_media", "`image_id` = '{$new_main_img['image_id']}' AND `object_type` = 'post'");
            }
            set_alert_success("Cập nhật thành công");
            unset($_POST);
            redirect_to("post", "index", "list_posts");
        } else {
            set_alert_failed("Cập nhật thất bại");
        }
    }


    $data = [
        'post_info' => $post_info,
        'child_cat' => $child_cat,
        'main_img_post' => $main_img_post,
    ];
    load_view('update_post', $data);
}

// Upload ảnh ajax
function upload_postAction()
{
    $user_info = get_user_info($_SESSION['user_login']['username']);
    // THÊM ẢNH CHÍNH
    if (!empty($_FILES['post_main_img_data'])) {
        $post_main_img_data = $_FILES['post_main_img_data'];
        $file_name = $post_main_img_data['name'];
        $file_type = basename($post_main_img_data['type']);
        $file_size = $post_main_img_data['size'];
        $file_tmp = $post_main_img_data['tmp_name'];
        $base_name = pathinfo($post_main_img_data['name'], PATHINFO_FILENAME);

        $upload_dir = "../public/uploads/images/post/";
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
                'object_type' => "post",
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
    load("helper", "check_post");

    $post_name = isset($_POST['post_name']) ? $_POST['post_name'] : '';
    $post_desc = isset($_POST['post_desc']) ? $_POST['post_desc'] : '';
    $post_cat = isset($_POST['post_cat']) ? $_POST['post_cat'] : '';
    $post_slug = isset($_POST['post_slug']) ? $_POST['post_slug'] : '';
    global $error;
    $error = [];

    check_post_name($post_name);
    check_post_desc($post_desc);
    check_post_cat($post_cat);
    check_post_slug($post_slug);

    if (empty($error)) {
        $data = [
            'error' => NULL
        ];
    } else {
        $data = ['error' => $error];
    }

    echo json_encode($data);
}
