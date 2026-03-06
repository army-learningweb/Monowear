$(document).ready(function () {
    $('input#COD,input#OnlinePayment').change(function(){
        let val_method = $(this).val();
        let data = {val_method : val_method}

        $.ajax({
            type: "post",
            url: "?mod=checkout&action=change_method",
            data: data,
            dataType: "json",
            success: function (data) {
                console.log(data);
                $('.total_pay span').html(data.new_price);
                $('.shipping_fee').html(data.shipping_fee);
            }
        });
    })
});