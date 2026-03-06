<?php
get_header();
get_alert_failed();
?>
<div id="wp-content">
    <div id="sidebar">
        <?php get_sidebar() ?>
    </div>
    <div id="content">
        <div id="top-bar">
            <?php get_topbar() ?>
        </div>
        <div id="data-show">
            <div class="title">Thông tin khách hàng / Tài khoản</div>
            <form action="" method="post" id="update-admin-info">
                <div class="input-group">
                    <label for="username">Tên đăng nhập</label>
                    <input type="text" name="username" id="username" value="<?php echo $customer_info['username'];?>" 
                    placeholder="<?php if(empty($customer_info['username'])){
                                            echo "Chưa có ( Đây là khách mua hàng )";
                                        }
                                    ?>">
                </div>
                <?php check_error('username') ?>
                <div class="input-group">
                    <label for="password">Mật khẩu</label>
                    <input type="password" name="password" id="password" value="<?php echo $customer_info['password'];?>" 
                    placeholder="<?php if(empty($customer_info['password'])){
                                            echo "Chưa có ( Đây là khách mua hàng )";
                                        }
                                    ?>">
                </div>
                <?php check_error('password') ?>
                <div class="input-group">
                    <label for="fullname">Họ tên</label>
                    <input type="text" name="fullname" id="fullname" value="<?php echo $customer_info['fullname'] ?>">
                </div>
                <?php check_error('fullname') ?>
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="mail" name="email" id="email" value="<?php echo $customer_info['email'] ?>">
                </div>
                <?php check_error('email') ?>
                <div class="input-group">
                    <label for="tel">Số điện thoại</label>
                    <input type="mail" name="tel" id="tel" value="<?php echo $customer_info['tel'] ?>">
                </div>
                <?php check_error('tel') ?>
                <div class="input-group">
                    <label for="tel">Địa chỉ</label>
                    <textarea name="address" id="address"><?php echo $customer_info['address'] ?></textarea>
                </div>
                <?php check_error('address') ?>
                <div class="input-group">
                    <input type="submit" name="btn-update" value="Cập nhật">
                    <?php go_back("?mod=sales&action=list_customers", "Quay lại") ?>
                </div>
            </form>

        </div>
    </div>
</div>
<?php get_footer() ?>