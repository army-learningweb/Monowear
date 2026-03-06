<?php
get_alert_success(); 
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
            <div class="left-area">
                <h2>Đăng nhập</h2>
                <div class="input-group">
                    <input type="text" name="username" id="username" placeholder=" " value="<?php echo get_value('username') ?>">
                    <label for="username">Tên đăng nhập</label>
                </div>
                <?php check_error('username') ?>
                <div class="input-group">
                    <input type="password" name="password" id="password" placeholder=" ">
                    <label for="password">Mật khẩu</label>
                </div>
                <?php check_error('password') ?>
                <?php check_error('customer_not_exist') ?>
                <div class="input-group">
                    <input type="submit" value="Đăng nhập" name="btn-login" class="btn-login">
                </div>
                <a href="quen-mat-khau">Quên mật khẩu ?</a>
                <span>Chưa có tài khoản ? <a href="dang-ky">Đăng ký</a> </span>
            </div>
            <div class="right-area">
                <h2>Mừng bạn trở lại !</h2>
                <p>
                    Cảm ơn bạn đã tiếp tục đồng hành cùng chúng tôi.
                    Hãy khám phá thêm nhiều sản phẩm, ưu đãi và tiện ích dành riêng cho tài khoản của bạn.
                    Chúc bạn có trải nghiệm mua sắm thật thoải mái và hài lòng!
                </p>
                <a href="trang-chu">Quay lại trang chủ</a>
            </div>
        </form>
    </div>
    <script>
        localStorage.clear();
    </script>
</body>

</html>