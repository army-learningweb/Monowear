<?php
$list_menu = get_list_menu();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <base href="<?php echo base_url('trang-chu')?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/import/fontawsome/css/all.css">
    <link rel="stylesheet" href="./public/css/home.css">
    <link rel="stylesheet" href="./public/css/page.css">
    <link rel="stylesheet" href="./public/css/product.css">
    <link rel="stylesheet" href="./public/css/cart.css">
    <link rel="stylesheet" href="./public/css/responsive.css">
    <link rel="stylesheet" href="./public/css/checkout.css">
    <link rel="stylesheet" href="./public/css/global.css">
    <script src="./public/import/jquery/jquery-3.7.1.min.js"></script>
    <title>MONOWEAR</title>
</head>

<body>
    <div id="wrapper">
        <?php get_sub_header() ?>
        <div id="header">
            <nav>
                <div class="toggle-btn"><i class="fa-solid fa-bars"></i></div>
                <div class="left-area">
                    <div class="brand"><a href=""><span>MONO</span> WEAR </a></div>
                    <?php echo render_menu($list_menu, 0, 0, "main_menu") ?>
                    <?php echo render_menu($list_menu, 0, 0, "responsive_main_menu") ?>
                </div>
                <div class="right-area">
                    <?php if (!empty($_SESSION['customer'])) { ?>
                        <span class="member_name">
                            Xin chào ( <?php echo $_SESSION['customer']['username'] ?> )</span>
                    <?php } ?>
                    <div class="member">
                        <a href="dang-nhap" class="<?php if(!empty($_SESSION['customer'])) echo "disable" ?>"><i class="fa-solid fa-user"></i></a>
                        <div class="show-member-info">
                            <?php if (!empty($_SESSION['customer'])) { ?>
                                <a href="trang-chu/thong-tin-thanh-vien">Thông tin / Đơn hàng</a>
                                <a href="?mod=user&action=logout">Đăng xuất</a>
                            <?php } else { ?>
                                <a href="dang-nhap">Đăng nhập thành viên</a>
                                <a href="dang-ky">Đăng ký thành viên</a>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="cart">
                        <a href="gio-hang"><i class="fa-solid fa-basket-shopping"></i></a>
                        <div class="show-cart">
                            <?php if (isset($_SESSION['cart']['buy'])) { ?>
                                <p>Có ( <span class="header-total"><?php echo $_SESSION['cart']['total']['total_quantity'] ?></span> ) sản phẩm trong giỏ</p>
                                <table>
                                    <?php foreach($_SESSION['cart']['buy'] as $item) { ?>
                                    <tr>
                                        <td><img src="public/uploads/images/product/<?php echo $item['product_img'] ?>" alt="" style="width:30px"></td>
                                        <td>
                                            <div class="prod_name"><?php echo $item['product_name'] ?></div>
                                            <div class="prod_price"><?php echo currency_format($item['product_price']) ?></div>
                                        </td>
                                        <td class="small-num-order-<?php echo $item['product_id'] ?>">x<?php echo $item['product_quantity'] ?></td>
                                    </tr>
                                    <?php } ?>
                                </table>
                            <?php }else{ ?>
                                <p class='text-right'> Giỏ hàng của bạn trống trơn !</p>
                            <?php } ?>
                            <a href="gio-hang">Đi đến giỏ hàng</a>
                        </div>
                        <?php if (isset($_SESSION['cart']['total'])) { ?>
                            <span class="num_order"><?php echo !empty($_SESSION['cart']['total']) ? $_SESSION['cart']['total']['total_quantity'] : '' ?></span>
                        <?php } ?>
                    </div>
                </div>
            </nav>
        </div>