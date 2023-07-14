document.addEventListener("DOMContentLoaded", function (event) {
    let path = window.location.pathname;
    if (path.search('search') >= 0) {
        document.body.className = '';
        document.body.className = 'searches show games-active';
    }
});
