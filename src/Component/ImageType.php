<?php

namespace Loppure\Component;

use Theine\PostType\CustomPostType;

class ImageType extends CustomPostType
{
    public function __construct()
    {
        $labels = array(
            'name'               => _x( 'Post Immagini', 'post type general name' ),
            'singular_name'      => _x( 'Post Immagine', 'post type singular name' ),
            'add_new'            => __( 'Aggiungi una nuova immagine' ),
            'add_new_item'       => __( 'Aggiungi una nuova immagine' ),
            'edit_item'          => __( 'Modifica immagine' ),
            'new_item'           => __( 'Nuova immagine' ),
            'all_items'          => __( 'Tutte le immagini' ),
            'view_item'          => __( 'Vedi immagine' ),
            'search_items'       => __( 'Cerca immagini' ),
            'not_found'          => __( 'Nessuna immagine trovata' ),
            'not_found_in_trash' => __( 'Nessuna immagine trovata nel cestino' ),
            'parent_item_colon'  => '',
            'menu_name'          => 'Post Immagine'
        );

        $args = array(
            'labels'        => $labels,
            'description'   => 'Holds our post image and image specific data',
            'taxonomies'    => array( 'citta', 'category' ),
            'public'        => true,
            'menu_position' => 5,
            'supports'      => array( 'title', 'excerpt', 'thumbnail', 'comments', 'custom-fields', 'revisions' ),
            'has_archive'   => false,
            'menu_icon'     => 'dashicons-format-image',
            'rewrite'       => array( 'slug' => 'immagini' )
        );

        parent::__construct('loppure_image', $args);
    }
}
