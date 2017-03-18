<?php

namespace Loppure\Controllers;

use \StdClass;

class Controller extends \Theine\Controller\Controller
{
    public function __construct($view)
    {
        parent::__construct($view);

        $this->data['user'] = new StdClass;
        $this->data['user']->logged = is_user_logged_in();
        $this->data['user']->name = wp_get_current_user()->user_login;
    }
    
    public function getPosts($filters = array(), $author = true, $comments = true)
    {
        $custom_filters = array_merge(
            array(
                array(
                    "name"    => "time",
                    "closure" => function() {
                        return get_the_time('j F Y');
                    }
                ),
                array(
                    "name"    => "love",
                    "closure" => function($id) {
                        $love = get_post_meta($id, 'op_love');
                        $love = empty($love) ? array(0) : $love;
                        return $love[0];
                    }
                ),
                array(
                    "name"    => "comment_status",
                    "closure" => function() {
                        global $post;
                        return $post->comment_status;
                    }
                ),
                array(
                    "name"    => "css_class",
                    "closure" => function() {
                        $string = "";
        
                        foreach(get_post_class() as $class) {
                            $string .= $class . " ";
                        }

                        $string .= "card";

                        return trim($string);
                    }
                ),
                array(
                    "name"    => "thumbnail",
                    "closure" => function($id) {
                        $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($id), 'medium');
                        return $thumb[0];
                    }
                ),
                array(
                    "name"    => "comments",
                    "closure" => function($id) {
                        $comments = get_comments(array(
                            'post_id' => $id,
                            'status'  => 'approve',
                            'order'   => 'ASC'
                        ));

                        $result = array();

                        foreach ($comments as $comment)
                            $result[] = array(
                                'id'  => $comment->comment_ID,
                                'author'  => $comment->comment_author,
                                'body'  => $comment->comment_content,
                                'date'  => $comment->comment_date,
                                'parent'  => $comment->comment_parent,
                                'post'  => $comment->comment_post_ID
                            );

                        $not_nested = array_filter($result, function($single) {
                            return $single['parent'] == 0;
                        });

                        $nested = array_filter($result, function($single) {
                            return $single['parent'] != 0;
                        });

                        foreach ($nested as &$n)
                            foreach ($not_nested as &$nn)
                                if ($n['parent'] == $nn['id'])
                                    $nn['sons'][] = $n;

                        return $not_nested;
                    }
                ),
                array(
                    "name"    => "description",
                    "closure" => function($id) {
                        return get_post_meta($id, '__loppure__description_2', true);
                    }
                ),
                array(
                    "name"    => "source",
                    "closure" => function($id) {
                        return array(
                            "link"  => get_post_meta($id, '__loppure__image_source', true),
                            "text"  => get_post_meta($id, '__loppure__text_source', true)
                        );
                    }
                )
            ),
            $filters
        );

        return parent::getPosts($custom_filters);
    }
}
