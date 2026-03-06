<?php 
get_header();
get_alert_success();
get_alert_failed(); 
?>
<script> localStorage.clear() </script>
<div id="wp-content">
    <div id="sidebar">
        <?php get_sidebar() ?>
    </div>
    <div id="content">
        <div id="top-bar">
            <?php get_topbar() ?>
        </div>
        <div id="data-show">
            <div class="title">Thông tin tài khoản</div>
            <form action="" method="post" id="update-admin-info">     
                <div class="input-group">
                    <label for="username">Tên đăng nhập</label>
                    <input type="text" name="username" id="username" readonly="readonly" style="background: #ff7979;cursor:not-allowed"
                        value="<?php echo $user_info['username'] ?>">
                </div>
                <div class="input-group">
                    <label for="fullname">Họ tên</label>
                    <input type="text" name="fullname" id="fullname" value="<?php echo $user_info['fullname'] ?>">
                </div>
                <?php check_error('fullname') ?>
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="mail" name="email" id="email" value="<?php echo $user_info['email'] ?>">
                </div>
                <?php check_error('email') ?>
                <div class="input-group">
                    <label for="tel">Số điện thoại</label>
                    <input type="mail" name="tel" id="tel" value="<?php echo $user_info['tel'] ?>">
                </div>
                <?php check_error('tel') ?>
                <div class="input-group">
                    <label for="tel">Địa chỉ</label>
                    <textarea name="address" id="address"><?php echo $user_info['address'] ?></textarea>
                </div>
                <?php check_error('address') ?>
                <div class="input-group">
                    <input type="submit" name="btn-update" value="Cập nhật">
                    <?php go_back("?mod=dashboard&action=index","Quay lại") ?>
                </div>
            </form>
            
        </div>
    </div>
</div>
<?php get_footer() ?>