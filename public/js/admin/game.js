
$(document).ready(function () {
    $('#tag-selection').multiselect({
        enableFiltering: true,
        filterBehavior: 'value'
    });

    $('#btn_background').on('click', function () {
        $('#background').click();
    });

    $('#background').change(function () {
        readURL(this, '#showImage-background');
    });

    $('#btn_icon').on('click', function () {
        $('#icon').click();
    });

    $('#icon').change(function () {
        readURL(this, '#showImage-icon');
    });

    $('#btn_thumb').on('click', function () {
        $('#thumb').click();
    });

    $('#thumb').change(function () {
        readURL(this, '#showImage-thumb');
    });
});

function readURL(input, id) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $(id).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

