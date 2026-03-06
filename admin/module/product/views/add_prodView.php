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
            <div class="title">Thêm mới sản phẩm</div>
            <?php check_error('prod_duplicate') ?>
            <form action="" method="post" id="add-prod" enctype="multipart/form-data">
                <div id="left-area">

                    <!-- Ảnh chính -->
                    <div class="input-group">
                        <label for="main_img_prod">Ảnh chính</label>
                        <input type="file" name="main_img_prod" id="main_img_prod">
                    </div>
                    <div class="show">
                        <img src="">
                        <input type="hidden" name="prod_main_img_id" class="prod_main_img_id" value="">
                    </div>
                    <p style='color:red; font-size:13px; margin: 6px 0' class="error"></p>
                    <?php check_error('main_img') ?>

                    <!-- Ảnh phụ -->
                    <div class="input-group">
                        <label for="sub_img">Ảnh chi tiết (Yêu cầu 4 ảnh "nếu có") </label>
                        <input type="file" name="sub_img[]" id="sub_img" multiple>
                    </div>
                    <div class="show_sub">
                       
                    </div>
                    <p style='color:red; font-size:13px; margin: 6px 0' class="sub_error"></p>
                    <?php check_error('sub_img') ?>
                </div>

                <div id="right-area">
                    <div class="input-group">
                        <label for="prod_name">Tên sản phẩm</label>
                        <input type="text" name="prod_name" value="<?php echo get_value('prod_name') ?>" id="prod_name">
                    </div>
                    <p style='color:red; font-size:13px; margin: 6px 0' class="error_prod_name"></p>
                    <?php check_error('prod_name') ?>
                    <div class="input-group">
                        <label for="prod_code">Mã sản phẩm</label>
                        <input type="text" name="prod_code" placeholder="MNW#..." value="<?php echo get_value('prod_code') ?>" id="prod_code">
                    </div>
                   <p style='color:red; font-size:13px; margin: 6px 0' class="error_prod_code"></p>
                    <?php check_error('prod_name') ?>
                    <div class="input-group">
                        <label for="prod_desc">Mô tả ngắn</label>
                        <textarea name="prod_desc" id="prod_desc"><?php echo get_value('prod_desc') ?></textarea>
                    </div>
                   <p style='color:red; font-size:13px; margin: 6px 0' class="error_prod_desc"></p>
                   <?php check_error('prod_desc') ?>
                    <div class="input-group">
                        <label for="prod_price">Giá</label>
                        <input type="number" name="prod_price" value="<?php echo get_value('prod_price') ?>" id="prod_price">
                    </div>
                    <p style='color:red; font-size:13px; margin: 6px 0' class="error_prod_price"></p>
                    <?php check_error('prod_price') ?>
                    <div class="input-group">
                        <label for="prod_sales">Giảm giá % (Nếu có)</label>
                        <input type="number" name="prod_sales" value="<?php echo get_value('prod_sales') ?>" id="prod_sales">
                    </div>
                    <p style='color:red; font-size:13px; margin: 6px 0' class="error_prod_sales"></p>
                    <?php check_error('prod_sales') ?>
                    <div class="input-group">
                        <label for="prod_up_sales">Up Sales (Đẩy bán trước)</label>
                        <select name="prod_up_sales" id="prod_up_sales">
                            <option value="no" selected>No</option>
                            <option value="yes">Yes</option>
                        </select>
                    </div>
                    <?php check_error('prod_sales') ?>
                    <div class="input-group">
                        <label for="prod_quantity">Số lượng sản phẩm</label>
                        <input type="number" name="prod_quantity" min="1" value="<?php echo get_value('prod_quantity') ?>" id="prod_quantity">
                    </div>
                    <p style='color:red; font-size:13px; margin: 6px 0' class="error_prod_quantity"></p>
                    <?php check_error('prod_quantity') ?>
                    <div class="input-group">
                        <label for="prod_slug">Slug (Friendly URL)</label>
                        <input type="text" name="prod_slug" id="prod_slug" value="<?php echo get_value('prod_slug') ?>">
                    </div>
                    <?php check_error('prod_slug') ?>
                    <p style='color:red; font-size:13px; margin: 6px 0' class="error_prod_slug"></p>
                    <div class="input-group">
                        <label for="prod_cat">Danh mục</label>
                        <select name="prod_cat" id="prod_cat">
                            <option value="">- Chọn danh mục -</option>
                            <?php foreach($child_cat as $item) { ?>
                                <option value="<?php echo $item['category_id'] ?>" <?php if(isset($_POST['prod_cat']) && $_POST['prod_cat'] == $item['category_id']) echo "selected" ?>>
                                    <?php echo $item['category_name'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <p style='color:red; font-size:13px; margin: 6px 0' class="error_prod_cat"></p>
                    <?php check_error('prod_cat') ?>
                </div>
                <div class="details">
                    <div class="input-group">
                        <label for="prod_details">Chi tiết sản phẩm</label>
                        <textarea name="prod_details" id="prod_details" class="ckeditor"></textarea>
                    </div>
            
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