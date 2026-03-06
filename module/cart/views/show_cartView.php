<?php
get_header();
get_alert_success();
get_alert_failed();
?>
<div id="content">
    <div class="cart-page">
        <div class="cart-info">
            <h3>Giỏ hàng</h3>
            <hr>
            <?php if (!empty($_SESSION['cart']['buy'])) { ?>
                <a href="?mod=cart&action=delete_prod" class="delete-all"><i class="fa-solid fa-xmark"></i></a>
                
                    <div class="table-responsive">
                        <form action="" method="post">
                        <table>
                            <thead>
                                <tr>
                                    <th class="text-left">Mã</th>
                                    <th class="text-left">Tên</th>
                                    <th>Ảnh</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($_SESSION['cart']['buy'] as $item) { ?>
                                    <tr>
                                        <td class="text-left"><?php echo $item['product_code'] ?></td>
                                        <td class="text-left"><?php echo $item['product_name'] ?></td>
                                        <td><img src="<?php echo $path_img . $item['product_img'] ?>" alt="" style="width:50px;border-radius:5px"></td>
                                        <td><?php echo currency_format($item['product_price']) ?></td>
                                        <td>
                                            <i class="fa-solid fa-minus cart-show" style="padding: 10px; cursor:pointer"></i>
                                            <input type="text" class="qty" data-id="<?php echo $item['product_id'] ?>" value="<?php echo $item['product_quantity'] ?>" style="width:30px; text-align:center; padding:5px" readonly>
                                            <i class="fa-solid fa-plus cart-show" style="padding: 10px; cursor:pointer"></i>
                                        </td>
                                        <td class="show-sub-price-<?php echo $item['product_id'] ?>"><?php echo currency_format($item['product_sub_price']) ?></td>
                                        <td><a href="?mod=cart&action=delete_item&prod_id=<?php echo $item['product_id'] ?>"><i class="fa-solid fa-trash"></i></a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        </form>
                    </div>
                
                <hr style="margin-top: 0px;">
                <div class="buy-more-box">
                    <h4 style="margin-right: 20px" class="total"><span style="font-weight: normal;">Tổng: </span><span class="price"><?php echo currency_format($_SESSION['cart']['total']['total_price']) ?></span></h4>
                    <a href="?mod=home&action=index" class="buy-more">Tiếp tục mua sắm</a>
                </div>
            <?php } else {
                echo "<p style='margin-top: 15px;color:gray'> Giỏ hàng của bạn đang trống trơn !</p>";
                check_error('cart');
            } ?>
        </div>
        <div class="order-info">
            <h3>Tóm tắt đơn hàng</h3>
            <hr>
            <?php if (!empty($_SESSION['cart'])) { ?>
                <p>Tạm tính <b class="tmp_price"><?php echo currency_format($_SESSION['cart']['total']['total_price']) ?> </b></p>
                <p>Phí vận chuyển <span style="color:gray" class="shipping_price">Chưa</span></p>
                <hr>
                <h3>Tổng thanh toán <span class="pay_price"><?php echo currency_format($_SESSION['cart']['total']['total_price']) ?></span></h3>
                <a href="gio-hang/tien-hanh-thanh-toan" class="order-btn">Tiến hành thanh toán</a>
            <?php } ?>
        </div>
    </div>
    <div class="prod fetured introduce">
        <h2 style="margin-top: 10px;">Có thể bạn sẽ thích</h2>
        <div class="slider-prod">
            <ul class="list-prod">
                <div class="slider-item-prod">
                    <?php foreach ($list_prods as $item) { ?>
                        <li class="prod-item">
                            <?php if ($item['product_sales'] > 0) { ?>
                                <span class="disscount_number">Giảm <?php echo $item['product_sales'] . "%" ?></span>
                            <?php } ?>
                            <?php if ($item['product_up_sales'] == 'yes') { ?>
                                <span class="hot-prod-note <?php if (!empty($item['product_sales'])) echo "both-note" ?>">Nổi bật</span>
                            <?php } ?>
                            <a href="<?php echo $item['product_slug'] ?>">
                                <div class="prod-img">
                                    <img src="<?php echo $path_img . get_main_img_prod($item['product_id']) ?>" alt="">

                                </div>
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
</div>
<script>
    localStorage.clear();
</script>
<?php get_footer() ?>