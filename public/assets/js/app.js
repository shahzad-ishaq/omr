!function () {
    "use strict";
    var t, e, a, n = localStorage.getItem("language"), s = "en";

    function o(t) {
        document.getElementsByClassName("header-lang-img").forEach((function (e) {
            if (e) {
                switch (t) {
                    case"en":
                    default:
                        e.src = "assets/images/flags/us.jpg";
                        break;
                    case"sp":
                        e.src = "assets/images/flags/spain.jpg";
                        break;
                    case"gr":
                        e.src = "assets/images/flags/germany.jpg";
                        break;
                    case"it":
                        e.src = "assets/images/flags/italy.jpg";
                        break;
                    case"ru":
                        e.src = "assets/images/flags/russia.jpg"
                }
                localStorage.setItem("language", t), n = localStorage.getItem("language"), function () {
                    null == n && o(s);
                    var t = new XMLHttpRequest;
                    t.open("GET", "/assets/lang/" + n + ".json"), t.onreadystatechange = function () {
                        if (4 === this.readyState && 200 === this.status) {
                            var t = JSON.parse(this.responseText);
                            Object.keys(t).forEach((function (e) {
                                document.querySelectorAll("[data-key='" + e + "']").forEach((function (a) {
                                    a.textContent = t[e]
                                }))
                            }))
                        }
                    }, t.send()
                }()
            }
        }))
    }

    function l() {
        setTimeout((function () {
            var t = document.getElementById("side-menu");
            if (t) {
                var e = t.querySelector(".mm-active .active"), a = e ? e.offsetTop : 0;
                if (a > 300) {
                    a -= 100;
                    var n = document.getElementsByClassName("vertical-menu") ? document.getElementsByClassName("vertical-menu")[0] : "";
                    n && n.querySelector(".simplebar-content-wrapper") && setTimeout((function () {
                        n.querySelector(".simplebar-content-wrapper").scrollTop = a
                    }), 0)
                }
            }
        }), 0)
    }

    function i() {
        for (var t = document.getElementById("topnav-menu-content").getElementsByTagName("a"), e = 0, a = t.length; e < a; e++) "nav-item dropdown active" === t[e].parentElement.getAttribute("class") && (t[e].parentElement.classList.remove("active"), t[e].nextElementSibling.classList.remove("show"));
        window.innerWidth <= 992 ? (document.getElementsByClassName("vertical-menu")[0].removeAttribute("style"), "horizontal" == document.body.getAttribute("data-layout") && (document.getElementsByClassName("vertical-menu")[0].style.display = "none")) : "vertical" == document.body.getAttribute("data-layout") && (document.getElementsByClassName("vertical-menu")[0].style.display = "block")
    }

    function r(t, e) {
        var a = document.getElementById(t);
        a.style.display = "block";
        var n = setInterval((function () {
            a.style.opacity || (a.style.opacity = 1), a.style.opacity > 0 ? a.style.opacity -= .2 : (clearInterval(n), a.style.display = "none")
        }), 200)
    }

    function d() {
        if (feather.replace(), window.sessionStorage) {
            var t = sessionStorage.getItem("is_visited");
            if (t) if ("rtl" == document.getElementsByTagName("html")[0].style.direction) sessionStorage.setItem("is_visited", "layout-direction-rtl"); else {
                var e = document.querySelector("#" + t);
                null !== e && (e.checked = !0, a = t, 1 == document.getElementById("layout-direction-ltr").checked && "layout-direction-ltr" === a ? (document.getElementsByTagName("html")[0].removeAttribute("dir"), document.getElementById("layout-direction-rtl").checked = !1, document.getElementById("bootstrap-style").setAttribute("href", "assets/css/bootstrap.min.css"), document.getElementById("app-style").setAttribute("href", "assets/css/app.min.css"), sessionStorage.setItem("is_visited", "layout-direction-ltr")) : 1 == document.getElementById("layout-direction-rtl").checked && "layout-direction-rtl" === a && (document.getElementById("layout-direction-ltr").checked = !1, document.getElementById("bootstrap-style").setAttribute("href", "assets/css/bootstrap-rtl.min.css"), document.getElementById("app-style").setAttribute("href", "assets/css/app-rtl.min.css"), document.getElementsByTagName("html")[0].setAttribute("dir", "rtl"), sessionStorage.setItem("is_visited", "layout-direction-rtl")))
            } else sessionStorage.setItem("is_visited", "layout-direction-ltr")
        }
        var a
    }

    function c(t) {
        document.getElementById(t) && (document.getElementById(t).checked = !0)
    }

    window.onload = function () {
        document.getElementById("preloader") && (r("pre-status"), r("preloader"))
    }, d(), document.addEventListener("DOMContentLoaded", (function (t) {
        document.getElementById("side-menu") && new MetisMenu("#side-menu")
    })), (t = document.querySelectorAll(".counter-value")) && t.forEach((function (t) {
        !function e() {
            var a = +t.getAttribute("data-target"), n = +t.innerText, s = a / 250;
            s < 1 && (s = 1), n < a ? (t.innerText = (n + s).toFixed(0), setTimeout(e, 1)) : t.innerText = a
        }()
    })), function () {
        var t = document.body.getAttribute("data-sidebar-size");
        window.onload = function () {
            window.innerWidth >= 1024 && window.innerWidth <= 1366 && (document.body.setAttribute("data-sidebar-size", "sm"), c("sidebar-size-small"))
        };
        for (var e, a = document.getElementsByClassName("vertical-menu-btn"), n = 0; n < a.length; n++) a[e = n] && a[e].addEventListener("click", (function (e) {
            e.preventDefault(), document.body.classList.toggle("sidebar-enable"), window.innerWidth >= 992 ? null == t ? null == document.body.getAttribute("data-sidebar-size") || "lg" == document.body.getAttribute("data-sidebar-size") ? document.body.setAttribute("data-sidebar-size", "sm") : document.body.setAttribute("data-sidebar-size", "lg") : "md" == t ? "md" == document.body.getAttribute("data-sidebar-size") ? document.body.setAttribute("data-sidebar-size", "sm") : document.body.setAttribute("data-sidebar-size", "md") : "sm" == document.body.getAttribute("data-sidebar-size") ? document.body.setAttribute("data-sidebar-size", "lg") : document.body.setAttribute("data-sidebar-size", "sm") : l()
        }))
    }(), setTimeout((function () {
        var t = document.querySelectorAll("#sidebar-menu a");
        t && t.forEach((function (t) {
            var e = window.location.href.split(/[?#]/)[0];
            if (t.href == e) {
                t.classList.add("active");
                var a = t.parentElement;
                if (a && "side-menu" !== a.id) {
                    a.classList.add("mm-active");
                    var n = a.parentElement;
                    if (n && "side-menu" !== n.id) {
                        n.classList.add("mm-show");
                        var s = n.parentElement;
                        if (s && "side-menu" !== s.id) {
                            s.classList.add("mm-active");
                            var o = s.parentElement;
                            if (o && "side-menu" !== o.id) {
                                o.classList.add("mm-show");
                                var l = o.parentElement;
                                l && "side-menu" !== l.id && l.classList.add("mm-active")
                            }
                        }
                    }
                }
            }
        }))
    }), 0), (e = document.querySelectorAll(".navbar-nav a")) && e.forEach((function (t) {
        var e = window.location.href.split(/[?#]/)[0];
        if (t.href == e) {
            t.classList.add("active");
            var a = t.parentElement;
            if (a) {
                a.classList.add("active");
                var n = a.parentElement;
                n.classList.add("active");
                var s = n.parentElement;
                if (s) {
                    s.classList.add("active");
                    var o = s.parentElement;
                    if (o.closest("li") && o.closest("li").classList.add("active"), o) {
                        o.classList.add("active");
                        var l = o.parentElement;
                        if (l) {
                            l.classList.add("active");
                            var i = l.parentElement;
                            i && i.classList.add("active")
                        }
                    }
                }
            }
        }
    })), function () {
        var t = document.querySelector('[data-toggle="fullscreen"]');

        function e() {
            document.webkitIsFullScreen || document.mozFullScreen || document.msFullscreenElement || document.body.classList.remove("fullscreen-enable")
        }

        t && t.addEventListener("click", (function (t) {
            t.preventDefault(), document.body.classList.toggle("fullscreen-enable"), document.fullscreenElement || document.mozFullScreenElement || document.webkitFullscreenElement ? document.cancelFullScreen ? document.cancelFullScreen() : document.mozCancelFullScreen ? document.mozCancelFullScreen() : document.webkitCancelFullScreen && document.webkitCancelFullScreen() : document.documentElement.requestFullscreen ? document.documentElement.requestFullscreen() : document.documentElement.mozRequestFullScreen ? document.documentElement.mozRequestFullScreen() : document.documentElement.webkitRequestFullscreen && document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT)
        })), document.addEventListener("fullscreenchange", e), document.addEventListener("webkitfullscreenchange", e), document.addEventListener("mozfullscreenchange", e)
    }(), function () {
        if (document.getElementById("topnav-menu-content")) {
            for (var t = document.getElementById("topnav-menu-content").getElementsByTagName("a"), e = 0, a = t.length; e < a; e++) t[e].onclick = function (t) {
                "#" === t.target.getAttribute("href") && (t.target.parentElement.classList.toggle("active"), t.target.nextElementSibling.classList.toggle("show"))
            };
            window.addEventListener("resize", i)
        }
    }(), [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]')).map((function (t) {
        return new bootstrap.Tooltip(t)
    })), [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]')).map((function (t) {
        return new bootstrap.Popover(t)
    })), [].slice.call(document.querySelectorAll(".toast")).map((function (t) {
        return new bootstrap.Toast(t)
    })), function () {
        "null" != n && "en" !== n && o(n);
        var t = document.getElementsByClassName("language");
        t && t.forEach((function (t) {
            t.addEventListener("click", (function (e) {
                o(t.getAttribute("data-lang"))
            }))
        }))
    }(), function () {
        document.getElementById("layout-width-boxed").addEventListener("click", (function () {
            c("sidebar-size-small"), document.body.setAttribute("data-sidebar-size", "sm")
        }));
        var t = document.getElementsByTagName("body")[0], e = document.querySelectorAll(".light-dark");
        e && e.forEach((function (e) {
            e.addEventListener("click", (function (e) {
                t.hasAttribute("data-layout-mode") && "dark" == t.getAttribute("data-layout-mode") ? (c("layout-mode-light"), document.body.setAttribute("data-layout-mode", "light"), "vertical" == document.body.getAttribute("data-layout") && document.body.setAttribute("data-topbar", "light")) : (c("layout-mode-dark"), document.body.setAttribute("data-layout-mode", "dark"), "vertical" == document.body.getAttribute("data-layout") && document.body.setAttribute("data-topbar", "dark"))
            }))
        })), t = document.body, document.getElementById("right-bar-toggle").addEventListener("click", (function (e) {
            t.classList.toggle("right-bar-enabled")
        })), t.addEventListener("click", (function (t) {
            t.target.parentElement.classList.contains("right-bar-toggle-close") ? document.body.classList.remove("right-bar-enabled") : t.target.closest(".right-bar-toggle, .right-bar") || document.body.classList.remove("right-bar-enabled")
        })), (t = document.getElementsByTagName("body")[0]).hasAttribute("data-layout") && "horizontal" == t.getAttribute("data-layout") ? (c("layout-horizontal"), document.getElementById("sidebar-setting").style.display = "none", document.getElementsByClassName("vertical-menu")[0].style.display = "none", document.getElementsByClassName("ishorizontal-topbar")[0].style.display = "block", document.getElementsByClassName("isvertical-topbar")[0].style.display = "none") : (c("layout-vertical"), document.getElementById("sidebar-setting").style.display = "block", document.getElementsByClassName("vertical-menu")[0].style.display = "block", window.innerWidth <= 992 && document.getElementsByClassName("vertical-menu")[0].removeAttribute("style"), document.getElementsByClassName("ishorizontal-topbar")[0].style.display = "none"), t.hasAttribute("data-layout-mode") && "dark" == t.getAttribute("data-layout-mode") ? c("layout-mode-dark") : c("layout-mode-light"), t.hasAttribute("data-layout-size") && "boxed" == t.getAttribute("data-layout-size") ? c("layout-width-boxed") : c("layout-width-fluid"), t.hasAttribute("data-layout-scrollable") && "true" == t.getAttribute("data-layout-scrollable") ? c("layout-position-scrollable") : c("layout-position-fixed"), t.hasAttribute("data-topbar") && "dark" == t.getAttribute("data-topbar") ? c("topbar-color-dark") : c("topbar-color-light"), t.hasAttribute("data-sidebar-size") && "sm" == t.getAttribute("data-sidebar-size") ? c("sidebar-size-small") : t.hasAttribute("data-sidebar-size") && "md" == t.getAttribute("data-sidebar-size") ? c("sidebar-size-compact") : c("sidebar-size-default"), t.hasAttribute("data-sidebar") && "brand" == t.getAttribute("data-sidebar") ? c("sidebar-color-brand") : t.hasAttribute("data-sidebar") && "dark" == t.getAttribute("data-sidebar") ? c("sidebar-color-dark") : c("sidebar-color-light"), document.getElementsByTagName("html")[0].hasAttribute("dir") && "rtl" == document.getElementsByTagName("html")[0].getAttribute("dir") ? c("layout-direction-rtl") : c("layout-direction-ltr"), document.querySelectorAll("input[name='layout'").forEach((function (t) {
            t.addEventListener("change", (function (t) {
                t && t.target && "vertical" == t.target.value ? (c("layout-vertical"), document.body.setAttribute("data-layout", "vertical"), document.body.setAttribute("data-sidebar", "dark"), document.body.setAttribute("data-topbar", "light"), document.getElementById("sidebar-setting").style.display = "block", document.getElementsByClassName("isvertical-topbar")[0].style.display = "block", document.getElementsByClassName("ishorizontal-topbar")[0].style.display = "none", document.getElementsByClassName("vertical-menu")[0].style.display = "block", window.innerWidth <= 992 && document.getElementsByClassName("vertical-menu")[0].removeAttribute("style"), c("sidebar-color-dark"), c("topbar-color-light")) : (c("layout-horizontal"), document.body.setAttribute("data-layout", "horizontal"), document.body.removeAttribute("data-sidebar"), document.body.setAttribute("data-topbar", "dark"), document.getElementById("sidebar-setting").style.display = "none", document.getElementsByClassName("vertical-menu")[0].style.display = "none", document.getElementsByClassName("ishorizontal-topbar")[0].style.display = "block")
            }))
        })), document.querySelectorAll("input[name='layout-mode']").forEach((function (e) {
            e.addEventListener("change", (function (e) {
                e && e.target && e.target.value && ("light" == e.target.value ? (document.body.setAttribute("data-layout-mode", "light"), document.body.setAttribute("data-topbar", "light"), document.body.setAttribute("data-sidebar", "dark"), t.hasAttribute("data-layout") && "horizontal" == t.getAttribute("data-layout") && document.body.removeAttribute("data-sidebar"), c("topbar-color-light"), c("sidebar-color-dark")) : (document.body.setAttribute("data-layout-mode", "dark"), document.body.setAttribute("data-topbar", "dark"), document.body.setAttribute("data-sidebar", "dark"), (!t.hasAttribute("data-layout") || "horizontal" != t.getAttribute("data-layout")) && c("topbar-color-dark"), c("sidebar-color-dark")))
            }))
        })), document.querySelectorAll("input[name='layout-direction']").forEach((function (t) {
            t.addEventListener("change", (function (t) {
                t && t.target && t.target.value && ("ltr" == t.target.value ? (document.getElementsByTagName("html")[0].removeAttribute("dir"), document.getElementById("bootstrap-style").setAttribute("href", "assets/css/bootstrap.min.css"), document.getElementById("app-style").setAttribute("href", "assets/css/app.min.css"), sessionStorage.setItem("is_visited", "layout-direction-ltr")) : (document.getElementById("bootstrap-style").setAttribute("href", "assets/css/bootstrap-rtl.min.css"), document.getElementById("app-style").setAttribute("href", "assets/css/app-rtl.min.css"), document.getElementsByTagName("html")[0].setAttribute("dir", "rtl"), sessionStorage.setItem("is_visited", "layout-direction-rtl")))
            }))
        }))
    }(), l(), (a = document.getElementById("checkAll")) && (a.onclick = function () {
        for (var t = document.querySelectorAll('.table-check input[type="checkbox"]'), e = 0; e < t.length; e++) t[e].checked = this.checked
    })
}();
