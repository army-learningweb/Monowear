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

            <form action="" method="post" id="add-menu">
                <div class="left-area">
                    <div class="title">Cập nhật Menu</div>
                    <div class="input-group">
                        <label for="menu_title">Tên Menu</label>
                        <input type="text" name="menu_title" id="" value="<?php echo $menu_info['menu_title'] ?>">
                    </div>
                    <?php check_error('menu_title') ?>
                    <?php check_error('menu_duplicate') ?>
                    <div class="input-group">
                        <label for="menu_order">Thứ tự</label>
                        <input type="number" name="menu_order" id="" value="<?php echo $menu_info['menu_order'] ?>">
                        <span class="caption">Thứ tự hiển thị</span>
                    </div>
                    <?php check_error('menu_order') ?>
                    <div class="input-group">
                        <input type="submit" name="btn-update" value="Cập nhật">
                        <?php go_back("?mod=template&action=menu", "Quay lại") ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php get_footer() ?>