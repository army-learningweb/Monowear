$(document).ready(function () {
    $('input#fullname-rating,textarea#product_review').blur(function(){
        let valueInput = $(this).val();
        let valueFeild = $(this).attr('name');
        let data = {[valueFeild] : valueInput};    
        $.ajax({
            type: "post",
            url: "?mod=product&action=validate_reviews",
            data: data,
            dataType: "json",
            success: function (data) {
                console.log(data);
                if(data.error && data.error[valueFeild]){
                    $('p.error_rating_' + valueFeild).html("<i class='fa-solid fa-circle-exclamation'></i> " + data.error[valueFeild]);
                }else{
                    $('p.error_rating_' + valueFeild).html(" ");
                }
            }
        });
    })

    $('input#fullname-rating,textarea#product_review').focus(function(){
        $('p.error_php').hide();
    })
});