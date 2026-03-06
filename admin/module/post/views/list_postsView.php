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
            <?php if (!empty($list_posts)) {  ?>
                <div class="title">Danh sách bài viết</div>
                <div class="count-total">
                    <div class="statis">
                        <span class="total">Tổng</span> ( <?php echo $total_posts ?> ) |</span>

                        <span style="font-weight: normal;" class="statis crash">Nháp</span>
                        ( <span class="result crash" style="color:black"> <?php echo $crash_status['total'] ?> </span> ) |

                        <span style="font-weight: normal;" class="statis on">Công khai</span>
                        ( <span class="result on"> <?php echo $on_status['total'] ?> </span> ) |

                        <span style="font-weight: normal;" class="statis wait">Chờ duyệt</span>
                        ( <span class="result wait"> <?php echo $wait_status['total'] ?> </span> ) |

                        <span style="font-weight: normal;" class="statis save">Lưu trữ</span>
                        ( <span class="result save" style="color:black"> <?php echo $save_status['total'] ?> </span> )
                    </div>

                    <div class="search">
                        <form action="" method="get" id="form_search">
                            <input type="hidden" name="mod" value="post">
                            <input type="hidden" name="action" value="list_posts">

                            <input type="search" name="search_post" id="" placeholder="Nhập tiêu đề..." value="<?php if(isset($_GET['search_post'])) echo $_GET['search_post'] ?>">
                            <button type="submit" name="btn-search"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                    </div>

                    <div class="filter">
                        <form action="" method="get" id="form_filter_status">
                            <input type="hidden" name="mod" value="post">
                            <input type="hidden" name="action" value="list_posts">

                            <select name="filter_status" id="filter_status">
                                <option value="">- Lọc theo trạng thái -</option>
                                <?php $filter_status = $_GET['filter_status'] ?>
                                <option value="Nháp" <?php if (isset($filter_status) && $filter_status == 'Nháp') echo "selected" ?>>Nháp</option>
                                <option value="Công khai" <?php if (isset($filter_status) && $filter_status == 'Công khai') echo "selected" ?>>Công khai</option>
                                <option value="Chờ duyệt" <?php if (isset($filter_status) && $filter_status == 'Chờ duyệt') echo "selected" ?>>Chờ duyệt</option>
                                <option value="Lưu trữ" <?php if (isset($filter_status) && $filter_status == 'Lưu trữ') echo "selected" ?>>Lưu trữ</option>
                            </select>

                            <input type="submit" name="btn-filter" value="Sàng lọc" style="font-size:0.9rem">
                            <a href="?mod=post&action=list_posts" class="reset">Reset</a>
                        </form>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="text-center">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td class="text-left">Tiêu đề</td>
                                <td>Ảnh</td>
                                <td>Danh mục</td>
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
                            foreach ($list_posts as $post) {
                            ?>
                                <tr>
                                    <td><?php echo $num++ ?></td>
                                    <td class="text-left name"><?php echo $post['post_name'] ?></td>
                                    <td><img src="<?php echo get_image_post($post['post_id']) ?>" alt="" style="width:50px;"></td>
                                    <td><?php echo  get_category_name($post['category_id']) ?></td>
                                    <td class="text-center status-<?php echo $post['post_id'] ?>"><?php echo set_status_post($post['post_status']) ?></td>
                                    <td>
                                        <select name="" class="status_change_post" data-id="<?php echo $post['post_id'] ?>">
                                            <option value="Nháp" <?php if (isset($post['post_status']) && $post['post_status'] == 'Nháp') echo "selected" ?>>Nháp</option>
                                            <option value="Công khai" <?php if (isset($post['post_status']) && $post['post_status'] == 'Công khai') echo "selected" ?>>Công khai</option>
                                            <option value="Chờ duyệt" <?php if (isset($post['post_status']) && $post['post_status'] == 'Chờ duyệt') echo "selected" ?>>Chờ duyệt</option>
                                            <option value="Lưu trữ" <?php if (isset($post['post_status']) && $post['post_status'] == 'Lưu trữ') echo "selected" ?>>Lưu trữ</option>
                                        </select>
                                    </td>
                                    <td><?php echo get_created_name($post['user_id']) ?></td>
                                    <td><?php echo set_date($post['created_at']) ?></td>
                                    <td><a href="?mod=post&action=update_post&post_id=<?php echo $post['post_id'] ?>"><i class="fa-solid fa-gear"></i></a></td>
                                    <td>
                                        <a href='?mod=post&action=delete_post&post_id=<?php echo $post['post_id'] ?>' onclick='return confirm("Bạn có chắc muốn xóa ?")'>
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
                get_404("?mod=post&action=list_posts");
            }
            ?>
        </div>
    </div>
</div>
<?php get_footer() ?>