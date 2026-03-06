<?php
function construct()
{
    load_model('index');
}

// Danh sách Block
function list_blocksAction()
{
    load("helper", "pagging_page");
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $info_per_page = 5;
    $start = ($page - 1) * $info_per_page;
    $list_blocks = get_list_blocks($start, $info_per_page);
    $total_blocks = get_total_blocks();
    $num_page = ceil($total_blocks / $info_per_page);
    $pagging_page = get_pagging_page($num_page, $page, "?mod=template&action=list_blocks");
    $data = [
        'list_blocks' => $list_blocks,
        'start' => $start,
        'pagging_page' => $pagging_page,
        'total_blocks' => $total_blocks
    ];
    load_view("list_blocks", $data);
}

// Thêm khối
function add_blockAction()
{
    if (isset($_POST['btn-add'])) {
        $user_info = get_user_info($_SESSION['user_login']['username']);

        $block_name = $_POST['block_name'];
        $block_code = $_POST['block_code'];
        $block_content = $_POST['block_content'];

        global $error;
        $error = [];

        if (empty($block_name)) {
            $error['block_name'] = "Không để trống tên khối";
        }
        if (empty($block_code)) {
            $error['block_code'] = "Không để trống mã khối";
        }
        if (empty($block_content)) {
            $error['block_content'] = "Không để trống nội dung khối";
        }

        if (empty($error)) {
            if (check_block_duplicate($block_name)) {
                $error['block_duplicate'] = "Nội dung này đã tồn tại trên hệ thống";
            } else {
                $new_block = [
                    'block_name' => $block_name,
                    'block_code' => $block_code,
                    'block_content' => $block_content,
                    'user_id' => $user_info['user_id'],
                    'created_at' => time()
                ];
                insert_item("tbl_blocks", $new_block);
                set_alert_success('Thêm thành công');
                unset($_POST);
                redirect_to("template", "index", "list_blocks");
            }
        } else {
            set_alert_failed("Thêm thất bại");
        }
    }
    load_view("add_block");
}

// Xóa khối
function delete_blockAction()
{
    $block_id = $_GET['block_id'];
    delete_item("tbl_blocks", "`block_id` = '$block_id'");
    set_alert_success("Xóa thành công");
    redirect_to("template", "index", "list_blocks");
}

// Cập nhật khối
function update_blockAction()
{
    $block_id = $_GET['block_id'];
    $block_info = get_block_info($block_id);

    if (isset($_POST['btn-update'])) {
        $user_info = get_user_info($_SESSION['user_login']['username']);

        $block_name = $_POST['block_name'];
        $block_code = $_POST['block_code'];
        $block_content = $_POST['block_content'];

        global $error;
        $error = [];

        if (empty($block_name)) {
            $error['block_name'] = "Không để trống tên khối";
        }
        if (empty($block_code)) {
            $error['block_code'] = "Không để trống mã khối";
        }
        if (empty($block_content)) {
            $error['block_content'] = "Không để trống nội dung khối";
        }

        if (empty($error)) {
            $new_block = [
                'block_name' => $block_name,
                'block_code' => $block_code,
                'block_content' => $block_content,
                'user_id' => $user_info['user_id'],
                'updated_at' => time()
            ];
            update_item("tbl_blocks", $new_block, "`block_id` = '$block_id'");
            set_alert_success('Cập nhật thành công');
            unset($_POST);
            redirect_to("template", "index", "list_blocks");
        } else {
            set_alert_failed("Thêm thất bại");
        }
    }
    $data = ['block_info' => $block_info];
    load_view("update_block", $data);
}

