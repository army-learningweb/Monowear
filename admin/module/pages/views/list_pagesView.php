<?php
get_header();
get_alert_failed();
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
            <?php if (!empty($list_pages)) {  ?>
                <div class="title">Danh sách trang</div>
                <div class="count-total">
                    <div class="statis">
                        <span class="total">Tổng</span> ( <?php echo count($list_pages) ?> ) |</span>

                        <span style="font-weight: normal;" class="statis crash">Nháp</span>
                        ( <span class="result draft"> <?php echo $draft_status['total'] ?> </span> ) |

                        <span style="font-weight: normal;" class="statis on">Công khai</span>
                        ( <span class="result published"> <?php echo $published_status['total'] ?> </span> ) |

                        <span style="font-weight: normal;" class="statis off">Tạm dừng</span>
                        ( <span class="result off"> <?php echo $pending_status['total'] ?> </span> ) |

                        <span style="font-weight: normal;" class="statis save">Lưu trữ</span>
                        ( <span class="result archived"> <?php echo $archived_status['total'] ?> </span> )
                    </div>

                    <div class="search">
                        <form action="" method="get" id="form_search">
                            <input type="hidden" name="mod" value="pages">
                            <input type="hidden" name="action" value="list_pages">

                            <input type="search" name="search_page" id="" placeholder="Nhập từ khóa tìm kiếm..." value="<?php if (isset($_GET['search_page'])) echo $_GET['search_page'] ?>">
                            <button type="submit" name="btn-search"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                    </div>

                    <div class="filter">
                        <form action="" method="get" id="form_filter_status">
                            <input type="hidden" name="mod" value="pages">
                            <input type="hidden" name="action" value="list_pages">

                            <select name="filter_status" id="filter_status">
                                <option value="">- Lọc theo trạng thái -</option>
                                <?php $filter_status = $_GET['filter_status'] ?>
                                <option value="draft" <?php if (isset($filter_status) && $filter_status == 'draft') echo "selected" ?>>Nháp</option>
                                <option value="published" <?php if (isset($filter_status) && $filter_status == 'published') echo "selected" ?>>Công khai</option>
                                <option value="pending" <?php if (isset($filter_status) && $filter_status == 'pending') echo "selected" ?>>Tạm dừng</option>
                                <option value="archived" <?php if (isset($filter_status) && $filter_status == 'archived') echo "selected" ?>>Lưu trữ</option>
                            </select>

                            <input type="submit" name="btn-filter" value="Sàng lọc" style="font-size:0.9rem">
                            <a href="?mod=pages&action=list_pages" class="reset">Reset</a>
                        </form>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="text-center">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td class="text-left">Tên trang</td>
                                <td class="text-left">Slug</td>
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
                            foreach ($list_pages as $page) {
                            ?>
                                <tr>
                                    <td><?php echo $num++ ?></td>
                                    <td class="text-left name"><?php echo $page['page_title'] ?></td>
                                    <td class="text-left"><?php echo $page['page_slug'] ?></td>
                                    <td class="text-center status-<?php echo $page['page_id'] ?>"><?php echo set_status_page($page['page_status']) ?></td>
                                    <td>
                                        <select name="" class="status_change_page" data-id="<?php echo $page['page_id'] ?>">
                                            <option value="draft" <?php if ($page['page_status'] == 'draft') echo "selected" ?>>Nháp</option>
                                            <option value="published" <?php if ($page['page_status'] == 'published') echo "selected" ?>>Công khai</option>
                                            <option value="pending" <?php if ($page['page_status'] == 'pending') echo "selected" ?>>Tạm dừng</option>
                                            <option value="archived" <?php if ($page['page_status'] == 'archived') echo "selected" ?>>Lưu trữ</option>
                                        </select>
                                    </td>
                                    <td><?php echo get_created_name($page['user_id']) ?></td>
                                    <td><?php echo set_date($page['created_at']) ?></td>
                                    <td><a href="?mod=pages&action=update_page&page_id=<?php echo $page['page_id'] ?>"><i class="fa-solid fa-gear"></i></a></td>
                                    <td>
                                        <a href='?mod=pages&action=delete_page&page_id=<?php echo $page['page_id'] ?>' onclick='return confirm("Bạn có chắc muốn xóa ?")'>
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
                get_404("?mod=pages&action=list_pages");
            }
            ?>
        </div>
    </div>
</div>
<?php get_footer() ?>