import services from './services';
import filters from './filters';
import CommentSystem from './CommentSystem';

import Handlebars from 'handlebars';
import $ from 'jquery';

const Card = (function() {
    function Card(elm1, actions, commentWrapper) {
        var self;
        this.elm = elm1;
        if (actions == null) {
            actions = true;
        }
        this.commentWrapper = commentWrapper != null ? commentWrapper : false;
        self = this;
        services.templates().comments().then(function(tmpl) {
            self.template = Handlebars.compile(tmpl);
            return self.comments();
        });
        if (actions) {
            if ($(this.elm).hasClass('type-post')) {
                this.overlayable = false;
            } else {
                this.overlayable = true;
            }
            if (this.overlayable) {
                this.overlay();
            } else {
                this.click();
            }
            this.trim_description();
        }
    }

    Card.loop = function() {
        return $("article[data-id]:not(.object-ished)").each(function(index, elm) {
            $(this).addClass('object-ished');
            return debug_card.push(new Card(elm));
        });
    };

    Card.prototype.trim_description = function() {
        var description, new_description;
        description = $(this.elm).find('section p').text();
        $(this.elm).data('original-description', description);
        if (description.length > (max_length + tolerance)) {
            new_description = (description.slice(0, max_length)) + " <span class='link more'> Altro... </span> <span class='hidden' hidden='hidden'> " + (description.slice(max_length, -1)) + " <span class='link close'> Chiudi </span> </span>";
            $(this.elm).find('section p').html(new_description);
            $(this.elm).find('.more').one('click', function(e) {
                e.stopPropagation();
                $(this).css('display', 'none');
                $(this).next('span.hidden').removeClass('hidden').removeAttr('hidden');
                return $(this).remove();
            });
            return $(this.elm).find('span.close').one('click', (function(_this) {
                return function(e) {
                    e.stopPropagation();
                    $(_this.elm).find('span.link').remove();
                    return _this.trim_description();
                };
            })(this));
        }
    };

    Card.prototype.click = function() {
        return $(this.elm).find('header, section').on('click', function(e) {
            if (e.target.nodeName !== 'A' && ($(e.target).parents('article').data('url') != null)) {
                return window.location.href = $(e.target).parents('article').data('url');
            }
        });
    };

    Card.prototype.overlay = function() {
        return $(this.elm).find('header, section').on('click', function(e) {
            return;
            if (e.target.nodeName !== 'A') {
                return render_overlay($, this);
            }
        });
    };

    Card.prototype.comments = function() {
        var elm, simple;
        console.log("Card.__proto__.comments called!", this);
        elm = this.elm;
        simple = function(e) {
            console.log("Simple");
            e.preventDefault();
            $(elm).find('.comments-wrapper').toggleClass('open');
            return $(document.body).trigger('sticky_kit:recalc');
        };
        $(this.elm).find('.button-comments').on('click.open_comments', simple);
        $(this.elm).find('.close_comments').on('click.open_comments', simple);
        console.log("button-comments", $(this.elm).find('.button-comments'));
        return this.load_comments();
    };

    Card.prototype.load_comments = function() {
        console.log('load_comments');
        var elm, self, template;
        self = this;
        elm = this.elm;
        template = this.template;
        services.comments().get($(this.elm).data('id')).success(function(data) {
            $(elm).find('.comments-wrapper').prepend(template({
                comments: filters.comments(data)
            }));
            self.comments = filters.comments(data);
            return self.raw_comments = data;
        });
        console.log("commentWrapper: ", self.commentWrapper);

        if (self.commentWrapper) {
            return self.comment_system = new CommentSystem(self.commentWrapper);
        } else {
            console.log($(elm).find('.comments-wrapper').get(0));
            return self.comment_system = new CommentSystem($(elm).find('.comments-wrapper').get(0));
        }
    };

    return Card;

})();

export default Card;
