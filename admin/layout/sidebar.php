<?php
$mod = $_GET['mod'];
$action = $_GET['action'];
?>
<ul id="main-menu">
    <li <?php echo $mod == 'dashboard' ? "class='focus-menu-auto'" : ''?> >
        <a href="?mod=dashboard&action=index" class="clear">        
            <span></i>Dashboard</span>
        </a>
    </li>
    <?php if(set_authority($_SESSION['user_login']['user_role']) == 'pages' || set_authority($_SESSION['user_login']['user_role']) == 'boss') { ?>
    <li>
        <a href="" data-id="1" class="link <?php if($mod == 'pages') echo "focus-menu-auto" ?>">
            <span><i class="fa-solid fa-map icon"></i>Trang</span>
            <span><i class="fa-solid fa-angle-down angle-down"></i></span>
        </a>
        <ul class="sub-menu">
            <li <?php if($mod == 'pages' && $action == 'list_pages') echo "class='remove-focus'" ?> ><a href="?mod=pages&action=add_page" data-sub-id="1.1" class="sub_link">Thêm mới</a></li>
            <li <?php if($mod== 'pages' && $action == 'list_pages') echo "class='focus-menu-child'"; ?> ><a href="?mod=pages&action=list_pages" data-sub-id="1.2" class="sub_link">Danh sách trang</a></li>
        </ul>
    </li>
    <?php } ?>
    <?php if(set_authority($_SESSION['user_login']['user_role']) == 'post' || set_authority($_SESSION['user_login']['user_role']) == 'boss') { ?>
    <li>
        <a href="" data-id="2" class="link <?php if($mod == 'post') echo "focus-menu-auto" ?>">
            <span><i class="fa-solid fa-pencil icon"></i></i>Bài viết</span>
            <span><i class="fa-solid fa-angle-down angle-down"></i></span>
        </a>
        <ul class="sub-menu">
            <li <?php if($mod == 'post' && $action == 'list_posts') echo "class='remove-focus'" ?> ><a href="?mod=post&action=add_post" data-sub-id="2.1" class="sub_link">Thêm bài viết</a></li>
            <li <?php if($mod == 'post' && $action == 'list_cats') echo "class='remove-focus'" ?> ><a href="?mod=post&action=add_cat" data-sub-id="2.2" class="sub_link">Thêm danh mục</a></li>
            <li <?php if($mod == 'post' && $action == 'list_posts') echo "class='focus-menu-child'"?> ><a href="?mod=post&action=list_posts" data-sub-id="2.3" class="sub_link">Danh sách bài viết</a></li>
            <li <?php if($mod == 'post' && $action == 'list_cats') echo "class='focus-menu-child'"?> ><a href="?mod=post&action=list_cats" data-sub-id="2.4" class="sub_link">Danh mục bài viết</a></li>
        </ul>
    </li>
    <?php } ?>
    <?php if(set_authority($_SESSION['user_login']['user_role']) == 'product' || set_authority($_SESSION['user_login']['user_role']) == 'boss') { ?>
    <li>
        <a href="" data-id="3" class="link <?php if($mod == 'product') echo "focus-menu-auto" ?>">
            <span><i class="fa-brands fa-product-hunt icon"></i>Sản phẩm</span>
            <span><i class="fa-solid fa-angle-down angle-down"></i></span>
        </a>
        <ul class="sub-menu">
            <li <?php if($mod == 'product' && $action == 'list_prods') echo "class='remove-focus'" ?> ><a href="?mod=product&action=add_prod" data-sub-id="3.1" class="sub_link">Thêm sản phẩm</a></li>
            <li <?php if($mod == 'product' && $action == 'list_cats') echo "class='remove-focus'" ?> ><a href="?mod=product&action=add_cat" data-sub-id="3.2" class="sub_link">Thêm danh mục</a></li>
            <li <?php if($mod == 'product' && $action == 'list_prods') echo "class='focus-menu-child'" ?> ><a href="?mod=product&action=list_prods" data-sub-id="3.3" class="sub_link">Danh sách sản phẩm</a></li>
            <li <?php if($mod == 'product' && $action == 'list_cats') echo "class='focus-menu-child'" ?> ><a href="?mod=product&action=list_cats" data-sub-id="3.4" class="sub_link">Danh sách danh mục</a></li>
        </ul>
    </li>
    <?php } ?>
    <?php if(set_authority($_SESSION['user_login']['user_role']) == 'sales' || set_authority($_SESSION['user_login']['user_role']) == 'boss') { ?>
    <li>
        <a href="" data-id="4" class="link <?php if($mod == 'sales') echo "focus-menu-auto" ?>">
            <span><i class="fa-solid fa-database icon"></i>Bán hàng</span>
            <span><i class="fa-solid fa-angle-down angle-down"></i></span>
        </a>
        <ul class="sub-menu">
            <li><a href="?mod=sales&action=list_customers" data-sub-id="4.1" class="sub_link">Danh sách khách hàng</a></li>
            <li <?php if($mod == 'sales' && $action == 'list_orders') echo "class='focus-menu-child'" ?>><a href="?mod=sales&action=list_orders" data-sub-id="4.2" class="sub_link">Danh sách đơn hàng</a></li>
            <li <?php if($mod == 'sales' && $action == 'list_reviews') echo "class='focus-menu-child'" ?>><a href="?mod=sales&action=list_reviews" data-sub-id="4.3" class="sub_link">Đánh giá sản phẩm</a></li>
        </ul>
    </li>
    <?php } ?>
    <?php if(set_authority($_SESSION['user_login']['user_role']) == 'template' || set_authority($_SESSION['user_login']['user_role']) == 'boss') { ?>
    <li>
        <a href="" data-id="5" class="link <?php if($mod == 'template') echo "focus-menu-auto" ?>">
            <span><i class="fa-solid fa-cubes icon"></i>Khối Giao diện</span>
            <span><i class="fa-solid fa-angle-down angle-down"></i></span>
        </a>
        <ul class="sub-menu">
            <li <?php if($mod == 'template' && $action == 'list_blocks') echo "class='remove-focus'" ?> ><a href="?mod=template&action=add_block" data-sub-id="5.1" class="sub_link">Thêm mới</a></li>
            <li <?php if($mod == 'template' && $action == 'list_blocks') echo "class='focus-menu-child'" ?> ><a href="?mod=template&action=list_blocks" data-sub-id="5.2" class="sub_link">Danh sách khối</a></li>
            <li><a href="?mod=template&action=menu" data-sub-id="5.3" class="sub_link">Tạo Menu</a></li>
        </ul>
    </li>
    <li>
        <a href="" data-id="6" class="link <?php if($mod == 'slider') echo "focus-menu-auto" ?>">
            <span><i class="fa-solid fa-sliders icon"></i>Slider</span>
            <span><i class="fa-solid fa-angle-down angle-down"></i></span>
        </a>
        <ul class="sub-menu">
            <li <?php if($mod == 'slider' && $action == 'list_sliders') echo "class='remove-focus'" ?> ><a href="?mod=slider&action=add_slider" data-sub-id="6.1" class="sub_link">Thêm mới</a></li>
            <li <?php if($mod == 'slider' && $action == 'list_sliders') echo "class='focus-menu-child'" ?> ><a href="?mod=slider&action=list_sliders" data-sub-id="6.2" class="sub_link">Danh sách Slider</a></li>
        </ul>
    </li>
    <li>
        <a href="" data-id="7" class="link <?php if($mod == 'media') echo "focus-menu-auto" ?>">
            <span><i class="fa-solid fa-photo-film icon"></i>Media</span>
            <span><i class="fa-solid fa-angle-down angle-down"></i></span>
        </a>
        <ul class="sub-menu">
            <li><a href="?mod=media&action=list_media" data-sub-id="7.2" class="sub_link">Danh sách Media</a></li>
        </ul>
    </li>
    <?php } ?>
    <?php if(set_authority($_SESSION['user_login']['user_role']) == 'boss' ) { ?>
    <li>
        <a href="" data-id="8" class="link <?php if($mod == 'user') echo "focus-menu-auto" ?>">
            <span><i class="fa-solid fa-user-tie icon"></i>Quản lí</span>
            <span><i class="fa-solid fa-angle-down angle-down"></i></span>
        </a>
        <ul class="sub-menu">
            <li <?php if($mod == 'user' && $action == 'list_users') echo "class='remove-focus'" ?> ><a href="?mod=user&action=add_user" data-sub-id="8.1" class="sub_link">Thêm mới</a></li>
            <li <?php if($mod == 'user' && $action == 'list_users') echo "class='focus-menu-child'" ?> ><a href="?mod=user&action=list_users" data-sub-id="8.2" class="sub_link">Danh sách Admin</a></li>
        </ul>
    </li>
    <?php } ?>
