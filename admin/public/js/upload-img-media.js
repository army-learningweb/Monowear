$(document).ready(function () {
    $('#main_img_media').on('change', function () {
    let file = this.files[0];
    if (!file) return;

    if (!file.type.startsWith('image/')) {
        alert('Vui lòng chọn file ảnh!');
        return;
    }

    let tempUrl = URL.createObjectURL(file);
    $('.show img').attr('src', tempUrl);
});

});
