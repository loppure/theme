const helpers = function() {
    return {
        debounce: function(func, wait, immediate) {
            return function() {
                var args, callnow, context, later, timeout;
                context = this;
                args = arguments;
                later = function() {
                    var timeout;
                    timeout = null;
                    if (!immediate) {
                        return func.apply(context, args);
                    }
                };
                callnow = immediate && !timeout;
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
                if (callnow) {
                    return func.apply(context, args);
                }
            };
        },
        async: function(func) {
            return setTimeout(function() {
                return func();
            }, 1);
        },
        urlify: function(text) {
            var urlRegex;
            urlRegex = /(https?:\/\/[^\s]+)/g;
            return text.replace(urlRegex, function(url) {
                return "<a href='" + url + "'>" + url + "</a>";
            });
        }
    };
};

export default helpers;
