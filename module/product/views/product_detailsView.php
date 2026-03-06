<?php
get_header();
get_alert_success();
get_alert_failed();
?>
<script>
    localStorage.clear();
</script>
<div id="content">
    <div class="product-details">
        <form action="?mod=cart&action=add_cart&prod_id=<?php echo $prod_info['product_id'] ?>" method="post">
            <div class="prod-img">
                <div class="main-img">
                    <img src="<?php echo $path_img_prods . get_main_img_prod($prod_info['product_id']) ?>" alt="">
                </div>
                <ul class="sub-img">
                    <?php foreach (get_sub_img_prod($prod_info['product_id']) as $item) { ?>
                        <li><img src="<?php echo $path_img_prods . $item['file_name'] ?>" alt=""></li>
                    <?php } ?>
                </ul>
                <div class="button-change-img">
                    <div class="btn-prev"><i class="fa-solid fa-circle-chevron-left"></i></div>
                    <div class="btn-next"><i class="fa-solid fa-circle-chevron-right"></i></div>
                </div>
            </div>
            <div class="prod-details">
                <div class="prod-name">
                    <h2><?php echo $prod_info['product_name'] ?></h2>
                </div>
                <div class="prod-vote">
                    <?php echo set_rating($top_rating) ?>
                    <span style="color:black">( <?php echo $total_prods_review ?> ) Đánh giá</span>
                </div>
                <div class="prod-quantity">
                    <span>Số lượng </span>
                    <span class="box-quantity">
                        <div class="btn-minus"><i class="fa-solid fa-minus"></i></div>
                        <input type="text" name="prod_quantity" class="prod_quantity" value="1" min="1" max="99" data-id="<?php echo $prod_info['product_id'] ?>" readonly>
                        <div class="btn-plus"><i class="fa-solid fa-plus"></i></div>
                    </span>
                </div>
                <div class="prod-price">
                    <span style="color:black;font-weight:normal;margin-top:15px;display:inline-block">Giá : </span>
                    <?php if (!empty($prod_info['product_sales'])) {
                        echo "<del>" . currency_format($prod_info['product_price']) . "</del>";
                        echo "&nbsp &nbsp;";
                        echo "<span style='display:inline-block;margin-top: 15px; color:red;font-weight:normal;font-size:0.9rem'> Giảm " . $prod_info['product_sales'] . "%</span>";
                        echo "<br>";
                        echo "<span style='display:inline-block;font-weight: normal;margin-top:15px'>Giá mới : </span> <span style='display:inline-block; margin-top:10px; color:green;' class='new-price'>" . currency_format(disscount_price($prod_info['product_sales'], $prod_info['product_price']));
                        "</span>";
                    } else {
                        echo "<span style='font-weight:bold'>" . currency_format($prod_info['product_price']) . "</span>";
                    } ?>
                </div>
                <div class="prod-status">
                    <span>Tình trạng : </span>
                    <?php echo get_quantity_text($prod_info['stock_quantity']) ?>
                </div>
                <div class="prod-info">
                    <h3>Mô tả ngắn</h3>
                    <p><?php echo $prod_info['product_desc'] ?></p>
                </div>
            </div>
            <div class="buy-box">
                <div class="prod-code">
                    Mã : <?php echo $prod_info['product_code'] ?>
                </div>
                <hr>
                <div class="prod-price">
                    <h2><?php echo currency_format(disscount_price($prod_info['product_sales'], $prod_info['product_price'])) ?></h2>
                </div>
                <input type="submit" value="Thêm vào giỏ" class="add-cart-details">
                <a href="?mod=cart&action=add_cart&prod_id=<?php echo $prod_info['product_id'] ?>&process=muangay" class="buy-now">Mua ngay</a>
                <ul class="customer-service">
                    <li>
                        <i class="fa-solid fa-truck-fast"></i> &nbsp; &nbsp; Giao hàng nhanh 2 - 3 ngày
                    </li>
                    <li>
                        <i class="fa-solid fa-rotate-left"></i> &nbsp; &nbsp; Đổi trả 7 ngày nếu có lỗi
                    </li>
                    <li>
                        <i class="fa-solid fa-shield"></i> &nbsp; &nbsp; Cam kết chính hãng
                    </li>
                </ul>
            </div>
        </form>
    </div>
    <div class="prod fetured introduce">
        <h2 style="margin-top: 10px;">Sẽ rất đẹp nếu mặc cùng</h2>
        <div class="slider-prod">
            <ul class="list-prod">
                <div class="slider-item-prod">
                    <?php foreach ($list_prods_none_slug as $item) { ?>
                        <li class="prod-item">
                            <?php if ($item['product_sales'] > 0) { ?>
                                <span class="disscount_number">Giảm <?php echo $item['product_sales'] . "%" ?></span>
                            <?php } ?>
                            <?php if ($item['product_up_sales'] == 'yes') { ?>
                                <span class="hot-prod-note <?php if (!empty($item['product_sales'])) echo "both-note" ?>">Nổi bật</span>
                            <?php } ?>
                            <a href="<?php echo $item['product_slug'] ?>">
                                <div class="prod-img"><img src="<?php echo $path_img_prods . get_main_img_prod($item['product_id']) ?>" alt=""></div>
                                <div class="prod-name"><?php echo $item['product_name'] ?></div>
                                <div class="prod-price">
                                    <?php if ($item['product_sales'] > 0) {
                                        echo "<del>" . currency_format($item['product_price']) . "</del>";
                                        echo "&nbsp&nbsp";
                                        echo "<span class='disscount-price' style='color:green'>" . currency_format(disscount_price($item['product_sales'], $item['product_price'])) . "</span>";
                                    } else {
                                        echo currency_format($item['product_price']);
                                    } ?>
                                </div>
                            </a>
                            <div class="btn-buy">
                                <a href="<?php echo base_url('?mod=cart&action=add_cart&prod_id='.$item['product_id']) ?>" class="add-cart">Thêm vào giỏ</a>
                                        <a href="<?php echo base_url('?mod=cart&action=add_cart&prod_id='.$item['product_id'].'&process=mua-ngay')?>" class="buy">Mua ngay</a>
                            </div>
                        </li>
                    <?php } ?>
                </div>
            </ul>
        </div>
        <div class="button-slider-prod">
            <div class="btn-prev-prod"><i class="fa-solid fa-circle-chevron-left"></i></div>
            <div class="btn-next-prod"><i class="fa-solid fa-circle-chevron-right"></i></div>
        </div>
    </div>
    <div class="prod-more-details">
        <h2>Chi tiết sản phẩm</h2>
        <?php echo $prod_info['product_details'] ?>
    </div>
    <div class="prod-comment">
        <form action="" method="post" id="form-rating">
            <h2>Đánh giá về sản phẩm tại đây !</h2>
            <div class="rate">
                <span data-value="1" class="active"><i class="fa-regular fa-star"></i></span>
                <span data-value="2"><i class="fa-regular fa-star"></i></span>
                <span data-value="3"><i class="fa-regular fa-star"></i></span>
                <span data-value="4"><i class="fa-regular fa-star"></i></span>
                <span data-value="5"><i class="fa-regular fa-star"></i></span>
                <span style="color:black" class="alredy-rate">( 0 ) </span>
                <input type="hidden" name="rating_value" class="rating_value" value="">
            </div>
            <?php if (!isset($_SESSION['customer'])) { ?>
                <input type="text" name="fullname" id="fullname-rating" placeholder="Họ và tên" value="<?php echo get_value('fullname') ?>">
                <?php check_error('fullname') ?>
            <?php } ?>
            <p style='color:red; font-size:13px; margin: 6px 0' class="error_rating_fullname"></p>
            <textarea name="product_review" id="product_review" placeholder="Hãy để lại đánh giá của bạn"></textarea>
            <?php check_error('review') ?>
            <?php check_error('review-details') ?>
            <p style='color:red; font-size:13px; margin: 6px 0' class="error_rating_product_review"></p>
            <input type="submit" name="btn-review" class="btn-review" value="Gửi đánh giá" style="margin-top: 15px;">
        </form>
        <h2 style="margin-top:20px">Đánh giá của khách hàng về sản phẩm này </h2>
        <ul class="user-comment">
            <?php if (!empty($prod_review)) { ?>
                <?php foreach ($prod_review as $item) { ?>
                    <li>
                        <div class="name"><?php echo $item['fullname'] ?></div>
                        <div class="date"><?php echo set_date($item['created_at']) ?></div>
                        <div class="rating"><?php echo set_rating($item['product_rating']) ?></div>
                        <div class="comment"><?php echo $item['product_review'] ?></div>
                    </li>
                <?php } ?>
            <?php } else {
                echo "<p style='color:gray'><i> Chưa có đánh giá cho sản phẩm này </i></p>";
            } ?>
        </ul>
        <?php if (!empty($prod_review)) { ?>
            <a style="text-decoration:none; color:blue; margin-top:15px; display: inline-block" class="see-more">Xem thêm <i class="fa-solid fa-arrow-right-long"></i></a>
        <?php } ?>
    </div>
</div>
<?php get_footer() ?>