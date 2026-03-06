$(document).ready(function () {
    //====================================
    // BÀI VIẾT
    //====================================
    
    // ẢNH CHÍNH

    $('#main_img_post').change(function () {
        let post_main_img_data = this.files[0];
        let data = new FormData();
        data.append("post_main_img_data",post_main_img_data);
        $.ajax({
            type: "post",
            url: "?mod=post&action=upload_post",
            data: data,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function (data) {  
                console.log(data);
                if (data.error) {
                    let html_error = " <i class='fa-solid fa-circle-exclamation'></i> ";
                    $('p.error').html(html_error + data.error.file);
                    $('.show img').attr("src", "");
                } else {
                    $('p.error').html('');
                    $('.show img').attr("src", data.image_url);
                    $('.post_main_img_id').val(data.image_id);
                }
            }
        });
    })

    $('#main_img_post').focus(function (e) { 
        $('p.error_php').hide();
    });

});
