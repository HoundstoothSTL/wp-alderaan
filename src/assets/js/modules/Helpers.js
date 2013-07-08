var Helpers = {

    init: function() {
        this.raf(),
        this.windowHeight(),
        this.windowWidth();
    },

    raf: function() {
        var lastTime = 0;
        var vendors = ['ms', 'moz', 'webkit', 'o'];
        for(var x = 0; x < vendors.length && !window.requestAnimationFrame; ++x) {
            window.requestAnimationFrame = window[vendors[x]+'RequestAnimationFrame'];
            window.cancelAnimationFrame = window[vendors[x]+'CancelAnimationFrame'] || window[vendors[x]+'CancelRequestAnimationFrame'];
        }

        if (!window.requestAnimationFrame)
        {
            window.requestAnimationFrame = function(callback, element) {
                var currTime = new Date().getTime();
                var timeToCall = Math.max(0, 16 - (currTime - lastTime));
                var id = window.setTimeout(function() { callback(currTime + timeToCall); }, timeToCall);
                lastTime = currTime + timeToCall;
                return id;
            };
        }

        if (!window.cancelAnimationFrame)
        {
            window.cancelAnimationFrame = function(id) {
                clearTimeout(id);
            };
        }
    },

    windowHeight: function() {
        var docElemProp = window.document.documentElement.clientHeight,
            body = window.document.body;
        return window.document.compatMode === "CSS1Compat" && docElemProp || body && body.clientHeight || docElemProp;
    },

    windowWidth: function() {
        var docElemProp = window.document.documentElement.clientWidth,
            body = window.document.body;
        return window.document.compatMode === "CSS1Compat" && docElemProp || body && body.clientWidth || docElemProp;
    },

    hasClass: function (elem, className) {
        return new RegExp(' ' + className + ' ').test(' ' + elem.className + ' ');
    },

    addClass: function (elem, className) {
        if (!this.hasClass(elem, className)) {
            elem.className += ' ' + className;
        }
    },

    removeClass: function (elem, className) {
        var newClass = ' ' + elem.className.replace( /[\t\r\n]/g, ' ') + ' ';
        if (this.hasClass(elem, className)) {
            while (newClass.indexOf(' ' + className + ' ') >= 0 ) {
                newClass = newClass.replace(' ' + className + ' ', ' ');
            }
            elem.className = newClass.replace(/^\s+|\s+$/g, '');
        }
    },

    toggleClass: function (elem, className) {
        var newClass = ' ' + elem.className.replace( /[\t\r\n]/g, ' ' ) + ' ';
        if (this.hasClass(elem, className)) {
            while (newClass.indexOf(' ' + className + ' ') >= 0 ) {
                newClass = newClass.replace( ' ' + className + ' ' , ' ' );
            }
            elem.className = newClass.replace(/^\s+|\s+$/g, '');
        } else {
            elem.className += ' ' + className;
        }
    }
};