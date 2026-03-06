<?php
get_header();
$path_img = "public/uploads/images/product/";
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
            <div class="title">Thông tin đơn hàng của ( <?php echo get_customer_name($order_info['customer_id']) ?> )</div>
            <p style="margin-top:15px"><i class="fa-solid fa-barcode"></i> Mã đơn hàng : <?php echo $order_info['order_code'] ?></p>
            <p style="margin-top:15px"><i class="fa-solid fa-location-dot"></i> Địa chỉ nhận hàng : <?php echo $order_info['shipping_address'] ?> </p>
            <p style="margin-top:15px"><i class="fa-solid fa-money-check"></i> Hình thức thanh toán : <?php echo $order_info['payment_method'] ?> </p>

            <div class="title" style="margin-top:20px">Sản phẩm đơn hàng</div>
            <table style="margin-top:15px" class="text-center">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Ảnh sản phẩm</td>
                        <td>Tên sản phẩm</td>
                        <td>Đơn giá</td>
                        <td>Số lượng</td>
                        <td>Thành tiền</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($order_item as $item) { ?>
                    <tr>
                        <td>#</td>
                        <td><img src="<?php echo get_product_img($item['product_id']) ?>" alt="" width="45px"></td>
                        <td><?php echo get_product_name($item['product_id']) ?></td>
                        <td><?php echo currency_format($item['price'])?></td>
                        <td><?php echo $item['quantity'] ?></td>
                        <td><?php echo currency_format($item['quantity'] * $item['price']) ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

            <div class="title" style="margin-top:20px">Giá trị đơn hàng</div>
            <p style="margin-top:15px">Tổng số lượng : <?php echo $order_info['product_quantity'] ?></p>
            <p style="margin-top:15px"><span style="color:red">Tổng tiền : <?php echo currency_format($order_info['total_amount']) ?> </span> </p>
            <?php go_back("?mod=sales&action=list_orders","Quay lại") ?>
        </div>
    </div>
</div>
<?php get_footer() ?>