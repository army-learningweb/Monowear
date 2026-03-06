<?php
get_header();
?>
<div id="content">
    <div class="product-list">
        <h2 style="margin-left:15px"><?php echo get_title_page($slug) ?></h2>
        <ul id="list-product">
            <?php foreach ($list_prods as $item) { ?>
                <li class="page-product">
                    <div class="prod-img">
                        <a href="<?php echo $item['product_slug'] ?>">
                            <img src="<?php echo $path_img_prods . get_img_prod($item['product_id']) ?>" alt="">
                        </a>
                        <?php if (!empty($item['product_sales'])) { ?>
                            <div class="sale-note"> Giảm <?php echo $item['product_sales'] ?>%</div>
                        <?php } ?>
                        <?php if ($item['product_up_sales'] == 'yes') { ?>
                            <span class="hot-prod-note <?php if (!empty($item['product_sales'])) echo "both-note" ?>">Nổi bật</span>
                        <?php } ?>
                    </div>
                    <div class="prod-name"><?php echo $item['product_name'] ?></div>
                    <div class="prod-price">
                        <?php if ($item['product_sales'] > 0) {
                            echo "<del>" . currency_format($item['product_price']) . "</del>";
                            echo "&nbsp&nbsp";
                            echo "<span class='disscount-price'>" . currency_format(disscount_price($item['product_sales'], $item['product_price'])) . "</span>";
                        } else {
                            echo currency_format($item['product_price']);
                        } ?>
                    </div>
                    <div class="btn-buy">
                        <a href="<?php echo base_url('?mod=cart&action=add_cart&prod_id=' . $item['product_id']) ?>" class="add-cart">Thêm vào giỏ</a>
                        <a href="<?php echo base_url('?mod=cart&action=add_cart&prod_id=' . $item['product_id'] . '&process=mua-ngay') ?>" class="buy">Mua ngay</a>
                    </div>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>
<?php get_footer() ?>