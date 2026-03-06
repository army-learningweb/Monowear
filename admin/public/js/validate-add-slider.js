$(document).ready(function () {
    $('input#slider_name,textarea#slider_desc,input#slider_order').blur(function () {

        let feild_name = $(this).attr('name');
        let feild_value = $(this).val();
        let data = {[feild_name]: feild_value };

        $.ajax({
            type: "post",
            url: "?mod=slider&action=validate",
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

    $('input#slider_name,textarea#slider_desc,input#slider_order').focus(function () { 
        $('p.error_php').hide();
    });
});