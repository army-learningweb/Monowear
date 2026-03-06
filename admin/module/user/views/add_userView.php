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
            <div class="title">Thêm người quản lí</div>
            <form action="" method="post" id="add-admin">
                <div class="input-group">
                    <label for="username">Tên đăng nhập</label>
                    <input type="text" name="username" id="username" value="<?php echo get_value('username') ?>">
                    <?php check_error('username') ?>
                    <div class="input-group">
                        <label for="password">Mật khẩu</label>
                        <input type="password" name="password" id="password" value="<?php echo get_value('password') ?>">
                    </div>
                    <?php check_error('password') ?>
                    <div class="input-group">
                        <label for="user_role"> Phân quyền quản lí</label>
                        <select name="user_role" id="">''
                            <option value="">- Phân quyền -</option>
                            <option value="Quản lí bài viết" <?php if (isset($_POST['user_role']) && $_POST['user_role'] == "Quản lí bài viết") echo "selected" ?>> Quản lí bài viết </option>
                            <option value="Quản lí trang" <?php if (isset($_POST['user_role']) && $_POST['user_role'] == "Quản lí trang") echo "selected" ?>> Quản lí trang </option>
                            <option value="Quản lí sản phẩm" <?php if (isset($_POST['user_role']) && $_POST['user_role'] == "Quản lí sản phẩm") echo "selected" ?>> Quản lí sản phẩm </option>
                            <option value="Quản lí giao diện" <?php if (isset($_POST['user_role']) && $_POST['user_role'] == "Quản lí giao diện") echo "selected" ?>> Quản lí giao diện </option>
                            <option value="Quản lí bán hàng" <?php if (isset($_POST['user_role']) && $_POST['user_role'] == "Quản lí bán hàng") echo "selected" ?>> Quản lí bán hàng </option>
                        </select>
                    </div>
                    <?php check_error('user_role') ?>
                    <div class="input-group">
                        <label for="fullname">Họ tên</label>
                        <input type="mail" name="fullname" id="fullname" value="<?php echo get_value('fullname') ?>">
                    </div>
                    <?php check_error('fullname') ?>
                    <div class="input-group">
                        <label for="email">Email</label>
                        <input type="mail" name="email" id="email" value="<?php echo get_value('email') ?>" placeholder="@gmail.com">
                    </div>
                    <?php check_error('email') ?>
                    <div class="input-group">
                        <label for="tel">Số điện thoại</label>
                        <input type="mail" name="tel" id="tel" value="<?php echo get_value('tel') ?>">
                    </div>
                    <?php check_error('tel') ?>
                    <div class="input-group">
                        <label for="address">Địa chỉ</label>
                        <textarea name="address"><?php echo get_value('address') ?></textarea>
                    </div>
                    <?php check_error('address') ?>
                    <?php check_error('user_duplicate') ?>
                    <div class="input-group">
                        <input type="submit" name="btn-add" value="Thêm mới">
                        <?php go_back("?mod=dashboard&action=index","Quay lại") ?>
                    </div>
            </form>
        </div>
    </div>
</div>
<?php get_footer() ?>