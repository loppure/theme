export const URL = {
    //  URL base
    base: "http://192.168.0.2/",
    //  WP JSON
    wp_json: function () {
        return  this.base + "wp-json/wp/v2/";
    },
    //  POSTS
    posts: function () {
        return URL.wp_json() + "posts";
    },
    //  POST ID
    post_id: function (id) {
        return this.wp_json() + 'posts/' + id;
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
    //  MEDIA
    media: function (id) {
        return this.wp_json() + 'media/';
    },
    //  MEDIA ID
    media_id: function (id) {
        return this.wp_json() + 'media/' + id;
    },
    //  COMMENTS RELATIVE TO A POST
    comments_post_id: function (id) {
        return this.wp_json() + 'comments?post=' + id;
    },
    // WP COMMENTS POST
    comments_post: function () {
        return this.base + "wp-comments-post.php"
    },
    // CITY
    city: function(id) {
        return this.wp_json() + "citta";
    },
    // CITY ID
    city_id: function(id) {
        return this.wp_json() + "citta/" + id;
    }
};
