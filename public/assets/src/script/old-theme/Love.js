import Card          from './Card';
import CommentSystem from './CommentSystem.js';
import helpers       from './helpers';
import services      from './services';
import filters       from './filters';

import jQuery        from 'jquery';
import Handlebars    from 'handlebars';

const ready_to_love = function($) {
    var everywhere;
    everywhere = $;
    $('.button-like-post').off('click.love');
    return $('.button-like-post').on('click.love', function(e) {
        var post_id;
        e.stopPropagation();
        post_id = $(e.target).parents('article').data('id');
        return $.ajax({
            url: $("#loppure-ajax-uri").val(),
            type: 'post',
            data: {
                action: 'give_love',
                post_id: post_id,
                myID: get_myID()
            },
            success: function(data) {
                var love, love_counter;
                console.log(data);
                data = JSON.parse(data);
                love = {
                    myID: data.yourID,
                    list: data.list
                };
                love = JSON.stringify(love);
                love_counter = parseInt(data.total) > 0 ? data.total : '';
                $("[data-id=" + post_id + "] .button-like-post").html(love_counter);
                localStorage.setItem('love', love);
                return give_love(everywhere);
            }
        });
    });
};

const get_myID = function() {
    var data, myID;
    if (localStorage['love']) {
        data = JSON.parse(localStorage.getItem('love'));
        return myID = data.myID;
    } else {
        return myID = 'none';
    }
};

const give_love = function($) {
    var i, list, love;
    love = JSON.parse(localStorage.getItem('love')) || {};
    list = new Array();
    for (i in love.list) {
        list.push(parseInt(love.list[i]));
    }
    return $("article[data-id]").each(function(index, elm) {
        var id;
        id = parseInt($(this).data('id'));
        if (list.indexOf(id) === -1) {
            $(elm).find('.button-like-post').removeClass('like-on');
        } else {
            $(elm).find('.button-like-post').addClass('like-on');
        }
        if (parseInt($(elm).find('.button-like-post').data('love')) > 0 && list.indexOf(id) === -1) {
            return $(elm).find('.button-like-post').addClass('like-di-altri');
        } else {
            return $(elm).find('.button-like-post').removeClass('like-di-altri');
        }
    });
};

const load_helper = function() {
    return (function(h) {
        h.registerHelper('ternary', function(test, yep, nope) {
            if (test) {
                return yep;
            } else {
                return nope;
            }
        });
        h.registerHelper('_or', function(first, second) {
            return first || second;
        });
        return h.registerHelper('choose', function(first, second) {
            return first || second;
        });
    })(Handlebars);
};

export default function run() {
    setTimeout(function() {
        return (function($) {
            var comments_loaded, debounce_scrolling, everything, everywhere, firstScriptTag, h3, tag;
            console.log("Ready to love!");
            if ($(".button-like-post").lenght) {
                console.log("No way to love here");
            } else {
                everywhere = everything = $;
                ready_to_love(everything);
                give_love(everywhere);
            }
            $(document).ready(function() {
                return $(".art[data-url]").on('click', function() {
                    return window.location.href = $(this).data('url');
                });
            });
            Card.loop();
            comments_loaded = false;
            $(".comments-show-hide").on("click", function() {
                var h3, id;
                $('.comments-wrapper').toggleClass('open');
                h3 = $(".show-hide-img").next('h3');
                if ($('.comments-wrapper').hasClass('open')) {
                    h3.text(h3.data('hide-text'));
                } else {
                    h3.text(h3.data('show-text'));
                }
                if (!comments_loaded) {
                    console.log("loading comments...");
                    id = $("article.post").data('id');
                    services.templates().comments().then(function(tmpl) {
                        var template;
                        template = Handlebars.compile(tmpl);
                        return services.comments().get(id).success(function(comments) {
                            comments = filters.comments(comments);
                            $(".comments-wrapper .respond").before(template({
                                comments: comments
                            }));
                            return window["current_card"] = new CommentSystem($(".comments-wrapper").get(0));
                        });
                    });
                }
                return comments_loaded = true;
            });
            h3 = $(".show-hide-img").next('h3');
            h3.text(h3.data('show-text'));
            load_helper();
            debounce_scrolling = helpers().debounce(function(e) {
                if ($(window).scrollTop() > 400) {
                    return $("#scroll_up").addClass('show');
                } else {
                    return $("#scroll_up").removeClass('show');
                }
            }, 200);
            $(window).on('scroll', debounce_scrolling);
            $("#scroll_up").on('click', function(e) {
                return $("body").velocity('scroll', {
                    duration: 400,
                    easing: 'easeInBack'
                });
            });
            if ($(".youtube-div-placeholder").length) {
                console.log("Some video found in the current page");
                tag = document.createElement('script');
                tag.src = "https://www.youtube.com/iframe_api";
                firstScriptTag = document.getElementsByTagName('script')[0];
                return firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
            }
        })(jQuery);
    }, 0);
}
