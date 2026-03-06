<?php
get_header();
get_alert_failed(); 
get_alert_success();

?>
<script>
    localStorage.clear()
</script>
<div id="wp-content">
    <div id="sidebar">
        <?php get_sidebar() ?>
    </div>
    <div id="content">
        <div id="top-bar">
            <?php get_topbar() ?>
        </div>
        <div id="data-show" class="dashboard">
            <div class="title">Thống kê / <a href="?mod=sales&action=list_orders">Đơn hàng mới</a></div>
            <div class="box">
                <a href="" class="order-quantity">
                    <i class="fa-solid fa-money-bill"></i> Doanh số (<b> <?php echo currency_format($revenue) ?> </b>)
                </a>
                <a href="?mod=sales&action=list_orders" class="order-quantity">
                    <i class="fa-solid fa-list-ol"></i> Đơn hàng (<b> <?php echo $order_quantity ?> </b>)
                </a>
                <a href="?mod=sales&action=list_customers" class="order-quantity">
                    <i class="fa-solid fa-user"></i> Khách hàng (<b> <?php echo $customers_quantity ?> </b>)
                </a>
                <a href="?mod=product&action=list_prods" class="order-quantity">
                    <i class="fa-brands fa-product-hunt"></i> Sản phẩm (<b> <?php echo $product_quantity ?> </b>)
                </a>
                <a href="?mod=post&action=list_posts" class="order-quantity">
                    <i class="fa-solid fa-pencil"></i> Bài viết (<b> <?php echo $post_quantity ?> </b>)
                </a>
                <a href="?mod=slider&action=list_sliders" class="order-quantity">
                    <i class="fa-solid fa-sliders"></i> Slider / Quảng cáo (<b> <?php echo $slider_quantity ?> </b>)
                </a>
            </div>
            <div class="new-order">
                <div class="table-responsive">
                    <table class="text-center">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td class="text-left">Mã đơn hàng</td>
                                <td class="text-left">Họ và tên</td>
                                <td>Số sản phẩm</td>
                                <td>Tổng tiền</td>
                                <td>Trạng thái</td>
                                <td>Thời gian</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $num = $start + 1;
                            foreach ($new_order as $order) {
                            ?>
                                <tr>
                                    <td><?php echo $num++ ?></td>
                                    <td class="text-left"><?php echo $order['order_code'] ?></td>
                                    <td class="text-left name"><?php echo get_customer_name($order['customer_id']) ?></td>
                                    <td><?php echo $order['product_quantity'] ?></td>
                                    <td><?php echo currency_format($order['total_amount']) ?></td>
                                    <td><?php echo set_status_order($order['status']) ?></td>
                                    <td><?php echo set_date($order['created_at']) ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

                <?php echo $pagging_page ?>
            </div>

        </div>
    </div>
</div>
<?php get_footer() ?>