$(document).ready(function () {
    $('input#prod_sales,input#prod_slug,input#prod_name,input#prod_code,input#prod_code,textarea#prod_desc,input#prod_price,input#prod_quantity,input#prod_slug,select#prod_cat').blur(function () {

        let feild_name = $(this).attr('name');
        let feild_value = $(this).val();
        let data = {[feild_name]: feild_value };

        $.ajax({
            type: "post",
            url: "?mod=product&action=validate",
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

    $('input#prod_sales,input#prod_slug,input#prod_name,input#prod_code,input#prod_code,textarea#prod_desc,input#prod_price,input#prod_quantity,input#prod_slug,select#prod_cat').focus(function () { 
        $('p.error_php').hide();
    });
});