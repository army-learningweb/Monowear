<?php
get_header();
get_alert_success();
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
            <?php if (!empty($list_media)) { ?>
                <div class="title">Danh sách Media</div>
                <div class="count-total">
                    <div class="statis" style="margin-top: 10px;">
                        <span class="total">Tổng</span> ( <?php echo $total_list_media ?> ) ảnh </span>
                    </div>

                    <div class="search media">
                        <form action="" method="get" id="form_search">
                            <input type="hidden" name="mod" value="media">
                            <input type="hidden" name="action" value="list_media">

                            <input type="search" name="search_img" id="" placeholder="Nhập từ khóa tìm kiếm...">
                            <button type="submit" name="btn-search"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                    </div>

                    <div class="filter">
                        <form action="" method="get" id="form_filter_status">
                            <input type="hidden" name="mod" value="media">
                            <input type="hidden" name="action" value="list_media">

                            <select name="filter_type" id="filter_type">
                                <option value="">- Lọc theo loại -</option>
                                <?php $filter_type = $_GET['filter_type'] ?>
                                <option value="product" <?php if ($filter_type == 'product') echo "selected" ?>>Sản phẩm</option>
                                <option value="post" <?php if ($filter_type == 'post') echo "selected" ?>>Bài viết</option>
                                <option value="page" <?php if ($filter_type == 'page') echo "selected" ?>>Trang</option>
                                <option value="slider" <?php if ($filter_type == 'slider') echo "selected" ?>>Quảng cáo</option>
                            </select>

                            <input type="submit" name="btn-filter" value="Sàng lọc" style="font-size:0.9rem">
                            <a href="?mod=media&action=list_media" class="reset">Reset</a>
                        </form>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="text-center">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td class="text-left">Ảnh</td>
                                <td class="text-left">Tên File</td>     
                                <td>Loại ảnh</td>
                                <td>Vai trò</td>   
                                <td>Người tạo</td>
                                <td>Thời gian</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $num = $start + 1;
                            foreach ($list_media as $item) {
                            ?>
                                <tr>
                                    <td><?php echo $num++ ?></td>
                                    <td>
                                        <div class="scale-img"><img src="<?php echo $item['image_url'] ?>" alt=""></div>
                                    </td>
                                    <td class="text-left" style="width: 150px;"><a href=""><?php echo $item['file_name'] ?></a></td>
                                    <td><?php echo set_images_type($item['object_type']) ?></td>
                                    <td><?php echo set_images_role($item['is_main']) ?></td>
                                    <td><?php echo get_created_name($item['user_id']) ?></td>
                                    <td><?php echo set_date($item['created_at']) ?></td>
                                    <td><a href="?mod=media&action=update_image&image_id=<?php echo $item['image_id'] ?>"><i class="fa-solid fa-gear"></i></a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php
                    echo $pagging_page
                    ?>
                </div>
            <?php } else {
                get_404("?mod=media&action=list_media");
            } ?>
        </div>
    </div>
</div>
<?php get_footer() ?>