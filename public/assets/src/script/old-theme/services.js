import $ from 'jquery';

const services = {
    extend: function() {
        var i, j, key, ref;
        for (i = j = 1, ref = arguments.length; 1 <= ref ? j < ref : j > ref; i = 1 <= ref ? ++j : --j) {
            for (key in arguments[i]) {
                if (arguments[i].hasOwnProperty(key)) {
                    arguments[0][key] = arguments[i][key];
                }
            }
        }
        return arguments[0];
    },
    instagram: function() {
        return {
            get: function() {
                return $.ajax({
                    url: "https://api.instagram.com/v1/users/1475834263/media/recent?client_id=634c2a3e110244109f6fab6e67b220b7",
                    dataType: "jsonp",
                    method: "GET"
                });
            }
        };
    },
    twitter: function() {
        return {
            get: function() {
                return $.ajax({
                    url: $("#loppure-ajax-uri").val(),
                    method: "POST",
                    data: {
                        action: "get_tweet"
                    }
                });
            }
        };
    },
    comments: function() {
        return {
            get: function(id) {
                return $.ajax({
                    url: $("#loppure-ajax-uri").val(),
                    method: "POST",
                    data: {
                        action: "get_comment",
                        post_id: id
                    }
                });
            }
        };
    },
    templates: function() {
        return {
            check_templates_version: function() {
                var req;
                req = new XMLHttpRequest;
                req.open('GET', $("#loppure-base-uri").val());
                req.onload = function() {
                    if (req.status == 200) {
                        return this.update_cache();
                    }
                };
                req.onerror = function() {
                    return console.error("Error checking the current online version of the templates.");
                };
                return req.send();
            },
            update_cache: function() {
                return new Promise(function(resolve, reject) {
                    var req;
                    req = new XMLHttpRequest;
                    req.open('GET', $("#loppure-templates-uri").val());
                    req.onload = function() {
                        if (req.status == 200) {
                            localStorage.setItem('template-cache', req.response);
                            return resolve(req.response);
                        } else {
                            return reject(Error(req.statusText));
                        }
                    };
                    req.onerror = function() {
                        return reject(Error("Network error"));
                    };
                    return req.send();
                });
            },
            get_all: function() {
                if (!localStorage.getItem('template-cache')) {
                    return this.update_cache();
                } else {
                    return Promise.resolve(localStorage.getItem('template-cache'));
                }
            },
            comments: function() {
                return this.get_all().then(function(html) {
                    var dump;
                    $(document.body).append("<div hidden id='tmp' />");
                    $("#tmp").html(html);
                    dump = $("#tmp").find("#comments-template").html();
                    $("#tmp").remove();
                    return dump;
                });
            },
            instagram: function() {
                return this.get_all().then(function(html) {
                    var dump;
                    $(document.body).append("<div hidden id='tmp' />");
                    $("#tmp").html(html);
                    dump = $("#tmp").find("#images-template").html();
                    $("#tmp").remove();
                    return dump;
                });
            },
            twitter: function() {
                return this.get_all().then(function(html) {
                    var dump;
                    $(document.body).append("<div hidden id='tmp' />");
                    $("#tmp").html(html);
                    dump = $("#tmp").find("#tweets-template").html();
                    $("#tmp").remove();
                    return dump;
                });
            },
            overlay: function() {
                return this.get_all().then(function(html) {
                    var dump;
                    $(document.body).append("<div hidden id='tmp' />");
                    $("#tmp").html(html);
                    dump = $("#tmp").find("#slider-template").html();
                    $("#tmp").remove();
                    return dump;
                });
            }
        };
    }
};

export default services;
