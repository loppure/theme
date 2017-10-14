<?php

namespace Loppure\Component;

use Theine\PostType\CustomPostType;

class PolaroidType extends CustomPostType
{
    public function __construct()
    {
        $labels = array(
            'name'               => _x( 'Polaroid', 'post type general name' ),
            'singular_name'      => _x( 'Polaroid', 'post type singular name' ),
            'add_new'            => __( 'Aggiungi una nuova polaroid' ),
            'add_new_item'       => __( 'Aggiungi una nuova polaroid' ),
            'edit_item'          => __( 'Modifica polaroid' ),
            'new_item'           => __( 'Nuova polaroid' ),
            'all_items'          => __( 'Tutte le polaroid' ),
            'view_item'          => __( 'Vedi polaroid' ),
            'search_items'       => __( 'Cerca polaroid' ),
            'not_found'          => __( 'Nessuna polaroid trovata' ),
            'not_found_in_trash' => __( 'Nessuna polaroid trovata nel cestino' ),
            'parent_item_colon'  => '',
            'menu_name'          => 'Polaroid'
        );

        $args = array(
            'labels'        => $labels,
            'description'   => 'Holds our post polaroid and polaroid specific data',
            'taxonomies'    => array( 'progetti', 'category', 'citta' ),
            'public'        => true,
            'menu_position' => 5,
            'supports'      => array( 'title', 'editor', 'thumbnail' ),
            'has_archive'   => false,
            'menu_icon'     => 'dashicons-format-image',
            'rewrite'       => array( 'slug' => 'polaroid' )
        );

        parent::__construct('loppure_polaroid', $args);
    }
}
