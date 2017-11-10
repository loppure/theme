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

        $rewrite = array(
      		'slug'                  => 'polaroid',
      		'with_front'            => true,
      		'pages'                 => true,
      		'feeds'                 => true,
      	);
      	$args = array(
      		'label'                 => __( 'polaroid', 'text_domain' ),
      		'description'           => __( 'Post Type Description', 'text_domain' ),
      		'labels'                => $labels,
      		'supports'              => array( 'title', 'editor', 'thumbnail'  ),
      		'taxonomies'            => array( 'category', 'progetti', 'citta' ),
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

        parent::__construct('loppure_polaroid', $args);

    }
}
