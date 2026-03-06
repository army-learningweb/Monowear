<?php get_header() ?>
<div id="content">
   <div class="blog">
      <h1 style="margin-left: 10px; margin-bottom:10px">Blog</h1>
      <ul id="list-posts">
         <?php foreach($list_posts as $item) { ?>
         <li>
            <a href="<?php echo $item['post_slug'] ?>">
               <div class="post-img"><img src="<?php echo $path_img_post.get_post_img($item['post_id'])?>" alt=""></div>
               <div class="post-name"><?php echo $item['post_name'] ?></div>
               <div class="post-desc"><?php echo $item['post_desc'] ?></div>
            </a>
         </li>
         <?php } ?>
      </ul>
   </div>
</div>
<?php get_footer() ?>