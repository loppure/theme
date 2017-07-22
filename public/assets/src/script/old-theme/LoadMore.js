import jQuery from 'jquery';

export default function run() {
    (function($) {
        window.question_hide_button = function() {
            if (!$(".link_to_next_page a").length) {
                $("#load-more").remove();
                console.log("Rimosso il tasto 'load-more', è inutile!");
            }
        };
        $("#load-more").on('click', function() {
            console.log("link: ", $(".link_to_next_page a").attr('href'));
            console.log("element: ", $(".link_to_next_page a"));
            return $.ajax({
                url: $(".link_to_next_page a").attr('href'),
                type: 'get',
                success: function(data) {
                    var parsed_data, wrapper;
                    window.data = data;
                    console.log($("#section-cont-article article"));
                    $(".link_to_next_page").remove();
                    parsed_data = $(".section-cont-article article, .section-cont-article .link_to_next_page", data);
                    wrapper = $("<div>").append(parsed_data);
                    return $("#load-more").before(wrapper);
                },
                complete: function() {
                    ready_to_love($);
                    give_love($);
                    Card.loop();
                    $(document.body).trigger('sticky_kit:recalc');
                    return question_hide_button();
                }
            });
        });
        return question_hide_button();
    })(jQuery);

}
