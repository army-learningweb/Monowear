<?php get_header() ?>
<script> localStorage.clear() </script>
<div id="wp-content">
    <div id="sidebar">
        <?php get_sidebar() ?>
    </div>
    <div id="content">
        <div id="top-bar">
            <?php get_topbar() ?>
        </div>
        <div id="data-show">
            Dashboard
        </div>
    </div>
</div>
<?php get_footer() ?>