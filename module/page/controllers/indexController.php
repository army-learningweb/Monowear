<?php 
function construct(){
    load_model('index');
}

function indexAction(){
    $slug = $_GET['slug'];
    $page_info = get_page_infomation($slug);
    $data = [
        'page_info' => $page_info
    ];
    load_view('index',$data);
}

function blogAction(){
    $list_posts = get_list_post();
    $path_img_post = "./public/uploads/images/post/";
    $data = [
        'list_posts' => $list_posts,
        'path_img_post' => $path_img_post
    ];
    load_view('blog',$data);
}

function blog_detailsAction(){
    $slug = $_GET['slug'];
    $post_info = get_post_info($slug);
    $post_img_details = "./public/uploads/images/post/";
    $data = [
        'post_info' => $post_info,
        'post_img_details' => $post_img_details
    ];
    
    load_view('blog_details',$data);
}