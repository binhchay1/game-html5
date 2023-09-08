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

})(this, this.document);

$(document).ready(function () {
    let swUrl = "/js/sdk/sw.js";
    document.getElementById("game-iframe").onload = function () {
        if (window.Promise) {
            var promise = new Promise(function (resolve, reject) {
                var request = new XMLHttpRequest();

                request.open('GET', swUrl);
                request.onload = function () {
                    if (request.status == 200) {
                        resolve(request.response);
                    } else {
                        $('#pre-load').addClass('d-none');
                        $('#error-load').removeClass('d-none');
                    }
                };

                request.onerror = function () {
                    $('#pre-load').addClass('d-none');
                    $('#error-load').removeClass('d-none');
                };
                request.send();
            });

            promise.then(function (data) {
                let scriptTag = "<script>" + data + "<\/script>";
                $("iframe").contents().find("body").append(scriptTag);
            }, function (error) {
                $('#pre-load').addClass('d-none');
                $('#error-load').removeClass('d-none');
            });
        } else {
            $('#pre-load').addClass('d-none');
            $('#error-load').removeClass('d-none');
        }
    };

    let listChangeColor = ['h1', 'h2', 'h3', 'h4', 'h5', 'p', 'i', 'a'];
    for (let i = 0; i < listChangeColor.length; i++) {
        let all = document.getElementsByTagName(listChangeColor[i]);

        for (let i = 0, max = all.length; i < max; i++) {
            all[i].style.color = invertColor(themeColor);
        }
    }

    let elementPostArea = document.getElementById("post-area");
    if (elementPostArea.getElementsByClassName("post-date") != null) {
        let listPost = elementPostArea.getElementsByClassName("post-date");
        for (let i = 0; i < listPost.length; i++) {
            let time = listPost[i].getElementsByTagName('p')[0].getAttribute('title');
            let calTime = moment(time, "YYYY-MM-DD H-i-s").fromNow();
            listPost[i].getElementsByTagName('p')[0].innerHTML = calTime;
        }
    }

    let btnSubmitComment = document.getElementById("btn-submit-comment");
    if (btnSubmitComment != null) {
        btnSubmitComment.style.border = '1px solid ' + invertColor(themeColor);
        btnSubmitComment.style.background = 'none';
        btnSubmitComment.style.color = invertColor(themeColor);
        btnSubmitComment.style.marginLeft = '10px';
    }

    let btnLogin = document.getElementById("btn-login");

    if (btnLogin != null) {
        btnLogin.style.border = '1px solid ' + invertColor(themeColor);
        btnLogin.style.marginLeft = '10px';
    }

    let iframe = document.getElementById("game-iframe");
    iframe.classList.add("pre-play-game");

    let details = navigator.userAgent;
    let regexp = /android|iphone|kindle|ipad/i;
    let isMobileDevice = regexp.test(details);

    if (isMobileDevice) {
        window.addEventListener('load', function (e) {
            setTimeout(function () { window.scrollTo(0, 1); }, 1);
        }, false);
    }
});

$("#btn-play").click(function () {
    let iframe = $("#game-iframe");
    let areaBtn = $(".btn-play-area");
    let areaFullScreen = $("#btn-fullscreen-area");
    let preLoad = $("#pre-load");
    iframe.attr("src", iframe.data("src"));
    areaBtn.addClass('hide-important');
    iframe.removeClass('pre-play-game');
    areaFullScreen.removeClass('d-none');
    preLoad.removeClass('d-none');

    $.ajax({
        url: '/count-play',
        type: 'get',
        data: {
            gameName: gameName
        }
    }).done(function () {

    });
});

$('#btn-submit-comment').on("click", function (e) {
    e.preventDefault();
    let content = $('.comment-input').val();
    if (content.length == 0 || content.length > 255) {
        return false;
    } else {
        $.ajax({
            url: '/store-comments',
            type: 'get',
            data: {
                content: content,
                gameName: gameName
            }
        }).done(function (result) {
            if (result.status == true) {
                let contentAppend = "<p style='color: " + invertColor(themeColor) + "'>" + result.content + "</p>";
                $('.form-comment').empty();
                $('.form-comment').append(contentAppend);
            }
        });
    }
});

$('#vote-like').on('click', function () {
    $.ajax({
        url: '/vote-by-user',
        type: 'GET',
        data: {
            vote: 'like',
            gameName: gameName
        }
    }).done(function () {
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
    }).done(function () {
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
    }).done(function () {
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

window.addEventListener("message", function (event) {
    if (event.origin !== window.location.origin)
        return;

    $('#pre-load').addClass('d-none');
    let dataPost = event.data;
    let iframe = document.getElementById('game-iframe');
    let fullscreen = document.getElementById('btn-fullscreen-area');
    iframe.width = dataPost.width;
    iframe.height = dataPost.height;
    if (dataPost.webgl) {
        fullscreen.style.display = 'none';
    }
});
