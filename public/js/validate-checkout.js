$(document).ready(function () {
    $('input#fullname,input#tel,input#email,input#address').blur(function () { 
        let feild_name = $(this).attr('name');
        let feild_value = $(this).val();
        let data = {[feild_name] : feild_value}
        
        $.ajax({
            type: "post",
            url: "?mod=checkout&action=validate_checkout",
            data: data,
            dataType: "json",
            success: function (data) {
                if(data.error && data.error[feild_name]){
                    $('p.error_checkout_' + feild_name).html("<i class='fa-solid fa-circle-exclamation'></i> " + data.error[feild_name]);
                }else{
                    $('p.error_checkout_' + feild_name).html(" ");
                }
            }
        });
    });

    $('input#fullname,input#tel,input#email,input#address').focus(function(){
        $('p.error_php').hide();
    })
});