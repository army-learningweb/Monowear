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
            <?php if(!empty($list_sliders)) { ?>
                <div class="title">Danh sách Slider</div>
                <div class="count-total">
                    <div class="statis">
                        <span class="total">Tổng</span> ( <?php echo count($list_sliders) ?> ) |</span>
                        <span style="font-weight: normal;" class="statis on">Công khai</span>
                        ( <span class="result on"> <?php echo $on_status['total'] ?> </span> ) |
                        <span style="font-weight: normal;" class="statis wait">Chờ duyệt</span>
                        ( <span class="result wait"> <?php echo $wait_status['total'] ?> </span> ) 
                    </div>

                    <div class="search">
                        <form action="" method="get" id="form_search">
                            <input type="hidden" name="mod" value="slider">
                            <input type="hidden" name="action" value="list_sliders">

                            <input type="search" name="search_slider" id="" placeholder="Nhập từ khóa tìm kiếm..." value="<?php if(isset($_GET['search_slider'])) echo $_GET['search_slider'] ?>">
                            <button type="submit" name="btn-search"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                    </div>

                    <div class="filter">
                        <form action="" method="get" id="form_filter_status">
                            <input type="hidden" name="mod" value="slider">
                            <input type="hidden" name="action" value="list_sliders">

                            <select name="filter_status" id="filter_status">
                                <option value="">- Lọc theo trạng thái -</option>
                                <?php $filter_status = $_GET['filter_status'] ?>
                                <option value="Công khai" <?php if (isset($filter_status) && $filter_status == 'Công khai') echo "selected" ?>>Công khai</option>
                                <option value="Chờ duyệt" <?php if (isset($filter_status) && $filter_status == 'Chờ duyệt') echo "selected" ?>>Chờ duyệt</option>    
                            </select>

                            <input type="submit" name="btn-filter" value="Sàng lọc" style="font-size:0.9rem">
                            <a href="?mod=slider&action=list_sliders" class="reset">Reset</a>
                        </form>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="text-center">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Ảnh</td>
                                <td>Tên</td>
                                <td>Link</td>
                                <td>Thứ tự</td>
                                <td>Trạng thái</td>
                                <td>Cập nhật</td>
                                <td>Người tạo</td>
                                <td>Thời gian</td>
                                <td colspan="2"></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $num = $start + 1;
                            foreach ($list_sliders as $slider) {
                            ?>
                                <tr>
                                    <td><?php echo $num++ ?></td>
                                    <td><img src="<?php echo get_slider_img($slider['slider_id']) ?>" alt="" style="width:150px"></td>
                                    <td><?php echo $slider['slider_title'] ?></td>
                                    <td><?php echo $slider['slider_url']?></td>
                                    <td><?php echo $slider['display_order'] ?></td>
                                    <td class="text-center status-<?php echo $slider['slider_id'] ?>"><?php echo set_status_slider($slider['slider_status']) ?></td>
                                    <td>
                                        <select name="" class="status_change_slider" data-id="<?php echo $slider['slider_id'] ?>">
                                            <option value="Công khai" <?php if (isset($slider['slider_status']) && $slider['slider_status'] == 'Công khai') echo "selected" ?>>Công khai</option>
                                            <option value="Chờ duyệt" <?php if (isset($slider['slider_status']) && $slider['slider_status'] == 'Chờ duyệt') echo "selected" ?>>Chờ duyệt</option>
                                        </select>
                                    </td>
                                    <td><?php echo get_created_name($slider['user_id']) ?></td>
                                    <td><?php echo set_date($slider['created_at']) ?></td>
                                    <td><a href="?mod=slider&action=update_slider&slider_id=<?php echo $slider['slider_id'] ?>"><i class="fa-solid fa-gear"></i></a></td>
                                    <td>
                                        <a href='?mod=slider&action=delete_slider&slider_id=<?php echo $slider['slider_id'] ?>' onclick='return confirm("Bạn có chắc muốn xóa ?")'>
                                            <i class='fa-solid fa-circle-minus'></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php
                    echo $pagging_page
                    ?>
                </div>
            <?php
            } else {
                get_404("?mod=slider&action=list_sliders");
            }
            ?>
        </div>
    </div>
</div>
<?php get_footer() ?>