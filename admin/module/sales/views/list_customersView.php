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
        <div id="data-show">
            <?php if (!empty($list_customers)) { ?>
                <div class="title">Danh sách khách hàng</div>
                <div class="count-total">
                    <div class="statis" style="margin-top: 10px;">
                        <span class="total">Tổng</span> ( <?php echo $total_customers ?> ) Khách hàng
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="tb_customers">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Họ tên</td>  
                                <td>Email</td>      
                                <td>Vai trò</td>
                                <td class="text-center">Điện thoại</td>
                                <td class="text-center">Địa chỉ</td>
                                <td class="text-center">Trạng thái</td>
                                <td class="text-center">Đơn hàng</td>
                                <td class="text-center">Ngày khởi tạo</td>       
                                <td colspan="2" class="text-center"></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $num = $start + 1; 
                                foreach($list_customers as $customers ) { 
                            ?>
                            <tr>
                                <td><?php echo $num++ ?></td>
                                <td><?php echo $customers['fullname'] ?></td>
                                <td><?php echo $customers['email'] ?></td>
                                <td><?php echo set_role_customer($customers['is_member'])?></td>
                                <td class="text-center"><?php echo $customers['tel'] ?></td>
                                <td class="text-center"><?php echo $customers['address']?></td>
                                <td class="text-center"><?php echo set_status_customer($customers['is_active']) ?></td>
                                <td class="text-center"><?php echo count_order($customers['customer_id'])?></td>
                                <td class="text-center"><?php echo set_date($customers['created_at'])?> </td>
                                <td class="text-center"><a href="?mod=sales&action=update_customer&id=<?php echo $customers['customer_id'] ?>"><i class="fa-solid fa-gear"></i></a></td>
                                <td class="text-center">
                                    <a href="?mod=sales&action=delete_customer&id=<?php echo $customers['customer_id'] ?>" onclick="return confirm('Bạn có chắc muốn xóa ? Xóa khách hàng sẽ xóa luôn đơn hàng của khách hàng')">
                                        <i class="fa-solid fa-circle-minus"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php echo $pagging_page ?>
                </div>
            <?php }else{
                get_404("?mod=sales&action=list_customers");
            } ?>
        </div>
    </div>
</div>
<?php get_footer() ?>