"use strict";

function _classCallCheck(t, e) {
    if (!(t instanceof e)) throw new TypeError("Cannot call a class as a function")
}

function _defineProperties(t, e) {
    for (var n = 0; n < e.length; n++) {
        var i = e[n];
        i.enumerable = i.enumerable || !1, i.configurable = !0, "value" in i && (i.writable = !0), Object.defineProperty(t, i.key, i)
    }
}

function _createClass(t, e, n) {
    return e && _defineProperties(t.prototype, e), n && _defineProperties(t, n), Object.defineProperty(t, "prototype", {
        writable: !1
    }), t
}
self.PUSHOWL_SERVICE_WORKER_VERSION = "2.2";
var ErrorHelper = function() {
    var e = "https://sentry.io/api/1891871/store/?sentry_version=7&sentry_key=0df575aa94e3419782416c33a46d9dd7";

    function i(t) {
        (t = t || {}).poServiceWorkerVersion = self.PUSHOWL_SERVICE_WORKER_VERSION;
        var e = (new Date).toISOString().split(".")[0];
        return {
            event_id: "xxxxxxxxxxxx4xxxyxxxxxxxxxxxxxxx".replace(/[xy]/g, function(t) {
                var e = 16 * Math.random() | 0;
                return ("x" === t ? e : 3 & e | 8).toString(16)
            }),
            logger: "cdn-service-worker",
            platform: "javascript",
            timestamp: e,
            extra: t,
            release: "abc815b"
        }
    }

    function r(t) {
        return fetch(e, {
            method: "post",
            mode: "no-cors",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(t)
        })
    }

    function a(t, e) {
        (e = e || {}).errorDump = {
            str: String(t),
            stack: t && t.stack
        };
        var n = i(e);
        return n.exception = ((t = ((e = t).stack || "").split("\n").map(function(t) {
            return t.trim()
        }).filter(function(t) {
            return t.startsWith("at")
        }).map(function(t) {
            var e = "",
                n = 0,
                i = 0,
                r = "",
                t = t.split(/[ ]+/);
            return "at" === t[0].trim() && 1 < t.length && (1 < (t = (2 < t.length ? (e = t[1], t[2]) : t[1]).replace("(", "").replace(")", "").split(":")).length && (n = t[t.length - 1], i = t[t.length - 2], r = t.slice(0, t.length - 2).join(":"))), {
                in_app: !0,
                function: e,
                colno: Number(n) || n,
                lineno: Number(i) || i,
                filename: r
            }
        })).reverse(), {
            values: [{
                type: e.name || "Error",
                value: e.message || String(e),
                stacktrace: {
                    frames: t
                }
            }]
        }), r(n)
    }
    return {
        log: function(t, e) {
            return (e = i(e)).message = t, r(e)
        },
        logException: a,
        withErrorReporting: function(t) {
            return function(e) {
                if (!e || !e.waitUntil) throw new Error("withErrorReporting should only be used for handlers that receive ExtendableEvent");
                try {
                    return t(e)
                } catch (t) {
                    var n = a(t, {
                        eventData: e && e.data && e.data.json()
                    });
                    e.waitUntil(n)
                }
            }
        }
    }
}();
! function() {
    var e = console,
        o = new(function() {
            function e(t) {
                t = t.maxNetworkRetries;
                _classCallCheck(this, e), this.maxNetworkRetries = t
            }
            return _createClass(e, [{
                key: "payloadTransformation",
                value: function(e) {
                    var t = e.title,
                        n = [],
                        i = e.actions;
                    if (i)
                        for (var r = 0; r < i.length; r++) {
                            var a = {
                                action: "action" + r,
                                title: i[r].title
                            };
                            n.push(a)
                        }
                    var o = !("require_interaction" in e) || e.require_interaction,
                        c = {
                            body: e.description || "",
                            tag: e.tag || e.id,
                            actions: n,
                            requireInteraction: o,
                            data: e
                        };
                    return ["icon", "badge", "image"].forEach(function(t) {
                        e[t] && (c[t] = e[t])
                    }), {
                        title: t,
                        config: c
                    }
                }
            }, {
                key: "processPush",
                value: function(t) {
                    if (this.payload = t.data.json().data, !this.payload || "pushowl" !== this.payload.app) return Promise.resolve();
                    var e = this.payloadTransformation(this.payload),
                        t = e.title,
                        e = e.config,
                        t = this.displayNotification(t, e),
                        e = this.payload.delivery_acknowledgement_url,
                        e = this.update(e);
                    return Promise.all([e, t])
                }
            }, {
                key: "displayNotification",
                value: function(t, e) {
                    return self.registration.showNotification(t, e)
                }
            }, {
                key: "update",
                value: function(t) {
                    var r = this,
                        a = 1;
                    return new Promise(function(i, e) {
                        (function n() {
                            fetch(t, {
                                method: "POST",
                                headers: {
                                    "Content-Type": "text/plain"
                                }
                            }).then(function(t) {
                                var e = Math.min(8e3, 1e3 * Math.pow(2, a));
                                429 === t.status && a++ <= r.maxNetworkRetries ? setTimeout(n, e) : i(t)
                            }).catch(function(t) {
                                return e(t)
                            })
                        })()
                    })
                }
            }, {
                key: "openLink",
                value: function(i) {
                    i && clients.matchAll({
                        type: "window"
                    }).then(function(t) {
                        for (var e = 0; e < t.length; e++) {
                            var n = t[e];
                            if (n.url === i && "focus" in n) return n.focus()
                        }
                        if (clients.openWindow) return clients.openWindow(i)
                    })
                }
            }], [{
                key: "version",
                get: function() {
                    return self.PUSHOWL_SERVICE_WORKER_VERSION
                }
            }]), e
        }())({
            maxNetworkRetries: 5
        });
    self.addEventListener("install", function(t) {
        t.waitUntil(self.skipWaiting())
    }), self.addEventListener("activate", function(t) {
        t.waitUntil(self.clients.claim())
    }), self.addEventListener("push", ErrorHelper.withErrorReporting(function(t) {
        if (self.Notification && "granted" === self.Notification.permission) {
            if (!t.data) throw new Error("Empty event data.");
            var e = o.processPush(t);
            t.waitUntil(e)
        }
    })), self.addEventListener("notificationclick", function(n) {
        var i, t, e = n.notification,
            r = e.data;
        try {
            i = r.redirect_url, a = r.click_acknowledgement_url, t = "body", n.action && (n.action.includes("action0") ? (i = r.actions[0].redirect_url, t = "cta1") : n.action.includes("action1") && (i = r.actions[1].redirect_url, t = "cta2"))
        } catch (t) {
            ErrorHelper.logException(t, e ? {
                notification: {
                    title: e.title,
                    data: e.data,
                    actions: e.actions
                }
            } : void 0)
        }
        e = new Promise(function(t, e) {
            n.notification.close(), o.openLink(i), t()
        });
        a += "&clicked_component=" + t;
        var a = Promise.all([e, o.update(a)]);
        n.waitUntil(a)
    }), self.addEventListener("message", function(t) {
        var e = o.payloadTransformation(t.data),
            n = e.title,
            e = e.config;
        n && t.waitUntil(o.displayNotification(n, e))
    }), self.addEventListener("notificationclose", function(i) {
        i.waitUntil(new Promise(function(t, e) {
            var n = i.notification.data.close_acknowledgement_url;
            o.update(n).then(function() {
                t()
            }).catch(function() {})
        }))
    }), self.addEventListener("error", function(t) {
        ErrorHelper.logException(t.error), e.error(t.filename, t.lineno, t.colno, t.message)
    })
}();
