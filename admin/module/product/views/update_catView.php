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
            <div class="title">Cập nhật danh mục</div>
            <form action="" method="post" id="add-admin">
                <div class="input-group">
                    <label for="category_name">Tên danh mục</label>
                    <input type="text" name="category_name" id="category_name" value="<?php echo $cat_info['category_name'] ?>">
                    <?php check_error('category_name') ?>
                    <div class="input-group">
                        <label for="category_desc">Mô tả ngắn</label>
                        <input type="category_desc" name="category_desc" id="category_desc" value="<?php echo $cat_info['category_desc'] ?>">
                    </div>
                    <?php check_error('category_desc') ?>
                    <div class="input-group">
                        <label for="category_slug">URL (Friendly URL) </label>
                        <input type="mail" name="category_slug" id="category_slug" value="<?php echo $cat_info['category_slug'] ?>">
                    </div>
                    <?php check_error('category_slug') ?>
                    <?php if(!$cat_info['parent_id'] == 0) { ?>
                        <div class="input-group">
                            <label for="parent_cat">Chọn danh mục cha</label>
                            <select name="parent_cat" id="">
                                <option value="">- Chọn danh mục -</option>
                                <?php foreach($parent_cat as $cat) { ?>
                                    <option value="<?php echo $cat['category_id'] ?>" <?php if($cat_info['parent_id'] == $cat['category_id']) echo "selected" ?>>
                                        <?php echo $cat['category_name'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    <?php } ?>
                    <?php check_error('cat') ?>
                    <?php check_error('category_duplicate') ?>  
                    <div class="input-group">
                        <input type="submit" name="btn-update" value="Cập nhật">
                        <?php go_back("?mod=product&action=list_cats","Quay lại") ?>
                    </div>
            </form>
        </div>
    </div>
</div>
<?php get_footer() ?>