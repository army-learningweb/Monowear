$(document).ready(function () {
    // ==============================
    // PRODUCT
    // ==============================

    // AJAX product_category
    $('.status_change').change(function(){
        let status_value = $(this).val();
        let status_id = $(this).attr("data-id");
        let data = {
            status_value:status_value,
            status_id:status_id
        }

        
        $.ajax({
            type: "post",
            url: "?mod=product&action=list_cats",
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

    // AJAX products
    $('.status_change_product').change(function(){
        let status_value = $(this).val();
        let status_id = $(this).attr("data-id");
        let data = {
            status_value:status_value,
            status_id:status_id
        }

        
        $.ajax({
            type: "post",
            url: "?mod=product&action=list_prods",
            data: data,
            dataType: "json",
            success: function (data) {
                $('td.status-'+data.status_id).html(data.status_value);
                $('.result.on').text(data.on_status);
                $('.result.wait').text(data.wait_status);
                $('.result.off').text(data.off_status);
            }
        });
    })
});