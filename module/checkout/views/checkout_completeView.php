<?php
get_header();
get_alert_success();
?>
<div id="content">
    <div class="checkout-complete">
        <h1 style="color:green;font-size:3.5rem"><i class="fa-solid fa-circle-check"></i></h1>
        <h2 style="color: green;">Đặt hàng thành công ! </h2>
        <p>Cám ơn bạn đã mua sắm tại <span style="font-weight: 700; color: #2F46DA">MONOWEAR</span></p>
        <p>Đơn hàng đã được ghi nhận và đang chờ xử lí</p>
        <a href="https://mail.google.com" class="box-email">
            <i class="fa-solid fa-envelope" style="font-size: 1.5rem;"></i> &nbsp; &nbsp; Đơn hàng đã được gửi đến Email của bạn
        </a>
        <div class="box-email-problem">
            <div class="left-area"><i class="fa-solid fa-question"></i></div>
            <div class="right-area">
                <p style="margin-bottom: 5px;">Không tìm thấy Email ?</p>
                <p>Kiểm tra thư mục <b>Spam / Quảng cáo</b> hoặc liên hệ với chúng tôi </p>
            </div>
        </div>
        <div class="order-service">
            <h3> <i class="fa-solid fa-clipboard-list"></i> Về đơn hàng</h3> <br>
            <p style="margin-bottom:5px"><i class="fa-solid fa-clock"></i>&nbsp; Đơn hàng sẽ được xử lí trong 24h làm việc</p>
            <?php if(isset($_SESSION['customer'])) { ?>
                <p><i class="fa-solid fa-user"></i>&nbsp; Nếu đã là tài thành viên bạn có thể kiểm tra tại <a href="trang-chu/thong-tin-thanh-vien">lịch sử đơn hàng</a></p>
            <?php } ?>
        </div>
        <div class="btn-buy-more">
            <a href="trang-chu" class="buy-more"> Tiếp tục mua sắm</a>
            <a href="trang-chu" class="back-home">Trở về trang chủ</a>
        </div>
    </div>
</div>
<script>
    localStorage.clear();
</script>
<?php get_footer() ?>