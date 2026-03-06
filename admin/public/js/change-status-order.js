$(document).ready(function () {
    // ==============================
    // ORDER
    // ==============================

    // AJAX posts
    
     // AJAX page_status
    $('.status_change_order').change(function(){
        let status_value = $(this).val();
        let status_id = $(this).attr("data-id");
        let data = {
            status_value:status_value,
            status_id:status_id
        }
        $.ajax({
            type: "post",
            url: "?mod=sales&action=list_orders",
            data: data,
            dataType: "json",
            success: function (data) {
                $('td.status-'+data.status_id).html(data.status_value);
                $('.result.pending_order').html(data.pending_status);
                $('.noti-badge').html(data.pending_status);
                $('.result.processing_order').html(data.processing_status);
                $('.result.shiped_order').html(data.shiped_status);
                $('.result.delivered_order').html(data.delivered_status);
                $('.result.canceled_order').html(data.canceled_status);
            }
        });
    });
});
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 