<?php

namespace Loppure\Component\Widgets;

class TimelineWidget extends AbstractWidget
{
    /**
     * Register widget with WordPress.
     */
    public function __construct()
    {
        $this->class_name = __CLASS__;
        $arg = array('classname' => 'timeline', 'description' => 'Visualizza dei link per gli archivi');
        parent::__construct('Widget.Home.Timeline.index', 'timeline', 'Timeline', $arg);
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance)
    {
        $this->data['args'] = $args;
        $title = !empty($instance['title']) ? $instance['title'] : 'Timeline';
        $this->data['title'] = apply_filters('widget_title', $title);

        // the links
        $archives = array(
            $this->getMonth(0),
            $this->getMonth(1),
            $this->getMonth(2)
        );

        if (is_tax('citta')) {
            $suffix = '?=citta='. get_query_var('citta');
        } else if (is_category()) {
            $suffix = '?category'. get_query_var('cat');
        } else {
            $suffix = '';
        }

        $archives = array_map(function($item) use ($suffix) {
            $foo = new \StdClass();

            $foo->month = $item[2];
            $foo->url = get_month_link($item[0], $item[1]) . $suffix;
            
            return $foo;
        }, $archives);

        $this->data['archives'] = $archives;

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
        $this->data['title'] = !empty($instance['title']) ? $instance['title'] : 'Timeline';
        $this->render('Widget.Timeline.form');
    }

    /**
     * Deals with the settings when they are saved by the admin. Here is
     * where any validation should be dealt with.
     *
     * @param array $new_instance An array of new settings as submitted by the admin
     * @param array $old_instance An array of the previous settings
     * @return array The validated and (if necessary) amended settings
     **/
    public function update( $new_instance, $old_instance ) {
        // update logic goes here
        $updated_instance = $new_instance;
        return $updated_instance;
    }

    public function getMonth($how_far)
    {
        $current_month = intval(date('n'));
        $current_year = intval(date('Y'));

        $months = array( 'null', 'Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre' );

        if ($current_month - $how_far <= 0) {
            $new_year = $current_year -1;
            $new_month = 12 + ($current_month - $how_far);

            return array(
                $new_year,
                $new_month,
                $months[$new_month]
            );
        }

        $new_month = $current_month - $how_far;
        return array(
            $current_year,
            $new_month,
            $months[$new_month]
        );
    }
}