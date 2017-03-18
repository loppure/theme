<?php

namespace Loppure\Controllers;

class singleController extends Controller
{
    public function __construct()
    {
        parent::__construct('Single:index');

        $custom_filters = array(
            array(
                "name"    => "content",
                "closure" => function($id) {
                    $post = get_post($id);
                    $content = $post->post_content;
                    $content = apply_filters('the_content', $content);
                    return $content;
                }
            )
        );
        
        $this->getPosts($custom_filters);
        
        $this->data['post'] = $this->data['posts'][0];
        $this->data['posts'] = null;

        $this->render();
    }
}
