<?php

namespace Loppure\Component;

use Theine\Taxonomy\CustomTaxonomy;

class TaxProgetti extends CustomTaxonomy
{
    public function __construct()
    {
        $post_type = array('loppure_polaroid', 'loppure_reportage');

        $labels = array(
            'name'                => _x( 'Progetti', 'taxonomy general name' ),
            'singular_name'       => _x( 'Progetti', 'taxonomy singular name' ),
            'search_items'        => __( 'Cerca tra le progetti' ),
            'all_items'           => __( 'Tutte le progetti' ),
            'edit_item'           => __( 'Modifica il progetto' ),
            'update_item'         => __( 'Aggiorna il progetto' ),
            'add_new_item'        => __( 'Aggiungi un nuovo progetto'),
            'new_item_name'       => __( 'Nome del nuovo progetto' ),
            'menu_name'           => __( 'Progetti' ),
        );

        $args = array(
            'hierarchical'        => true,
            'labels'              => $labels,
            'show_ui'             => true,
            'show_admin_column'   => true,
            'public'              => true,
            'publicly_queryable'  => true,
            'exclude_from_search' => false,
            'query_var'           => true,
            'show_in_rest'        => true,
            'rewrite'             => array( 'slug' => 'progetti' ),
        );

        parent::__construct('progetti', $post_type, $args);
    }
}
