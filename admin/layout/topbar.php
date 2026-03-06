<?php
$notification_order = count_list_order_pending(); 
$list_order_pending = get_list_order_pending();
?>
<div class="brand">
    <a href="?mod=dashboard&action=index"><span>MONO</span>WARE</a>
</div>
<button class="toggle-bar"><i class="fa-solid fa-bars"></i></button>
<div class="box">
    <span class="notification">
        <i class="fa-solid fa-bell"></i>
        <div class="noti-badge"><?php echo $notification_order ?></div>
        <div class="noti-info">
            <?php if(!empty($list_order_pending)) { ?>
            <?php foreach ($list_order_pending as $item) { ?>
                <span>
                    Ngày : <?php echo set_date($item['created_at']) ?><br>
                    Đơn hàng <b><?php echo $item['order_code'] ?></b> chưa được xử lí
                </span>
            <?php } ?>
            <?php }else{
                echo " <p style='text-align:center'> Chưa có thông báo nào </p>";
            } ?>
        </div>
    </span>
    <div class="admin-profile">
        <div class="admin-name">
            <span class="name"><?php echo $_SESSION['user_login']['fullname'] ?></span>
            <div class="admin-role"><?php echo $_SESSION['user_login']['user_role'] ?></div>
        </div>
        <div class="admin-avatar"><img src="./public/images/R.jpeg" alt=""></div>
        <ul class="admin-setting">
            <li>
                <a href="?mod=user&action=update_admin_info">
                    <span>Thông tin tài khoản</span>
                    <span><i class="fa-solid fa-address-card"></i></span>
                </a>
            </li>
            <li>
                <a href="?mod=user&action=change_admin_pass">
                    <span>Thay đổi mật khẩu</span>
                    <span><i class="fa-solid fa-key"></i></span>
                </a>
            </li>
            <li>
                <a href="?mod=user&action=logout">
                    <span>Đăng xuất</span>
                    <span><i class="fa-solid fa-arrow-right-from-bracket"></i></span>
                </a>
            </li>
        </ul>
    </div>
</div>