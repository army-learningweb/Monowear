$(document).ready(function () {
    $('input#page_slug,input#page_name').blur(function () {

        let feild_name = $(this).attr('name');
        let feild_value = $(this).val();
        let data = {[feild_name]: feild_value };
        console.log(data);
        $.ajax({
            type: "post",
            url: "?mod=pages&action=validate",
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

    $('input#page_slug,input#page_name').focus(function () { 
        $('p.error_php').hide();
    });
});