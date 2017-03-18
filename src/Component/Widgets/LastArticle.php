<?php

namespace Loppure\Component\Widgets;

class LastArticle extends AbstractWidget
{
    public function __construct()
	{
        $this->class_name = __CLASS__;
		// widget actual processes
		parent::__construct(
            'Widget.LastArticle.index',
			'loppure_last_articles',
			'Ultimi Articoli',
			array( "description" => "Visualizza gli ultimi 6 articoli." )
		);
	}

    public function widget($args, $instance)
    {
        $this->data['args'] = $args;
        $title = !empty($instance['title']) ? $instance['title'] : 'Last Article';
        $this->data['title'] = apply_filters('widget_title', $title);
        
        $args = array(
            'post_type' => array('post'),
            'post_per_page' => '5',
            'orderby' => 'rand'
        );

        $query = new \WP_Query($args);
        $posts = $query->get_posts();

        $posts = array_map(function($post) {
            $cat = get_the_category($post->ID);
            $first_cat = false;
            
            if (!empty($cat)) {
                $first_cat = new \StdClass();
                $first_cat->name = esc_html($cat[0]->name);
                $first_cat->slug = $cat[0]->slug;
            }
            
            $foo = new \StdClass();
            $foo->title = $post->post_title;
            $foo->category = $first_cat;
            $foo->url = get_permalink($post->ID);
            return $foo;
        }, $posts);

        $this->data['posts'] = $posts;

        $this->render();
    }

    
    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form($instance)
    {
        $this->data['form'] = array(
            'id' => $this->get_field_id('title'),
            'name' => $this->get_field_name('title')
        );
        $this->data['title'] = !empty($instance['title']) ? $instance['title'] : 'Last Article';
        $this->render('Widget.LastArticle.form');
    }

    public function update($new_instance, $old_instance)
    {
        $updated_instance = $new_instance;
        return $updated_instance;
    }
}