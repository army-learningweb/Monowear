$(document).ready(function () {
    //====================================
    // Slider
    //====================================
    
    // ẢNH CHÍNH

    $('#main_img_slider').change(function () {
        let main_img_data = this.files[0];
        let data = new FormData();
        data.append("main_img_data",main_img_data);
        console.log(data);
        $.ajax({
            type: "post",
            url: "?mod=slider&action=upload",
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
                    $('.slider_main_img_id').val(data.image_id);
                }
            }
        });
    })

    $('#main_img_slider').focus(function (e) { 
        $('p.error_php').hide();
    });

});
