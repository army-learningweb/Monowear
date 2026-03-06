<?php

function construct()
{
    load_model('index');
}

function indexAction(){
    load_view('index');
}

// Đăng nhập
function loginAction()
{
    if (isset($_POST['btn-login'])) {
        global $error;
        $error = [];

        $username = $_POST['username'];
        $password = $_POST['password'];

        check_username($username);
        check_password($password);

        if (empty($error)) {
            $user_info = get_user_info($username);
            $password = md5($password);
            if (!check_user_login($username, $password)) {
                $error['user_not_exist'] = "Tài khoản không tồn tại trên hệ thống";
            } else {
                $_SESSION['user_login'] = [
                    'username' => $username,
                    'fullname' => $user_info['fullname'],
                    'user_role' => $user_info['user_role'],
                    'is_login' => true
                ];
                $time_login = ['login_at' => time()];
                update_time_login($username, $time_login);
                set_alert_success("Xin chào $username");
                redirect_to("dashboard", "index", "index");
                exit();
            }
        }else{
            set_alert_failed("Đăng nhập thất bại");
        }
    }
    load_view('login');
}

// Đăng xuất
function logoutAction()
{
    unset($_SESSION['user_login']);
    unset($_SESSION['alert_failed']);
    unset($_SESSION['alert_success']);
    redirect_to("user", "index", "login");
}

// Cập nhật thông tin admin
function update_admin_infoAction()
{
    $user_info = get_user_info($_SESSION['user_login']['username']);
    if (isset($_POST['btn-update'])) {
        global $error;
        $error = [];

        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $address = $_POST['address'];

        check_fullname($fullname);
        check_email($email);
        check_tel($tel);
        check_address($address);

        if (empty($error)) {
            $new_info = [
                'fullname' => $fullname,
                'email' => $email,
                'tel' => $tel,
                'address' => $address,
                'updated_at' => time()
            ];
            update_admin_info($user_info['username'], $new_info);
            set_alert_success("Cập nhật thành công");
        } else {
            set_alert_failed("Cập nhật thất bại");
        }
    }
    $data = [
        'user_info' => $user_info
    ];
    load_view('update_admin_info', $data);
}

// Thay đổi mật khẩu admin
function change_admin_passAction()
{
    $user_info = get_user_info($_SESSION['user_login']['username']);
    if (isset($_POST['btn-change-pass'])) {
        $error = [];
        global $error;

        $old_password = $_POST['old_password'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];

        check_old_pass($old_password);
        check_new_pass($new_password);
        check_confirm_pass($confirm_password, $new_password);

        if (empty($error)) {
            $old_password = md5($old_password);
            if ($old_password != $user_info['password_hash']) {
                $error['old_password'] = "Mật khẩu không chính xác";
                get_alert_failed("Thay đổi thất bại");
            } else {
                $new_info = [
                    'password_hash' => md5($confirm_password),
                    'updated_at' => time()
                ];
                update_admin_info($user_info['username'], $new_info);
                set_alert_success("Thay đổi thành công");
            }
        } else {
            set_alert_failed("Thay đổi thất bại");
        }
    }
    load_view('change_admin_pass');
}

// Danh sách users
function list_usersAction()
{
    load("helper", "pagging_page");
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $info_per_page = 7;
    $start = ($page - 1) * $info_per_page;

    $list_users = get_list_users($start, $info_per_page);
    $total_list_users = get_total_list_users();
    $num_page = ceil($total_list_users / $info_per_page);
    $pagging_page = get_pagging_page($num_page, $page, "?mod=user&action=list_users");

    $data = [
        'list_users' => $list_users,
        'total_list_users' => $total_list_users,
        'start' => $start,
        'pagging_page' => $pagging_page
    ];
    load_view('list_users', $data);
}

// Thêm users
function add_userAction()
{
    if (isset($_POST['btn-add'])) {
        $error = [];
        global $error;

        $username = $_POST['username'];
        $password = $_POST['password'];
        $user_role = $_POST['user_role'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $address = $_POST['address'];

        check_username($username);
        check_password($password);
        check_role($user_role);
        check_fullname($fullname);
        check_email($email);
        check_tel($tel);
        check_address($address);

        if (empty($error)) {
            if (check_user_info($username, $email)) {
                $error['user_duplicate'] = "Tài khoản đã tồn tại trên hệ thống";
                get_alert_failed("Thêm thất bại");
            } else {
                $new_user = [
                    'username' => $username,
                    'password_hash' => md5($password),
                    'user_role' => $user_role,
                    'fullname' => $fullname,
                    'email' => $email,
                    'tel' => $tel,
                    'address' => $address,
                    'created_at' => time(),
                ];
                insert_user($new_user);
                set_alert_success("Thêm thành công");
                redirect_to("user","index","list_users");
            }
        } else {
            set_alert_failed("Thêm thất bại");
        }
    }
    load_view('add_user');
}

// Xóa user
function delete_userAction()
{
    
    $id = $_GET['id'];
    delete_user($id);
    set_alert_success("Xóa thành công");
    redirect_to("user","index","list_users");
}

// Sửa thông tin user
function update_userAction()
{
    $id = $_GET['id'];
    $user_info = get_user_info_by_id($id);
    if (isset($_POST['btn-update'])) {
        $error = [];
        global $error;

        $username = $_POST['username'];
        $password = $_POST['password'];
        $user_role = $_POST['user_role'];
        $user_status = $_POST['user_status'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $address = $_POST['address'];

        check_username($username);
        check_password($password);
        check_role($user_role);
        check_status($user_status);
        check_fullname($fullname);
        check_email($email);
        check_tel($tel);
        check_address($address);

        if (empty($error)) {
            $new_info = [
                'username' => $username,
                'user_role' => $user_role,
                'status' => $user_status,
                'fullname' => $fullname,
                'email' => $email,
                'tel' => $tel,
                'address' => $address,
                'updated_at' => time()
            ];
            if ($password == $user_info['password_hash']) {
                $new_info['password_hash'] = $password;
            } else {
                $password = md5($password);
                $new_info['password_hash'] = $password;
            }
            update_user_by_id($id, $new_info);
            set_alert_success("Cập nhật thành công");
            redirect_to("user","index","list_users");
        } else {
            set_alert_failed("Cập nhật thất bại");
        }
    }
    $data = [
        'user_info' => $user_info
    ];
    load_view('update_user', $data);
}
