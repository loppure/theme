import $ from 'jquery';

export default class CommentSystem {
    constructor(wrapper1) {
        this.wrapper = wrapper1;
        console.log("aaa", $(this.wrapper).find('.respond').get(0));
        this.form = $(this.wrapper).find('.respond:first').detach();
        this.form.find('.comment_post_ID').val($(this.form).find('form').data('id'));
        this.max_comment_length = 3;
        this.move_to_default_position();
        this.trim_comments();
        this.trim_responses();
        this.reply();
    }

    submit() {
        return $(this.form).find('form').off('submit').on('submit', (function(_this) {
            return function(e) {
                console.log("intercepting submit event on ", _this.form);
                e.preventDefault();
                _this.log("Sto inviando il tuo commento...");
                if (!_this.valid) {
                    console.log("not valid");
                    _this.log('<p>Hai omesso un campo.<br> Assicurati di aver compilato tutti i campi obbligatori prima di inviarci il commento.</p>');
                    return;
                } else {
                    console.log("valid");
                }
                console.log($(_this.form).find('form').attr('action'), $(_this.form).find('form').serialize());
                return $.ajax({
                    type: 'POST',
                    url: $(_this.form).find('form').attr('action'),
                    data: $(_this.form).find('form').serialize(),
                    error: function() {
                        return _this.log('<p>Abbiamo riscontrato un errore nei nostri server.</p> <p>Stiamo lavorando per risolverlo al più presto</p>');
                    },
                    success: function(data, buh) {
                        if (-1 < buh.indexOf("success")) {
                            return _this.log('<p>Grazie per aver commentato. Il tuo commento è in attesa di moderazione</p>');
                        } else {
                            return _this.log('<p>Si è verificato un errore nell\'invio del commento.<br> Potresti aver omesso un campo, oppure potrebbe essere un errore del nostro server.<br> Se la problematica persiste contattaci!</p>');
                        }
                    },
                    complete: function() {
                        _this.close_all_response();
                        return _this.move_to_default_position();
                    }
                });
            };
        })(this));
    }

    valid() {
        var i, j, len, ref;
        ref = $(this.form).find('input, textarea');
        for (j = 0, len = ref.length; j < len; j++) {
            i = ref[j];
            if ($(elm).is(':empty') && $(elm).hasAttribute('require')) {
                return false;
            }
        }
        return true;
    }

    comments_length() {
        return $(this.wrapper).children('article').length;
    }

    move_to_default_position() {
        this.remove_form();
        $(this.wrapper).append(this.form);
        $(this.form).find('.comment_parent').val('0');
        this.show_hide_form();
        return this.submit();
    }

    show_hide_form() {
        var form, self, wrapper;
        if (!this.comments_length()) {
            return;
        }
        console.log("Called show_hide_form ", form);
        form = this.form;
        wrapper = this.wrapper;
        self = this;
        $(this.wrapper).find('.add-comment').remove();
        $(this.form).after('<button class="add-comment">Commenta</button>');
        $(this.form).css('display', 'none');
        return $(this.form).next('button').one('click', function() {
            self.close_all_response();
            $(form).css('display', 'block');
            return $(this).remove();
        });
    }

    log(text) {
        var log_text;
        log_text = $('<div class="logging_console" />');
        $(this.form).parent().append(log_text);
        console.log("log_text: ", log_text);
        log_text.html(text);
        return setTimeout(function() {
            return log_text.remove();
        }, 3000);
    }

    close_all_response() {
        $(this.wrapper).find('button.close').each(function() {
            return $(this).trigger('click');
        });
        return $(this.form).find('form').get(0).reset();
    };

    remove_form() {
        return $(this.wrapper).find('.respond').remove();
    };

    reply() {
        var form, self;
        console.log("REPLY", $(this.wrapper).find('.reply-anchor'));
        self = this;
        form = this.form;
        return $(this.wrapper).off('click.respond', '.reply-anchor').on('click.respond', '.reply-anchor', function(e) {
            console.log("alleluja!!!");
            e.preventDefault();
            self.remove_form();
            $(this).css('display', 'none');
            $(this).parent().append($('<button class="close">Chiudi</button>'));
            $(this).parents('div:first').after($(form).css('display', 'block'));
            $(form).find('.comment_parent').val($(this).parents('article').data('comment-id'));
            self.submit();
            return $(this).parent().find('.close').one('click', function(e) {
                $(this).parent().find('.reply-anchor').css('display', 'inline');
                $(this).remove();
                self.remove_form();
                self.move_to_default_position();
                return self.show_hide_form();
            });
        });
    };

    articles_hidden() {
        return $(this.wrapper).children('article.hidden').length;
    };

    trim_comments() {
        var click;
        if ($(this.wrapper).children('article').length > this.max_comment_length) {
            console.log("Max comment length reached");
            $(this.wrapper).children('article').addClass('hidden');
            $(this.wrapper).children('article:last').after('<button class="comment_load_more">Carica altro</button>');
            click = (function(_this) {
                return function(e) {
                    var a, j;
                    if (_this.articles_hidden()) {
                        for (a = j = 0; j < 3; a = ++j) {
                            $(_this.wrapper).children("article.hidden:first").removeClass('hidden');
                        }
                    }
                    if (!_this.articles_hidden()) {
                        $(_this.wrapper).children('article:last').after('<p>Nessun altro commento</p>');
                        return $(_this.wrapper).find('.comment_load_more').remove();
                    }
                };
            })(this);
            return $(this.wrapper).find('.comment_load_more').on('click.comment_load_more', click).trigger('click.comment_load_more');
        }
    };

    trim_responses() {
        var responses, status, toggle_text;
        status = 0;
        responses = $(this.wrapper).find('.sons');
        if (responses.length) {
            console.log('We have responses!!', responses);
            toggle_text = function() {
                if (status) {
                    status = 0;
                    return "Nascondi le risposte";
                } else {
                    status = 1;
                    return "Mostra le risposte";
                }
            };
            responses.find('.son').addClass('hidden').parent();
            responses.parent().find('.rispondi').prepend($("<button class='show_responses'>" + (toggle_text()) + "</button>"));
            return responses.parent().find('.rispondi').find('.show_responses').on('click.show_responses', function(e) {
                $(this).text(toggle_text());
                return responses.find('.son').toggleClass('hidden');
            });
        }
    };
}
