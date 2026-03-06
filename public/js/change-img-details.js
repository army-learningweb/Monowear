$(document).ready(function () {
    let details_length = $('.sub-img li').length;
    let start = 1;

    $('.sub-img li img').first().addClass('focus');
    $('.sub-img li img').click(function () {
        $('.sub-img li img').removeClass('focus');
        let this_details_src = $(this).attr('src');
        $('.main-img img').attr('src', this_details_src);
        $(this).addClass('focus');
    })

    $('.btn-next').click(function () {
        let this_details = $('.sub-img li img.focus');
        let another_details = this_details.parent().next().find('img').click();
        start++
        if (start > 4) {
            start = 1
            $('.sub-img li img').first().click();
        }
    })

    $('.btn-prev').click(function () {
        let this_details = $('.sub-img li img.focus');
        let another_details = this_details.parent().prev().find('img').click();
        start--
        if (start == 0 ) {
            start = 4
            $('.sub-img li img').last().click();
        }
    })
});