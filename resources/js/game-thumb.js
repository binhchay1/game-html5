$(document).on('click', '#btn_thumb', function () {
    $('#thumb').click();
});

$('#thumb').change(function() {
    readURL(this);
});
// }
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#showImage-thumb').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
