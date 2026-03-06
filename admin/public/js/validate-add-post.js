$(document).ready(function () {
    $('input#post_name,input#post_desc,input#post_slug,select#post_cat').blur(function () {

        let feild_name = $(this).attr('name');
        let feild_value = $(this).val();
        let data = {[feild_name]: feild_value };

        $.ajax({
            type: "post",
            url: "?mod=post&action=validate",
            data: data,
            dataType: "json",
            success: function (data) {
                console.log(data);
                $('p.error_' + feild_name).html(' ');
                if (data.error && data.error[feild_name]) {
                    let html_error = `<i class='fa-solid fa-circle-exclamation'></i>${data.error[feild_name]}`;
                    $('p.error_' + feild_name).html(html_error);
                }else{ 
                    $('p.error_' + feild_name).html(' ');
                }
            }
        });
    });

    $('input#post_name,input#post_desc,input#post_slug,select#post_cat').focus(function () { 
        $('p.error_php').hide();
    });
});