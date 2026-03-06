<?php
get_alert_failed();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <base href="<?php echo base_url() ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/import/fontawsome/css/all.css">
    <link rel="stylesheet" href="./public/css/global.css">
    <link rel="stylesheet" href="./public/css/form.css">
    <link rel="stylesheet" href="./public/css/responsive_login.css">
    <title>Login</title>
</head>

<body>
    <div id="wrapper">
        <form action="" method="post" id="form-login">
            <div class="left-area" style="text-align: left">
                <h2> Thay đổi mật khẩu</h2>
                <div class="input-group">
                    <input type="password" name="password" id="password" placeholder=" ">
                    <label for="password">Mật khẩu mới</label>
                </div>
                <?php check_error('password') ?>
                <div class="input-group">
                    <input type="password" name="confirm-password" id="confirm-password" placeholder=" ">
                    <label for="confirm-password">Xác nhận lại mật khẩu</label>
                </div>
                <?php check_error('confirm_password') ?>
                <div class="input-group">
                    <input type="submit" value="Thay đổi" name="btn-repass" style="background: #2F46DA; color: white">
                </div>
            </div>
            <div class="right-area">
                <h2>Lưu ý !</h2>
                <p>
                    Để tránh lộ thông tin tài khoản, vui lòng không cung cấp cho bất kì ai mật khẩu này
                </p>
                <a href="?mod=user&action=login">Quay lại đăng nhập</a>
            </div>
        </form>
    </div>
    <script>
        localStorage.clear();
    </script>
</body>

</html>