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
            <div class="title">Cập nhật thông tin (<?php echo $user_info['fullname'] ?>)</div>
            <form action="" method="post" id="update-user">
                <div class="input-group">
                    <label for="username">Tên đăng nhập</label>
                    <input type="text" name="username" id="username" value="<?php echo $user_info['username'] ?>" style="background: rgb(232, 95, 95);" readonly>
                </div>
                <?php check_error('username') ?>
                <div class="input-group">
                    <label for="password">Mật khẩu</label>
                    <input type="password" name="password" id="password" value="<?php echo $user_info['password_hash'] ?>">
                </div>
                <?php check_error('password') ?>
                <div class="input-group">
                    <label for="user_role"> Phân quyền quản lí</label>
                    <select name="user_role" id="">''
                        <option value="">- Phân quyền -</option>
                        <option value="Quản lí bài viết" <?php if ($user_info['user_role'] == "Quản lí bài viết") echo "selected" ?>> Quản lí bài viết </option>
                        <option value="Quản lí trang" <?php if ($user_info['user_role'] == "Quản lí trang") echo "selected" ?>> Quản lí trang </option>
                        <option value="Quản lí sản phẩm" <?php if ($user_info['user_role'] == "Quản lí sản phẩm") echo "selected" ?>> Quản lí sản phẩm </option>
                        <option value="Quản lí giao diện" <?php if ($user_info['user_role'] == "Quản lí giao diện") echo "selected" ?>> Quản lí giao diện </option>
                        <option value="Quản lí bán hàng" <?php if ($user_info['user_role'] == "Quản lí bán hàng") echo "selected" ?>> Quản lí bán hàng </option>
                    </select>
                </div>
                <?php check_error('user_role') ?>
                <div class="input-group">
                    <label for="user_status">Trạng thái</label>
                    <select name="user_status" id="">''
                        <option value="">- Trạng thái -</option>
                        <option value="active" <?php if ($user_info['status'] == "active") echo "selected" ?>>Đã kích hoạt</option>
                        <option value="inactive" <?php if ($user_info['status'] == "inactive") echo "selected" ?>>Chưa kích hoạt</option>
                        <option value="banned" <?php if ($user_info['status'] == "banned") echo "selected" ?>>Đình chỉ</option>
                    </select>
                </div>
                <?php check_error('status') ?>
                <div class="input-group">
                    <label for="fullname">Họ tên</label>
                    <input type="mail" name="fullname" id="fullname" value="<?php echo $user_info['fullname'] ?>">
                </div>
                <?php check_error('fullname') ?>
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="mail" name="email" id="email" value="<?php echo $user_info['email'] ?>" placeholder="@gmail.com">
                </div>
                <?php check_error('email') ?>
                <div class="input-group">
                    <label for="tel">Số điện thoại</label>
                    <input type="mail" name="tel" id="tel" value="<?php echo $user_info['tel'] ?>">
                </div>
                <?php check_error('tel') ?>
                <div class="input-group">
                    <label for="tel">Địa chỉ</label>
                    <textarea name="address"><?php echo $user_info['address'] ?></textarea>
                </div>
                <?php check_error('address') ?>
                <?php check_error('user_duplicate') ?>
                <div class="input-group">
                    <input type="submit" name="btn-update" value="Cập nhật thông tin">
                    <?php go_back("?mod=user&action=list_users", "Quay lại") ?>
                </div>
            </form>
        </div>
    </div>
</div>
<?php get_footer() ?>