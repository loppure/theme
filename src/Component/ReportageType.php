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

        $args = array(
            'labels'        => $labels,
            'description'   => 'Holds our post reportage and reportage specific data',
            'taxonomies'    => array( 'progetti', 'category' ),
            'public'        => true,
            'menu_position' => 5,
            'supports'      => array( 'title', 'excerpt', 'thumbnail', 'comments', 'custom-fields', 'revisions' ),
            'has_archive'   => false,
            'menu_icon'     => 'dashicons-format-image',
            'rewrite'       => array( 'slug' => 'reportage' )
        );

        parent::__construct('loppure_reportage', $args);
    }
}
