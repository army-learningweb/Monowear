$(document).ready(function () {
    let liElemnt = $('.slider-user-comment li');
    let liWidth = $('.slider-user-comment li').innerWidth() + 20;
    let sliderLenght = liElemnt.length;
    let start_index = 0;

    let current_comment = 1;
    liElemnt.eq(current_comment).addClass('middle-comment');
    liElemnt.eq(current_comment - 1).addClass('side-comment');
    liElemnt.eq(current_comment + 1).addClass('side-comment');

    $('.btn-next-comment').click(function () {
        // Xóa lớp cũ
        liElemnt.removeClass('middle-comment side-comment');

        // Dịch chuyển sang comment khác
        start_index++;

        // Reset về đầu nếu đạt tới độ dại
        if (start_index > (sliderLenght - 3)) {
            start_index = 0;
        }

        // Cập nhật lại ví trí slider
        $('.slider-user-comment').css(
            { transform: "translateX(-" + (liWidth * start_index) + "px)" }
        )

        // Focus vào phần tử chính giữa
        focus_on_middle();
    })

    $('.btn-prev-comment').click(function () {
        // Xóa lớp cũ
        liElemnt.removeClass('middle-comment side-comment');

        // Dịch chuyển sang comment khác
        start_index--;
        if (start_index < 0) {
            start_index = (sliderLenght - 3);
        }

        // Cập nhật lại vị trí slider
        $('.slider-user-comment').css(
            { transform: "translateX(-" + (liWidth * start_index) + "px)" }
        )

        // Focus vào phần tử chính giữa
        focus_on_middle();
    })

    function focus_on_middle() {
        current_comment = start_index + 1;
        liElemnt.eq(current_comment).addClass('middle-comment');
        liElemnt.eq(current_comment - 1).addClass('side-comment');
        liElemnt.eq(current_comment + 1).addClass('side-comment');
    }
});