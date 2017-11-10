<?php

namespace Loppure\Component;

use Theine\PostType\CustomPostType;

class ReportageType extends CustomPostType
{
    public function __construct()
    {
        $labels = array(
            'name'               => _x( 'Reportage', 'post type general name' ),
            'singular_name'      => _x( 'Reportage', 'post type singular name' ),
            'add_new'            => __( 'Aggiungi un nuovo reportage' ),
            'add_new_item'       => __( 'Aggiungi un nuovo reportage' ),
            'edit_item'          => __( 'Modifica reportage' ),
            'new_item'           => __( 'Nuovo reportage' ),
            'all_items'          => __( 'Tutti i reportage' ),
            'view_item'          => __( 'Vedi reportage' ),
            'search_items'       => __( 'Cerca reportage' ),
            'not_found'          => __( 'Nessuno reportage trovato' ),
            'not_found_in_trash' => __( 'Nessuno reportage trovato nel cestino' ),
            'parent_item_colon'  => '',
            'menu_name'          => 'Reportage'
        );

        $rewrite = array(
      		'slug'                  => 'reportage',
      		'with_front'            => true,
      		'pages'                 => true,
      		'feeds'                 => true,
      	);
      	$args = array(
      		'label'                 => __( 'reportage', 'text_domain' ),
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

        parent::__construct('loppure_reportage', $args);
    }
}