</ul>

<!-- RESPONSIVE MENU -->
<ul id="res-main-menu">
    <li>
        <a href="?mod=dashboard&action=index" class="clear">
            <span><i class="fa-solid fa-angle-left icon"></i>Dashboard</span>
        </a>
    </li>
    <li>
        <a href="" data-id="1" class="link">
            <span><i class="fa-solid fa-map icon"></i>Trang</span>
            <span><i class="fa-solid fa-angle-down angle-down"></i></span>
        </a>
        <ul class="sub-menu">
            <li><a href="?mod=pages&action=add_page" data-sub-id="1.1" class="sub_link">Thêm mới</a></li>
            <li><a href="?mod=pages&action=list_pages" data-sub-id="1.2" class="sub_link">Danh sách trang</a></li>
        </ul>
    </li>
    <li>
        <a href="" data-id="2" class="link">
            <span><i class="fa-solid fa-pencil icon"></i></i>Bài viết</span>
            <span><i class="fa-solid fa-angle-down angle-down"></i></span>
        </a>
        <ul class="sub-menu">
            <li><a href="?mod=post&action=add_post" data-sub-id="2.1" class="sub_link">Thêm bài viết</a></li>
            <li><a href="?mod=post&action=add_cat" data-sub-id="2.2" class="sub_link">Thêm danh mục</a></li>
            <li><a href="?mod=post&action=list_posts" data-sub-id="2.3" class="sub_link">Danh sách bài viết</a></li>
            <li><a href="?mod=post&action=list_cats" data-sub-id="2.4" class="sub_link">Danh mục bài viết</a></li>
        </ul>
    </li>
    <li>
        <a href="" data-id="3" class="link">
            <span><i class="fa-brands fa-product-hunt icon"></i>Sản phẩm</span>
            <span><i class="fa-solid fa-angle-down angle-down"></i></span>
        </a>
        <ul class="sub-menu">
            <li><a href="?mod=product&action=add_prod" data-sub-id="3.1" class="sub_link">Thêm sản phẩm</a></li>
            <li><a href="?mod=product&action=add_cat" data-sub-id="3.2" class="sub_link">Thêm danh mục</a></li>
            <li><a href="?mod=product&action=list_prods" data-sub-id="3.3" class="sub_link">Danh sách sản phẩm</a></li>
            <li><a href="?mod=product&action=list_cats" data-sub-id="3.4" class="sub_link">Danh sách danh mục</a></li>
        </ul>
    </li>
    <li>
        <a href="" data-id="4" class="link">
            <span><i class="fa-solid fa-database icon"></i>Bán hàng</span>
            <span><i class="fa-solid fa-angle-down angle-down"></i></span>
        </a>
        <ul class="sub-menu">
            <li><a href="?mod=sales&action=list_customers" data-sub-id="4.1" class="sub_link">Khách hàng</a></li>
            <li><a href="?mod=sales&action=list_orders" data-sub-id="4.2" class="sub_link">Danh sách đơn hàng</a></li>
            <li><a href="?mod=sales&action=list_reviews" data-sub-id="4.3" class="sub_link">Đánh giá sản phẩm</a></li>
        </ul>
    </li>
    <li>
        <a href="" data-id="5" class="link">
            <span><i class="fa-solid fa-cubes icon"></i>Khối Giao diện</span>
            <span><i class="fa-solid fa-angle-down angle-down"></i></span>
        </a>
        <ul class="sub-menu">
            <li><a href="?mod=template&action=add_block" data-sub-id="5.1" class="sub_link">Thêm mới</a></li>
            <li><a href="?mod=template&action=list_blocks" data-sub-id="5.2" class="sub_link">Danh sách</a></li>
            <li><a href="?mod=template&action=menu" data-sub-id="5.3" class="sub_link">Menu</a></li>
        </ul>
    </li>
    <li>
        <a href="" data-id="6" class="link">
            <span><i class="fa-solid fa-sliders icon"></i>Slider</span>
            <span><i class="fa-solid fa-angle-down angle-down"></i></span>
        </a>
        <ul class="sub-menu">
            <li><a href="?mod=slider&action=add_slider" data-sub-id="6.1" class="sub_link">Thêm mới</a></li>
            <li><a href="?mod=slider&action=list_sliders" data-sub-id="6.2" class="sub_link">Danh sách Slider</a></li>
        </ul>
    </li>
    <li>
        <a href="" data-id="7" class="link">
            <span><i class="fa-solid fa-photo-film icon"></i>Media</span>
            <span><i class="fa-solid fa-angle-down angle-down"></i></span>
        </a>
        <ul class="sub-menu">
            <li><a href="?mod=media&action=list_media" data-sub-id="7.2" class="sub_link">Danh sách Media</a></li>
        </ul>
    </li>
    <li>
        <a href="" data-id="8" class="link">
            <span><i class="fa-solid fa-user-tie icon"></i>Quản lí</span>
            <span><i class="fa-solid fa-angle-down angle-down"></i></span>
        </a>
        <ul class="sub-menu">
            <li><a href="?mod=user&action=add_user" data-sub-id="8.1" class="sub_link">Thêm mới</a></li>
            <li><a href="?mod=user&action=list_users" data-sub-id="8.2" class="sub_link">Danh sách Admin</a></li>
        </ul>
    </li>
</ul>