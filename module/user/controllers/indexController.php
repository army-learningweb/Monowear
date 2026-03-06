<?php
function construct()
{
    load_model('index');
}

// Thành viên đăng nhập
function loginAction()
{
    if (isset($_POST['btn-login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        global $error;
        $error = [];

        check_username($username);
        check_password($password);

        if (empty($error)) {
            if (!check_customer_login($username, md5($password))) {
                $error['customer_not_exist'] = 'Tài khoản không tồn tại !';
            } else {
                $_SESSION['customer'] = [
                    'username' => $username,
                    'is_login' => true
                ];
                set_alert_success("Mừng bạn trở lại !");
                slug_redirect("trang-chu");
                exit();
            }
        } else {
            set_alert_failed("Đăng nhập thất bại");
        }
    }
    load_view('login');
}

// Đăng xuất
function logoutAction(){
    unset($_SESSION['customer']);
    redirect_to("user","index","login");
}

// Đăng kí tài khoản
function registerAction()
{

    if (isset($_POST['btn-register'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $address = $_POST['address'];

        global $error;
        $error = [];

        check_username($username);
        check_password($password);
        check_fullname($fullname);
        check_email($email);
        check_tel($tel);
        check_address($address);

        if (empty($error)) {
            if (check_user_exits($username, $email)) {
                $error['user'] = 'Tài khoản đã tồn tại !';
            } else {
                $active_token = md5($username . time());
                $new_member = [
                    'username' => $username,
                    'password' => md5($password),
                    'fullname' => $fullname,
                    'email' => $email,
                    'tel' => $tel,
                    'address' => $address,
                    'created_at' => time(),
                    'active_token' => $active_token
                ];
                insert_item("tbl_customers", $new_member);

                $link_active = base_url("?mod=user&action=active&active_token=$active_token");
                $content = " Nhấp vào đây để kích hoạt tài khoản của bạn 
                <a href='$link_active'> $link_active </a>
                <p>Nếu không phải là bạn, vui lòng bỏ qua tin nhắn này</p>";
                send_mail($email, "Kích hoạt tài khoản thành viên MONOWEAR", $content);
                set_alert_success("Đăng ký thành công");
                $str_success = "<span class='success'> Bạn vui lòng kiểm tra Email để xác thực tài khoản </span>";
            }
        } else {
            set_alert_failed("Đăng ký thất bại");
        }
    }

    $data = [
        'str_success' => isset($str_success) ? $str_success : ''
    ];
    load_view('register', $data);
}

// Kích hoạt tài khoản
function activeAction()
{
    $active_token = $_GET['active_token'];
    global $error;
    $error = [];

    if (check_alredy_active($active_token)) {
        $error['active'] = "<h2 style='color:yellow'> Tài khoản của bạn đã được kích hoạt trước đó !</h2>";
    }

    if (check_token($active_token)) {
        $update_info = [
            'updated_at' => time(),
            'is_active' => 1,
            'is_member' => 1
        ];
        update_item("tbl_customers", $update_info, "`active_token` = '$active_token'");
    } else {
        $error['active'] = "<h2 style='color:red'> Kích hoạt thất bại vui lòng kiểm tra lại Email để lấy mã xác nhận </h2>";
    }

    $data = [
        'error' => $error
    ];

    load_view('active', $data);
}

// Lấy lại mật khẩu
function get_accountAction()
{
    if (isset($_POST['btn-get-account'])) {
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        global $error;
        $error = [];
        check_email($email);
        if (empty($error)) {
            $repass_token = md5($email . time());
            $add_token = [
                'repass_token' => $repass_token
            ];
            update_item("tbl_customers", $add_token, "`email` = '$email'");
            $link_active = base_url("?mod=user&action=repass&repass_token=$repass_token");
            $content = " Nhấp vào đây để thay đổi lại mật khẩu
            <a href='$link_active'> $link_active </a>
            <p>Nếu không phải là bạn, vui lòng bỏ qua tin nhắn này</p>";
            send_mail($email, "Lấy lại mật khẩu MONOWEAR", $content);
            set_alert_success("Gửi thành công");
            $str_success = "<span class='success'> Bạn vui lòng kiểm tra Email để xác thực</span>";
        } else {
            set_alert_failed("Gửi thất bại");
        }
    }
    $data = [
        'str_success' => isset($str_success) ? $str_success : ''
    ];
    load_view('get_account', $data);
}

// Đổi mật khẩu
function repassAction()
{
    $repass_token = $_GET['repass_token'];

    if (isset($_POST['btn-repass'])) {
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm-password'];

        global $error;
        $error = [];

        check_password($password);
        check_confirm_pass($confirm_password, $password);

        if (empty($error)) {
            $new_pass = [
                'password' => md5($password),
                'updated_at' => time()
            ];
            update_item("tbl_customers", $new_pass, "`repass_token` = '$repass_token'");
            redirect_to("user", "index", "login");
        } else {
            set_alert_failed("Thay đổi thất bại");
        }
    }
    load_view("repass");
}

// Thông tin thành viên
function member_infoAction(){
    load("helper","status");
    load("helper","date");

    $member_info = get_member_info($_SESSION['customer']['username']);
    $member_order = get_member_order($member_info['customer_id']);

     if(isset($_POST['btn-update'])){
        $fullname = $_POST['fullname'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $address = $_POST['address'];

        global $error;
        $error = [];

        check_fullname($fullname);
        check_tel($tel);
        check_email($email);
        check_address($address);

        if(empty($error)){
            $new_info = [
                'fullname' => $fullname,
                'tel' => $tel,
                'email' => $email,
                'address' => $address
            ];
            update_item("tbl_customers",$new_info,"`customer_id` = '{$member_info['customer_id']}'");
            set_alert_success("Thay đổi thành công");
        }else{
            set_alert_failed("Thay đổi thất bại");
        }
    }

    $path_img_prod = "./public/uploads/images/product/";
    $data = [
        'member_info' => $member_info,
        'member_order' => $member_order,
        'path_img_prod' => $path_img_prod,
    ];
    load_view('member_info',$data);
}

// Thành viên cập nhật thông tin
function update_infoAction(){
   
}
