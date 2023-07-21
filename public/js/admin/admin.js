$(document).ready(function () {
    let path = window.location.pathname;
    let myArray = path.split("/");
    let id = '#' + myArray[1];

    $(id).addClass('active');
});
