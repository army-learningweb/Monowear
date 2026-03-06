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
            <div class="title">Thay đổi mật khẩu</div>
            <form action="" method="post" id="change-admin-pass">
                <div class="input-group">
                    <label for="old_password">Mật khẩu cũ</label>
                    <input type="password" name="old_password" id="old_password">
                </div>
                <?php check_error('old_password') ?>
                <div class="input-group">
                    <label for="new-password">Mật khẩu mới</label>
                    <input type="password" name="new_password" id="old_password">
                </div>
                <?php check_error('new_password') ?>
                <div class="input-group">
                    <label for="confirm-password">Xác nhận lại mật khẩu</label>
                    <input type="password" name="confirm_password" id="confirm_password">
                </div>
                <?php check_error('confirm_password') ?>
                <div class="input-group">
                    <input type="submit" name="btn-change-pass" value="Thay đổi mật khẩu">
                     <?php go_back("?mod=dashboard&action=index","Quay lại") ?>
                </div>
            </form>  
        </div>
    </div>
</div>
<?php get_footer() ?>