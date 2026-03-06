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
            <?php if(!empty($list_prods)) {  ?>
            <div class="title">Danh sách sản phẩm</div>
            <div class="count-total">
                <div class="statis">
                    <span class="total">Tổng</span> ( <?php echo $total_prods ?> ) |</span>

                    <span style="font-weight: normal;" class="statis on">Hoạt động</span>
                    ( <span class="result on"> <?php echo $on_status['total'] ?> </span> ) |

                    <span style="font-weight: normal;" class="statis wait">Chờ duyệt</span>
                    ( <span class="result wait"> <?php echo $wait_status['total'] ?> </span> ) |

                    <span style="font-weight: normal;" class="statis off">Tạm dừng</span>
                    ( <span class="result off"> <?php echo $off_status['total'] ?> </span> )
                </div>
                 <div class="search">
                    <form action="" method="get" id="form_search">
                        <input type="hidden" name="mod" value="product">
                        <input type="hidden" name="action" value="list_prods">

                        <input type="search" name="search_prod" id="" placeholder="Nhập từ khóa tìm kiếm..." value="<?php if(isset($_GET['search_prod'])) echo $_GET['search_prod'] ?>">
                        <button type="submit" name="btn-search"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>
                <div class="filter">
                    <form action="" method="get" id="form_filter_status">
                        <input type="hidden" name="mod" value="product">
                        <input type="hidden" name="action" value="list_prods">
                        
                        <select name="filter_status" id="filter_status">
                            <option value="">- Lọc theo trạng thái -</option>
                            <?php $filter_status = $_GET['filter_status'] ?>
                            <option value="active"<?php if(isset($filter_status) && $filter_status == 'active' ) echo "selected" ?>>Hoạt động</option>
                            <option value="inactive"<?php if(isset($filter_status) && $filter_status == 'inactive' ) echo "selected" ?>>Chờ duyệt</option>
                            <option value="out_of_stock"<?php if(isset($filter_status) && $filter_status == 'out_of_stock' ) echo "selected" ?>>Tạm dừng</option>
                        </select>

                        <select name="filter_cat" id="filter_cat">
                            <option value="">- Lọc theo danh mục -</option>
                            <?php $filter_cat = $_GET['filter_cat'] ?>
                            <?php foreach($prod_cat as $item) { ?>
                                <option value="<?php echo $item['category_id'] ?>" <?php if(isset($filter_cat) && $filter_cat == $item['category_id']) echo "selected"?>>
                                    <?php if($item['parent_id'] > 0) {
                                        echo " - ".$item['category_name'];
                                    }else{
                                        echo $item['category_name'];
                                    }  ?>
                                </option>
                            <?php } ?>
                        </select>

                        <input type="submit" name="btn-filter" value="Sàng lọc" style="font-size:0.9rem">
                        <a href="?mod=product&action=list_prods" class="reset">Reset</a>
                    </form>
                </div>
            </div>
            <div class="table-responsive">
                <table class="text-center">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td class="text-left">Mã</td>
                            <td class="text-left">Tên</td>
                            <td>Ảnh</td>
                            <td>Danh mục</td>
                            <td>Số lượng</td>
                            <td>Trạng thái</td>
                            <td>Cập nhật</td>
                            <td>Người tạo</td>
                            <td>Thời gian</td>
                            <td colspan="2"></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $num = $start + 1;
                        foreach ($list_prods as $prod) {
                        ?>
                            <tr>
                                <td><?php echo $num++ ?></td>
                                <td class="text-left"><?php echo $prod['product_code'] ?></td>
                                <td class="text-left name"><?php echo $prod['product_name'] ?></td>
                                <td><img src="<?php echo get_image_product($prod['product_id']) ?>" alt="" style="width:50px;"></td>
                                <td><?php echo  get_category_name($prod['category_id']) ?></td>
                                <td class="quantity">( <?php echo $prod['stock_quantity'] ?> )</td>
                                <td class="text-center status-<?php echo $prod['product_id'] ?>"><?php echo set_status_product($prod['product_status']) ?></td>
                                <td>
                                    <select name="" class="status_change_product" data-id="<?php echo $prod['product_id'] ?>">
                                        <option value="active" <?php if (isset($prod['product_status']) && $prod['product_status'] == 'avtive') echo "selected" ?>>Hoạt động</option>
                                        <option value="inactive" <?php if (isset($prod['product_status']) && $prod['product_status'] == 'inactive') echo "selected" ?>>Chờ duyệt</option>
                                        <option value="out_of_stock" <?php if (isset($prod['product_status']) && $prod['product_status'] == 'out_of_stock') echo "selected" ?>>Tạm dừng</option>
                                    </select>
                                </td>
                                <td><?php echo get_created_name($prod['user_id']) ?></td>
                                <td><?php echo set_date($prod['created_at']) ?></td>
                                <td><a href="?mod=product&action=update_prod&prod_id=<?php echo $prod['product_id'] ?>"><i class="fa-solid fa-gear"></i></a></td>
                                <td>
                                    <a href='?mod=product&action=delete_prod&prod_id=<?php echo $prod['product_id'] ?>' onclick='return confirm("Bạn có chắc muốn xóa ? Xóa sản phẩm sẽ xóa tất cả nội dung liên quan đến sản phẩm, đơn hàng, đánh giá,....")'>
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
                get_404("?mod=product&action=list_prods");
            }
           
            ?>
        </div>
    </div>
</div>
<?php get_footer() ?>