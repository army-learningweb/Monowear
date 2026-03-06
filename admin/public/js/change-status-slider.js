$(document).ready(function () {
     // ==============================
    // SLIDER
    // ==============================
    
     // AJAX slider_status
    $('.status_change_slider').change(function(){
        let status_value = $(this).val();
        let status_id = $(this).attr("data-id");
        let data = {
            status_value:status_value,
            status_id:status_id
        }
        $.ajax({
            type: "post",
            url: "?mod=slider&action=list_sliders",
            data: data,
            dataType: "json",
            success: function (data) {
                $('td.status-'+data.status_id).html(data.status_value);
                $('.result.on').text(data.on_status);
                $('.result.wait').text(data.wait_status);
            }
        });
    });
});
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 