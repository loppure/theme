let $ = require('jquery');

export class Love {
    constructor(card) {
        this.card = card;
        this.post_id = card.getAttribute('data-id');
        this.btn = card.querySelector('button.button-like-post');
        this.fixClasses();


        /* -----------------------------------------------
            /*JSON.parse(localStorage.getItem("love"))
            ---------------------------------------------*/

        $(this.btn).on('click.love', (e) => {
            // `this` is binded to class' `this`
            let url = document.querySelector('#ajax-url').value;
            let self = this;

            $.ajax({
                url: url,
                method: 'GET',
                data: {
                    myID: this.id,
                    post_id: this.post_id,
                    action: 'love'
                },
                success: function(data) {
                    console.log("[Love] data: ", data);
                    console.log("[Love] success ajax: ", data);
                    console.log(`[Love]\nid: ${data.yourID}\nlist: ${data.list}`);
                    self.id = data.yourID;
                    self.list = data.list;
                    self.btn.innerHTML = data.total;
                },
                error: function(e) {
                    console.error("[Love] error ajax: ", e);
                },
            });
        });
    }

    static loop() {
        window.cards = window.cards || [];

        $(".card:not(.done)").each(function() {
            $(this).addClass('done');
            window.cards.push(new Love(this));
        });
    }

    fixClasses() {
        console.log(`[Love] fix classes\nlist:`, this.list, `\n_id_:`, this.post_id);
        if (this.list.indexOf(parseInt(this.post_id)) != -1) {
            $(this.btn).addClass('love-on');
            console.log("[Love] c'è - class");
        } else {
            console.log("[Love] non c'è - class");
            $(this.btn).removeClass('love-on');
        }
    }

    get id() {
        let id = 'none';

        if ( localStorage['love'] ) {
            id = JSON.parse(localStorage['love']).myID;
        }

        return id;
    }

    set id(id) {
        let data = localStorage['love']
                ? JSON.parse(localStorage['love'])
                : {};

        data.myID = id;

        localStorage['love'] = JSON.stringify(data);
    }

    get list() {
        let list = [];

        if ( localStorage['love'] ) {
            list = JSON.parse(localStorage['love']).list;
        }

        return list;
    }

    set list(list) {
        let data = localStorage['love']
                ? JSON.parse(localStorage['love'])
                : {};

        data.list = Object.keys(list).map(key => list[key]);

        localStorage['love'] = JSON.stringify(data);

        this.fixClasses();
    }
}
