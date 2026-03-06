$(document).ready(function () {
    $("select").change(function () {
        let price_val = $(this).val();
        let data = { price_val: price_val }

        // Trả về trạng thái ban đầu
        if (price_val == 0) {
            location.reload();
            return;
        }
        
        $.ajax({
            type: "post",
            url: "?mod=home&action=filter_prod",
            data: data,
            dataType: "json",
            success: function (data) {
                $('ul#list-product').html('');
                $('.see-more-prod').html('');
                data.list_prod_filter.forEach(element => {
                    if(element.product_sales > 0){
                        html_sale_note = `<div class='sale-note'> Giảm ${element.product_sales}%</div>`;
                        html_sale_price = `<del> ${element.product_price} </del>`
                        html_sale_price += `&nbsp&nbsp`
                        html_sale_price += `<span class='disscount-price'> ${element.product_sales_price} </span>`
                    }else{
                        html_sale_note = element.product_price;
                        html_sale_price = element.product_price;
                    }

                    if(element.product_up_sales == 'yes'){
                        html_hot_prod = `<span class="hot-prod-note both-note">Nổi bật</span>`
                    }else{
                        html_hot_prod = ""
                    }

                    $('ul#list-product').append(`
                        <li class="regular">
                            <div class="prod-img">
                                <a href="${element.product_slug}">
                                    <img src="${data.path_prods_img + element.product_images}" alt="">
                                </a>
                                ${html_sale_note}
                                ${html_hot_prod}             
                            </div>
                            <div class="prod-name">${element.product_name}</div>
                            <div class="prod-price">
                                ${html_sale_price}
                            </div>
                            <div class="btn-buy">
                                <a href="?mod=cart&action=add_cart&prod_id=${element.product_id}" class="add-cart">Thêm vào giỏ</a>
                                <a href="?mod=cart&action=add_cart&prod_id=${element.product_id}&process=mua-ngay" class="buy">Mua ngay</a>
                            </div>
                        </li>
                    `)
                });

            }
        });
    })
});