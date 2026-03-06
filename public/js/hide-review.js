$(document).ready(function () {
    $('.user-comment li').eq(3).nextAll().hide();

    $('.see-more').click(function () {
        $('.user-comment li').eq(3).nextAll().toggle()
        $('.see-more').toggleClass("active");
        
        if ($('.see-more').hasClass('active')) {
            $('.see-more').html("<i class='fa-solid fa-arrow-left-long'></i> Thu gọn");
        } else {
            $('.see-more').html(" Xem thêm <i class='fa-solid fa-arrow-right-long'></i>")
        }
    })

});