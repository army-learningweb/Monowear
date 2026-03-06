<?php
get_header();
get_alert_success();
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
                    <div class="title">Thêm Menu</div>
                    <div class="input-group">
                        <label for="menu_title">Tên Menu</label>
                        <input type="text" name="menu_title" id="" value="<?php echo get_value('menu_title') ?>">
                    </div>
                    <?php check_error('menu_title') ?>
                    <?php check_error('menu_duplicate') ?>
                    <div class="input-group">
                        <label for="menu_order">Thứ tự</label>
                        <input type="number" name="menu_order" id="" value="<?php echo get_value('menu_order') ?>">
                        <span class="caption">Thứ tự hiển thị</span>
                    </div>
                    <?php check_error('menu_order') ?>
                    <hr>
                    <div class="input-group">
                        <label for="menu_page">Trang</label>
                        <select name="menu_page" id="menu_page">
                            <option value="">- Chọn trang -</option>
                            <?php foreach ($list_pages as $page) { ?>
                                <option value="<?php echo $page['page_id'] ?>"> <?php echo $page['page_title'] ?> </option>
                            <?php } ?>
                        </select>
                        <span class="caption">Trang liên kết đến Menu</span>
                    </div>
                    <div class="input-group">
                        <label for="categories_product">Danh mục sản phẩm</label>
                        <select name="categories_product" id="categories_product">
                            <option value="">- Chọn danh mục -</option>
                            <?php foreach ($list_prod_categories as $cat) { ?>
                                <option value="<?php echo $cat['category_id'] ?>"> <?php echo $cat['category_name'] ?> </option>
                            <?php } ?>
                        </select>
                        <span class="caption">Danh mục sản phẩm liên kết đến Menu</span>
                    </div>
                    <div class="input-group">
                        <label for="categories_post">Danh mục bài viết</label>
                        <select name="categories_post" id="categories_post">
                            <option value="">- Chọn danh mục -</option>
                            <?php foreach ($list_post_categories as $cat) { ?>
                                <option value="<?php echo $cat['category_id'] ?>"> <?php echo $cat['category_name'] ?> </option>
                            <?php } ?>
                        </select>
                        <span class="caption">Danh mục bài viết liên kết đến Menu</span>
                    </div>
                    <?php check_error('menu_connect') ?>
                    <hr>
                    <div class="input-group">
                        <label for="parent_cat">Chọn danh mục cha ( Nếu là danh mục con )</label>
                        <select name="parent_cat" id="parent_cat">
                            <option value="">- Chọn danh mục -</option>
                            <?php foreach ($parent_cat as $cat) { ?>
                                <option value="<?php echo $cat['menu_id'] ?>"><?php echo $cat['menu_title'] ?></option>
                            <?php } ?>
                        </select>
                        <span class="caption">Chọn danh mục cha</span>
                    </div>
                    <div class="input-group">
                        <input type="submit" name="btn-add" value="Thêm mới">
                        <?php go_back("?mod=user&action=index", "Quay lại") ?>
                    </div>
                </div>
                <div class="right-area">
                    <div class="title">Menu</div>
                    <?php if (!empty($list_menu)) { ?>
                        <div class="table-responsive">
                            <table class="text-center">
                                <thead>
                                    <tr>
                                        <td>#</td>
                                        <td class="text-left">Tên</td>
                                        <td>Slug</td>
                                        <td>Thứ tự</td>
                                        <td colspan="2"></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $num = 1;
                                    foreach ($list_menu as $item) {
                                    ?>
                                        <tr>
                                            <td><?php echo $num++ ?></td>
                                            <td class="text-left"><?php echo str_repeat("--- ", $item['level']) . $item['menu_title'] ?></td>
                                            <td><?php echo $item['menu_slug'] ?></td>
                                            <td><?php echo $item['menu_order'] ?></td>
                                            <td>
                                                <a href="?mod=template&action=update_menu&menu_id=<?php echo $item['menu_id'] ?>">
                                                    <i class="fa-solid fa-gear"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="?mod=template&action=delete_menu&menu_id=<?php echo $item['menu_id'] ?>" onclick="return confirm('Bạn có chắc muốn xóa ?')">
                                                    <i class="fa-solid fa-circle-minus"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    <?php } else {
                        get_404("?mod=template&action=menu");
                    } ?>
                </div>
            </form>
        </div>
    </div>
</div>
<?php get_footer() ?>