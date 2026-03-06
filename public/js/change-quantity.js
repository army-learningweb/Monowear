$(document).ready(function () {
    $('.fa-solid.fa-plus.cart-show').click(function () {
        let prod_id = $(this).parent('td').find('.qty').attr('data-id');
        let prod_quantity = $(this).parent('td').find('.qty').val();
        prod_quantity++
        ajax_update(prod_id,prod_quantity)
    });

    $('.fa-solid.fa-minus.cart-show').click(function () {
        let prod_id = $(this).parent('td').find('.qty').attr('data-id');
        let prod_quantity = $(this).parent('td').find('.qty').val();
        prod_quantity--
        if (prod_quantity == 0) {
            return confirm('Nếu sản phẩm không ưng ý bạn hãy xóa khỏi giỏ hàng nhé !')
        }
        ajax_update(prod_id,prod_quantity)
    });
});

function ajax_update(prod_id,prod_quantity) {
    let data = { prod_id: prod_id, prod_quantity: prod_quantity }
    $.ajax({
        type: "post",
        url: "?mod=cart&action=change_quantity",
        data: data,
        dataType: "json",
        success: function (data) {
            console.log(data);
            $('.qty[data-id="' + data.prod_id + '"]').val(data.prod_quantity);
            $('.show-sub-price-' + data.prod_id).html(data.prod_sub_price);
            $('.num_order').html(data.prod_total_quantity);
            $('span.price').html(data.prod_total_price);
            $('span.header-total').html(data.prod_total_quantity);
            $('.tmp_price').html(data.prod_total_price);
            $('.pay_price').html(data.prod_total_price);
            $('td.small-num-order-'+ data.prod_id).html("x" + data.prod_quantity);
        }
    });
}