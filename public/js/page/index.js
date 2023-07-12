!function (n) {
    var i = {};
    function a(e) {
        if (i[e])
            return i[e].exports;
        var t = i[e] = {
            i: e,
            l: !1,
            exports: {}
        };
        return n[e].call(t.exports, t, t.exports, a),
            t.l = !0,
            t.exports
    }
    a.m = n,
        a.c = i,
        a.d = function (e, t, n) {
            a.o(e, t) || Object.defineProperty(e, t, {
                enumerable: !0,
                get: n
            })
        }
        ,
        a.r = function (e) {
            "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(e, Symbol.toStringTag, {
                value: "Module"
            }),
                Object.defineProperty(e, "__esModule", {
                    value: !0
                })
        }
        ,
        a.t = function (t, e) {
            if (1 & e && (t = a(t)),
                8 & e)
                return t;
            if (4 & e && "object" == typeof t && t && t.__esModule)
                return t;
            var n = Object.create(null);
            if (a.r(n),
                Object.defineProperty(n, "default", {
                    enumerable: !0,
                    value: t
                }),
                2 & e && "string" != typeof t)
                for (var i in t)
                    a.d(n, i, function (e) {
                        return t[e]
                    }
                        .bind(null, i));
            return n
        }
        ,
        a.n = function (e) {
            var t = e && e.__esModule ? function () {
                return e.default
            }
                : function () {
                    return e
                }
                ;
            return a.d(t, "a", t),
                t
        }
        ,
        a.o = function (e, t) {
            return Object.prototype.hasOwnProperty.call(e, t)
        }
        ,
        a.p = "/packs/",
        a(a.s = 379)
}({
    379: function (e, t, n) {
        "use strict";
        function i(e, t) {
            for (var n = 0; n < t.length; n++) {
                var i = t[n];
                i.enumerable = i.enumerable || !1,
                    i.configurable = !0,
                    "value" in i && (i.writable = !0),
                    Object.defineProperty(e, i.key, i)
            }
        }
        n.r(t);
        i((n = s).prototype, [{
            key: "enable",
            value: function () {
                var e = this;
                this.ensureAtEnd(),
                    $(window).on(this.resizeEventName, function () {
                        e.ensureAtEnd()
                    })
            }
        }, {
            key: "ensureAtEnd",
            value: function () {
                var n = this
                    , e = $(this.containerSelector)
                    , t = e.find(this.lastElementSelector)
                    , i = e.find(".row")
                    , e = e.find(this.settings.elementSelector)
                    , a = (i.removeClass("auto-height"),
                        e.css(this.settings.show),
                        t.css(this.settings.hide),
                        e.first()[0] !== t[0] && t.insertBefore(e.first()),
                        this.lastVisibleElement(e));
                if (t.insertAfter(a).css(this.settings.show),
                    this.contentOverflows(i)) {
                    for (var o = a.width() + this.settings.marginBetweenElements, s = t.width(); o < s;)
                        o += (a = a.prev()).width() + this.settings.marginBetweenElements;
                    t.insertBefore(a).css(this.settings.show);
                    var r = !1;
                    i.find(this.settings.elementSelector).each(function (e, t) {
                        r && $(t).css(n.settings.hide),
                            $(t).hasClass(n.lastElementSelector.split(".")[1]) && (r = !0)
                    })
                } else
                    i.addClass("auto-height")
            }
        }, {
            key: "lastVisibleElement",
            value: function (e) {
                var n = this
                    , i = this.topOfLastVisibleLine(e)
                    , t = e.filter(function (e, t) {
                        return !$(t).hasClass(n.lastElementSelector.substring(1)) && $(t).position().top == i
                    }).last();
                return t = 0 == t.length ? e.last() : t
            }
        }, {
            key: "topOfLastVisibleLine",
            value: function (e) {
                var n = this
                    , i = -1
                    , a = 0;
                return e.each(function (e, t) {
                    return !!$(t).hasClass(n.lastElementSelector.substring(1)) || !($(t).position().top > i && (i = $(t).position().top,
                        ++a == n.settings.numberOfLines)) && void 0
                }),
                    i
            }
        }, {
            key: "disable",
            value: function () {
                $(this.containerSelector).find(this.settings.elementSelector).css(this.settings.show),
                    $(window).off(this.resizeEventName)
            }
        }, {
            key: "contentOverflows",
            value: function (e) {
                e = e[0];
                return !!e && (e.offsetHeight < e.scrollHeight || e.offsetWidth < e.scrollWidth)
            }
        }]),
            Object.defineProperty(n, "prototype", {
                writable: !1
            });
        var a = s
            , o = {
                AD: "Andorra",
                AE: "United Arab Emirates",
                AF: "Afghanistan",
                AG: "Antigua and Barbuda",
                AI: "Anguilla",
                AL: "Albania",
                AM: "Armenia",
                AO: "Angola",
                AR: "Argentina",
                AS: "American Samoa",
                AT: "Austria",
                AU: "Australia",
                AW: "Aruba",
                AX: "Åland Islands",
                AZ: "Azerbaijan",
                BA: "Bosnia and Herzegovina",
                BB: "Barbados",
                BD: "Bangladesh",
                BE: "Belgium",
                BF: "Burkina Faso",
                BG: "Bulgaria",
                BH: "Bahrain",
                BI: "Burundi",
                BJ: "Benin",
                BL: "Saint Barthélemy",
                BM: "Bermuda",
                BN: "Brunei Darussalam",
                BO: "Bolivia",
                BQ: "Bonaire, Sint Eustatius and Saba",
                BR: "Brazil",
                BS: "Bahamas",
                BT: "Bhutan",
                BV: "Bouvet Island",
                BW: "Botswana",
                BY: "Belarus",
                BZ: "Belize",
                CA: "Canada",
                CC: "Cocos (Keeling) Islands",
                CF: "Central African Republic",
                CG: "Congo",
                CH: "Switzerland",
                CI: "Côte D'Ivoire",
                CK: "Cook Islands",
                CL: "Chile",
                CM: "Cameroon",
                CN: "China",
                CO: "Colombia",
                CR: "Costa Rica",
                CU: "Cuba",
                CV: "Cape Verde",
                CW: "Curaçao",
                CX: "Christmas Island",
                CY: "Cyprus",
                CZ: "Czech Republic",
                DE: "Germany",
                DJ: "Djibouti",
                DK: "Denmark",
                DM: "Dominica",
                DO: "Dominican Republic",
                DZ: "Algeria",
                EC: "Ecuador",
                EE: "Estonia",
                EG: "Egypt",
                EH: "Western Sahara",
                ER: "Eritrea",
                ES: "Spain",
                ET: "Ethiopia",
                FI: "Finland",
                FJ: "Fiji",
                FK: "Falkland Islands (Malvinas)",
                FM: "Micronesia",
                FO: "Faroe Islands",
                FR: "France",
                GA: "Gabon",
                GB: "United Kingdom",
                GD: "Grenada",
                GE: "Georgia",
                GF: "French Guiana",
                GG: "Guernsey",
                GH: "Ghana",
                GI: "Gibraltar",
                GL: "Greenland",
                GM: "Gambia",
                GN: "Guinea",
                GP: "Guadeloupe",
                GQ: "Equatorial Guinea",
                GR: "Greece",
                GS: "South Georgia and the South Sandwich Islands",
                GT: "Guatemala",
                GU: "Guam",
                GW: "Guinea-Bissau",
                GY: "Guyana",
                HK: "Hong Kong",
                HM: "Heard and McDonald Islands",
                HN: "Honduras",
                HR: "Croatia",
                HT: "Haiti",
                HU: "Hungary",
                ID: "Indonesia",
                IE: "Ireland",
                IL: "Israel",
                IN: "India",
                IO: "British Indian Ocean Territory",
                IQ: "Iraq",
                IR: "Iran",
                IS: "Iceland",
                IT: "Italy",
                JM: "Jamaica",
                JO: "Jordan",
                JP: "Japan",
                KE: "Kenya",
                KG: "Kyrgyzstan",
                KH: "Cambodia",
                KM: "Comoros",
                KN: "Saint Kitts And Nevis",
                KP: "Korea",
                KR: "Korea",
                KW: "Kuwait",
                KY: "Cayman Islands",
                KZ: "Kazakhstan",
                LA: "Lao People's Democratic Republic",
                LB: "Lebanon",
                LC: "Saint Lucia",
                LI: "Liechtenstein",
                LK: "Sri Lanka",
                LR: "Liberia",
                LS: "Lesotho",
                LT: "Lithuania",
                LU: "Luxembourg",
                LV: "Latvia",
                LY: "Libya",
                MA: "Morocco",
                MC: "Monaco",
                MD: "Moldova",
                ME: "Montenegro",
                MF: "Saint Martin",
                MG: "Madagascar",
                MH: "Marshall Islands",
                MK: "Macedonia",
                ML: "Mali",
                MM: "Myanmar",
                MN: "Mongolia",
                MO: "Macao",
                MP: "Northern Mariana Islands",
                MQ: "Martinique",
                MR: "Mauritania",
                MS: "Montserrat",
                MT: "Malta",
                MU: "Mauritius",
                MV: "Maldives",
                MW: "Malawi",
                MX: "Mexico",
                MY: "Malaysia",
                MZ: "Mozambique",
                NA: "Namibia",
                NC: "New Caledonia",
                NE: "Niger",
                NF: "Norfolk Island",
                NG: "Nigeria",
                NI: "Nicaragua",
                NL: "Netherlands",
                NO: "Norway",
                NP: "Nepal",
                NR: "Nauru",
                NU: "Niue",
                NZ: "New Zealand",
                OM: "Oman",
                PA: "Panama",
                PE: "Peru",
                PF: "French Polynesia",
                PG: "Papua New Guinea",
                PH: "Philippines",
                PK: "Pakistan",
                PL: "Poland",
                PM: "Saint Pierre And Miquelon",
                PN: "Pitcairn",
                PR: "Puerto Rico",
                PS: "Palestine",
                PT: "Portugal",
                PW: "Palau",
                PY: "Paraguay",
                QA: "Qatar",
                RE: "Réunion",
                RO: "Romania",
                RS: "Serbia",
                RU: "Russian Federation",
                RW: "Rwanda",
                SA: "Saudi Arabia",
                SB: "Solomon Islands",
                SC: "Seychelles",
                SD: "Sudan",
                SE: "Sweden",
                SG: "Singapore",
                SH: "Saint Helena",
                SI: "Slovenia",
                SJ: "Svalbard And Jan Mayen",
                SK: "Slovakia",
                SL: "Sierra Leone",
                SM: "San Marino",
                SN: "Senegal",
                SO: "Somalia",
                SR: "Suriname",
                SS: "South Sudan",
                ST: "Sao Tome and Principe",
                SV: "El Salvador",
                SX: "Sint Maarten",
                SY: "Syrian Arab Republic",
                SZ: "Swaziland",
                TC: "Turks and Caicos Islands",
                TD: "Chad",
                TF: "French Southern Territories",
                TG: "Togo",
                TH: "Thailand",
                TJ: "Tajikistan",
                TK: "Tokelau",
                TL: "Timor-Leste",
                TM: "Turkmenistan",
                TN: "Tunisia",
                TO: "Tonga",
                TR: "Turkey",
                TT: "Trinidad and Tobago",
                TV: "Tuvalu",
                TW: "Taiwan",
                TZ: "Tanzania",
                UA: "Ukraine",
                UG: "Uganda",
                UM: "United States Minor Outlying Islands",
                US: "United States",
                UY: "Uruguay",
                UZ: "Uzbekistan",
                VC: "Saint Vincent And The Grenedines",
                VE: "Venezuela",
                VG: "Virgin Islands, British",
                VI: "Virgin Islands, U.S.",
                VN: "Vietnam",
                VU: "Vanuatu",
                WF: "Wallis and Futuna",
                WS: "Samoa",
                YE: "Yemen",
                YT: "Mayotte",
                ZA: "South Africa",
                ZM: "Zambia",
                ZW: "Zimbabwe"
            };
        function s(e, t, n) {
            if (!(this instanceof s))
                throw new TypeError("Cannot call a class as a function");
            this.containerSelector = e,
                this.lastElementSelector = t,
                this.resizeEventName = "resize.eae." + e + t,
                this.settings = $.extend({
                    numberOfLines: 2,
                    marginBetweenElements: 5,
                    show: {
                        display: "inline-block"
                    },
                    hide: {
                        display: "none"
                    },
                    elementSelector: "li"
                }, n)
        }
        function r(e, t) {
            for (var n = 0; n < t.length; n++) {
                var i = t[n];
                i.enumerable = i.enumerable || !1,
                    i.configurable = !0,
                    "value" in i && (i.writable = !0),
                    Object.defineProperty(e, i.key, i)
            }
        }
        r((t = c).prototype, [{
            key: "setup",
            value: function () {
                var t = this;
                this.modal.element.find(".y-icon--remove").click(function () {
                    return t.reset()
                }),
                    this.input.focus(function () {
                        t.active || t.showView2()
                    }),
                    this.input.on("input propertychange", function () {
                        var e = t.search(t.input.val());
                        t.searchResultsDiv.html(t.tpl(e)),
                            t.searchResultsDiv.find("li").click(function (e) {
                                t.modal.selectNewCountry(e)
                            })
                    })
            }
        }, {
            key: "reset",
            value: function () {
                this.showView1(),
                    this.input.val(""),
                    this.searchResultsDiv.html(this.tpl([]))
            }
        }, {
            key: "showView1",
            value: function () {
                $(".content-2").hide(),
                    $(".controls-2").hide(),
                    this.searchForm().appendTo(".controls-1 .selected-country"),
                    $(".content-1").show(),
                    $(".controls-1").show(),
                    this.modal.element.find(".y-icon--remove").hide(),
                    this.active = !1
            }
        }, {
            key: "showView2",
            value: function () {
                var e = this;
                $(".content-1").hide(),
                    $(".controls-1").hide(),
                    this.searchForm().appendTo(".controls-2 .search-input-col"),
                    setTimeout(function () {
                        e.input.focus()
                    }, 100),
                    $(".content-2").show(),
                    $(".controls-2").show(),
                    this.modal.element.find(".y-icon--remove").show(),
                    this.active = !0
            }
        }, {
            key: "searchForm",
            value: function () {
                return this.modal.element.find(".navbar-form")
            }
        }, {
            key: "search",
            value: function (e) {
                if (!e || "" == e.trim())
                    return [];
                var t, n = e.trim().toLowerCase(), i = [];
                for (t in o)
                    o.hasOwnProperty(t) && o[t].toLowerCase().startsWith(n) && i.push([t.toLowerCase(), o[t]]);
                return i
            }
        }]),
            Object.defineProperty(t, "prototype", {
                writable: !1
            });
        var l = c;
        function c(e) {
            if (!(this instanceof c))
                throw new TypeError("Cannot call a class as a function");
            this.modal = e,
                this.searchResultsDiv = this.modal.element.find(".search-results"),
                this.active = !1,
                this.input = this.modal.element.find(".search"),
                this.tpl = Handlebars.compile($(".search-trends-search-results-tpl").html()),
                this.setup()
        }
        function u(e, t) {
            for (var n = 0; n < t.length; n++) {
                var i = t[n];
                i.enumerable = i.enumerable || !1,
                    i.configurable = !0,
                    "value" in i && (i.writable = !0),
                    Object.defineProperty(e, i.key, i)
            }
        }
        u((n = d).prototype, [{
            key: "setup",
            value: function () {
                var t = this;
                this.renderCountries(),
                    this.markSelectedCountry(),
                    this.element.find(".countries li").click(function (e) {
                        return t.selectNewCountry(e)
                    }),
                    this.element.find(".selected-country li").click(function (e) {
                        return t.selectNewCountry(e)
                    }),
                    this.bg.click(function () {
                        return t.close()
                    }),
                    $(window).resize(function () {
                        t.isOpen && ($(window).width() < 800 && t.close(),
                            t.resize())
                    })
            }
        }, {
            key: "resize",
            value: function () {
                this.element.css({
                    left: this.calculateMenuLeftPosition() + "px",
                    width: this.parent.find(".row").width() + "px"
                }),
                    this.element.find(".countries-container").css({
                        height: this.countriesHeight + "px"
                    })
            }
        }, {
            key: "renderCountries",
            value: function () {
                this.element.find(".countries").html(Handlebars.compile(this.parent.find(".search-trends-countries-tpl").html())(this.countries()))
            }
        }, {
            key: "open",
            value: function (e) {
                var t = this;
                this.disablePageScrolling(),
                    this.element.css({
                        left: this.calculateMenuLeftPosition() + "px",
                        width: this.parent.find(".row").width() + "px"
                    }),
                    this.parent.css({
                        "z-index": 999
                    }),
                    this.bg.fadeIn(),
                    this.scrollToHeader().then(function () {
                        t.element.find(".countries-container").css({
                            height: t.countriesHeight + "px"
                        }),
                            t.element.fadeIn(),
                            t.isOpen = !0
                    })
            }
        }, {
            key: "close",
            value: function () {
                var e = this;
                this.isOpen && (this.element.fadeOut(),
                    this.bg.fadeOut(function () {
                        e.parent.css({
                            "z-index": 1
                        }),
                            e.enablePageScrolling(),
                            e.filter.reset()
                    }),
                    this.isOpen = !1)
            }
        }, {
            key: "toggle",
            value: function (e) {
                this.isOpen ? this.close() : this.open(e)
            }
        }, {
            key: "onChange",
            value: function (e) {
                this.element.on(this.changeEventName, e)
            }
        }, {
            key: "disablePageScrolling",
            value: function () {
                $("body").addClass("disable-scrolling")
            }
        }, {
            key: "enablePageScrolling",
            value: function () {
                $("body").removeClass("disable-scrolling")
            }
        }, {
            key: "scrollToHeader",
            value: function () {
                var e = $.Deferred()
                    , t = $(".navbar").height()
                    , n = document.body.getBoundingClientRect()
                    , n = this.parent[0].getBoundingClientRect().top - n.top - t - 5;
                return $("html, body").animate({
                    scrollTop: n
                }, 400, "swing", function () {
                    e.resolve()
                }),
                    e.promise()
            }
        }, {
            key: "calculateMenuLeftPosition",
            value: function () {
                var e = this.parent.find(".row")[0].getBoundingClientRect().left;
                return Math.ceil(e)
            }
        }, {
            key: "findSelectedCountryIsoCode",
            value: function (e) {
                return e.find(".c").attr("class").split(" ").slice(-1)[0].toUpperCase()
            }
        }, {
            key: "selectNewCountry",
            value: function (e) {
                this.close();
                e = $(e.currentTarget),
                    e = this.findSelectedCountryIsoCode(e);
                this.countryCode = e,
                    this.element.trigger(this.changeEventName, e),
                    this.markSelectedCountry()
            }
        }, {
            key: "markSelectedCountry",
            value: function () {
                var e = this.element.find(".selected-country li")
                    , t = (e.find(".c").removeClass().addClass("c " + this.countryCode.toLowerCase()),
                        e.show(),
                        o[this.countryCode])
                    , e = (t && e.find(".country-name").html(t),
                        this.element.find(".countries li").removeClass("selected"),
                        this.element.find(".countries .c." + this.countryCode.toLowerCase()));
                0 != e.length && e.parent().addClass("selected")
            }
        }, {
            key: "countries",
            value: function () {
                var i = {};
                return Object.keys(o).sort().forEach(function (e) {
                    var t = o[e]
                        , n = t.charAt(0);
                    i[n] || (i[n] = {}),
                        i[n][e.toLowerCase()] = t
                }),
                    i
            }
        }, {
            key: "viewportHeight",
            get: function () {
                return Math.max(document.documentElement.clientHeight, window.innerHeight || 0)
            }
        }, {
            key: "countriesHeight",
            get: function () {
                return this.viewportHeight - this.parent.height() - this.pxAboveCountries
            }
        }]),
            Object.defineProperty(n, "prototype", {
                writable: !1
            });
        var h = d;
        function d(e, t) {
            if (!(this instanceof d))
                throw new TypeError("Cannot call a class as a function");
            this.changeEventName = "searchTrends:newCountrySelected",
                this.parent = e,
                this.element = $(".country-chooser-modal"),
                this.bg = $(".tint"),
                this.countryCode = t,
                this.isOpen = !1,
                this.filter = new l(this),
                this.pxAboveCountries = 260,
                this.setup()
        }
        function f(e, t) {
            for (var n = 0; n < t.length; n++) {
                var i = t[n];
                i.enumerable = i.enumerable || !1,
                    i.configurable = !0,
                    "value" in i && (i.writable = !0),
                    Object.defineProperty(e, i.key, i)
            }
        }
        f((t = m).prototype, [{
            key: "resolve",
            value: function (e) {
                var t = this
                    , i = $.Deferred();
                return this.country && !e ? i.resolve(this.countryInfo(this.country)) : this.fetch().then(function (e) {
                    if (!Array.isArray(e) || !e.length)
                        return i.reject("UCR failed: no data from server"),
                            i.promise();
                    e = e.reverse().map(function (e) {
                        return String.fromCharCode(e)
                    }).join("");
                    return Cookies.set(t.cookieName, e, t.cookieOptions()),
                        i.resolve(t.countryInfo(e))
                }).fail(function (e, t, n) {
                    i.reject("UCR failed: ".concat(n))
                }),
                    i.promise()
            }
        }, {
            key: "countryInfo",
            value: function (e) {
                return {
                    code: e,
                    name: o[e]
                }
            }
        }, {
            key: "cookieOptions",
            value: function () {
                return {
                    path: "/",
                    domain: this.cookieDomain,
                    expires: this.cookieExpiration
                }
            }
        }, {
            key: "country",
            get: function () {
                return Cookies.get(this.cookieName)
            }
        }, {
            key: "domain",
            get: function () {
                return window.location.hostname.split(".").slice(-2).join(".")
            }
        }, {
            key: "fetch",
            value: function () {
                return $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: this.endpoint,
                    timeout: 3e3
                })
            }
        }]),
            Object.defineProperty(t, "prototype", {
                writable: !1
            });
        var p = m;
        function m() {
            if (!(this instanceof m))
                throw new TypeError("Cannot call a class as a function");
            this.endpoint = "/ajax/user_c_info",
                this.cookieName = "_y8_uci",
                this.cookieExpiration = 7,
                this.cookieDomain = ".".concat(this.domain)
        }
        function y(e, t) {
            for (var n = 0; n < t.length; n++) {
                var i = t[n];
                i.enumerable = i.enumerable || !1,
                    i.configurable = !0,
                    "value" in i && (i.writable = !0),
                    Object.defineProperty(e, i.key, i)
            }
        }
        y((n = w).prototype, [{
            key: "showMoreButton",
            get: function () {
                return this.element.find("li.more")
            }
        }, {
            key: "showLessButton",
            get: function () {
                return this.element.find("li.less")
            }
        }, {
            key: "enable",
            value: function () {
                var n = this;
                (new p).resolve().then(function (e) {
                    o[e.code] && (n.countryCode = e.code)
                }).always(function () {
                    n.modal = new h(n.element, n.countryCode),
                        n.modal.onChange(function (e, t) {
                            n.countryCode = t,
                                n.render()
                        }),
                        n.render()
                }),
                    this.openModalButton.click(function (e) {
                        n.modal.toggle(e)
                    }),
                    this.handleWindowResize()
            }
        }, {
            key: "render",
            value: function () {
                var t = this;
                return this.fetch().done(function (e) {
                    e && 0 != e.length ? (t.changeOpenModalButtonFlag(),
                        t.element.find(".search-trends").html(t.compiledTpl(e)),
                        t.element.find("li.more .control, li.less .control").click(function (e) {
                            t.toggleLessAndMoreButtons(e.currentTarget),
                                t.modal.resize()
                        }),
                        t.handleShowLessAndMoreButtonVisibility()) : console.log("Got empty search trends")
                })
            }
        }, {
            key: "fetch",
            value: function () {
                return $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "Y8" == this.countryCode ? this.endpoint : this.endpoint + "/" + this.countryCode
                })
            }
        }, {
            key: "changeOpenModalButtonFlag",
            value: function () {
                this.openModalButton.find(".c").removeClass().addClass("c " + this.countryCode.toLowerCase())
            }
        }, {
            key: "handleWindowResize",
            value: function () {
                var e = this;
                $(window).resize(function () {
                    e.handleShowLessAndMoreButtonVisibility()
                })
            }
        }, {
            key: "handleShowLessAndMoreButtonVisibility",
            value: function () {
                this.contentRowOverflows() ? this.atEndEnsurer.enable() : this.contentRow.height() > this.singleLineHeight ? this.showLessButton.css({
                    display: "inline-block"
                }) : this.showLessButton.css({
                    display: "none"
                })
            }
        }, {
            key: "toggleLessAndMoreButtons",
            value: function (e) {
                this.handleShowLessAndMoreButtonVisibility(),
                    "more" == $(e).parent().attr("class") ? (this.atEndEnsurer.disable(),
                        this.showMoreButton.css({
                            display: "none"
                        }),
                        this.showLessButton.css({
                            display: "inline-block"
                        }),
                        this.contentRow.removeClass("single-line")) : (this.showLessButton.css({
                            display: "none"
                        }),
                            this.contentRow.addClass("single-line"),
                            this.atEndEnsurer.enable())
            }
        }, {
            key: "contentRowOverflows",
            value: function () {
                var e = this.contentRow[0];
                return e.offsetHeight < e.scrollHeight || e.offsetWidth < e.scrollWidth
            }
        }]),
            Object.defineProperty(n, "prototype", {
                writable: !1
            });
        var g = w
            , v = {
                init: function () {
                    this.$topCategories = $(".top-categories"),
                        this.$topCategories.length && (this.$contentRow = this.$topCategories.find(".row"),
                            this.$allCategoriesBtn = $(".all-categories-btn"),
                            this.updateLastElement = new a(".top-categories", ".all-categories-btn", {
                                numberOfLines: 1
                            }),
                            this.$allCategoriesBtn.on("click", this.showAllCategories.bind(this)),
                            this.updateLastElement.enable())
                },
                showAllCategories: function (e) {
                    var t = this;
                    e.preventDefault(),
                        e.stopPropagation(),
                        this.updateLastElement.disable(),
                        this.$topCategories.addClass("stop-hover"),
                        e.target.style.display = "none",
                        $(".top-categories li.inactive").mouseleave(function () {
                            t.$topCategories.removeClass("stop-hover")
                        }),
                        this.$contentRow.removeClass("single-line")
                }
            };
        function w() {
            if (!(this instanceof w))
                throw new TypeError("Cannot call a class as a function");
            this.element = $(".js-search-trends"),
                this.contentRow = this.element.find(".row"),
                this.endpoint = this.element.data("endpoint"),
                this.spinner = this.element.find(".spinner"),
                this.openModalButton = $(".open-modal-btn"),
                this.countryCode = "Y8",
                this.singleLineHeight = 42,
                this.tpl = this.element.find(".search-trends-tpl"),
                0 != this.tpl.length ? (this.atEndEnsurer = new a(".js-search-trends", ".more", {
                    numberOfLines: 1
                }),
                    this.compiledTpl = Handlebars.compile(this.tpl.html())) : console.warn("No search trends template is found")
        }
        $(function () {
            0 < $(".js-search-trends").length && (new g).enable(),
                Tracking.trackThumbsDisplay(),
                "undefined" != typeof VideoPreview && VideoPreview.init(),
                v.init(),
                $(".top-tags__wrapper").length && new a(".top-tags__wrapper", ".more-tags", {
                    numberOfLines: 1
                }).enable()
        })
    }
});
