$(document).ready(function () {

    // Ẩn phần tử sub-menu
    $('ul.sub-menu').hide();

    // Tự động mở menu
    let a_activated = localStorage.getItem('a_active');
    let a_sub_activated = localStorage.getItem('a_sub_active');

    if (a_activated) {
        $('a.sub_link').removeClass('focus-sub-link');
        $('a.link').removeClass('focus');
        $("[data-id='" + a_activated + "']").next('ul.sub-menu').slideDown(350);
        $("[data-id='" + a_activated + "']").addClass('focus');
        $("[data-id='" + a_activated + "']").find('i.angle-down').addClass('rotate');
    }

    if (a_sub_activated) {
        $('a.sub_link').removeClass('focus-sub-link');
        $("[data-sub-id='" + a_sub_activated + "']").addClass('focus-sub-link');
    }

    // Kích hoạt sự kiện click mainmenu
    $('a.link').click(function (e) {
        e.preventDefault();
        localStorage.clear();

        let subMenu = $(this).next('ul.sub-menu');
        let angle_down = $(this).find('i.angle-down');

        $('.angle-down').not(angle_down).removeClass('rotate');
        $('ul.sub-menu').not(subMenu).slideUp(350);
        $('a.link').not(this).removeClass('focus');

        $(this).find('.angle-down').toggleClass('rotate');
        $(this).next('ul.sub-menu').stop().slideToggle(350);
        $(this).toggleClass('focus');

        // Lưu lại trạng thái
        let aElement_id = $(this).attr('data-id');
        localStorage.setItem('a_active', aElement_id);
    });

    // Kích hoạt sự kiện click submenu
    $('a.sub_link').click(function (e) {
        // Lưu lại trạng thái
        let aElement_sub_id = $(this).attr('data-sub-id');
        localStorage.setItem('a_sub_active', aElement_sub_id);
    });

    // Xóa local
    $('a.clear').click(function(){
        localStorage.clear();
    });

    $('a.brand').click(function(){
        localStorage.clear();
    });

    $('a.change-info').click(function(){
        localStorage.clear();
    });

    $('a.change-pass').click(function(){
        localStorage.clear();
    });

    
});