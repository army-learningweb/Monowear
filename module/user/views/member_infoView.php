<?php 

get_header();
get_alert_success();
get_alert_failed();

?>
<div id="content">
    <div class="member-info">
        <div class="left-area">
            <h3>Thông tin cá nhân</h3>
            <form action="" method="post" id="form-buy">
                <div class="input-group">
                    <input type="text" name="fullname" id="fullname" placeholder="" value="<?php echo $member_info['fullname'] ?>">
                    <label for="fullname">Họ tên</label>
                </div>
                <?php check_error('fullname') ?>
                <div class="input-group">
                    <input type="text" name="email" id="email" placeholder="" value="<?php echo $member_info['email'] ?>">
                    <label for="email">Email</label>
                </div>
                <?php check_error('email') ?>
                <div class="input-group">
                    <input type="text" name="tel" id="tel" placeholder="" value="<?php echo $member_info['tel'] ?>">
                    <label for="tel">Số điện thoại</label>
                </div>
                <?php check_tel('tel') ?>
                <div class="input-group">
                    <input type="text" name="address" id="address" placeholder="" value="<?php echo $member_info['address'] ?>">
                    <label for="address">Địa chỉ</label>
                </div>
                <?php check_tel('address') ?>
                <input type="submit" name="btn-update" value="Thay đổi thông tin" style="color:white; margin-top:10px">
            </form>
        </div>
        <div class="right-area">
            <h3 style="margin-bottom: 10px;">Lịch sử mua hàng</h3>
            <div class="box">
                <?php foreach ($member_order as $order) { ?>
                    <div class="history-order">
                        <p style="margin-bottom:5px">Đơn hàng : <b><?php echo $order['order_code'] ?></b></p>
                        <p>Thời gian: <?php echo set_date_time($order['created_at']) ?></p>
                        <hr style="margin-top: 10px;">
                        <table class="text-center" style="width: 100%;">
                            <thead>
                                <tr>
                                    <td>Ảnh</td>
                                    <td>Tên</td>
                                    <td>Số lượng</td>
                                    <td>Giá</td>
                                    <td>Thành tiền</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $item_order = get_item_order($order['order_id']);
                                foreach ($item_order as $item) {
                                ?>
                                    <tr>
                                        <td><img src="<?php echo $path_img_prod . get_prod_img($item['product_id']) ?>" alt="" width="40px" ;></td>
                                        <td><?php echo get_prod_name($item['product_id']) ?></td>
                                        <td><?php echo $item['quantity'] ?></td>
                                        <td><?php echo currency_format($item['price']) ?></td>
                                        <td><?php echo currency_format($item['price'] * $item['quantity']) ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <p style="margin-top: 10px;">Tổng : <span style="color:green; font-weight: bold"><?php echo currency_format($order['total_amount']) ?></span></p>
                        <div class="note"><?php echo set_status_order($order['status']) ?></div>
                    </div>
                <?php } ?>
            </div>

        </div>
    </div>
</div>
<script>
    localStorage.clear();
</script>
<?php get_footer() ?>