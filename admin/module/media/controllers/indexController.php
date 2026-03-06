<?php

function construct()
{
    load_model('index');
}

function indexAction() {}

function list_mediaAction()
{
    load("helper", "images_type");
    load("helper", "pagging_page");
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $info_per_page = 4;
    $start = ($page - 1) * $info_per_page;
    $total_list_media = get_total_list_media();
    $num_page = ceil($total_list_media / $info_per_page);
    $list_media = get_list_media($start, $info_per_page);
    $base_url = "?mod=media&action=list_media";
    $pagging_page = get_pagging_page_media($num_page, $page, $base_url);

    // Sàng lọc theo loại
    if (isset($_GET['btn-filter'])) {
        if (!empty($_GET['filter_type'])) {
            $filter_type = $_GET['filter_type'];
            $list_media = get_list_media_by_type($filter_type, $start, $info_per_page);
            $total_list_media = get_total_media_by_type($filter_type);
            $num_page = ceil($total_list_media / $info_per_page);
            $base_url .= "&filter_type=$filter_type&btn-filter";
            $pagging_page = get_pagging_page_media($num_page, $page, $base_url);
        }
    }

    // Tìm kiếm theo từ khóa
    if (isset($_GET['btn-search'])) {
        if (!empty($_GET['search_img'])) {
            $search_img = $_GET['search_img'];
            $list_media = get_list_media_by_search($search_img, $start, $info_per_page);
            $total_list_media = get_total_media_by_search($search_img);
            $num_page = ceil($total_list_media / $info_per_page);
            $base_url .= "&search_img={$search_img}&btn-search";
            $pagging_page = get_pagging_page_media($num_page, $page, $base_url);
        }
    }

    $data = [
        'start' => $start,
        'list_media' => $list_media,
        'total_list_media' => $total_list_media,
        'pagging_page' => $pagging_page
    ];
    load_view('list_media', $data);
}

function update_imageAction()
{
    load("helper", "images_type");
    load("helper", "check_post");

    $image_id = $_GET['image_id'];
    $img_info = get_img_info($image_id);
    $user_info = get_user_info($_SESSION['user_login']['username']);
    $img_is_main = $img_info['is_main'];
    $folder_object = $img_info['object_type'];
    $file_path = "E:/laragon/www/UNITOP/back_end/php/project/monowear.com/public/uploads/images/$folder_object/";

    if (isset($_POST['update-img'])) {

        if (empty($_FILES['main_img_media']['name'])) {
            set_alert_success("Cập nhật thành công");
            redirect_to("media", "index", "list_media");
        } else {

            global $error;
            $error = [];

            $image = $_FILES['main_img_media'];
            $file_name = $image['name'];
            $type_allow = ['png', 'jpg', 'jpeg', 'avif'];
            $file_size = $image['size'];
            $file_tmp = $image['tmp_name'];
            $file_type = pathinfo($image['name'], PATHINFO_EXTENSION);
            $base_name = pathinfo($image['name'], PATHINFO_FILENAME);

            if (!in_array($file_type, $type_allow)) {
                $error['main_img'] = "File không đúng định dạng (PNG,JPG,PNG,AVIF)";
            } else if ($file_size > 5 * 1024 * 1024) {
                $error['main_img'] = "File quá kích thước cho phép";
            }

            if (empty($error)) {
                
                unlink($file_path.$img_info['file_name']);
                
                $upload_dir = "../public/uploads/images/$folder_object/";
                $upload_file = $upload_dir . $file_name;
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
                    'object_type' => $folder_object,
                    'is_main' => $img_is_main,
                    'user_id' => $user_info['user_id']
                ];
                update_item("tbl_media", $new_img, "`image_id` = '$image_id'");
                set_alert_success("Cập nhật thành công");
                redirect_to("media", "index", "list_media");
            }
        }
    }

    $data = [
        'img_info' => $img_info
    ];
    load_view('update_image', $data);
}
