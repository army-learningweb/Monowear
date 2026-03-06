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
            <div class="title">Thêm khối</div>
            <?php  ?>
            <form action="" method="post" id="add-prod" enctype="multipart/form-data">
                <div id="right-area">
                    <div class="input-group">
                        <label for="block_name">Tên khối</label>
                        <input type="text" name="block_name" value="<?php echo get_value('block_name') ?>" id="block_name">
                    </div> 
                    <?php check_error('block_name') ?>
                     <?php check_error('block_duplicate') ?>
                    <div class="input-group">
                        <label for="block_code">Mã khối</label>
                        <input type="text" name="block_code" value="<?php  echo get_value('block_code') ?>" id="block_code">
                    </div>  
                    <?php check_error('block_code') ?> 
                </div>
                <div class="details">
                    <div class="input-group">
                        <label for="block_content">Nội dung khối</label>
                        <textarea name="block_content" id="block_content" class="ckeditor"><?php  echo get_value('block_content') ?></textarea>
                    </div>
                    <?php check_error('block_content') ?> 
                    <div class="input-group">
                        <input type="submit" value="Thêm mới" name="btn-add">
                        <?php go_back("?mod=dashboard&action=index", "Quay lại") ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php get_footer() ?>