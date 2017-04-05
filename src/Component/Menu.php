<?php

namespace Loppure\Component;

class Menu
{
    public function __construct()
    {
        add_action('init', [$this, 'register']);
    }

    public function register()
    {
        register_nav_menus([
            'header-menu' => 'Header menu',
            'footer-menu' => 'Footer menu'
        ]);
    }
}