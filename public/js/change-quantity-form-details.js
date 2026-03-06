$(document).ready(function () {
    $('.btn-plus').click(function () {
        let qty = parseInt($('.prod_quantity').val());
        $('.prod_quantity').val(qty + 1);
    })

    $('.btn-minus').click(function () {
        let qty = parseInt($('.prod_quantity').val());
        if (qty == 1) {
            qty = 1
        }else{
             $('.prod_quantity').val(qty - 1);
        }
    })
});