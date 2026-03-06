$(document).ready(function () {
    // ==============================
    // REVIEW
    // ==============================
    
     // AJAX page_status
    $('.status_change_review').change(function(){
        let status_value = $(this).val();
        let status_id = $(this).attr("data-id");
        let data = {
            status_value:status_value,
            status_id:status_id
        }
        $.ajax({
            type: "post",
            url: "?mod=sales&action=list_reviews",
            data: data,
            dataType: "json",
            success: function (data) {
                console.log(data);
                $('td.status-'+data.status_id).html(data.status_value);
                $('.result.on').html(data.pub_status);
                $('.result.crash').html(data.crash_status);
                $('.result.wait').html(data.wait_status);
            }
        });
    });
});
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 