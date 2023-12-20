function countPlay() {
    $.getJSON("https://api.ipify.org?format=json", function (e) {
        let t = e.ip;
        $.ajax({ url: "/store-player", type: "GET", data: { ip: t, gameName: gameName } });
    });
}
function invertColor(e) {
    if ((0 === e.indexOf("#") && (e = e.slice(1)), 3 === e.length && (e = e[0] + e[0] + e[1] + e[1] + e[2] + e[2]), 6 !== e.length)) throw Error("Invalid HEX color.");
    let t = (255 - parseInt(e.slice(0, 2), 16)).toString(16),
        n = (255 - parseInt(e.slice(2, 4), 16)).toString(16),
        o = (255 - parseInt(e.slice(4, 6), 16)).toString(16);
    return "#" + padZero(t) + padZero(n) + padZero(o);
}
function padZero(e, t) {
    return (Array((t = t || 2)).join("0") + e).slice(-t);
}
function saveCollection() {
    $.ajax({ url: "/save-collection", type: "GET", data: { gameName: gameName } }).done(function () {
        $("#button-add-collection").css("cursor", "auto"),
            $("#button-add-collection p").html("Game in your collection!"),
            $("#button-add-collection").each(function () {
                this.style.pointerEvents = "none";
            });
    });
}
function reportBug() {
    let e = $("#report-bug-name").val(),
        t = $("#report-bug-email").val(),
        n = $("#report-bug-note").val();
    $.ajax({ url: "/report-bug", type: "GET", data: { name: e, email: t, note: n, gameName: gameName } }).done(function (e) {
        $("#report-bug-modal").modal("hide"),
            "success" == e.text
                ? ($("#thank-report-modal #pre-email-thank").html(e["pre-email"]), $("#thank-report-modal #last-email-thank").html(e["last-email"]), $("#thank-report-modal").modal("show"))
                : ($("#duplicate-report-modal #pre-email-duplicate").html(e["pre-email"]), $("#duplicate-report-modal #last-email-duplicate").html(e["last-email"]), $("#duplicate-report-modal").modal("show"));
    });
}
!(function (e, t) {
    let n = function (e, n) {
            return (n || t).querySelector(e);
        },
        o = n("iframe"),
        a = "Webkit Moz O ms Khtml".split(" "),
        l = function (e) {
            let t;
            for (let n = -1, o = a.length; ++n < o; ) {
                if (e[(t = a[n].toLowerCase()) + "EnterFullScreen"]) return t + "EnterFullScreen";
                if (e[t + "RequestFullScreen"]) return t + "RequestFullScreen";
            }
            return !1;
        },
        r = l(t.createElement("iframe"));
    if (!l) {
        alert("Fullscreen won't work, please make sure you're using a browser that supports it and you have enabled the feature");
        return;
    }
    n("#fullscreeniframe").addEventListener(
        "click",
        function () {
            o[r]();
        },
        !1
    );
})(this, this.document),
    $(document).ready(function () {
        document.getElementById("game-iframe").onload = function () {
            window.Promise
                ? new Promise(function (e, t) {
                      var n = new XMLHttpRequest();
                      n.setRequestHeader("Content-type", "application/json");
                      n.open("GET", "/js/sdk/sw.js"),
                          (n.onload = function () {
                              200 == n.status ? e(n.response) : ($("#pre-load").addClass("d-none"), $("#error-load").removeClass("d-none"));
                          }),
                          (n.onerror = function () {
                              $("#pre-load").addClass("d-none"), $("#error-load").removeClass("d-none");
                          }),
                          n.send();
                  }).then(
                      function (e) {
                          $("#pre-load").addClass("d-none"),
                              $("iframe")
                                  .contents()
                                  .find("body")
                                  .append("<script>" + e + "</script>");
                      },
                      function (e) {
                          $("#pre-load").addClass("d-none"), $("#error-load").removeClass("d-none");
                      }
                  )
                : ($("#pre-load").addClass("d-none"), $("#error-load").removeClass("d-none"));
        };
        let e = ["h1", "h2", "h3", "h4", "h5", "p", "i", "a"];
        for (let t = 0; t < e.length; t++) {
            let n = document.getElementsByTagName(e[t]);
            for (let o = 0, a = n.length; o < a; o++) n[o].style.color = invertColor(themeColor);
        }
        let l = document.getElementById("post-area");
        if (null != l.getElementsByClassName("post-date")) {
            let r = l.getElementsByClassName("post-date");
            for (let i = 0; i < r.length; i++) {
                moment.locale(locale);
                let s = moment(r[i].getElementsByTagName("p")[0].getAttribute("title"), "YYYY-MM-DD H-i-s").fromNow();
                r[i].getElementsByTagName("p")[0].innerHTML = s;
            }
        }
        let d = document.getElementById("btn-submit-comment");
        null != d && ((d.style.border = "1px solid " + invertColor(themeColor)), (d.style.background = "none"), (d.style.color = invertColor(themeColor)), (d.style.marginLeft = "10px"));
        let m = document.getElementById("btn-login");
        null != m && ((m.style.border = "1px solid " + invertColor(themeColor)), (m.style.marginLeft = "10px")), document.getElementById("game-iframe").classList.add("pre-play-game");
        let c = navigator.userAgent;
        /android|iphone|kindle|ipad/i.test(c) &&
            window.addEventListener(
                "load",
                function (e) {
                    setTimeout(function () {
                        window.scrollTo(0, 1);
                    }, 1);
                },
                !1
            );
    }),
    $("#btn-play").click(function () {
        let e = $("#game-iframe"),
            t = $(".btn-play-area"),
            n = $("#btn-fullscreen-area"),
            o = $("#pre-load");
        e.attr("src", e.data("src")),
            t.addClass("hide-important"),
            e.removeClass("pre-play-game"),
            n.removeClass("d-none"),
            o.removeClass("d-none"),
            $.ajax({ url: "/count-play", type: "get", data: { gameName: gameName } }).done(function () {});
    }),
    $("#btn-submit-comment").on("click", function (e) {
        e.preventDefault();
        let t = $(".comment-input").val();
        if (0 == t.length || t.length > 255) return !1;
        $.ajax({ url: "/store-comments", type: "get", data: { content: t, gameName: gameName } }).done(function (e) {
            if (!0 == e.status) {
                let t = "<p style='color: " + invertColor(themeColor) + "'>" + e.content + "</p>";
                $(".form-comment").empty(), $(".form-comment").append(t);
            }
        });
    }),
    $("#vote-like").on("click", function () {
        $.ajax({ url: "/vote-by-user", type: "GET", data: { vote: "like", gameName: gameName } }).done(function () {
            $("#vote-unlike").css("opacity", "0.3"), $("#vote-like").css("opacity", "1");
        });
    }),
    $("#vote-unlike").on("click", function () {
        $.ajax({ url: "/vote-by-user", type: "GET", data: { vote: "unlike", gameName: gameName } }).done(function () {
            $("#vote-like").css("opacity", "0.3"), $("#vote-unlike").css("opacity", "1");
        });
    }),
    $("#report-bug-modal").on("shown.bs.modal", function (e) {
        let t = $(e.relatedTarget).data("name"),
            n = $(e.relatedTarget).data("email");
        $(".modal-body #report-bug-name").val(t), $(".modal-body #report-bug-email").val(n);
    }),
    setTimeout(countPlay, 1e4),
    window.addEventListener("message", function (e) {
        if (e.origin !== window.location.origin) return;
        $("#pre-load").addClass("d-none");
        let t = e.data,
            n = document.getElementById("game-iframe"),
            o = document.getElementById("btn-fullscreen-area");
        (n.width = t.width), (n.height = t.height), t.webgl && (o.style.display = "none");
    });
