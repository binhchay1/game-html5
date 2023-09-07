const sw = ! function (e, t) {
    "use strict";
    "object" == typeof module && "object" == typeof module.exports ? module.exports = e.document ? t(e, !0) : function (e) {
        if (!e.module)
            throw new Error("Module required");
        return t(e)
    } :
        t(e)
}("undefined" != typeof window ? window : this, function (C, e, f) {
    "use strict";
    let b = $("#game-iframe");
    let o = {};
    let u = urlMain;
    let h = C.document.body.clientHeight;
    let w = C.document.body.clientWidth;

    b.find('webgl-content') ? f = true : f = false;
    o['webgl'] = f;
    o['width'] = w;
    o['height'] = h;

    top.postMessage(o, u);
})
