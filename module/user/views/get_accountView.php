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
    <link rel="stylesheet" href="./public/css/register.css">
    <link rel="stylesheet" href="./public/css/responsive_login.css">
    <title>Login</title>
</head>

<body>
    <div id="wrapper">
        <form action="" method="post" id="form-register">
            <div class="left-area">
                <h2><a href="?mod=user&action=login"><i class="fa-solid fa-circle-arrow-left"></i></a> Lấy lại mật khẩu </h2>
                <div class="input-group">
                    <input type="text" name="email" id="email" placeholder=" ">
                    <label for="email">Email</label>
                </div>
                <?php check_error('email') ?>
                <?php echo $str_success ?>
                <div class="input-group">
                    <input type="submit" value="Gửi" name="btn-get-account" class="btn-get-account">
                </div>
            </div>
            <div class="right-area">
                <h2>Lưu ý !</h2>
                <p>
                    • Sau khi gửi hãy kiểm trả Email của bạn, chúng tôi sẽ gửi cho bạn mã xác thực
                </p>
                <a href="?mod=home&action=index" style="margin-top: 20px">Quay lại trang chủ</a>
            </div>
        </form>
    </div>
    <script>
        localStorage.clear();
    </script>
</body>

</html>