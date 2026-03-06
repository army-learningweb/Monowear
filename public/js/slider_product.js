$(document).ready(function () {

    $('.slider-prod').each(function () {

        let slider = $(this); 
       
        
        let slider_length = slider.find('li.prod-item').length; 
        let start = 0;
        let prod_per_slider = 5;
        let window_Width = $(window).width();
        if  (window_Width < 992) prod_per_slider = 1;

        let slider_turn = slider_length - prod_per_slider;

        let slider_width = slider.find('.slider-item-prod').innerWidth();
        let item_width = slider_width / prod_per_slider;
        let moving_value = item_width;

        slider.next('.button-slider-prod').find('.btn-next-prod').click(function () {
            start++;
            if (start > slider_turn) start = 0;
            slider.find('.slider-item-prod').css({
                transform: `translateX(-${start * moving_value}px)`
            });
        });

        slider.next('.button-slider-prod').find('.btn-prev-prod').click(function () {
            start--;
            if (start < 0) start = slider_turn;
            slider.find('.slider-item-prod').css({
                transform: `translateX(-${start * moving_value}px)`
            });
        });
    });

});
