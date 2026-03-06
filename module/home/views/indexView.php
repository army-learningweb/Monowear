<?php
get_header();
get_alert_success();
?>
<div id="content">
    <?php if (empty($_GET['search_prod'])) { ?>
        <div id="banner">
            <?php if (!empty($list_sliders)) { ?>
                <div class="slider">
                    <?php foreach ($list_sliders as $item) { ?>
                        <div class="slider-item">
                            <a href=""><img src="<?php echo $path_slider . $item['file_name'] ?>" alt=""></a>
                        </div>
                    <?php } ?>
                </div>
                <div class="button-banner">
                    <div class="btn-prev"><i class="fa-solid fa-circle-chevron-left"></i></div>
                    <div class="btn-next"><i class="fa-solid fa-circle-chevron-right"></i></div>
                </div>
            <?php } ?>
        </div>
        <div class="product">
            <div class="prod disscount">
                <h2 style="margin-top: 5px;">Sản phẩm giảm giá <span><i class="fa-solid fa-tags"></i></span> </h2>
                <div class="slider-prod">
                    <ul class="list-prod">
                        <div class="slider-item-prod">
                            <?php foreach ($list_prods_sales as $item) { ?>
                                <li class="prod-item">
                                    <span class="disscount_number">Giảm <?php echo $item['product_sales'] . "%" ?></span>
                                    <a href="<?php echo $item['product_slug'] ?>">
                                        <div class="prod-img"><img src="<?php echo $path_prods_img . get_image_prods($item['product_id']) ?>" alt=""></div>
                                        <div class="prod-name"><?php echo $item['product_name'] ?></div>
                                        <div class="prod-price">
                                            <del><?php echo currency_format($item['product_price']) ?></del>
                                            <span class="disscount-price"><?php echo currency_format(disscount_price($item['product_sales'], $item['product_price'])) ?></span>
                                        </div>
                                    </a>
                                    <div class="btn-buy">
                                        <a href="<?php echo base_url('?mod=cart&action=add_cart&prod_id=' . $item['product_id']) ?>" class="add-cart">Thêm vào giỏ</a>
                                        <a href="<?php echo base_url('?mod=cart&action=add_cart&prod_id=' . $item['product_id'] . '&process=mua-ngay') ?>" class="buy">Mua ngay</a>
                                    </div>
                                </li>
                            <?php } ?>
                        </div>
                    </ul>
                </div>
                <div class="button-slider-prod">
                    <div class="btn-prev-prod disscount"><i class="fa-solid fa-circle-chevron-left"></i></div>
                    <div class="btn-next-prod disscount"><i class="fa-solid fa-circle-chevron-right"></i></div>
                </div>
            </div>
            <hr>
            <div class="prod featured">
                <h2 style="margin-top: 5px;">Sản phẩm nổi bật <span><i class="fa-solid fa-fire"></i></span> </h2>
                <div class="slider-prod">
                    <ul class="list-prod">
                        <div class="slider-item-prod">
                            <?php foreach ($list_prods_up_sales as $item) { ?>
                                <li class="prod-item">
                                    <span class="hot_prod">Nổi bật</span>
                                    <?php if ($item['product_sales'] > 0) echo "<div class='sales_note'> Giảm " . $item['product_sales'] . "% </div>"; ?>
                                    <a href="<?php echo $item['product_slug'] ?>">
                                        <div class="prod-img"><img src="<?php echo $path_prods_img . get_image_prods($item['product_id']) ?>" alt=""></div>
                                        <div class="prod-name"><?php echo $item['product_name'] ?></div>
                                        <div class="prod-price"><?php echo currency_format($item['product_price']) ?></div>
                                    </a>
                                    <div class="btn-buy">
                                        <a href="<?php echo base_url('?mod=cart&action=add_cart&prod_id=' . $item['product_id']) ?>" class="add-cart">Thêm vào giỏ</a>
                                        <a href="<?php echo base_url('?mod=cart&action=add_cart&prod_id=' . $item['product_id'] . '&process=mua-ngay') ?>" class="buy">Mua ngay</a>
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
            <hr>
            <div class="prod regular">
                <div class="title">
                    <h2 style="margin-top: 5px;">Tất cả sản phẩm <span><i class="fa-brands fa-product-hunt" style="color: blue;"></i></span> </h2>
                    <form action="" method="post">
                        <div class="filter">
                            Bộ lọc:
                            <select name="filter_price" id="filter_price">
                                <option value="0">Lọc theo giá</option>
                                <option value="1">0 - 100.000đ</option>
                                <option value="2">100.000đ - 200.000đ</option>
                                <option value="3">200.000đ - 300.000đ</option>
                                <option value="4">Trên 300.000đ</option>
                            </select>
                        </div>
                    </form>

                </div>
                <ul id="list-product">
                    <?php foreach ($list_prods as $item) { ?>
                        <li class="regular">
                            <div class="prod-img">
                                <a href="<?php echo $item['product_slug'] ?>">
                                    <img src="<?php echo $path_prods_img . get_img_prod($item['product_id']) ?>" alt="">
                                </a>
                                <?php if (!empty($item['product_sales'])) { ?>
                                    <div class="sale-note"> Giảm <?php echo $item['product_sales'] ?>%</div>
                                <?php } ?>
                                <?php if ($item['product_up_sales'] == 'yes') { ?>
                                    <span class="hot-prod-note <?php if (!empty($item['product_sales'])) echo "both-note" ?>">Nổi bật</span>
                                <?php } ?>
                            </div>
                            <div class="prod-name"><?php echo $item['product_name'] ?></div>
                            <div class="prod-price">
                                <?php if ($item['product_sales'] > 0) {
                                    echo "<del>" . currency_format($item['product_price']) . "</del>";
                                    echo "&nbsp&nbsp";
                                    echo "<span class='disscount-price'>" . currency_format(disscount_price($item['product_sales'], $item['product_price'])) . "</span>";
                                } else {
                                    echo currency_format($item['product_price']);
                                } ?>
                            </div>
                            <div class="btn-buy">
                                <a href="<?php echo base_url('?mod=cart&action=add_cart&prod_id=' . $item['product_id']) ?>" class="add-cart">Thêm vào giỏ</a>
                                <a href="<?php echo base_url('?mod=cart&action=add_cart&prod_id=' . $item['product_id'] . '&process=mua-ngay') ?>" class="buy">Mua ngay</a>
                            </div>
                        </li>
                    <?php } ?>
                </ul>

                <div class="see-more-prod">
                    <a><span>Xem thêm...</span></a>
                </div>

            </div>
        </div>
        <div class="shop-support">
            <h2>Vì sao bạn nên chọn chúng tôi ?</h2>
            <?php get_support() ?>
        </div>
        <div class="shop-reviews">
            <i class="fa-solid fa-ranking-star icon-title"></i>
            <h2>Đánh giá của khách hàng </h2>
            <div class="slider-focus-main">
                <ul class="slider-user-comment">
                    <?php foreach ($list_prods_review as $item) { ?>
                        <li>
                            <div class="name"><?php echo $item['fullname'] ?></div>
                            <div class="date"><?php echo set_date($item['created_at']) ?></div>
                            <div class="rating"><?php echo set_rating($item['product_rating']) ?></div>
                            <div class="comment"><?php echo $item['product_review'] ?></div>
                        </li>
                    <?php } ?>
                </ul>
                <div class="btn-next-prev">
                    <i class="fa-solid fa-circle-chevron-left btn-prev-comment"></i>
                    <i class="fa-solid fa-circle-chevron-right btn-next-comment"></i>
                </div>
            </div>
        </div>
        <div id="go-shopping">
            <div class="shirt">
                <div class="title">ÁO</div>
                <a href="san-pham/ao"><img src="./public/images/ao.jpg" alt=""></a>
            </div>
            <div class="pants">
                <div class="title">QUẦN</div>
                <a href="san-pham/quan"><img src="./public/images/quan.jpg" alt=""></a>
            </div>
        </div>
    <?php } else { ?>
        <?php $list_prod_by_search = get_list_prod_by_search($_GET['search_prod']) ?>
        <div class="product">
            <div class="prod-regular">
                <h2 style="margin-top: 5px;">Sản phẩm theo tìm kiếm (<?php echo $_GET['search_prod'] ?>) <i class="fa-solid fa-magnifying-glass"></i> </h2>
                <ul class="list-prods-regular" style="margin-top: 20px;">
                    <?php if (!empty($list_prod_by_search)) { ?>
                        <?php foreach ($list_prod_by_search as $item) { ?>
                            <li>
                                <a href="<?php echo $item['product_slug'] ?>">
                                    <div class="prod-img"><img src="<?php echo $path_prods_img . get_image_prods($item['product_id']) ?>" alt=""></div>
                                    <?php if (!empty($item['product_sales'])) { ?>
                                        <div class="sale-note"> Giảm <?php echo $item['product_sales'] ?>%</div>
                                    <?php } ?>
                                    <?php if ($item['product_up_sales'] == 'yes') { ?>
                                        <span class="hot-prod-note <?php if (!empty($item['product_sales'])) echo "both-note" ?>">Nổi bật</span>
                                    <?php } ?>
                                    <div class="prod-name"><?php echo $item['product_name'] ?></div>
                                    <div class="prod-price"><?php echo currency_format($item['product_price']) ?></div>
                                </a>
                                <div class="btn-buy">
                                    <a href="?mod=cart&action=add_cart&prod_id=<?php echo $item['product_id'] ?>" class="add-cart">Thêm vào giỏ</a>
                                    <a href="?mod=cart&action=add_cart&prod_id=<?php echo $item['product_id'] ?>&process=mua-ngay" class="buy">Mua ngay</a>
                                </div>
                            </li>
                        <?php } ?>
                    <?php } else {
                        get_404("trang-chu");
                    } ?>
                </ul>
            </div>
        </div>
    <?php } ?>
</div>
<?php get_footer() ?>