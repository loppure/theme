let $ = require('jquery');

export class Category {
    constructor(category) {
            let self = this;
            this.elm=category;
            this.categoryName = this.elm.classList[1];
            $(this.elm).on("click", function() {
              console.log(self.categoryName);
              self.load_category();
            })
        }
        //end constructor
    static loop() {
            if (!window.categories) {
                window.categories = [];
            }

            let categories = document.querySelectorAll('.category-box:not(.done)');

            for (let category of Array.from(categories)) {
                window.categories.push(new Category(category));

                category.classList.add('done');
            }
        }
        //end loop

    load_category() {
        $(".content-area").load("category/" + this.categoryName + " .bock-centrale.post-category");
    }
}
