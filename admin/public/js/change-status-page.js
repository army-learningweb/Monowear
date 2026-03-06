$(document).ready(function () {
     // ==============================
    // POST
    // ==============================

    // AJAX posts
    
     // AJAX page_status
    $('.status_change_page').change(function(){
        let status_value = $(this).val();
        let status_id = $(this).attr("data-id");
        let data = {
            status_value:status_value,
            status_id:status_id
        }
        $.ajax({
            type: "post",
            url: "?mod=pages&action=list_pages",
            data: data,
            dataType: "json",
            success: function (data) {
                $('td.status-'+data.status_id).html(data.status_value);
                $('.result.draft').text(data.draft_status);
                $('.result.published').text(data.published_status);
                $('.result.off').text(data.pending_status);
                $('.result.archived').text(data.archived_status);
            }
        });
    });
});
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 