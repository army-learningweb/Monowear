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
            <div class="title">Thêm trang</div>
            <?php check_error('page_duplicate') ?>
            <form action="" method="post" id="add-prod" enctype="multipart/form-data">
                <div id="right-area">
                    <div class="input-group">
                        <label for="page_name">Tên trang</label>
                        <input type="text" name="page_name" value="<?php echo $page_info['page_title'] ?>" id="page_name">
                    </div>
                    <p style='color:red; font-size:13px; margin: 6px 0' class="error_page_name"></p>
                    <?php check_error('page_name') ?>
                    <div class="input-group">
                        <label for="page_slug">Slug (Friendly URL)</label>
                        <input type="text" name="page_slug" id="page_slug" value="<?php echo $page_info['page_slug'] ?>">
                    </div>
                    <?php check_error('page_slug') ?>
                </div>
                <div class="details">
                    <div class="input-group">
                        <label for="page_details">Nội dung trang</label>
                        <textarea name="page_details" id="page_details" class="ckeditor"><?php echo $page_info['page_content'] ?></textarea>
                    </div>

                    <div class="input-group">
                        <input type="submit" value="Cập nhật" name="btn-update">
                        <?php go_back("?mod=pages&action=list_pages", "Quay lại") ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php get_footer() ?>