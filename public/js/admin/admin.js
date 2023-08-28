$(document).ready(function () {
    let path = window.location.pathname;
    let myArray = path.split("/");
    let id = '#' + myArray[1];

    $(id).addClass('active');

    $("#alert-admin").fadeTo(2000, 500).slideUp(500, function () {
        $("#alert-admin").slideUp(500);
    });
});
