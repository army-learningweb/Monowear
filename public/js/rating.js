$(document).ready(function () {
    $('span[data-value]').click(function () {
        let val_rating = $(this).attr('data-value');
        $('span[data-value]').html('<i class="fa-regular fa-star"></i>');
        if (val_rating == 1) {
            $(this).html('<i class="fa-solid fa-star"></i>');
        }
        if (val_rating == 2) {
            $(this).html('<i class="fa-solid fa-star"></i>');
            $(this).prevAll().html('<i class="fa-solid fa-star"></i>');
        }
        if (val_rating == 3) {
            $(this).html('<i class="fa-solid fa-star"></i>');
            $(this).prevAll().html('<i class="fa-solid fa-star"></i>');
        }
        if (val_rating == 4) {
            $(this).html('<i class="fa-solid fa-star"></i>');
            $(this).prevAll().html('<i class="fa-solid fa-star"></i>');
        }
        if (val_rating == 5) {
            $(this).html('<i class="fa-solid fa-star"></i>');
            $(this).prevAll().html('<i class="fa-solid fa-star"></i>');
        }
        $('.alredy-rate').html("( " + val_rating + " )");
        $('.rating_value').val(val_rating);
    })
});