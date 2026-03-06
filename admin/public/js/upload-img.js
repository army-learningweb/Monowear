$(document).ready(function () {
    //====================================
    // SẢN PHẨM
    //====================================
    
    // ẢNH CHÍNH

    $('#main_img_prod').change(function () {
        let prod_main_img_data = this.files[0];
        let data = new FormData();
        data.append("prod_main_img_data",prod_main_img_data);
        $.ajax({
            type: "post",
            url: "?mod=product&action=upload",
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
                    $('.prod_main_img_id').val(data.image_id);
                }
            }
        });
    })

    $('#main_img_prod').focus(function (e) { 
        $('p.error_php').hide();
    });

    //====================================
    // ẢNH PHỤ
    //====================================
    $('#sub_img').change(function () {
        let sub_img_data = this.files;

        if(sub_img_data.length < 4){
            $('.show_sub').html('');
            let html_error = " <i class='fa-solid fa-circle-exclamation'></i> Chọn 4 ảnh chi tiết cho sản phẩm";
            $('p.sub_error').html(html_error);
            return;
        }else if(sub_img_data.length > 4){
            // alert("Bạn chỉ được chọn 1 đến 4 ảnh");
            $('.show_sub').html('');
            let html_error = " <i class='fa-solid fa-circle-exclamation'></i> Chỉ được chọn tối đa 4 ảnh, vui lòng chọn lại";
            $('p.sub_error').html(html_error);
            return;
        }

        let data = new FormData();
        for (let i = 0; i < sub_img_data.length; i++) {
            data.append("sub_img_data[]", sub_img_data[i]);
        }

        $.ajax({
            type: "post",
            url: "?mod=product&action=upload",
            data: data,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function (data) {
                console.log(data);
                $('.show_sub').html('');

                if (data.error) {
                    let html_error = " <i class='fa-solid fa-circle-exclamation'></i>";
                    $('p.sub_error').html(html_error + data.error.file);
                } else {
                    data.image_urls.forEach(element => {
                        let html_img = `<img src="${element}" style="width:80px">`;
                        $('.show_sub').append(html_img);
                    });
                    data.image_ids.forEach(element => {
                        let html_input = `<input type="hidden" name="sub_img_id[]" class="sub_img_id" value="${element}">`;
                        $('.show_sub').append(html_input);
                    });
                    $('p.sub_error').html('');
                }
            }
        });
    });
});
