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

        $rewrite = array(
      		'slug'                  => 'eventi',
      		'with_front'            => true,
      		'pages'                 => true,
      		'feeds'                 => true,
      	);
      	$args = array(
      		'label'                 => __( 'evento', 'text_domain' ),
      		'description'           => __( 'Post Type Description', 'text_domain' ),
      		'labels'                => $labels,
      		'supports'              => array( 'title', 'editor', 'thumbnail' ),
      		'taxonomies'            => array( 'category', 'citta' ),
      		'hierarchical'          => true,
      		'public'                => true,
      		'show_ui'               => true,
      		'show_in_menu'          => true,
      		'menu_position'         => 5,
      		'show_in_admin_bar'     => true,
      		'show_in_nav_menus'     => true,
      		'can_export'            => true,
      		'has_archive'           => true,
      		'exclude_from_search'   => false,
      		'publicly_queryable'    => true,
      		'rewrite'               => $rewrite,
      		'capability_type'       => 'page',
        );

        parent::__construct('loppure_evento', $args);
    }
}
