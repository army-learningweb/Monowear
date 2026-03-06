$(document).ready(function () {
    $('#responsive_main_menu').hide();
    $('#responsive_main_menu .sub_menu').hide();
    $('.toggle-btn').click(function () {
        $('#responsive_main_menu').slideToggle();
    })

    $('#responsive_main_menu li').click(function(){
        $('.sub_menu').slideUp();
        $(this).find('.sub_menu').stop().slideToggle();
        
    })

  
});