// MENU
function menuAction()
{
    load("helper", "data_tree");

    if (isset($_POST['btn-add'])) {

        $menu_title = $_POST['menu_title'];
        $parent_id = isset($_POST['parent_cat']) ? (int)$_POST['parent_cat'] : 0;
        $object_id = NULL;
        $menu_order = $_POST['menu_order'];
        $menu_page = $_POST['menu_page'];

        // Lấy Slug của PAGE
        if (!empty($menu_page)) {
            $menu_type = "page";
            $object_id = $_POST['menu_page'];
            $page_slug = get_slug("page_slug","tbl_pages","page_id","$menu_page");
        }
        

        // Lấy Slug của danh mục sản phẩm
        $categories_product = isset($_POST['categories_product']) ? $_POST['categories_product'] : NULL;
        if (!empty($categories_product)) {
            $menu_type = "product";
            $object_id = $categories_product;
            $page_slug = get_slug("category_slug","tbl_product_categories","category_id","$object_id");
        }

        // Lấy Slug của danh mục bài viết
        $categories_post = isset($_POST['categories_post']) ? $_POST['categories_post'] : NULL;
        if (!empty($categories_post)) {
            $menu_type = "post";
            $object_id = $categories_post;
            $page_slug = get_slug("category_slug","tbl_post_categories","category_id","$object_id");
        }

        global $error;
        $error = [];

        if (empty($menu_title)) {
            $error['menu_title'] = 'Không để trống tên menu';
        } else {
            if (strlen($menu_title) < 2 || strlen($menu_title) > 50) {
                $error['menu_title'] = ' Ít nhất từ 2 đến 50 kí tự';
            } else {
                $pattern = "/^[\p{L}\s\p{N}\.,_:\-?]{2,50}$/u";
                if (!preg_match($pattern, $menu_title)) {
                    $error['menu_title'] = 'Chứa kí tự không hợp lệ !@#$%^&()';
                }
            }
        }
        if (empty($menu_order)) {
            $error['menu_order'] = "Chưa chọn thứ tự hiển chị";
        }

        if (empty($menu_page) && empty($categories_product) && empty($categories_post)){
            $error['menu_connect'] = 'Phải chọn một liên kết <br>( Trang hoặc Danh mục bài viết, sản phẩm )';
        }

        if (empty($error)) {
            if (check_menu_duplicate($menu_title)) {
                $error['menu_duplicate'] = "Menu đã tồn tại";
            } else {
                $new_menu = [
                    'menu_title' => $menu_title,
                    'menu_type' => $menu_type,
                    'object_id' => $object_id,
                    'parent_id' => $parent_id,
                    'menu_order' => $menu_order,
                    'menu_slug' => $page_slug,
                ];
                insert_item("tbl_menu", $new_menu);
                set_alert_success("Thêm thành công");
                unset($_POST);
            }
        } else {
            set_alert_failed("Thêm thất bại");
        }
    }

    $list_menu = get_list_menu();
    $list_menu = data_tree_menu($list_menu);
    $list_pages = get_pages();
    $list_prod_categories = get_product_categories();
    $list_post_categories = get_post_categories();
    $parent_cat = get_parent_cat();
    $data = [
        'list_pages' => $list_pages,
        'list_prod_categories' => $list_prod_categories,
        'list_post_categories' => $list_post_categories,
        'parent_cat' => $parent_cat,
        'list_menu' => $list_menu
    ];
    load_view("menu", $data);
}

// Xóa menu
function delete_menuAction()
{
    $menu_id = $_GET['menu_id'];
    echo $menu_id;
    delete_item("tbl_menu", "`menu_id` = '$menu_id' OR `parent_id` = '$menu_id'");
    set_alert_success("Xóa thành công");
    redirect_to("template", "index", "menu");
}

// Cập nhật lại menu
function update_menuAction()
{
    $menu_id = $_GET['menu_id'];
    $menu_info = get_menu_info($menu_id);

    if (isset($_POST['btn-update'])) {
        $menu_title = $_POST['menu_title'];
        $menu_order = $_POST['menu_order'];

        global $error;
        $error = [];
        if (empty($menu_title)) {
            $error['menu_title'] = 'Không để trống tên menu';
        } else {
            if (strlen($menu_title) < 2 || strlen($menu_title) > 50) {
                $error['menu_title'] = ' Ít nhất từ 2 đến 50 kí tự';
            } else {
                $pattern = "/^[\p{L}\s\p{N}\.,_:\-?]{2,50}$/u";
                if (!preg_match($pattern, $menu_title)) {
                    $error['menu_title'] = 'Chứa kí tự không hợp lệ !@#$%^&()';
                }
            }
        }
        if (empty($menu_order)) {
            $error['menu_order'] = "Chưa chọn thứ tự hiển chị";
        }

        if(empty($error)){
            $new_info = [
                'menu_title' => $menu_title,
                'menu_order' => $menu_order
            ];
            update_item("tbl_menu",$new_info,"`menu_id` = '$menu_id'");
            set_alert_success("Cập nhật thành công");
            redirect_to("template","index","menu");
        }else{
            set_alert_failed("Cập nhật thất bại");
        }
    }
    

    $data = [
        'menu_info' => $menu_info
    ];
    load_view('update_menu', $data);
}
