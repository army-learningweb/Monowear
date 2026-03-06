<?php
function check_error($feild)
{
    global $error;
    if (isset($error[$feild])) echo "<p style='color:red; font-size:13px; margin: 6px 0' class='error_php'> <i class='fa-solid fa-circle-exclamation'></i> $error[$feild] </p>";
}

function get_value($field)
{
    return isset($_POST[$field]) ? htmlspecialchars($_POST[$field]) : '';
}

function check_username($username)
{
    global $error;
    if (empty($username)) {
        $error['username'] = 'Không để trống tên đăng nhập';
    } else {
        if (strlen($username) < 6 || strlen($username) > 32) {
            $error['username'] = 'Ít nhất từ 6 đến 32 kí tự';
        } else {
            $pattern = "/^[a-zA-Z0-9-_]{6,32}$/";
            if (!preg_match($pattern, $username)) {
                $error['username'] = 'Kí tự không hợp lệ !@#$%^&*()';
            }
        }
    }
}

function check_password($password)
{
    global $error;
    if (empty($password)) {
        $error['password'] = 'Không để trống mật khẩu';
    } else {
        if (strlen($password) < 6 || strlen($password) > 32) {
            $error['password'] = 'Ít nhất từ 6 đến 32 kí tự';
        } else {
            $pattern = "/^[a-zA-Z0-9!@#$%^&*_-]{6,32}$/";
            if (!preg_match($pattern, $password)) {
                $error['password'] = 'Kí tự không hợp lệ ()';
            }
        }
    }
}

function check_old_pass($old_pass)
{
    global $error;
    if (empty($old_pass)) {
        $error['old_password'] = 'Không để trống mật khẩu';
    } else {
        if (strlen($old_pass) < 6 || strlen($old_pass) > 32) {
            $error['old_password'] = 'Ít nhất từ 6 đến 32 kí tự';
        } else {
            $pattern = "/^[a-zA-Z0-9!@#$%^&*_-]{6,32}$/";
            if (!preg_match($pattern, $old_pass)) {
                $error['old_password'] = 'Kí tự không hợp lệ ()';
            }
        }
    }
}

function check_new_pass($new_pass)
{
    global $error;
    if (empty($new_pass)) {
        $error['new_password'] = 'Không để trống mật khẩu';
    } else {
        if (strlen($new_pass) < 6 || strlen($new_pass) > 32) {
            $error['new_password'] = 'Ít nhất từ 6 đến 32 kí tự';
        } else {
            $pattern = "/^[a-zA-Z0-9!@#$%^&*_-]{6,32}$/";
            if (!preg_match($pattern, $new_pass)) {
                $error['new_password'] = 'Kí tự không hợp lệ ()';
            }
        }
    }
}

function check_confirm_pass($confirm_pass, $password)
{
    global $error;
    if (empty($confirm_pass)) {
        $error['confirm_password'] = 'Không được để trống';
    } else {
        if (strlen($confirm_pass) < 6 || strlen($confirm_pass) > 32) {
            $error['confirm_password'] = 'Ít nhất từ 6 đến 32 kí tự';
        } else {
            $pattern = "/^[a-zA-Z0-9!@#$%^&*_-]{6,32}$/";
            if (!preg_match($pattern, $confirm_pass)) {
                $error['confirm_password'] = 'Chứa kí tự không hợp lệ ()';
            } else {
                if ($confirm_pass != $password) {
                    $error['confirm_password'] = "Xác nhận lại mật khẩu không trùng khớp";
                }
            }
        }
    }
}

function check_fullname($fullname)
{
    global $error;
    if (empty($fullname)) {
        $error['fullname'] = 'Không để trống tên';
    } else {
        if (strlen($fullname) <=1 || strlen($fullname) > 50) {
            $error['fullname'] = 'Ít nhất từ 2 đến 50 kí tự';
        } else {
            $pattern = "/^[\p{L}\s]{2,50}$/u";
            if (!preg_match($pattern, $fullname)) {
                $error['fullname'] = 'Chứa kí tự không hợp lệ !@#$%^&*()';
            }
        }
    }
}


function check_email($email)
{
    global $error;
    if (empty($email)) {
        $error['email'] = 'Không để trống email';
    } else {
        $pattern = "/^[a-zA-Z0-9._]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
        if (!preg_match($pattern, $email)) {
            $error['email'] = 'Email không hợp lệ';
        }
    }
}

function check_tel($tel)
{
    global $error;
    if (empty($tel)) {
        $error['tel'] = 'Không để trống số điện thoại';
    } else {
        if (strlen($tel) < 8 || strlen($tel) > 10) {
            $error['tel'] = 'Số điện thoại từ 8 đến 10 số';
        } else {
            $pattern = "/^[0-9]{1,13}$/";
            if (!preg_match($pattern, $tel)) {
                $error['tel'] = 'Số điện thoại phải là số';
            }
        }
    }
}

function check_address($address)
{
    global $error;
    if (empty($address)) {
        $error['address'] = 'Không để trống địa chỉ';
    } else {
        if (strlen($address) < 6 || strlen($address) > 300) {
            $error['address'] = 'Từ 6 đến 300 kí tự';
        } else {
            $pattern = "/^[\p{L}\s.-_,]{6,300}$/u";
            if (!preg_match($pattern, $address)) {
                $error['address'] = 'Chứa kí tự không hợp lệ';
            }
        }
    }
}

function check_gender($gender)
{
    global $error;
    if (empty($gender)) {
        $error['gender'] = 'Chưa chọn giới tính';
    }
}

function check_category_name($category_name)
{
    global $error;
    if (empty($category_name)) {
        $error['category_name'] = 'Không để trống tên danh mục';
    } else {
        if (strlen($category_name) < 1 || strlen($category_name) > 50) {
            $error['category_name'] = 'Ít nhất từ 1 đến 50 kí tự';
        } else {
            $pattern = "/^([\p{Lu}]{1})([\p{L}\s,.-_]{1,29})$/u";
            if (!preg_match($pattern, $category_name)) {
                $error['category_name'] = 'Chữ cái đầu phải viết hoa hoặc có chứa kí tự không hợp lệ';
            }
        }
    }
}

function check_category_desc($category_desc)
{
    global $error;
    if (empty($category_desc)) {
        $error['category_desc'] = 'Không để trống mô tả';
    } else {
        if (strlen($category_desc) < 1 || strlen($category_desc) > 50) {
            $error['category_desc'] = 'Ít nhất từ 1 đến 50 kí tự';
        } else {
            $pattern = "/^([\p{Lu}]{1})([\p{L}\s,.-_]{1,29})$/u";
            if (!preg_match($pattern, $category_desc)) {
                $error['category_desc'] = 'Chữ cái đầu phải viết hoa hoặc có chứa kí tự không hợp lệ';
            }
        }
    }
}


function check_role($user_role)
{
    global $error;
    if (empty($user_role)) {
        $error['user_role'] = "Chưa phân quyền quản lí";
    }
}

function check_status($status){
    global $error;
    if(empty($status)){
        $error['status'] = "Chưa chọn trạng thái";
    }
}

function check_cat($cat){
    global $error;
    if(empty($cat)){
        $error['cat'] = "Chưa chọn danh mục";
    }
}