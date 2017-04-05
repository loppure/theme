<?php

namespace Loppure\Component;

use Theine\Taxonomy\CustomTaxonomy;

class TaxCitta extends CustomTaxonomy
{
    public function __construct()
    {
        $post_type = array('post', 'loppure_image', 'loppure_video');

        $labels = array(
            'name'                => _x( 'Città', 'taxonomy general name' ),
            'singular_name'       => _x( 'Città', 'taxonomy singular name' ),
            'search_items'        => __( 'Cerca tra le città' ),
            'all_items'           => __( 'Tutte le città' ),
            'edit_item'           => __( 'Modifica la città' ),
            'update_item'         => __( 'Aggiorna la città' ),
            'add_new_item'        => __( 'Aggiungi una nuova città'),
            'new_item_name'       => __( 'Nome della nuova città' ),
            'menu_name'           => __( 'Città' ),
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
            'rewrite'             => array( 'slug' => 'sezione' ),
        );

        parent::__construct('citta', $post_type, $args);
    }
}
