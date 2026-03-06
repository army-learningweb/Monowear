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
            <?php if(!empty($list_blocks)) { ?>
                <div class="title">Danh sách khối</div>
                <div class="count-total">
                    <div class="statis" style="margin-top: 10px;">
                        <span class="total">Tổng</span> ( <?php echo $total_blocks ?> ) </span>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="text-center">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Tên khối</td>
                                <td>Mã khối</td>
                                <td>Người tạo</td>
                                <td>Thời gian</td>
                                <td colspan="2"></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $num = $start + 1;
                            foreach ($list_blocks as $block) {
                            ?>
                                <tr>
                                <td> <?php echo $num++ ?></td>
                                <td> <?php echo $block['block_name'] ?></td>
                                <td> <?php echo $block['block_code'] ?></td>
                                <td> <?php echo get_created_name($block['user_id']) ?></td>
                                <td> <?php echo set_date($block['created_at']) ?></td>
                               <td><a href="?mod=template&action=update_block&block_id=<?php echo $block['block_id'] ?>"><i class="fa-solid fa-gear"></i></a></td>
                                <td>
                                    <a href='?mod=template&action=delete_block&block_id=<?php echo $block['block_id']?>' onclick='return confirm("Bạn có chắc muốn xóa ?")'>
                                        <i class='fa-solid fa-circle-minus'></i>
                                    </a>
                                </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php 
                    echo $pagging_page ;
                    ?>
                </div>
            <?php 
            } else {
                get_404("?mod=dashboard&action=index");
            } 
            ?>
        </div>
    </div>
</div>
<?php get_footer() ?>