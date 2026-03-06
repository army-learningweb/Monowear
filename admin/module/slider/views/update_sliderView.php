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
            <div class="title">Thêm Slider</div>
            <?php check_error('slider_duplicate') ?>
            <form action="" method="post" id="add-slider" enctype="multipart/form-data">
                    <!-- Ảnh -->
                    <div class="input-group">
                        <label for="main_img_slider">Ảnh</label>
                        <input type="file" name="main_img_slider" id="main_img_slider">
                    </div>
                    <div class="show">
                        <img src="<?php echo $img_slider['image_url'] ?>">
                        <input type="hidden" name="slider_main_img_id" class="slider_main_img_id" value="<?php echo $img_slider['image_id'] ?>">
                    </div>
                    <p style='color:red; font-size:13px; margin: 6px 0' class="error"></p>
                    <?php check_error('main_img') ?>
                    <div class="input-group">
                        <label for="slider_name">Tên Slider</label>
                        <input type="text" name="slider_name" value="<?php echo $slider_info['slider_title'] ?>" id="slider_name">
                    </div>
                    <p style='color:red; font-size:13px; margin: 6px 0' class="error_slider_name"></p>
                    <?php check_error('slider_name') ?>
                    <div class="input-group">
                        <label for="slider_link">Link</label>
                        <input type="text" name="slider_link" id="slider_link" value = "<?php echo $slider_info['slider_url'] ?>">
                    </div>
                    <p style='color:red; font-size:13px; margin: 6px 0' class="error_slider_link"></p>
                    <div class="input-group">
                        <label for="slider_desc">Mô tả</label>
                        <textarea name="slider_desc" id="slider_desc"><?php echo $slider_info['slider_desc'] ?></textarea>
                    </div>
                    <p style='color:red; font-size:13px; margin: 6px 0' class="error_slider_desc"></p>
                    <?php check_error('slider_desc') ?>
                     <div class="input-group">
                        <label for="slider_order">Thứ tự</label>
                        <input type="number" name="slider_order" id="slider_order" min='1' max='9' value="<?php echo $slider_info['display_order'] ?>">
                    </div>
                    <p style='color:red; font-size:13px; margin: 6px 0' class="error_slider_order"></p>
                     <?php check_error('slider_order') ?>
                     <?php check_error('order_duplicate') ?>
                    <div class="input-group">
                        <input type="submit" value="Cập nhật" name="btn-update">
                        <?php go_back("?mod=slider&action=list_sliders", "Quay lại") ?>
                    </div>
                
            </form>
        </div>
    </div>
</div>
<?php get_footer() ?>