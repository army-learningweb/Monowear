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
        <div id="data-show" class="order">
            <?php if(!empty($list_orders)) { ?>
            <div class="title">Danh sách đơn hàng</div>
            <div class="count-total">
                <div class="statis">
                    <span class="total">Tổng</span> ( <?php echo $total_orders ?> ) |</span>

                    <span style="font-weight: normal;" class="statis wait">Chờ xử lý</span>
                    ( <span class="result pending_order"> <?php echo $pending_status['total'] ?> </span> ) |

                    <span style="font-weight: normal;" class="statis crash">Đang xử lý</span>
                    ( <span class="result processing_order"> <?php echo $processing_status['total'] ?> </span> ) |

                    <span style="font-weight: normal;" class="statis save">Đã gửi hàng</span>
                    ( <span class="result shiped_order"> <?php echo $shiped_status['total'] ?> </span> ) |

                    <span style="font-weight: normal;" class="statis on">Đã giao hàng</span>
                    ( <span class="result delivered_order"> <?php echo $delivered_status['total'] ?> </span> ) |

                    <span style="font-weight: normal;" class="statis off">Đã hủy</span>
                    ( <span class="result canceled_order"> <?php echo $canceled_status['total'] ?> </span> )
                </div>
                 <div class="search">
                    <form action="" method="get" id="form_search">
                        <input type="hidden" name="mod" value="sales">
                        <input type="hidden" name="action" value="list_orders">

                        <input type="search" name="search_prod" id="" placeholder="Mã đơn hàng...">
                        <button type="submit" name="btn-search"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>
                <div class="filter">
                    <form action="" method="get" id="form_filter_status">
                        <input type="hidden" name="mod" value="sales">
                        <input type="hidden" name="action" value="list_orders">
                        
                        <select name="filter_status" id="filter_status">
                            <option value="">- Lọc theo trạng thái -</option>
                            <?php $filter_status = $_GET['filter_status'] ?>
                            <option value="pending"<?php if(isset($filter_status) && $filter_status == 'pending' ) echo "selected" ?>>Chờ xử lý</option>
                            <option value="processing"<?php if(isset($filter_status) && $filter_status == 'processing' ) echo "selected" ?>>Đang xử lý</option>
                            <option value="shipped"<?php if(isset($filter_status) && $filter_status == 'shipped' ) echo "selected" ?>>Đã gửi hàng</option>
                            <option value="delivered"<?php if(isset($filter_status) && $filter_status == 'delivered' ) echo "selected" ?>>Đã giao hàng</option>
                            <option value="canceled"<?php if(isset($filter_status) && $filter_status == 'canceled' ) echo "selected" ?>>Đã hủy</option>
                        </select>

                        <input type="submit" name="btn-filter" value="Sàng lọc" style="font-size:0.9rem">
                        <a href="?mod=sales&action=list_orders" class="reset">Reset</a>
                    </form>
                </div>
            </div>
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
                            <td>Cập nhật</td>
                            <td>Thời gian</td>
                            <td>Chi tiết</td>
                            <td colspan="2"></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $num = $start + 1;
                        foreach ($list_orders as $order) {
                        ?>
                            <tr>
                                <td><?php echo $num++ ?></td>
                                <td class="text-left"><?php echo $order['order_code'] ?></td>
                                <td class="text-left name"><?php echo get_customer_name($order['customer_id']) ?></td>
                                <td><?php echo $order['product_quantity'] ?></td>
                                <td><?php echo currency_format($order['total_amount'])?></td>
                                <td class="text-center status-<?php echo $order['order_id'] ?>"><?php echo set_status_order($order['status'])?></td>
                                <td>
                                    <select name="" class="status_change_order" data-id="<?php echo $order['order_id'] ?>">
                                        <option value="pending" <?php if (isset($order['status']) && $order['status'] == 'pending') echo "selected"; ?>>Chờ xử lý</option>
                                        <option value="processing" <?php if (isset($order['status']) && $order['status'] == 'processing') echo "selected"; ?>>Đang xử lý</option>
                                        <option value="shipped" <?php if (isset($order['status']) && $order['status'] == 'shipped') echo "selected"; ?>>Đã gửi hàng</option>
                                        <option value="delivered" <?php if (isset($order['status']) && $order['status'] == 'delivered') echo "selected"; ?>>Đã giao hàng</option>
                                        <option value="canceled" <?php if (isset($order['status']) && $order['status'] == 'canceled') echo "selected"; ?>>Đã hủy</option>
                                    </select>
                                </td>
                                <td><?php echo set_date($order['created_at']) ?></td>
                                <td><a href="?mod=sales&action=order_details&order_id=<?php echo $order['order_id'] ?>">Chi tiết</a></td>
                                <td>
                                    <a href='?mod=sales&action=delete_order&order_id=<?php echo $order['order_id'] ?>' onclick='return confirm("Bạn có chắc muốn xóa ?")'>
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
            }else{
                get_404("?mod=sales&action=list_orders");
            }
            ?>
        </div>
    </div>
</div>
<?php get_footer() ?>