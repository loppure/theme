<?php

namespace Loppure\Component;

class Sidebar
{
    public function run()
    {
        register_sidebar([
            'name'          => 'Sidebar destra',
            'id'            => 'sidebar-dx',
            'before_widget' => '<aside id=\'%1$s\' class=\'widget %2$s\'>',
            'after_widget'  => '</aside>',
            'before_title'  => '<h1 class=\'widget-title\'>',
            'after_title'   => '</h1>'
        ]);

        register_sidebar([
            'name'          => 'Sidebar sinistra',
            'id'            => 'sidebar-sx',
            'before_widget' => '<aside id=\'%1$s\' class=\'widget %2$s\'>',
            'after_widget'  => '</aside>',
            'before_title'  => '<h1 class=\'widget-title\'>',
            'after_title'   => '</h1>'
        ]);

        register_sidebar([
            'name'          => 'Sidebar articolo',
            'id'            => 'sidebar-single',
            'description'   => '',
            'before_widget' => '<aside id=\'%1$s\' class=\'widget %2$s\'>',
            'after_widget'  => '</aside>',
            'before_title'  => '<h1 class=\'widget-title\'>',
            'after_title'   => '</h1>',
        ]);

        register_sidebar([
            'name'          => 'Footer',
            'id'            => 'sidebar-footer',
            'description'   => '',
            'before_widget' => '',
            'after_widget'  => '',
            'before_title'  => '',
            'after_title'   => '',
        ]);
    }
}