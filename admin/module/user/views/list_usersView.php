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
            <?php if (!empty($list_users)) { ?>
                <div class="title">Danh sách Admin</div>
                <div class="count-total">
                    <div class="statis" style="margin-top: 10px;">
                        <span class="total">Tổng</span> ( <?php echo $total_list_users ?> ) người quản lí
                    </div>
                </div>
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Họ tên</td>
                                <td>Quyền hạn</td>
                                <td>Email</td>
                                <td>Địa chỉ</td>
                                <td>Điện thoại</td>
                                <td class="text-center">Đăng nhập</td>
                                <td class="text-center">Trạng thái</td>
                                <td colspan="2" class="text-center"></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $num = $start + 1; 
                                foreach($list_users as $user) { 
                            ?>
                            <tr>
                                <td><?php echo $num++ ?></td>
                                <td><?php echo $user['fullname'] ?></td>
                                <td><?php echo $user['user_role'] ?></td>
                                <td><?php echo $user['email'] ?></td>
                                <td><?php echo $user['address']?></td>
                                <td><?php echo $user['tel'] ?></td>
                                <td class="text-center"><?php echo empty($user['login_at']) ? " - " : set_date_time($user['login_at']) ?></td>
                                <td class="text-center"><?php echo set_status_user($user['status'])?></td>
                                <td class="text-center"><a href="?mod=user&action=update_user&id=<?php echo $user['user_id'] ?>"><i class="fa-solid fa-gear"></i></a></td>
                                <td class="text-center">
                                    <a href="?mod=user&action=delete_user&id=<?php echo $user['user_id'] ?>" onclick="return confirm('Bạn có chắc muốn xóa ?')">
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
                get_404("?mod=user&action=list_users");
            } ?>
        </div>
    </div>
</div>
<?php get_footer() ?>