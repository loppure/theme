<?php

namespace Loppure\Controllers;

use \StdClass;

class authorController extends Controller
{
    public function __construct()
    {
        parent::__construct('Author.index');
        $this->getPosts();

        
        $author = get_query_var('author_name')
                ? get_user_by('slug', get_query_var('author_name'))
                : get_userdata(get_query_var('author'));

        $this->data['author'] = new StdClass();
        $this->data['author']->name = $author->display_name;
        $this->data['author']->thumb = get_avatar(get_the_author_meta('user_email'), $size=96);
        $this->data['author']->bio = get_the_author_meta('description');
        
        $this->render();
    }
}