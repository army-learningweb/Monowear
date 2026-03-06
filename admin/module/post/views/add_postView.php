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
            <div class="title">Thêm mới bài viết</div>
            <?php check_error('post_duplicate') ?>
            <form action="" method="post" id="add-post" enctype="multipart/form-data">
                <div id="left-area">

                    <!-- Ảnh chính -->
                    <div class="input-group">
                        <label for="main_img_post">Ảnh chính</label>
                        <input type="file" name="main_img_post" id="main_img_post">
                    </div>
                    <div class="show">
                        <img src="">
                        <input type="hidden" name="post_main_img_id" class="post_main_img_id" value="">
                    </div>
                    <p style='color:red; font-size:13px; margin: 6px 0' class="error"></p>
                    <?php check_error('main_img') ?>

                </div>

                <div id="right-area">
                    <div class="input-group">
                        <label for="post_name">Tiêu đề bài viết</label>
                        <input type="text" name="post_name" value="<?php echo get_value('post_name') ?>" id="post_name">
                    </div>
                    <p style='color:red; font-size:13px; margin: 6px 0' class="error_post_name"></p>
                    <?php check_error('post_name') ?>
                    <div class="input-group">
                        <label for="post_desc">Mô tả ngắn</label>
                        <input type="text" name="post_desc" value="<?php echo get_value('post_desc') ?>" id="post_desc">
                    </div>
                    <p style='color:red; font-size:13px; margin: 6px 0' class="error_post_desc"></p>
                    <?php check_error('post_desc') ?>
                    <div class="input-group">
                        <label for="post_slug">Slug (Friendly URL)</label>
                        <input type="text" name="post_slug" id="post_slug" value="<?php  ?>">
                    </div>
                    <p style='color:red; font-size:13px; margin: 6px 0' class="error_post_slug"></p>
                    <?php check_error('post_slug') ?>
                    <div class="input-group">
                        <label for="post_cat">Danh mục</label>
                        <select name="post_cat" id="post_cat">
                            <option value="">- Chọn danh mục -</option>
                            <?php foreach($child_cat as $item) { ?>
                                <option value="<?php echo $item['category_id'] ?>" <?php if(isset($_POST['post_cat']) && $_POST['post_cat'] == $item['category_id']) echo "selected" ?>>
                                    <?php echo $item['category_name'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <p style='color:red; font-size:13px; margin: 6px 0' class="error_post_cat"></p>
                    <?php check_error('post_cat') ?>
                </div>
                <div class="details">
                    <div class="input-group">
                        <label for="post_details">Chi tiết bài viết</label>
                        <textarea name="post_details" id="post_details" class="ckeditor"></textarea>
                    </div>
            
                    <div class="input-group">
                        <input type="submit" value="Thêm mới" name="btn-add-post">
                        <?php go_back("?mod=dashboard&action=index", "Quay lại") ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php get_footer() ?>