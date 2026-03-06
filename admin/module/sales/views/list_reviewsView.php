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
        <div id="data-show" class="review">
            <?php if (!empty($list_reviews)) { ?>
                <div class="title">Đánh giá sản phẩm</div>
                <div class="count-total">
                    <div class="statis">
                        <span class="total">Tổng</span> ( <?php echo $total_reviews  ?> ) |</span>

                        <span style="font-weight: normal;" class="statis on">Công khai</span>
                        ( <span class="result on"> <?php echo $pub_status['total'] ?> </span> ) |

                        <span style="font-weight: normal;" class="statis crash">Nháp</span>
                        ( <span class="result crash"> <?php echo $crash_status['total'] ?> </span> ) |

                        <span style="font-weight: normal;" class="statis wait">Chờ duyệt</span>
                        ( <span class="result wait"> <?php echo $wait_status['total'] ?> </span> )
                    </div>

                    <div class="search">
                        <form action="" method="get" id="form_search">
                            <input type="hidden" name="mod" value="sales">
                            <input type="hidden" name="action" value="list_reviews">

                            <input type="search" name="search_review" id="" placeholder="Từ khóa đánh giá..." value="<?php if(isset($_GET['search_review'])) echo $_GET['search_review'] ?>">
                            <button type="submit" name="btn-search"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                    </div>

                    <div class="filter">
                        <form action="" method="get" id="form_filter_status">
                            <input type="hidden" name="mod" value="sales">
                            <input type="hidden" name="action" value="list_reviews">

                            <select name="filter_status" id="filter_status">
                                <option value="">- Lọc theo trạng thái -</option>
                                <?php $filter_status = $_GET['filter_status'] ?>
                                <option value="Công khai" <?php if (isset($filter_status) && $filter_status == 'Công khai') echo "selected" ?>>Công khai</option>
                                <option value="Nháp" <?php if (isset($filter_status) && $filter_status == 'Nháp') echo "selected" ?>>Nháp</option>
                                <option value="Chờ duyệt" <?php if (isset($filter_status) && $filter_status == 'Chờ duyệt') echo "selected" ?>>Chờ duyệt</option>
                            </select>

                            <input type="submit" name="btn-filter" value="Sàng lọc" style="font-size:0.9rem">
                            <a href="?mod=sales&action=list_reviews" class="reset">Reset</a>
                        </form>
                    </div>
                </div>
                <div class="table-responsive review_table">
                    <table class="text-center">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td class="text-left">Khách hàng</td>
                                <td class="text-left">Đánh giá</td>
                                <td class="text-left">Sản phẩm</td>
                                <td>Bình chọn</td>
                                <td>Trạng thái</td>
                                <td>Cập nhật</td>
                                <td>Thời gian</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $num = $start + 1;
                            foreach ($list_reviews as $review) {
                            ?>
                                <tr>
                                    <td><?php echo $num++ ?></td>
                                    <td class="text-left"><?php echo $review['fullname'] ?></td>
                                    <td class="review-content text-left"><?php echo $review['product_review'] ?></td>
                                      <td class="text-left"><?php echo get_prod_name($review['product_id']) ?></td>
                                    <td><?php echo $review['product_rating'] ?> <i class="fa-solid fa-star" style="color: #FFD43B;"></i></td>
                                    <td class="status-<?php echo $review['review_id'] ?>"><?php echo set_status_review($review['review_status']) ?></td>
                                    <td>
                                        <select name="" class="status_change_review" data-id="<?php echo $review['review_id'] ?>">
                                            <option value="Công khai" <?php if (isset($review['review_status']) && $review['review_status'] == 'Công khai') echo "selected"; ?>>Công khai</option>
                                            <option value="Nháp" <?php if (isset($review['review_status']) && $review['review_status'] == 'Nháp') echo "selected"; ?>>Nháp</option>
                                            <option value="Chờ duyệt" <?php if (isset($review['review_status']) && $review['review_status'] == 'Chờ duyệt') echo "selected"; ?>>Chờ duyệt</option>
                                        </select>
                                    </td>
                                    <td><?php echo set_date($review['created_at']) ?></td>
                                    <td>
                                        <a href='?mod=sales&action=delete_review&review_id=<?php echo $review['review_id'] ?>' onclick='return confirm("Bạn có chắc muốn xóa ?")'>
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
                get_404("?mod=sales&action=list_reviews");
            }
            ?>
        </div>
    </div>
</div>
<?php get_footer() ?>