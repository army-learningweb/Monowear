$(document).ready(function () {
    $("#res-main-menu").hide();
    $(".toggle-bar").click(function(){
        $("#res-main-menu").slideToggle(350);
        $(this).toggleClass('focus');
    })
});