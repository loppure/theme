<?php

namespace Loppure\Controllers;

class singleController extends Controller
{
    public function __construct()
    {
        $type = get_post_type();

        parent::__construct('Single:'. $type);

        $custom_filters = array(
            array(
                "name"    => "content",
                "closure" => function($id) {
                    $post = get_post($id);
                    $content = $post->post_content;
                    $content = apply_filters('the_content', $content);
                    return $content;
                }
            ),
            array(
                "name"    => "image",
                "closure" => function($id) {
                    $img = wp_get_attachment_image_src(get_post_thumbnail_id($id), 'large');
                    return $img[0];
                }
            )
        );
        
        $this->getPosts($custom_filters);
        $this->getAuthorInfo();
        
        $this->data['post'] = $this->data['posts'][0];
        $this->data['posts'] = null;

        $this->render();
    }
}
