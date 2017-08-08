<?php

namespace Loppure\Component;

use Theine\PostType\CustomPostType;

class TeamType extends CustomPostType
{
    public function __construct()
    {
        $labels = array(
            'name'               => _x( 'Team', 'post type general name' ),
            'singular_name'      => _x( 'Team', 'post type singular name' ),
            'add_new'            => __( 'Aggiungi un nuovo utente team' ),
            'add_new_item'       => __( 'Aggiungi un nuovo utente team' ),
            'edit_item'          => __( 'Modifica utente team' ),
            'new_item'           => __( 'Nuovo utente team' ),
            'all_items'          => __( 'Tutte le utente team' ),
            'view_item'          => __( 'Vedi utente team' ),
            'search_items'       => __( 'Cerca utente team' ),
            'not_found'          => __( 'Nessun utente team trovato' ),
            'not_found_in_trash' => __( 'Nessun utente team trovato nel cestino' ),
            'parent_item_colon'  => '',
            'menu_name'          => 'Team'
        );

        $args = array(
            'labels'        => $labels,
            'description'   => 'Holds our post Team and Team specific data',
            'taxonomies'    => array(),
            'public'        => true,
            'menu_position' => 5,
            'supports'      => array( 'title', 'excerpt', 'thumbnail', 'comments', 'custom-fields', 'revisions' ),
            'has_archive'   => false,
            'menu_icon'     => 'dashicons-format-image',
            'rewrite'       => array( 'slug' => 'Team' )
        );

        parent::__construct('loppure_Team', $args);
    }
}
