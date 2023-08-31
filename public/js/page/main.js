document.addEventListener("DOMContentLoaded", function (event) {
    let path = window.location.pathname;
    if (path.search('search') >= 0) {
        document.body.className = '';
        document.body.className = 'searches show games-active';
    }

    if (path.search('category') >= 0) {
        document.body.className = '';
        document.body.className = 'categories show games-active';
    }

    if (path.indexOf('/search') != -1) {
        $("#mobile-search-icon").css('display', 'none');
    }

    checkSessions();

    window.addEventListener('click', function (e) {
        if (!document.getElementById('locale-selector-dropdown').contains(e.target)) {
            let element = document.getElementById("locate-dropdown");
            element.style.display = 'none';
        }
    });

    if (loginDefined) {
        if (!($('nav').hasClass('logged'))) {
            $('nav').addClass('logged');
        }
    } else {
        if ($('nav').hasClass('logged')) {
            $('nav').removeClass('logged');
        }
    }

    let idLocale = '#locale-' + locale;
    let idFlagLocale = '#locale-' + locale + ' .image-flag';
    $(idLocale).prepend("<span class='tick-green-choice'></span>");
    $(idLocale).addClass("is-disabled");
    $(idLocale).removeAttr("href");
    $(idFlagLocale).addClass("image-picked");
});

function writeCookie(name, value, days) {
    var date, expires;
    if (days) {
        date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    } else {
        expires = "";
    }
    document.cookie = name + "=" + value + expires + "; path=/";
}

function readCookie(name) {
    var i, c, ca, nameEQ = name + "=";
    ca = document.cookie.split(';');
    for (i = 0; i < ca.length; i++) {
        c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1, c.length);
        }
        if (c.indexOf(nameEQ) == 0) {
            return c.substring(nameEQ.length, c.length);
        }
    }

    return '';
}

function makeID(length) {
    let result = '';
    const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    const charactersLength = characters.length;
    let counter = 0;
    while (counter < length) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
        counter += 1;
    }
    return result;
}

function checkSessions() {
    let id = 'accepted';
    if (readCookie(id) != true && readCookie(id) != 'true') {
        let element = document.getElementById('policy-validation');
        element.style.display = 'block';
    }
}

function storeAccepted() {
    let status = true;
    let id = 'accepted';
    let element = document.getElementById('policy-validation');
    if (readCookie(id) != true && readCookie(id) != 'true') {
        writeCookie(id, status, 1);
        element.style.display = 'none';
    }
}

function dropDownLocate() {
    let element = document.getElementById("locate-dropdown");

    if (element.style.display == '' || element.style.display == 'none') {
        element.style.display = 'block';
    } else {
        element.style.display = 'none';
    }
}

$("#mobile-search-icon").on("click", function () {
    $(this).css('display', 'none');
    $('nav').addClass('show-search-form hide-search-icon');
});

$("#profile-icon-image").on("click", function () {
    if (($('nav').hasClass('show-search-form hide-search-icon'))) {
        $('nav').removeClass('show-search-form hide-search-icon');
        $('#mobile-search-icon').css('display', 'block');
    }

    if (loginDefined) {
        if (!($('nav').hasClass('show-user-info'))) {
            $('nav').addClass('show-user-info');
        } else {
            $('nav').removeClass('show-user-info');
        }

    } else {
        if (!($('nav').hasClass('show-login-btns'))) {
            $('nav').addClass('show-login-btns');
        }
    }

    $('.y8-navbar-right').css('display', 'block');
});

$("#arrow-up-image").on("click", function () {
    if (!loginDefined) {
        if ($('nav').hasClass('show-login-btns')) {
            $('nav').removeClass('show-login-btns');
        }
    }
    $('.y8-navbar-right').css('display', 'none');
});

$(".avatar").on("click", function () {
    if ($('.links-container').css('display') == 'none') {
        $('.links-container').css('display', 'block');
    }
    else {
        $('.links-container').css('display', 'none');
    }
});

$(".hamburger-icon").on("click", function () {
    if (($('nav').hasClass('show-search-form hide-search-icon'))) {
        $('nav').removeClass('show-search-form hide-search-icon');
    }

    if ($('nav').hasClass('show-user-info')) {
        $('nav').removeClass('show-user-info');
    }

    if (!($('nav').hasClass('hide-user-icon show-login-btns show-mobile-header-block'))) {
        $('nav').addClass('hide-user-icon show-login-btns show-mobile-header-block');
        $('.burger-btn').addClass('open');
    }

    $('.y8-navbar-right').css('display', 'block');
    $('#mobile-search-icon').css('display', 'none');
    $('.more-tags').attr('style', 'display: inline-block !important');

    if (!loginDefined) {
        $('.waiting-idnet').css('display', 'block');
        $('#user_not_logged_in').attr('style', 'display: none !important');
    }
});

$(".hamburger-active-icon").on("click", function () {
    if (($('nav').hasClass('hide-user-icon show-login-btns show-mobile-header-block'))) {
        $('nav').removeClass('hide-user-icon show-login-btns show-mobile-header-block');
        $('.burger-btn').removeClass('open');
        $('#mobile-search-icon').css('display', 'block');
    }

    $('.y8-navbar-right').css('display', 'none');
    $('.more-tags').attr('style', 'display: none !important');

    if (!loginDefined) {
        $('.waiting-idnet').css('display', 'block');
        $('#user_not_logged_in').attr('style', 'display: flex !important');
    }
});

