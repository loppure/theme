export const URL = {
    //  URL base
    base: "http://localhost/loppure/",
    //  WP JSON
    wp_json: function () {
        return  this.base + "wp-json/wp/v2/";
    },
    //  PAGE NUMBER
    page_number: function (n) {
        return URL.wp_json() + 'posts?page=' + n;
    },
    //  CATEGORIES LIST
    post_categories: function () {
        return this.wp_json() + 'categories/';
    },
    //  SINGLE CATEGORY
    category: function (category) {
        return this.wp_json() + 'category/' + category;
    },
    //  POST
    post_id: function (id) {
        return this.wp_json() + 'posts/' + id;
    },
    //  COMMENTS RELATIVE TO A POST
    comments_post_id: function (id) {
        return this.wp_json() + 'comments?post=' + id;
    },
    //  MEDIA
    media: function (id) {
        return this.wp_json() + 'media/';
    },
    //  MEDIA ID
    media_id: function (id) {
        return this.wp_json() + 'media/' + id;
    },


    // WP COMMENTS POST
    comments_post: function () {
        return this.base + "wp-comments-post.php"
    },
};
