<?php

get_alert_failed();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/import/fontawsome/css/all.css">
    <link rel="stylesheet" href="./public/css/global.css">
    <link rel="stylesheet" href="./public/css/form.css">
    <title>Login</title>
</head>

<body>
    <div id="wrapper">
        <form action="" method="post" id="form-login">
                <h2>Tài khoản quản lí</h2>
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
                <?php check_error('user_not_exist') ?>
                <div class="input-group">
                    <input type="submit" value="Đăng nhập" name="btn-login" class="btn-login">
                </div>        
        </form>
    </div>
    <script>
        localStorage.clear();
    </script>
</body>

</html>