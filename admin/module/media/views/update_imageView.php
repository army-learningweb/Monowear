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
            <div class="title">Thông tin Ảnh</div>
            <?php check_error('page_duplicate') ?>
            <form action="" method="post" id="add-prod" enctype="multipart/form-data">
                <div id="left-area">
                    <!-- Ảnh chính -->
                    <div class="input-group">
                        <label for="main_img_media">Hình ảnh</label>
                        <input type="file" name="main_img_media" id="main_img_media">
                    </div>
                    <div class="show">
                        <img src="<?php echo $img_info['image_url'] ?>">
                        <input type="hidden" name="media_main_img_id" class="media_main_img_id" value="<?php echo $img_info['image_id'] ?>">
                    </div>
                    <p style='color:red; font-size:13px; margin: 6px 0' class="error"></p>
                    <?php check_error('main_img') ?>
                    <input type="submit" value="Cập nhật ảnh" name="update-img">
                    <?php go_back("?mod=media&action=list_media","Quay lại") ?>
                </div>

                <div id="right-area" style="flex-basis: 60%; font-size:0.9rem">
                    <h3 style="margin-top: 35px">Thông tin chi tiết</h3>
                    <p style="margin-top: 10px;"><span style="font-weight: 500;">Đường dẫn tĩnh: </span><?php echo $img_info['image_url'] ?></p>
                    <p style="margin-top: 7px;"><span style="font-weight: 500;">Tên File: </span> <?php echo $img_info['file_name'] ?></p>
                    <p style="margin-top: 7px;"><span style="font-weight: 500;">Kích cỡ :</span> <?php echo $img_info['file_size'] ?> KB</p>
                    <p style="margin-top: 7px;"><span style="font-weight: 500;">Loại ảnh:</span> <?php echo set_images_type($img_info['object_type']) ?></p>
                    <p style="margin-top: 7px;"><span style="font-weight: 500;">Vai trò:</span> <?php echo set_images_role($img_info['is_main']) ?></p>
                    <p style="margin-top: 7px;"><span style="font-weight: 500;">Ngày thời tạo:</span> <?php echo set_date($img_info['created_at']) ?></p>
                </div>
            </form>
        </div>
    </div>
</div>
<?php get_footer() ?>