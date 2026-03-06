<?php

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
    <title>Login</title>
</head>

<body>
    <div id="wrapper">
        <div class="active-complete">
            <?php if(!empty($error)){
                echo $error['active'];
            }else{
                echo "<h2>Chúc mừng bạn đã kích hoạt thành công !</h2>";
            } ?>
            <a href="?mod=user&action=login">Đi đến đăng nhập.... <i class="fa-solid fa-circle-arrow-right"></i></a>
        </div>
    </div>
    <script>
        localStorage.clear();
    </script>
</body>

</html>