(function(C, e, f) {
    'use strict';
    let urlMain = window.location.href;
    let b = document.querySelector('body');
    let o = {};
    let u = urlMain;
    let h = window.document.body.clientHeight;
    let w = window.document.body.clientWidth;
    b.classList.contains('webgl-content') ? f = true : f = false;
    o['webgl'] = f;
    o['width'] = w;
    o['height'] = h;
    top.postMessage(o, u);
})()
