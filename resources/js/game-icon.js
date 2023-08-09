$(document).on('click', '#btn_icon', function () {
    $('#icon').click();
});

$('#icon').change(function() {
    readURL(this);
});
// }
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#showImage-icon').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
