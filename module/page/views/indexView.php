<?php
get_header();
?>
<div id="content">
   <div class="about-us">
      <?php
      $slug = $_GET['slug'];
      $about_img = "public/images/Artboard_1.jpg";
      $contact_img = "public/images/noel25cm1920_x_600-1.avif";
      if ($slug == 'gioi-thieu') {
         $path_img = $about_img;
      } else {
         $path_img = $contact_img;
      }
      ?>
      <div class="about-img"><img src="<?php echo $path_img ?>" alt=""></div>
      <div class="about-info">
         <?php echo $page_info['page_content'] ?>
         <?php go_back("trang-chu", "Quay lại trang chủ") ?>
      </div>
   </div>
</div>
<?php get_footer() ?>