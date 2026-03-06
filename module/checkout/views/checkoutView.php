<?php
get_header();
get_alert_failed();
get_alert_success();
?>
<div id="content">
    <div class="box-checkout">
        <h2>Thanh toán</h2>
        <hr>
        <form action="" method="post" id="form-order">
            <div class="customer-info">
                <h3>Thông tin giao hàng</h3>
                <div class="input-group">
                    <input type="text" name="fullname" id="fullname" placeholder="" value="<?php echo get_value('fullname') ?>">
                    <label for="fullname">Họ tên</label>
                </div>
                <?php check_error('fullname') ?>
                <p style='color:red; font-size:13px; margin: 6px 0' class="error_checkout_fullname"></p>
                <div class="input-group">
                    <input type="text" name="tel" id="tel" placeholder="" value="<?php echo get_value('tel') ?>">
                    <label for="tel">Số điện thoại</label>
                </div>
                <?php check_error('tel') ?>
                <p style='color:red; font-size:13px; margin: 6px 0' class="error_checkout_tel"></p>
                <div class="input-group">
                    <input type="text" name="email" id="email" placeholder="" value="<?php echo get_value('email') ?>">
                    <label for="email">Email</label>
                </div>
                <?php check_error('email') ?>
                <p style='color:red; font-size:13px; margin: 6px 0' class="error_checkout_email"></p>
                <div class="input-group">
                    <input type="text" name="address" id="address" placeholder="" value="<?php echo get_value('address') ?>"">
                    <label for=" address">Địa chỉ nhận hàng</label>
                </div>
                <?php check_error('address') ?>
                <p style='color:red; font-size:13px; margin: 6px 0' class="error_checkout_address"></p>
                <br>
                <div class="note-order">
                    <h3>Ghi chú <span style="font-weight: normal;font-size:0.9rem;">( Không bắt buộc )</span></h3>
                    <textarea name="note-order" id=""></textarea>
                </div>
            </div>
            <div class="order-bill">
                <h3 style="margin-bottom: 12px;">Đơn hàng của bạn</h3>
                <ul>
                    <?php foreach ($_SESSION['cart']['buy'] as $item) { ?>
                        <li>
                            <div class="left-order">
                                <div class="order-item-img"><img src="<?php echo $path_img . get_img_item($item['product_id']) ?>" alt=""></div>
                            </div>
                            <div class="right-order">
                                <div class="order-item-name"><?php echo $item['product_name'] ?> <span style="font-size: 0.7rem;">X</span> <?php echo $item['product_quantity'] ?></div>
                                <div class="order-item-price">Đơn giá: <?php echo currency_format($item['product_price']) ?></div>

                            </div>
                            <div class="order-item-total">Tổng: <span style="font-weight: 600;"><?php echo currency_format($item['product_sub_price']) ?></span></div>
                        </li>
                        <hr>
                    <?php } ?>
                </ul>
                <div class="payment-method">
                    <h4 style="color:gray">Chọn phương thức thanh toán</h4>
                    <div class="input-group-payment">
                        <input type="radio" name="payment_method" id="COD" value="COD" checked>
                        <label for="COD" class="payment"> <i class="fa-solid fa-truck-fast"></i> &nbsp; Thanh toán khi nhận hàng <b style="font-weight: 500;">- 30.000đ</b> </label>
                    </div>
                    <div class="input-group-payment">
                        <input type="radio" name="payment_method" id="OnlinePayment" value="Online Payment" <?php if(isset($_SESSION['cart']['order']['order_method']) && $_SESSION['cart']['order']['order_method'] == 'Online Payment') echo "checked" ?>>
                        <label for="OnlinePayment" class="payment"> <i class="fa-solid fa-money-check"></i> &nbsp; Thanh toán Online <b style="font-weight: 500;">- Miễn phí</b></label>
                    </div>
                </div>
                <hr>
                <p style="margin-bottom:10px">Tạm tính : <span style="font-weight: 500;"><?php echo currency_format($_SESSION['cart']['total']['total_price']) ?></span></p>
                <p>Phí vận chuyển: <span style="font-weight: 500;" class="shipping_fee"><?php if(isset($_SESSION['cart']['order']['order_method']) && $_SESSION['cart']['order']['order_method'] == 'Online Payment') { echo "0 đ";}else{echo currency_format($shipping_fee);} ?></span></p>
                <hr>
                <h3 class="total_pay">TỔNG THANH TOÁN :  <span><?php echo currency_format($_SESSION['cart']['order']['total_shipping_price'])?></span></h3>
                <input type="submit" name="btn-order" value="ĐẶT HÀNG" class="confirm-order">
                <a href="gio-hang" class="back-to-cart"> <i class="fa-solid fa-arrow-left"></i> Quay lại giỏ hàng</a>
            </div>
        </form>
    </div>
</div>
<script>
    localStorage.clear();
</script>
<?php get_footer() ?>