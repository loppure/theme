<?php

namespace Loppure\Component;

use Theine\PostType\CustomPostType;

class EventoType extends CustomPostType
{
    public function __construct()
    {
        $labels = array(
            'name'               => _x( 'Eventi', 'post type general name' ),
            'singular_name'      => _x( 'Evento', 'post type singular name' ),
            'add_new'            => __( 'Aggiungi un nuovo evento' ),
            'add_new_item'       => __( 'Aggiungi un nuovo evento' ),
            'edit_item'          => __( 'Modifica evento' ),
            'new_item'           => __( 'Nuovo evento' ),
            'all_items'          => __( 'Tutte le evento' ),
            'view_item'          => __( 'Vedi evento' ),
            'search_items'       => __( 'Cerca evento' ),
            'not_found'          => __( 'Nessun evento trovato' ),
            'not_found_in_trash' => __( 'Nessun evento trovato nel cestino' ),
            'parent_item_colon'  => '',
            'menu_name'          => 'Evento'
        );

        $args = array(
            'labels'        => $labels,
            'description'   => 'Holds our post evento and evento specific data',
            'taxonomies'    => array( 'citta', 'category' ),
            'public'        => true,
            'menu_position' => 5,
            'supports'      => array( 'title', 'excerpt', 'thumbnail', 'comments', 'custom-fields', 'revisions' ),
            'has_archive'   => false,
            'menu_icon'     => 'dashicons-format-image',
            'rewrite'       => array( 'slug' => 'eventi' )
        );

        parent::__construct('loppure_evento', $args);
    }
}
