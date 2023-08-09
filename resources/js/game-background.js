$(document).on('click', '#btn_background', function () {
    $('#background').click();
});

$('#background').change(function() {
    readURL(this);
});
// }
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#showImage-background').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
