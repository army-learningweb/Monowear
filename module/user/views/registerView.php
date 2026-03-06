<?php
get_alert_failed();
get_alert_success();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <base href="<?php echo base_url() ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/import/fontawsome/css/all.css">
    <link rel="stylesheet" href="./public/css/global.css">
    <link rel="stylesheet" href="./public/css/register.css">
    <link rel="stylesheet" href="./public/css/responsive_login.css">
    <title>Login</title>
</head>

<body>
    <div id="wrapper">
        <form action="" method="post" id="form-register">
            <div class="left-area">
                <h2><a href="?mod=user&action=login"><i class="fa-solid fa-circle-arrow-left"></i></a> Đăng ký thành viên</h2>
                <div class="input-group">
                    <input type="text" name="username" id="username" placeholder=" " value ="<?php echo get_value('username') ?>">
                    <label for="username">Tên đăng nhập</label>
                </div>
                <?php check_error('username') ?>
                <div class="input-group">
                    <input type="password" name="password" id="password" placeholder=" ">
                    <label for="password">Mật khẩu</label>
                </div>
                <?php check_error('password') ?>
                <div class="input-group">
                    <input type="text" name="fullname" id="fullname" placeholder=" " value ="<?php echo get_value('fullname') ?>">
                    <label for="fullname">Họ tên</label>
                </div>
                <?php check_error('fullname') ?>
                <div class="input-group">
                    <input type="text" name="email" id="email" placeholder=" " value ="<?php echo get_value('email') ?>">
                    <label for="email">Email</label>
                </div>
                <?php check_error('email') ?>
                <div class="input-group">
                    <input type="text" name="tel" id="tel" placeholder=" " value ="<?php echo get_value('email') ?>">
                    <label for="tel">Số điện thoại</label>
                </div>
                <?php check_error('tel') ?>
                <div class="input-group">
                    <input type="text" name="address" id="address" placeholder=" " value ="<?php echo get_value('address') ?>">
                    <label for="address">Địa chỉ</label>
                </div>
                <?php check_error('address') ?>
                <?php check_error('user') ?>
                <?php echo $str_success ?>
                <div class="input-group">
                    <input type="submit" value="Đăng ký" name="btn-register" class="btn-register" style="background: #2F46DA; color: white">
                </div>
            </div>
            <div class="right-area">
                <h2>Đặc quyền thành viên !</h2>
                <p>
                    • Ưu đãi độc quyền chỉ dành cho thành viên <br>
                    • Nhận thông báo sớm về các chương trình khuyến mãi<br>
                    • Tích điểm và đổi quà nhanh chóng <br>
                    • Ưu tiên hỗ trợ khi cần thiết <br>
                    • Theo dõi đơn hàng và lịch sử mua sắm tiện lợi <br>
                    • Cá nhân hóa trải nghiệm theo sở thích của bạn <br>
                </p>
                <p style="margin-top:15px">
                    Đừng bỏ lỡ — hãy tham gia ngay để tận hưởng những đặc quyền tốt nhất dành riêng cho bạn!
                </p>
                <a href="?mod=home&action=index" style="margin-top: 37px">Quay lại trang chủ</a>
            </div>
        </form>
    </div>
    <script>
        localStorage.clear();
    </script>
</body>

</html>