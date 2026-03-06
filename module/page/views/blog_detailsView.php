<?php get_header() ?>
<div id="content">
   <div class="blog details">
        <div class="post-info-details">
          <h2 style="margin-bottom:0px"><?php echo $post_info['post_name'] ?></h2>
           <div style="margin-bottom:5px; color:gray"><?php echo $post_info['post_desc'] ?></div>
             <div class="post-img-details"><img src="<?php echo $post_img_details.get_post_img($post_info['post_id'])?>" alt=""></div>
             <div class="info">
                <?php echo $post_info['post_details'] ?>
                <?php go_back("bai-viet","Quay lại") ?>
            </div>
        </div>
   </div>
</div>
<?php get_footer() ?>