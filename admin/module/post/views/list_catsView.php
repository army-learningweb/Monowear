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
            <?php if (!empty($list_cats)) { ?>
                <div class="title">Danh sách danh mục</div>
                <div class="count-total">
                    <div class="statis" style="margin-top: 10px;">
                        <span class="total">Tổng</span> ( <?php echo $total_cat ?> ) |</span>

                        <span style="font-weight: normal;" class="statis on">Hoạt động</span>
                        ( <span class="result on"> <?php echo $on_status['total'] ?> </span> ) |

                        <span style="font-weight: normal;" class="statis wait">Chờ duyệt</span> 
                        ( <span class="result wait"> <?php echo $wait_status['total'] ?> </span> ) |

                        <span style="font-weight: normal;" class="statis off">Tạm dừng</span> 
                        ( <span class="result off"> <?php echo $off_status['total'] ?> </span> )
                    </div>
                </div>
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Danh mục</td>
                                <td class="text-center">Thứ tự</td>
                                <td class="text-center">Trạng thái</td>
                                <td class="text-center">Cập nhật</td>
                                <td class="text-center">Người tạo</td>
                                <td class="text-center">Thời gian</td>
                                <td colspan="2" class="text-center"></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $num = $start + 1;
                            foreach ($list_cats as $cat) {
                            ?>
                                <tr>
                                    <td><?php echo $num++ ?></td>
                                    <td><?php echo str_repeat("--|  ", $cat['level']) . $cat['category_name'] ?></td>
                                    <td class="text-center"><?php echo $cat['parent_id'] ?></td>
                                    <td class="text-center status-<?php echo $cat['category_id'] ?>"><?php echo set_status_cat($cat['category_status']) ?></td>
                                    <td>
                                        <select name="" class="status_change_post_cat" data-id="<?php echo $cat['category_id'] ?>">
                                            <option value="Hoạt động" <?php if($cat['category_status'] == "Hoạt động") echo "selected" ?>>Hoạt động</option>
                                            <option value="Chờ duyệt" <?php if($cat['category_status'] == "Chờ duyệt") echo "selected" ?>>Chờ duyệt</option>
                                            <option value="Tạm dừng" <?php if($cat['category_status'] == "Tạm dừng") echo "selected" ?>>Tạm dừng</option>
                                        </select>
                                    </td>
                                    <td class="text-center"><?php echo get_created_name($cat['user_id']) ?></td>
                                    <td class="text-center"><?php echo set_date($cat['created_at']) ?></td>
                                    <td class="text-center"><a href="?mod=post&action=update_cat&cat_id=<?php echo $cat['category_id'] ?>"><i class="fa-solid fa-gear"></i></a></td>
                                    <td class="text-center">
                                        <?php if ($cat['parent_id'] == 0) {
                                            echo " - ";
                                        } else {
                                            echo "
                                            <a href='?mod=post&action=delete_cat&cat_id={$cat['category_id']}' onclick=\"return confirm('Bạn có chắc muốn xóa ?')\">
                                            <i class='fa-solid fa-circle-minus'></i>
                                            </a>
                                        ";
                                        } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php echo $pagging_page ?>
                </div>
            <?php } else {
                get_404("?mod=user&action=list_cat");
            } ?>
        </div>
    </div>
</div>
<?php get_footer() ?>