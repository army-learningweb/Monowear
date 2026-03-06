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
            <div class="title">Thêm mới danh mục</div>
            <form action="" method="post" id="add-cat">
                <div class="input-group">
                    <label for="category_name">Tên danh mục</label>
                    <input type="text" name="category_name" id="category_name" value="<?php echo get_value('category_name') ?>">
                    <?php check_error('category_name') ?>
                    <div class="input-group">
                        <label for="category_desc">Mô tả ngắn</label>
                        <input type="category_desc" name="category_desc" id="category_desc" value="<?php echo get_value('category_desc') ?>">
                    </div>
                    <?php check_error('category_desc') ?>
                    <div class="input-group">
                        <label for="category_slug">URL (Friendly URL) </label>
                        <input type="mail" name="category_slug" id="category_slug" value="<?php echo get_value('category_slug') ?>">
                    </div>
                    <?php check_error('category_slug') ?>
                    <div class="input-group">
                        <label for="parent_cat">Chọn danh mục cha</label>
                        <select name="parent_cat" id="">
                            <option value="">- Chọn danh mục -</option>
                            <?php foreach($parent_cat as $cat) { ?>
                            <option value="<?php echo $cat['category_id'] ?>" <?php if(isset($_POST['parent_cat']) && $_POST['parent_cat'] == $cat['category_id']) echo "selected" ?>><?php echo $cat['category_name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <?php check_error('cat') ?>  
                    <?php check_error('category_duplicate') ?>  
                    <div class="input-group">
                        <input type="submit" name="btn-add" value="Thêm mới">
                        <?php go_back("?mod=dashboard&action=index","Quay lại") ?>
                    </div>
            </form>
        </div>
    </div>
</div>
<?php get_footer() ?>