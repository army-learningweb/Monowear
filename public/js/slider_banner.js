$(document).ready(function () {
    let slider_lenght = $('.slider-item').length;
    let start = 0;
    let width_value = 1370;

    $('.btn-next').click(function(){
        start++;
        if(start == slider_lenght) start = 0
        $('.slider').css({
            transform:`translateX(-${start * width_value}px)`
        })
    })
    $('.btn-prev').click(function(){
        if(start == 0) start = slider_lenght 
        start--; 
        $('.slider').css({
            transform:`translateX(-${start * width_value}px)`
        })
    })
});