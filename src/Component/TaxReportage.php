<?php

namespace Loppure\Component;

use Theine\Taxonomy\CustomTaxonomy;

class TaxReportage extends CustomTaxonomy
{
    public function __construct()
    {
        $post_type = array('loppure_reportage');

        $labels = array(
            'name'                => _x( 'Reportage', 'taxonomy general name' ),
            'singular_name'       => _x( 'Reportage', 'taxonomy singular name' ),
            'search_items'        => __( 'Cerca tra le reportage' ),
            'all_items'           => __( 'Tutte le reportage' ),
            'edit_item'           => __( 'Modifica il reportage' ),
            'update_item'         => __( 'Aggiorna il reportage' ),
            'add_new_item'        => __( 'Aggiungi un nuovo reportage'),
            'new_item_name'       => __( 'Nome del nuovo reportage' ),
            'menu_name'           => __( 'Reportage' ),
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
            'rewrite'             => array( 'slug' => 'reportage' ),
        );

        parent::__construct('reportage', $post_type, $args);
    }
}
