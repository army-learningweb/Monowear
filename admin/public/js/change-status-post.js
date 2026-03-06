$(document).ready(function () {
     // ==============================
    // POST
    // ==============================

    // AJAX posts
    
     // AJAX post_category
    $('.status_change_post_cat').change(function(){
        let status_value = $(this).val();
        let status_id = $(this).attr("data-id");
        let data = {
            status_value:status_value,
            status_id:status_id
        }

        $.ajax({
            type: "post",
            url: "?mod=post&action=list_cats",
            data: data,
            dataType: "json",
            success: function (data) {
                $('td.status-'+data.status_id).html(data.status_value);
                $('.result.on').text(data.on_status);
                $('.result.wait').text(data.wait_status);
                $('.result.off').text(data.off_status);
            }
        });
    });

    $('.status_change_post').change(function(){
        let status_value = $(this).val();
        let status_id = $(this).attr("data-id");
        let data = {
            status_value:status_value,
            status_id:status_id
        }

        $.ajax({
            type: "post",
            url: "?mod=post&action=list_posts",
            data: data,
            dataType: "json",
            success: function (data) {
                $('td.status-'+data.status_id).html(data.status_value);
                $('.result.crash').text(data.crash_status);
                $('.result.on').text(data.on_status);
                $('.result.wait').text(data.wait_status);
                $('.result.save').text(data.save_status);
            }
        });
    })
});
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 