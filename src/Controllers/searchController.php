<?php

namespace Loppure\Controllers;

use \WP_User_Query;
use \StdClass;

class searchController extends Controller
{
    public function __construct()
    {
        parent::__construct('Search.index');

        $user_query = new WP_User_Query(array(
            'order' => 'ASC',
            'search' => '*'. get_search_query() .'*'
        ));

        $this->data['authors'] = false;

        if (!empty($user_query->results)) {
            $this->data['authors'] = array_map( function($author) {
                $a = new StdClass();

                $a->id = $author->ID;
                $a->thumb = get_avatar($author->user_email, $size=96);
                $a->url = get_author_posts_url($author->ID);
                $a->name = $author->display_name;
                $a->bio = get_the_author_meta('description', $author->ID);

                return $a;
            }, $user_query->results);
        }

        $this->getPosts();
        $this->render();
    }
}