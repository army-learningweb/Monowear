$(document).ready(function () {

    $('#list-product li.regular').eq(4).nextAll().hide();
    
    $('.see-more-prod').click(function(){
        $('#list-product li.regular').eq(4).nextAll().toggle();
        $('.see-more-prod a span').html("Thu gọn");
        $('.see-more-prod a span').toggleClass('active');
        if($('.see-more-prod a span').hasClass('active')){
            $('.see-more-prod a span').html("Thu gọn");
        }else{
            $('.see-more-prod a span').html("Xem thêm...");
        }
    })
});