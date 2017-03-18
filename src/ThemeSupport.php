<?php

namespace Loppure;

class ThemeSupport
{
    public function run()
    {
        add_action('after_setup_theme', [$this, 'register']);
    }

    public function register()
    {
        add_theme_support('post-thumbnails');
        add_theme_support('html5', ['comment-list', 'comment-form', 'search-form', 'gallery', 'caption']);
        add_theme_support('title-tag');
        add_theme_support('title-tag');
    }
}