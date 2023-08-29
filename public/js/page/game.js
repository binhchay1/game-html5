(function (window, document) {
    let $ = function (selector, context) {
        return (context || document).querySelector(selector)
    };

    let iframe = $("iframe"),
        domPrefixes = 'Webkit Moz O ms Khtml'.split(' ');

    let fullscreen = function (elem) {
        let prefix;
        for (let i = -1, len = domPrefixes.length; ++i < len;) {
            prefix = domPrefixes[i].toLowerCase();

            if (elem[prefix + 'EnterFullScreen']) {

                return prefix + 'EnterFullScreen';
            } else if (elem[prefix + 'RequestFullScreen']) {

                return prefix + 'RequestFullScreen';
            }
        }

        return false;
    };
    let fullscreenother = fullscreen(document.createElement("iframe"));

    if (!fullscreen) {
        alert("Fullscreen won't work, please make sure you're using a browser that supports it and you have enabled the feature");
        return;
    }

    $("#fullscreeniframe").addEventListener("click", function () {
        iframe[fullscreenother]();
    }, false);

    let listChangeColor = ['h1', 'h2', 'h3', 'h4', 'h5', 'p', 'i', 'a'];
    for (let i = 0; i < listChangeColor.length; i++) {
        let all = document.getElementsByTagName(listChangeColor[i]);

        for (let i = 0, max = all.length; i < max; i++) {
            all[i].style.color = invertColor(themeColor);
        }
    }

})(this, this.document);




$(document).ready(function () {
    // let scriptTag = "<script>alert(1)<\/script>";
    // $("iframe").contents().find("body").append(scriptTag);

    let cssBorderButtonLogin = '{border: 1px solid ' + invertColor(themeColor) + ' !important}';
    $('#button-login').css(cssBorderButtonLogin);

    $('.post-area').each(function (i) {
        console.log($(this)[i]);

    });

    moment("20111031", "YYYYMMDD").fromNow();
});




$('#vote-like').on('click', function () {
    $.ajax({
        url: '/vote-by-user',
        type: 'GET',
        data: {
            vote: 'like',
            gameName: gameName
        }
    }).done(function (result) {
        $('#vote-unlike').css('opacity', '0.3');
        $('#vote-like').css('opacity', '1');
    });
});

$('#vote-unlike').on('click', function () {
    $.ajax({
        url: '/vote-by-user',
        type: 'GET',
        data: {
            vote: 'unlike',
            gameName: gameName
        }
    }).done(function (result) {
        $('#vote-like').css('opacity', '0.3');
        $('#vote-unlike').css('opacity', '1');
    });
});

$('#report-bug-modal').on('shown.bs.modal', function (e) {
    let name = $(e.relatedTarget).data('name');
    let email = $(e.relatedTarget).data('email');

    $(".modal-body #report-bug-name").val(name);
    $(".modal-body #report-bug-email").val(email);
})

function countPlay() {
    $.getJSON("https://api.ipify.org?format=json", function (data) {
        let ip = data.ip;
        $.ajax({
            url: '/store-player',
            type: 'GET',
            data: {
                ip: ip,
                gameName: gameName
            }
        });
    })
}
setTimeout(countPlay, 10000);

function invertColor(hex) {
    if (hex.indexOf('#') === 0) {
        hex = hex.slice(1);
    }

    if (hex.length === 3) {
        hex = hex[0] + hex[0] + hex[1] + hex[1] + hex[2] + hex[2];
    }
    if (hex.length !== 6) {
        throw new Error('Invalid HEX color.');
    }

    let r = (255 - parseInt(hex.slice(0, 2), 16)).toString(16),
        g = (255 - parseInt(hex.slice(2, 4), 16)).toString(16),
        b = (255 - parseInt(hex.slice(4, 6), 16)).toString(16);

    return '#' + padZero(r) + padZero(g) + padZero(b);
}

function padZero(str, len) {
    len = len || 2;
    let zeros = new Array(len).join('0');
    return (zeros + str).slice(-len);
}

function saveCollection() {
    $.ajax({
        url: '/save-collection',
        type: 'GET',
        data: {
            gameName: gameName
        }
    }).done(function (result) {
        $('#button-add-collection').css('cursor', 'auto');
        $('#button-add-collection p').html('Game in your collection!');
        $('#button-add-collection').each(function () {
            this.style.pointerEvents = 'none';
        });
    });
}

function reportBug() {
    let name = $('#report-bug-name').val();
    let email = $('#report-bug-email').val();
    let note = $('#report-bug-note').val();

    $.ajax({
        url: '/report-bug',
        type: 'GET',
        data: {
            name: name,
            email: email,
            note: note,
            gameName: gameName
        }
    }).done(function (result) {
        $('#report-bug-modal').modal('hide');
        if (result['text'] == 'success') {
            $('#thank-report-modal #pre-email-thank').html(result['pre-email']);
            $('#thank-report-modal #last-email-thank').html(result['last-email']);
            $('#thank-report-modal').modal('show');
        } else {
            $('#duplicate-report-modal #pre-email-duplicate').html(result['pre-email']);
            $('#duplicate-report-modal #last-email-duplicate').html(result['last-email']);
            $('#duplicate-report-modal').modal('show');
        }
    });
}